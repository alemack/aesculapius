<?php
namespace App\Http\Controllers\Patient\Appointment;


use App\Http\Controllers\Controller;
use App\Models\Appointment;

class ShowController extends Controller
{
    public function __invoke(Appointment $appointment)
    {
        // dd("wddw");
        $user = Auth()->user();
        return view('patient.appointment.show', compact('appointment','user'));
    }
}
