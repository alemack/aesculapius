<?php
namespace App\Http\Controllers\Doctor\Schedule;

use App\Models\User;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        // $userId = Auth()->user()->id;
        // $d = use->doctor()->schedule()->id;
        // dd($userId);
        // $userId = Auth::id();
        // $schedules = Schedule::whereHas('doctor.user', function ($query) use ($userId) {
        //     $query->where('id', $userId);
        // })->paginate(10);
        // dd($schedules);
        // $schedules = Schedule::paginate(30);

        $user = Auth()->user();
        $doctorId = $user->doctor->id;
        // $appointments = Appointment::where('patient_id', $patientId)->paginate(10);
        $schedules = Schedule::where('doctor_id', $doctorId)->paginate(10);
        return view('doctor.schedule.index', compact('schedules'));
    }
}
