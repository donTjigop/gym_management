<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;

Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Route to display the dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route to fetch stats dynamically (AJAX)
Route::get('/dashboard/stats', [DashboardController::class, 'fetchStats'])->name('dashboard.stats');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Members Route
Route::get('/members', [MemberController::class, 'index'])->name('members.index'); 
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create'); 
Route::post('/members', [MemberController::class, 'store'])->name('members.store'); 
Route::get('/members/{member}', [MemberController::class, 'show'])->name('members.show'); 
Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit'); 
Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy'); 

// Trainers Route
Route::get('/trainers', [TrainerController::class, 'index'])->name('trainers.index');
Route::resource('trainers', TrainerController::class);

// Show the list of all schedules
Route::get('schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('schedules', [ScheduleController::class, 'store'])->name('schedules.store');
Route::get('schedules/{schedule}', [ScheduleController::class, 'show'])->name('schedules.show');
Route::get('schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
Route::put('schedules/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
Route::delete('schedules/{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

// Subscriptions Route
Route::get('subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
Route::get('subscriptions/create', [SubscriptionController::class, 'create'])->name('subscriptions.create');
Route::post('subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::get('subscriptions/{subscription}/edit', [SubscriptionController::class, 'edit'])->name('subscriptions.edit');
Route::put('subscriptions/{subscription}', [SubscriptionController::class, 'update'])->name('subscriptions.update');
Route::delete('subscriptions/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');


// Payments Route
Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');



//report route

Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('reports/create', [ReportController::class, 'showReportForm'])->name('reports.create');
Route::post('reports/generate', [ReportController::class, 'generateReport'])->name('reports.generate');


// Route::get('/reports', [TransactionReportController::class, 'index'])->name('reports.index');
// Route::get('reports/create', [TransactionReportController::class, 'showReportForm'])->name('transactionReports.create');
// Route::post('reports/generate', [TransactionReportController::class, 'generateReport'])->name('transactionReports.generate');

// Settings Route
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
