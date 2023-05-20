<?php
namespace App\Http\Controllers\Patient\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Schedule $schedule, Request $request)
    {
        dd('create appoinment');
        dd($schedule);
        // dd(request());
        $patientId = $request->input('user_id');
        dd($patientId);
        return view('patient.appointment.create', compact('schedule'));
    }
}
