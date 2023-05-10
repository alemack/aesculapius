<?php
namespace App\Http\Controllers\Admin\Schedule;



use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Symfony\Component\VarDumper\Caster\RedisCaster;

use function PHPSTORM_META\map;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        // dd(22);
        $data = request()->validate(
            [
                'doctor_id'=>'string',
                'day_of_week'=>'',
                'start_time'=>'',
                'end_time'=>'',
            ]
        );

        Schedule::firstOrCreate([
            'doctor_id'=>$request->input('doctor_id'),
            'day_of_week'=>$request->input('day_of_week')
        ],[
            'doctor_id'=>$request->input('doctor_id'),
            'day_of_week'=>$request->input('day_of_week'),
            'start_time'=>$request->input('start_time'),
            'end_time'=>$request->input('end_time'),
        ]);
        // dd($data);
        // $schedule = Schedule::create($data);

        return redirect()->route('admin.schedule.index');
    }
}
