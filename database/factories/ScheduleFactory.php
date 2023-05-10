<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    private static $daysOfWeek = [1, 2, 3, 4, 5]; // понедельник - пятница
    private static $startWorkTime = '08:00:00';
    private static $endWorkTime = '18:00:00';
    private static $dayIndex = 0;

    public function definition()
    {
        $doctor = Doctor::orderBy('id', 'asc')->get()[self::$dayIndex % Doctor::count()];
        $dayOfWeek = self::$daysOfWeek[self::$dayIndex % count(self::$daysOfWeek)];
        $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $doctor->created_at->format('Y-m-d') . ' ' . self::$startWorkTime)
            ->addDays($dayOfWeek - 1);
        $endTime = Carbon::createFromFormat('Y-m-d H:i:s', $doctor->created_at->format('Y-m-d') . ' ' . self::$endWorkTime)
            ->addDays($dayOfWeek - 1);

        self::$dayIndex++;

        return [
            'doctor_id' => $doctor->id,
            'day_of_week' => $dayOfWeek,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}
