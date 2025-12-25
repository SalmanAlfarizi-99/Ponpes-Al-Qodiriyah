<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:teachers.view')->only(['index', 'show']);
        $this->middleware('permission:teachers.create')->only(['create', 'store']);
        $this->middleware('permission:teachers.edit')->only(['edit', 'update']);
        $this->middleware('permission:teachers.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $query = Teacher::with(['user', 'classes']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%")
                  ->orWhere('specialization', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $teachers = $query->orderBy('name')->paginate(15)->withQueryString();

        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'nullable|unique:teachers,nip',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'birth_date' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'education' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'join_date' => 'nullable|date',
            'status' => 'required|in:active,inactive',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        $teacher = Teacher::create($validated);

        AuditLog::log('create', $teacher, null, $teacher->toArray());

        return redirect()->route('teachers.index')
            ->with('success', 'Data ustadz/ustadzah berhasil ditambahkan.');
    }

    public function show(Teacher $teacher)
    {
        $teacher->load(['classes', 'schedules.subject', 'attendances']);
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'nip' => 'nullable|unique:teachers,nip,' . $teacher->id,
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'birth_date' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'education' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'join_date' => 'nullable|date',
            'status' => 'required|in:active,inactive',
            'photo' => 'nullable|image|max:2048',
        ]);

        $oldValues = $teacher->toArray();

        if ($request->hasFile('photo')) {
            if ($teacher->photo) {
                Storage::disk('public')->delete($teacher->photo);
            }
            $validated['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        $teacher->update($validated);

        AuditLog::log('update', $teacher, $oldValues, $teacher->fresh()->toArray());

        return redirect()->route('teachers.index')
            ->with('success', 'Data ustadz/ustadzah berhasil diperbarui.');
    }

    public function destroy(Teacher $teacher)
    {
        $oldValues = $teacher->toArray();
        $teacher->delete();

        AuditLog::log('delete', $teacher, $oldValues, null);

        return redirect()->route('teachers.index')
            ->with('success', 'Data ustadz/ustadzah berhasil dihapus.');
    }
}
