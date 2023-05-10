<?php
namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Schedule;

class EditController extends Controller
{
    public function __invoke(Schedule $schedule)
    {
        $doctors = Doctor::all();
        $daysOfWeek = [
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница',
            6 => 'Суббота',
            7 => 'Воскресенье',
        ];
        return view('admin.schedule.edit', compact('schedule', 'doctors', 'daysOfWeek'));
    }
}
