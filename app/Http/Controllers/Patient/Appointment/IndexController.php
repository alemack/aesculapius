<?php
namespace App\Http\Controllers\Patient\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class IndexController extends Controller
{
    public function __invoke()
    {
        // $appointments = Appointment::paginate(10);
        $user = Auth()->user();
        $patientId = $user->patient->id;
        $appointments = Appointment::where('patient_id', $patientId)->paginate(10);
        return view('patient.appointment.index', compact('appointments'));
    }
}
