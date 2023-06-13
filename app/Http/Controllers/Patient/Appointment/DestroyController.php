<?php
namespace App\Http\Controllers\Patient\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class DestroyController extends Controller
{
    public function __invoke(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('patient.appointment.index');
    }
}
