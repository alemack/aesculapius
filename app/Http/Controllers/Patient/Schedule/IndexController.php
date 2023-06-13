<?php
namespace App\Http\Controllers\Patient\Schedule;

use App\Models\Schedule;
use App\Http\Controllers\Controller;
use App\Models\Specialization;

class IndexController extends Controller
{
    public function __invoke()
    {
        // $userId = Auth()->user()->id;
        // dd($userId);
        $schedules = Schedule::all();
        $specializations = Specialization::has('doctors')->get();
        return view('patient.schedule.index', compact('schedules', 'specializations'));
    }
}
