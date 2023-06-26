<?php
namespace App\Http\Controllers\Admin\Schedule;

use App\Models\Schedule;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $schedules = Schedule::paginate(7);
        return view('admin.schedule.index', compact('schedules'));
    }
}
