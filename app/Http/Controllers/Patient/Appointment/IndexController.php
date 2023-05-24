<?php
namespace App\Http\Controllers\Patient\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class IndexController extends Controller
{
    public function __invoke()
    {
        $appointments = Appointment::paginate(10);
        return view('patient.appointment.index', compact('appointments'));
    }
}
