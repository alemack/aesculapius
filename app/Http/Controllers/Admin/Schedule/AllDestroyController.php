<?php
namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Schedule;

class AllDestroyController extends Controller
{
    public function __invoke(Schedule $schedule)
    {
        // dd(22);
        Schedule::truncate();
        return redirect()->route('admin.schedule.index');
    }
}
