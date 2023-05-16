<?php
namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Schedule $schedule, Request $request)
    {
        $data = request()->validate(
            [
                'doctor_id' => '',
                'date' => '',
                'start_time' => '',
                'end_time' => '',
                'is_available'=>'',
            ]
        );

        $isAvailable = $request->has('is_available') ? 1 : 0;

        $schedule =Schedule::updateOrCreate([
            'doctor_id'=>$request->input('doctor_id'),
            'date'=>$request->input('date')
        ],[
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'is_available' => $isAvailable,
        ]);

        // $schedule->update($data);

        return redirect()->route('admin.schedule.show', $schedule->id);
    }
}
