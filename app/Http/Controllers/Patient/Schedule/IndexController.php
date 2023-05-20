<?php
namespace App\Http\Controllers\Patient\Schedule;

use App\Models\Schedule;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        // $userId = Auth()->user()->id;
        // dd($userId);
        $schedules = Schedule::paginate(30);
        return view('patient.schedule.index', compact('schedules'));
    }
}
