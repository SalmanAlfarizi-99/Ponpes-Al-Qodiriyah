<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\Teacher;
use App\Models\Classes;
use App\Models\Payment;
use App\Models\Announcement;
use App\Models\SantriAttendance;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        
        // Statistics for dashboard
        $stats = [
            'total_santri' => Santri::active()->count(),
            'total_teachers' => Teacher::active()->count(),
            'total_classes' => Classes::active()->count(),
            'attendance_today' => SantriAttendance::whereDate('date', Carbon::today())->count(),
        ];

        // Recent payments
        $recentPayments = Payment::with(['santri', 'paymentType'])
            ->latest()
            ->take(5)
            ->get();

        // Recent announcements
        $announcements = Announcement::published()
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        // Monthly payment summary
        $monthlyPayments = Payment::whereMonth('payment_date', Carbon::now()->month)
            ->whereYear('payment_date', Carbon::now()->year)
            ->sum('amount');

        // Attendance summary for this month
        $attendanceSummary = [
            'present' => SantriAttendance::whereMonth('date', Carbon::now()->month)
                ->where('status', 'present')->count(),
            'sick' => SantriAttendance::whereMonth('date', Carbon::now()->month)
                ->where('status', 'sick')->count(),
            'permitted' => SantriAttendance::whereMonth('date', Carbon::now()->month)
                ->where('status', 'permitted')->count(),
            'absent' => SantriAttendance::whereMonth('date', Carbon::now()->month)
                ->where('status', 'absent')->count(),
        ];

        return view('dashboard', compact(
            'user',
            'stats',
            'recentPayments',
            'announcements',
            'monthlyPayments',
            'attendanceSummary'
        ));
    }
}
