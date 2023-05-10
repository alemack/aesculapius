<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\User\EditController;
use App\Http\Controllers\Admin\User\ShowController;
use App\Http\Controllers\Admin\User\StoreController;
use App\Http\Controllers\Admin\User\CreateController;
use App\Http\Controllers\Admin\User\UpdateController;
use App\Http\Controllers\Admin\User\DestroyController;
use App\Http\Controllers\Admin\User\IndexController;

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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/users', [UserController::class, 'index'])->name('user.index');

// Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware'=>'admin'], function() {
//     Route::get('/users', [AdminController::class, 'index'])->name('admin.user.index');
// });

Route::group(['prefix'=>'admin', 'namespace' => 'Admin', 'middleware'=> 'admin'], function() {
    Route::group(['prefix'=>'user', 'namespace' => 'User'], function () {
        Route::get('/users', [IndexController::class, '__invoke'])->name('admin.user.index');
        Route::get('/users/create', [CreateController::class, '__invoke'])->name('admin.user.create');
        Route::post('users', [StoreController::class, '__invoke'])->name('admin.user.store');
        Route::get('/users/{user}', [ShowController::class, '__invoke'])->name('admin.user.show');
        Route::get('users/{user}/edit', [EditController::class, '__invoke'])->name('admin.user.edit');
        Route::patch('users/{user}', [UpdateController::class, '__invoke'])->name('admin.user.update');
        Route::delete('users/{user}', [DestroyController::class, '__invoke'])->name('admin.user.delete');
    });
    Route::group(['prefix'=>'schedule', 'namespace' => 'Schedule'], function () {
        Route::get('/schedules', [App\Http\Controllers\Admin\Schedule\IndexController::class, '__invoke'])->name('admin.schedule.index');
        Route::get('/schedules/create', [App\Http\Controllers\Admin\Schedule\CreateController::class, '__invoke'])->name('admin.schedule.create');
        Route::post('schedules', [App\Http\Controllers\Admin\Schedule\StoreController::class, '__invoke'])->name('admin.schedule.store');
        Route::get('/schedules/{schedule}', [App\Http\Controllers\Admin\Schedule\ShowController::class, '__invoke'])->name('admin.schedule.show');
        Route::get('schedules/{schedule}/edit', [App\Http\Controllers\Admin\Schedule\EditController::class, '__invoke'])->name('admin.schedule.edit');
        Route::patch('schedules/{schedule}', [App\Http\Controllers\Admin\Schedule\UpdateController::class, '__invoke'])->name('admin.schedule.update');
        Route::delete('schedules/{schedule}', [App\Http\Controllers\Admin\Schedule\DestroyController::class, '__invoke'])->name('admin.schedule.delete');
    });
    Route::group(['prefix'=>'doctor', 'namespace' => 'Doctor'], function () {
        Route::get('/doctors', [App\Http\Controllers\Admin\Doctor\IndexController::class, '__invoke'])->name('admin.doctor.index');
        Route::get('/doctors/create', [App\Http\Controllers\Admin\Doctor\CreateController::class, '__invoke'])->name('admin.doctor.create');
        Route::post('doctors', [App\Http\Controllers\Admin\Doctor\StoreController::class, '__invoke'])->name('admin.doctor.store');
        Route::get('/doctors/{doctor}', [App\Http\Controllers\Admin\Doctor\ShowController::class, '__invoke'])->name('admin.doctor.show');
        Route::get('doctors/{doctor}/edit', [App\Http\Controllers\Admin\Doctor\EditController::class, '__invoke'])->name('admin.doctor.edit');
        Route::patch('doctors/{doctor}', [App\Http\Controllers\Admin\Doctor\UpdateController::class, '__invoke'])->name('admin.doctor.update');
        Route::delete('doctors/{doctor}', [App\Http\Controllers\Admin\Doctor\DestroyController::class, '__invoke'])->name('admin.doctor.delete');
    });
    Route::group(['prefix'=>'specialization', 'namespace' => 'Specialization'], function () {
        Route::get('/specializations', [App\Http\Controllers\Admin\Specialization\IndexController::class, '__invoke'])->name('admin.specialization.index');
        Route::get('/specializations/create', [App\Http\Controllers\Admin\Specialization\CreateController::class, '__invoke'])->name('admin.specialization.create');
        Route::post('specializations', [App\Http\Controllers\Admin\Specialization\StoreController::class, '__invoke'])->name('admin.specialization.store');
        Route::get('/specializations/{specialization}', [App\Http\Controllers\Admin\Specialization\ShowController::class, '__invoke'])->name('admin.specialization.show');
        Route::get('specializations/{specialization}/edit', [App\Http\Controllers\Admin\Specialization\EditController::class, '__invoke'])->name('admin.specialization.edit');
        Route::patch('specializations/{specialization}', [App\Http\Controllers\Admin\Specialization\UpdateController::class, '__invoke'])->name('admin.specialization.update');
        Route::delete('specializations/{specialization}', [App\Http\Controllers\Admin\Specialization\DestroyController::class, '__invoke'])->name('admin.specialization.delete');
    });
});

Route::group(['prefix'=>'patient', 'namespace'=>'Patient'], function() {
    Route::group(['prefix'=>'schedule', 'namespace' => 'Schedule'], function () {
        Route::get('/schedules', [App\Http\Controllers\Patient\Schedule\IndexController::class, '__invoke'])->name('patient.schedule.index');
        Route::get('/schedules/create', [App\Http\Controllers\Patient\Schedule\CreateController::class, '__invoke'])->name('patient.schedule.create');
        Route::post('schedules', [App\Http\Controllers\Admin\Patient\StoreController::class, '__invoke'])->name('patient.schedule.store');
        Route::get('/schedules/{schedule}', [App\Http\Controllers\Patient\Schedule\ShowController::class, '__invoke'])->name('patient.schedule.show');
        Route::get('schedules/{schedule}/edit', [App\Http\Controllers\Patient\Schedule\EditController::class, '__invoke'])->name('patient.schedule.edit');
        Route::patch('schedules/{schedule}', [App\Http\Controllers\Patient\Schedule\UpdateController::class, '__invoke'])->name('patient.schedule.update');
        Route::delete('schedules/{schedule}', [App\Http\Controllers\Patient\Schedule\DestroyController::class, '__invoke'])->name('patient.schedule.delete');
    });
});
