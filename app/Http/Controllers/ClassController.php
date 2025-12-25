<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:classes.view')->only(['index', 'show']);
        $this->middleware('permission:classes.create')->only(['create', 'store']);
        $this->middleware('permission:classes.edit')->only(['edit', 'update']);
        $this->middleware('permission:classes.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $query = Classes::with(['teacher', 'santri']);

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $classes = $query->orderBy('level')->orderBy('name')->paginate(15)->withQueryString();
        $levels = Classes::distinct()->pluck('level')->filter();

        return view('classes.index', compact('classes', 'levels'));
    }

    public function create()
    {
        $teachers = Teacher::active()->orderBy('name')->get();
        return view('classes.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'nullable|string|max:100',
            'academic_year' => 'required|string|max:20',
            'teacher_id' => 'nullable|exists:teachers,id',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $class = Classes::create($validated);

        AuditLog::log('create', $class, null, $class->toArray());

        return redirect()->route('classes.index')
            ->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function show(Classes $class)
    {
        $class->load(['teacher', 'santri', 'schedules.subject', 'schedules.teacher']);
        return view('classes.show', compact('class'));
    }

    public function edit(Classes $class)
    {
        $teachers = Teacher::active()->orderBy('name')->get();
        return view('classes.edit', compact('class', 'teachers'));
    }

    public function update(Request $request, Classes $class)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'nullable|string|max:100',
            'academic_year' => 'required|string|max:20',
            'teacher_id' => 'nullable|exists:teachers,id',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $oldValues = $class->toArray();
        $class->update($validated);

        AuditLog::log('update', $class, $oldValues, $class->fresh()->toArray());

        return redirect()->route('classes.index')
            ->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Classes $class)
    {
        if ($class->santri()->count() > 0) {
            return redirect()->route('classes.index')
                ->with('error', 'Tidak dapat menghapus kelas yang masih memiliki santri.');
        }

        $oldValues = $class->toArray();
        $class->delete();

        AuditLog::log('delete', $class, $oldValues, null);

        return redirect()->route('classes.index')
            ->with('success', 'Kelas berhasil dihapus.');
    }
}
