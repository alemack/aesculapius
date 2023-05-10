<?php
namespace App\Http\Controllers\Admin\Schedule;

use App\Models\Schedule;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Schedule $schedule)
    {
        return view('admin.schedule.show', compact('schedule'));
    }
}
