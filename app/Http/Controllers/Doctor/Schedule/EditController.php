<?php
namespace App\Http\Controllers\Doctor\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Schedule;

class EditController extends Controller
{
    public function __invoke(Schedule $schedule)
    {
        return view('doctor.schedule.edit', compact('schedule'));
    }
}
