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
        $data = $request->validate([
            'patient_id' => 'required',
            'schedule_id' => 'required',
            'status' => 'required',
        ]);

        $existingAppointment = Appointment::where('schedule_id', $data['schedule_id'])
            ->where('patient_id', $data['patient_id'])
            ->first();

        if ($existingAppointment) {
            return redirect()->route('patient.schedule.index')->withErrors(['message' => 'Вы уже записаны на это время к этому врачу']);
        }

        Appointment::create($data);
        return redirect()->route('patient.appointment.index');
    }

}
