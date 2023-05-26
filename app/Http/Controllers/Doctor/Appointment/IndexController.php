<?php
namespace App\Http\Controllers\Doctor\Appointment;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        // ПОКАЗЫВАТЬ ТОЛЬКО ЗАПИСИ К ЭТОМУ ВРАЧУ
        // $appointments = Appointment::paginate(10);
        $doctorId = Auth::user()->doctor->id;
        $appointments = Appointment::whereHas('schedule.doctor', function ($query) use ($doctorId) {
            $query->where('id', $doctorId);
        })->paginate(10);
        return view('doctor.appointment.index', compact('appointments'));
    }
}
