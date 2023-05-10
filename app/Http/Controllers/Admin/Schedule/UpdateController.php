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
                'doctor_id'=>'string',
                'day_of_week'=>'required',
                'start_time'=>'required',
                'end_time'=>'required',
            ]
        );

        $schedule =Schedule::updateOrCreate([
            'doctor_id'=>$request->input('doctor_id'),
            'day_of_week'=>$request->input('day_of_week')
        ],[
            'start_time'=>$request->input('start_time'),
            'end_time'=>$request->input('end_time'),
        ]);

        // $schedule->update($data);

        return redirect()->route('admin.schedule.show', $schedule->id);
    }
}
