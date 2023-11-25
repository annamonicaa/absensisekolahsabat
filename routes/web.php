<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view ('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/prayer/create', [App\Http\Controllers\PrayerController::class, 'create'])->name('prayer');
Route::resource('/prayer', 'PrayerController');



//Attendance
Route::resource('/attendance', 'AttendanceController');
Route::get('/attendance/show/{ukss_id}/{meetingId}', 'AttendanceController@show')->name('attendance.show');
Route::get('/attendance/show/{meetingId}', 'AttendanceController@showSec')->name('attendance.showSec');

Route::get('/attendance/sec/{meetingId}/edit', 'AttendanceController@editSec')->name('attendance.editSec');
Route::put('/attendance/sec/{meetingId}/update', 'AttendanceController@updateSec')->name('attendance.updateSec');

Route::get('/attendance/show/{ukss_id}/{meetingId}/edit', 'AttendanceController@edit')->name('attendance.edit');
Route::put('/attendance/show/{ukss_id}/{meetingId}/update', 'AttendanceController@update')->name('attendance.update');
Route::delete('/attendance/show/{ukss_id}/{meetingId}/delete', 'AttendanceController@destroy')->name('attendance.destroy');
Route::get('/search-members', 'UkssmemController@searchMembers')->name('search-members');

// Route::get('/attendance/{meeting_id}/edit', 'AttendanceController@edit')->name('attendance.edit');
// Route::put('/attendance/{meeting_id}', 'AttendanceController@update')->name('attendance.update');

Route::get('sec/ukssmem/show', 'UkssmemController@showSec')->name('ukssmem.showSec');
Route::resource('/meeting', 'MeetingController');
Route::resource('/user', 'UserController');
Route::resource('/ukssmem', 'UkssmemController');
Route::resource('/triwulan', 'TriwulanController');

//laporan
Route::get('/laporan/ukss', [LaporanController::class, 'coba'])->name('coba');
Route::get('/list/{ukss_id}', [LaporanController::class, 'list'])->name('list');
Route::get('/laporan/jemaat', [LaporanController::class, 'laporanJemaat'])->name('laporanJemaat');
Route::get('/laporan/jemaat/{ukss_id}', [LaporanController::class, 'jemaatukss'])->name('jemaatukss');
Route::get('/laporan/anggota/{ukssmem_ids}', [LaporanController::class, 'laporanAnggota'])->name('laporanAnggota'); 

Route::middleware(['auth', 'user-access:1'])->group(function() {
    Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
    Route::resource('/member', 'MemberController');
    Route::resource('/ukss', 'UkssController');
    Route::resource('/church', 'ChurchController');
});

Route::middleware(['auth', 'user-access:3'])->group(function() {
    Route::get('/sec/home', [HomeController::class, 'sec'])->name('sec.home');
});

Route::middleware(['auth', 'user-access:4'])->group(function() {
    Route::get('/staff/home', [HomeController::class, 'staff'])->name('staff.home');
    Route::resource('/member', 'MemberController');
    Route::resource('/ukss', 'UkssController');
    Route::get('/staff/attendance', [AttendanceController::class, 'ukss'])->name('attendance.ukss');
    Route::get('/staff/attendance/{ukss_id}', [AttendanceController::class, 'index2'])->name('attendance.index2');
    Route::get('/staff/attendance/{ukss_id}/create', [AttendanceController::class, 'create2'])->name('attendance.create2');
});
Route::middleware(['auth', 'user-access:2'])->group(function() {
    Route::get('/konferens/home', [HomeController::class, 'konferens'])->name('konferens.home');
    Route::resource('/church', 'ChurchController');

});