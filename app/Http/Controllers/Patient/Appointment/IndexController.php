<?php
namespace App\Http\Controllers\Patient\Appointment;

use App\Models\Schedule;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        dd(' не сделан ещё');
        $schedules = Schedule::paginate(30);
        return view('patient.schedule.index', compact('schedules'));
    }
}
