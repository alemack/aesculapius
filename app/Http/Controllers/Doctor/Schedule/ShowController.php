<?php
namespace App\Http\Controllers\Doctor\Schedule;

use App\Models\Schedule;
use App\Models\Appointment;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Schedule $schedule)
    {
        return view('doctor.schedule.show', compact('schedule'));
    }
}
