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
                'doctor_id' => '',
                'date' => '',
                'start_time' => '',
                'end_time' => '',
                'is_available'=>'',
            ]
        );
        // dd($data);

        // $isAvailable = $request->input('is_available', 0);
        $isAvailable = $request->has('is_available') ? 1 : 0;
        // dd($isAvailable);
        // dd($data, $isAvailable);
        Schedule::firstOrCreate([
            'doctor_id' => $data['doctor_id'],
            'date' => $data['date'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ],
        [
            'doctor_id' => $data['doctor_id'],
            'date' => $data['date'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'is_available' => $isAvailable,
        ]);

        return redirect()->route('admin.schedule.index');
    }
}
