<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Classes;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SantriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:santri.view')->only(['index', 'show']);
        $this->middleware('permission:santri.create')->only(['create', 'store']);
        $this->middleware('permission:santri.edit')->only(['edit', 'update']);
        $this->middleware('permission:santri.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $query = Santri::with(['class', 'user']);

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%")
                  ->orWhere('guardian_name', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by class
        if ($request->filled('class_id')) {
            $query->where('class_id', $request->class_id);
        }

        // Filter by gender
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        $santri = $query->orderBy('name')->paginate(15)->withQueryString();
        $classes = Classes::active()->orderBy('name')->get();

        return view('santri.index', compact('santri', 'classes'));
    }

    public function create()
    {
        $classes = Classes::active()->orderBy('name')->get();
        $nis = Santri::generateNis();
        return view('santri.create', compact('classes', 'nis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:santri,nis',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'birth_date' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'class_id' => 'nullable|exists:classes,id',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_relation' => 'nullable|string|max:100',
            'guardian_address' => 'nullable|string',
            'enrollment_date' => 'nullable|date',
            'status' => 'required|in:active,graduated,dropout,transferred',
            'photo' => 'nullable|image|max:2048',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('santri', 'public');
        }

        $santri = Santri::create($validated);

        AuditLog::log('create', $santri, null, $santri->toArray());

        return redirect()->route('santri.index')
            ->with('success', 'Data santri berhasil ditambahkan.');
    }

    public function show(Santri $santri)
    {
        $santri->load(['class', 'attendances', 'assessments', 'payments']);
        return view('santri.show', compact('santri'));
    }

    public function edit(Santri $santri)
    {
        $classes = Classes::active()->orderBy('name')->get();
        return view('santri.edit', compact('santri', 'classes'));
    }

    public function update(Request $request, Santri $santri)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:santri,nis,' . $santri->id,
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'birth_date' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'class_id' => 'nullable|exists:classes,id',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_relation' => 'nullable|string|max:100',
            'guardian_address' => 'nullable|string',
            'enrollment_date' => 'nullable|date',
            'status' => 'required|in:active,graduated,dropout,transferred',
            'photo' => 'nullable|image|max:2048',
            'notes' => 'nullable|string',
        ]);

        $oldValues = $santri->toArray();

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($santri->photo) {
                Storage::disk('public')->delete($santri->photo);
            }
            $validated['photo'] = $request->file('photo')->store('santri', 'public');
        }

        $santri->update($validated);

        AuditLog::log('update', $santri, $oldValues, $santri->fresh()->toArray());

        return redirect()->route('santri.index')
            ->with('success', 'Data santri berhasil diperbarui.');
    }

    public function destroy(Santri $santri)
    {
        $oldValues = $santri->toArray();
        $santri->delete();

        AuditLog::log('delete', $santri, $oldValues, null);

        return redirect()->route('santri.index')
            ->with('success', 'Data santri berhasil dihapus.');
    }
}
