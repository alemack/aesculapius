<?php
namespace App\Http\Controllers\Admin\Patient;


use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = request()->validate(
            [
                'user_id'=>'',
            ]
        );

        Patient::create($data);
        // $doctor->specializations()->attach($specializations);

        return redirect()->route('admin.patient.index');
    }
}
