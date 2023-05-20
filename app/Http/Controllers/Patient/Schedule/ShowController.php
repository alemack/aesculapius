<?php
namespace App\Http\Controllers\Patient\Schedule;

use App\Models\Schedule;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Schedule $schedule)
    {
        return view('patient.schedule.show', compact('schedule'));
    }
}
