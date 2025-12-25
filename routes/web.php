<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\InfoPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [DashboardController::class, 'index'])->name('home');

// Public info pages (no auth required)
Route::get('/info/{slug}', [InfoPageController::class, 'publicShow'])->name('info.show');

// Institution Landing Pages (public, no auth required)
// Lembaga 1: Pondok Pesantren -> redirects to homepage
Route::get('/lembaga/pondok-pesantren', fn() => redirect('/'))->name('lembaga.pondok');
// Lembaga 2: MI - Madrasah Ibtidaiyah
Route::get('/lembaga/mi', fn() => view('lembaga.mi'))->name('lembaga.mi');
// Lembaga 3: MA - Madrasah Aliyah
Route::get('/lembaga/ma', fn() => view('lembaga.ma'))->name('lembaga.ma');
// Lembaga 4: Majelis Nurul Musthofa
Route::get('/lembaga/majelis', fn() => view('lembaga.majelis'))->name('lembaga.majelis');
// Lembaga 5: Madrasah Diniyah
Route::get('/lembaga/diniyah', fn() => view('lembaga.diniyah'))->name('lembaga.diniyah');
// Lembaga 6: BPKK - Balai Pelatihan Kerja Komunitas
Route::get('/lembaga/bpkk', fn() => view('lembaga.bpkk'))->name('lembaga.bpkk');
// Lembaga 7: TPQ - Taman Pendidikan Al-Quran
Route::get('/lembaga/tpq', fn() => view('lembaga.tpq'))->name('lembaga.tpq');
// Lembaga 8: RA - Raudhatul Athfal
Route::get('/lembaga/ra', fn() => view('lembaga.ra'))->name('lembaga.ra');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroyAccount'])->name('profile.destroy');
    
    // User Management (Admin/Super Admin only)
    Route::resource('users', UserController::class)->except(['create', 'store']);
    
    // Content Management (Admin/Super Admin only)
    Route::resource('content', ContentController::class)->except(['show']);
    Route::post('content/{content}/reset', [ContentController::class, 'resetToDefault'])->name('content.reset');
    Route::get('content/section/{section}/edit', [ContentController::class, 'editSection'])->name('content.section.edit');
    Route::post('content/section/{section}/update', [ContentController::class, 'updateSection'])->name('content.section.update');
    
    // Info Pages Management (Admin/Super Admin only)
    Route::resource('info-pages', InfoPageController::class);
    
    // Santri Management
    Route::resource('santri', SantriController::class);
    
    // Teacher Management
    Route::resource('teachers', TeacherController::class);
    
    // Class Management
    Route::resource('classes', ClassController::class);
    
    // Payment Management
    Route::resource('payments', PaymentController::class);
    
    // Attendance Management
    Route::get('attendances', [AttendanceController::class, 'index'])->name('attendances.index');
    Route::get('attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
    Route::post('attendances', [AttendanceController::class, 'store'])->name('attendances.store');
    Route::get('attendances/teacher', [AttendanceController::class, 'createTeacher'])->name('attendances.create-teacher');
    Route::post('attendances/teacher', [AttendanceController::class, 'storeTeacher'])->name('attendances.store-teacher');
    Route::get('attendances/report', [AttendanceController::class, 'report'])->name('attendances.report');
});



