<?php
namespace App\Http\Controllers\Patient\Appointment;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Schedule;
use Symfony\Component\VarDumper\Caster\RedisCaster;

use function PHPSTORM_META\map;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        dd(1);
         $data = request()->validate(
            [
                'patient_id'=>'',
                'schedule_id'=>'',
            ]
        );

        Appointment::create($data);

        return redirect()->route('patient.appointment.index');
    }
}
