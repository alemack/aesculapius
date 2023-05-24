<?php
namespace App\Http\Controllers\Patient\Schedule;

use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MakeAppointmentController extends Controller
{
    public function create(Schedule $schedule, Request $request)
    {
        $user = Auth()->user();
        // dd($user);
        // dd($schedule->id);
        // dd($)
        return view('patient.schedule.makeAppointment', compact('schedule', 'user'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = request()->validate(
            [
                'patient_id'=>'',
                'schedule_id'=>'',
                'status'=>'',
            ]
        );

        // dd($data);
        Appointment::create($data);
        return redirect()->route('patient.appointment.index');
    }
}
