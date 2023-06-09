<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\User\EditController;
use App\Http\Controllers\Admin\User\ShowController;
use App\Http\Controllers\Admin\User\IndexController;
use App\Http\Controllers\Admin\User\StoreController;
use App\Http\Controllers\Admin\User\CreateController;
use App\Http\Controllers\Admin\User\UpdateController;
use App\Http\Controllers\Admin\User\DestroyController;
use App\Http\Controllers\Admin\User\MakeDoctorController;
use App\Http\Controllers\Admin\User\MakePatientController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/terms', [App\Http\Controllers\TermsController::class, '__invoke'])->name('terms');
Route::get('/privacy-policy', [App\Http\Controllers\PrivacyPolicyController::class, '__invoke'])->name('privacy.policy');
Route::get('/cabinet', [App\Http\Controllers\CabinetController::class, '__invoke'])->name('privacy.policy');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'namespace' => 'Admin', 'middleware'=> 'admin'], function() {
    Route::group(['prefix'=>'user', 'namespace' => 'User'], function () {
        Route::get('/users', [IndexController::class, '__invoke'])->name('admin.user.index');
        Route::get('/users/create', [CreateController::class, '__invoke'])->name('admin.user.create');
        Route::post('users', [StoreController::class, '__invoke'])->name('admin.user.store');
        Route::get('/users/{user}', [ShowController::class, '__invoke'])->name('admin.user.show');
        Route::get('users/{user}/edit', [EditController::class, '__invoke'])->name('admin.user.edit');
        Route::patch('users/{user}', [UpdateController::class, '__invoke'])->name('admin.user.update');
        Route::delete('users/{user}', [DestroyController::class, '__invoke'])->name('admin.user.delete');

        Route::get('/users/{user}/makedoctor', [MakeDoctorController::class, 'create'])->name('admin.user.make_doctor.create');
        Route::post('/users/makedoctor', [MakeDoctorController::class, 'store'])->name('admin.user.make_doctor.store');

        Route::get('/users/{user}/makepatient', [MakePatientController::class, 'create'])->name('admin.user.make_patient.create');
        Route::post('users/makepatient', [MakePatientController::class, 'store'])->name('admin.user.make_patient.store');

    });
    Route::group(['prefix'=>'schedule', 'namespace' => 'Schedule'], function () {
        Route::get('/schedules', [App\Http\Controllers\Admin\Schedule\IndexController::class, '__invoke'])->name('admin.schedule.index');
        Route::get('/schedules/create', [App\Http\Controllers\Admin\Schedule\CreateController::class, '__invoke'])->name('admin.schedule.create');
        Route::post('schedules', [App\Http\Controllers\Admin\Schedule\StoreController::class, '__invoke'])->name('admin.schedule.store');
        Route::get('/schedules/{schedule}', [App\Http\Controllers\Admin\Schedule\ShowController::class, '__invoke'])->name('admin.schedule.show');
        Route::get('schedules/{schedule}/edit', [App\Http\Controllers\Admin\Schedule\EditController::class, '__invoke'])->name('admin.schedule.edit');
        Route::patch('schedules/{schedule}', [App\Http\Controllers\Admin\Schedule\UpdateController::class, '__invoke'])->name('admin.schedule.update');
        Route::delete('schedules/{schedule}', [App\Http\Controllers\Admin\Schedule\DestroyController::class, '__invoke'])->name('admin.schedule.delete');
        Route::delete('allschedules', [App\Http\Controllers\Admin\Schedule\AllDestroyController::class, '__invoke'])->name('admin.schedule.alldelete');
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
    Route::group(['prefix'=>'patient', 'namespace' => 'Patient'], function () {
        Route::get('/patients', [App\Http\Controllers\Admin\Patient\IndexController::class, '__invoke'])->name('admin.patient.index');
        Route::get('/patients/create', [App\Http\Controllers\Admin\Patient\CreateController::class, '__invoke'])->name('admin.patient.create');
        Route::post('patients', [App\Http\Controllers\Admin\Patient\StoreController::class, '__invoke'])->name('admin.patient.store');
        Route::get('/patients/{patient}', [App\Http\Controllers\Admin\Patient\ShowController::class, '__invoke'])->name('admin.patient.show');
        Route::get('patients/{patient}/edit', [App\Http\Controllers\Admin\Patient\EditController::class, '__invoke'])->name('admin.patient.edit');
        Route::patch('patients/{patient}', [App\Http\Controllers\Admin\Patient\UpdateController::class, '__invoke'])->name('admin.patient.update');
        Route::delete('patients/{patient}', [App\Http\Controllers\Admin\Patient\DestroyController::class, '__invoke'])->name('admin.patient.delete');
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

Route::group(['prefix'=>'patient', 'namespace'=>'Patient', 'middleware'=> 'patient'], function() {
    Route::group(['prefix'=>'schedule', 'namespace' => 'Schedule'], function () {
        Route::get('/schedules', [App\Http\Controllers\Patient\Schedule\IndexController::class, '__invoke'])->name('patient.schedule.index');
        Route::get('/schedules/{schedule}', [App\Http\Controllers\Patient\Schedule\ShowController::class, '__invoke'])->name('patient.schedule.show');
        Route::get('/schedules/{schedule}/makeappointment', [App\Http\Controllers\Patient\Schedule\MakeAppointmentController::class, 'create'])->name('patient.schedule.make_appointment.create');
        Route::post('/schedules/makeappointment', [App\Http\Controllers\Patient\Schedule\MakeAppointmentController::class, 'store'])->name('patient.schedule.make_appointment.store');
    });

    Route::group(['prefix'=>'appointment', 'namespace' => 'Appointment'], function () {
        Route::get('/appointments', [App\Http\Controllers\Patient\Appointment\IndexController::class, '__invoke'])->name('patient.appointment.index');
        Route::get('/appointments/{appointment}', [App\Http\Controllers\Patient\Appointment\ShowController::class, '__invoke'])->name('patient.appointment.show');
        Route::delete('appointments/{appointment}', [App\Http\Controllers\Patient\Appointment\DestroyController::class, '__invoke'])->name('patient.appointment.delete');
        // Route::get('/appointments/{appointment}/cancelappointment', [App\Http\Controllers\Patient\Appointment\CancelAppointmentController::class, 'cancel'])->name('patient.appointment.cancel_appointment.cancel');
    });

    Route::group(['prefix'=>'medicalRecords', 'namespace' => 'MedicalRecord'], function () {
        Route::get('/medicalRecords', [App\Http\Controllers\Patient\MedicalRecord\IndexController::class, '__invoke'])->name('patient.medical_records.index');
        Route::get('/medicalRecords/{medicalRecord}', [App\Http\Controllers\Patient\MedicalRecord\ShowController::class, '__invoke'])->name('patient.medical_records.show');
        // Route::get('/appointments/{appointment}/cancelappointment', [App\Http\Controllers\Patient\Appointment\CancelAppointmentController::class, 'cancel'])->name('patient.appointment.cancel_appointment.cancel');
    });

    Route::group(['prefix'=>'news', 'namespace' => 'News'], function () {
        Route::get('/news', [App\Http\Controllers\Patient\News\IndexController::class, '__invoke'])->name('patient.news.index');
        // Route::get('/appointments/{appointment}', [App\Http\Controllers\Patient\Appointment\ShowController::class, '__invoke'])->name('patient.appointment.show');
        // Route::delete('appointments/{appointment}', [App\Http\Controllers\Patient\Appointment\DestroyController::class, '__invoke'])->name('patient.appointment.delete');
        // Route::get('/appointments/{appointment}/cancelappointment', [App\Http\Controllers\Patient\Appointment\CancelAppointmentController::class, 'cancel'])->name('patient.appointment.cancel_appointment.cancel');
    });
});


Route::group(['prefix'=>'doctor', 'namespace'=>'Doctor'], function() {
    Route::group(['prefix'=>'schedule', 'namespace' => 'Schedule'], function () {
        Route::get('/schedules', [App\Http\Controllers\Doctor\Schedule\IndexController::class, '__invoke'])->name('doctor.schedule.index');
        Route::get('/schedules/{schedule}', [App\Http\Controllers\Doctor\Schedule\ShowController::class, '__invoke'])->name('doctor.schedule.show');
        Route::get('schedules/{schedule}/edit', [App\Http\Controllers\Doctor\Schedule\EditController::class, '__invoke'])->name('doctor.schedule.edit');
        Route::patch('schedules/{schedule}', [App\Http\Controllers\Doctor\Schedule\UpdateController::class, '__invoke'])->name('doctor.schedule.update');
    });

    Route::group(['prefix'=>'appointment', 'namespace' => 'Appointment'], function () {
        Route::get('/appointments', [App\Http\Controllers\Doctor\Appointment\IndexController::class, '__invoke'])->name('doctor.appointment.index');
        Route::get('/appointments/{appointment}', [App\Http\Controllers\Doctor\Appointment\ShowController::class, '__invoke'])->name('doctor.appointment.show');

        Route::get('/medicalRecords/{medicalRecord}', [App\Http\Controllers\Doctor\Appointment\MedicalCard::class, 'index'])->name('doctor.appointment.make_med_record.index');
        Route::get('/currentMedicalRecords/{currentMedicalRecord}', [App\Http\Controllers\Doctor\Appointment\MedicalCard::class, 'show'])->name('doctor.appointment.make_med_record.show');
        Route::get('/appointments/{appointment}/makemedicalrecord', [App\Http\Controllers\Doctor\Appointment\MedicalCard::class, 'create'])->name('doctor.appointment.make_med_record.create');
        Route::post('/appointments/makemedicalrecord', [App\Http\Controllers\Doctor\Appointment\MedicalCard::class, 'store'])->name('doctor.appointment.make_med_record.store');
    });
});
