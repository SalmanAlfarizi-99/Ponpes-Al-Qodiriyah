<?php

namespace App\Http\Controllers;

use App\Models\SantriAttendance;
use App\Models\TeacherAttendance;
use App\Models\Santri;
use App\Models\Teacher;
use App\Models\Classes;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:attendance.view')->only(['index', 'report']);
        $this->middleware('permission:attendance.create')->only(['create', 'store', 'storeTeacher']);
    }

    public function index(Request $request)
    {
        $date = $request->get('date', Carbon::today()->format('Y-m-d'));
        $type = $request->get('type', 'santri');

        if ($type === 'santri') {
            $attendances = SantriAttendance::with('santri')
                ->whereDate('date', $date)
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else {
            $attendances = TeacherAttendance::with('teacher')
                ->whereDate('date', $date)
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }

        return view('attendances.index', compact('attendances', 'date', 'type'));
    }

    public function create(Request $request)
    {
        $date = $request->get('date', Carbon::today()->format('Y-m-d'));
        $classId = $request->get('class_id');
        
        $classes = Classes::active()->orderBy('name')->get();
        
        if ($classId) {
            $santriList = Santri::active()
                ->where('class_id', $classId)
                ->orderBy('name')
                ->get();
            
            // Get existing attendance for this date
            $existingAttendance = SantriAttendance::whereDate('date', $date)
                ->whereIn('santri_id', $santriList->pluck('id'))
                ->pluck('status', 'santri_id');
        } else {
            $santriList = collect();
            $existingAttendance = collect();
        }

        return view('attendances.create', compact('classes', 'santriList', 'date', 'classId', 'existingAttendance'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'class_id' => 'required|exists:classes,id',
            'attendance' => 'required|array',
            'attendance.*.santri_id' => 'required|exists:santri,id',
            'attendance.*.status' => 'required|in:present,sick,permitted,absent',
            'attendance.*.notes' => 'nullable|string',
        ]);

        foreach ($validated['attendance'] as $att) {
            SantriAttendance::updateOrCreate(
                [
                    'santri_id' => $att['santri_id'],
                    'date' => $validated['date'],
                ],
                [
                    'status' => $att['status'],
                    'notes' => $att['notes'] ?? null,
                    'recorded_by' => auth()->id(),
                ]
            );
        }

        return redirect()->route('attendances.index', ['date' => $validated['date']])
            ->with('success', 'Absensi berhasil disimpan.');
    }

    public function createTeacher(Request $request)
    {
        $date = $request->get('date', Carbon::today()->format('Y-m-d'));
        $teachers = Teacher::active()->orderBy('name')->get();
        
        $existingAttendance = TeacherAttendance::whereDate('date', $date)
            ->pluck('status', 'teacher_id');

        return view('attendances.create-teacher', compact('teachers', 'date', 'existingAttendance'));
    }

    public function storeTeacher(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'attendance' => 'required|array',
            'attendance.*.teacher_id' => 'required|exists:teachers,id',
            'attendance.*.status' => 'required|in:present,sick,permitted,absent',
            'attendance.*.check_in' => 'nullable|date_format:H:i',
            'attendance.*.check_out' => 'nullable|date_format:H:i',
            'attendance.*.notes' => 'nullable|string',
        ]);

        foreach ($validated['attendance'] as $att) {
            TeacherAttendance::updateOrCreate(
                [
                    'teacher_id' => $att['teacher_id'],
                    'date' => $validated['date'],
                ],
                [
                    'status' => $att['status'],
                    'check_in' => $att['check_in'] ?? null,
                    'check_out' => $att['check_out'] ?? null,
                    'notes' => $att['notes'] ?? null,
                    'recorded_by' => auth()->id(),
                ]
            );
        }

        return redirect()->route('attendances.index', ['date' => $validated['date'], 'type' => 'teacher'])
            ->with('success', 'Absensi ustadz/ustadzah berhasil disimpan.');
    }

    public function report(Request $request)
    {
        $month = $request->get('month', Carbon::now()->month);
        $year = $request->get('year', Carbon::now()->year);
        $type = $request->get('type', 'santri');

        if ($type === 'santri') {
            $summary = SantriAttendance::selectRaw('status, COUNT(*) as count')
                ->whereMonth('date', $month)
                ->whereYear('date', $year)
                ->groupBy('status')
                ->pluck('count', 'status');
        } else {
            $summary = TeacherAttendance::selectRaw('status, COUNT(*) as count')
                ->whereMonth('date', $month)
                ->whereYear('date', $year)
                ->groupBy('status')
                ->pluck('count', 'status');
        }

        return view('attendances.report', compact('summary', 'month', 'year', 'type'));
    }
}
