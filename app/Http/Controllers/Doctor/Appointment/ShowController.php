<?php
namespace App\Http\Controllers\Doctor\Appointment;


use App\Http\Controllers\Controller;
use App\Models\Appointment;

class ShowController extends Controller
{
    public function __invoke(Appointment $appointment)
    {
        // dd('show');
        return view('doctor.schedule.show', compact('appointment'));
    }
}
