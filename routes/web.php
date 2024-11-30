<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\SubUserController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    return view('welcome');
});

// Route::get('/{token}', [StudentController::class, 'magicLinkLogin']);
Route::middleware(['admin.auth'])->group(function () {

Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.showLogin');
Route::post('/admin/do-login', [AdminController::class, 'doLogin'])->name('admin.doLogin');

});

Route::middleware(['admin.NotLoggedIN'])->group(function () {
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);
Route::resource('subuser', SubUserController::class);
Route::resource('students', StudentsController::class);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/students/import', [StudentsController::class, 'showImportForm'])->name('admin.students.import');
Route::post('/admin/students/import', [StudentsController::class, 'importUsers']);
Route::get('/admin/change-password', [AdminController::class, 'changePassword'])->name('admin.change.password');
Route::post('/admin/do-change-password', [AdminController::class, 'doChangePassword'])->name('admin.do.change.password');
Route::get('/magic-link/{token}', [StudentsController::class, 'magicLink'])->name('magic_link');
Route::get('/admin/students/export', [StudentsController::class, 'export'])->name('admin.students.export');
Route::get('/admin/students/search', [StudentsController::class, 'search'])->name('admin.students.search');
});
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/clear-session', function() {
    // Clear session data
    Session::forget('validationErrors');

    return response()->json(['message' => 'Session cleared'], 200);
});