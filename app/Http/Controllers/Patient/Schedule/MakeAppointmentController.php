<?php
namespace App\Http\Controllers\Patient\Schedule;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Schedule;

class MakeAppointmentController extends Controller
{
    public function create(Schedule $schedule, Request $request)
    {
        // dd($request);
        // dd('wddw');
        dd($schedule->doctor->user->name);
        return view('admin.user.makeDoctor', compact('schedule'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = request()->validate(
            [
                'schedule_id'=>'',
                'user_id'=>'',
            ]
        );

        Appointment::create($data);
        return redirect()->route('patient.appointment.index');
    }
}
