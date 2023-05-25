<?php
namespace App\Http\Controllers\Doctor\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class IndexController extends Controller
{
    public function __invoke()
    {
        // ПОКАЗЫВАТЬ ТОЛЬКО ЗАПИСИ К ЭТОМУ ВРАЧУ
        $appointments = Appointment::paginate(10);
        return view('doctor.appointment.index', compact('appointments'));
    }
}
