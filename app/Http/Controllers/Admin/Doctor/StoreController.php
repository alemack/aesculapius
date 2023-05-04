<?php
namespace App\Http\Controllers\Admin\Doctor;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = request()->validate(
            [
                'name'=>'string',
                'specializations'=>'',
            ]
        );

        $specializations = $data['specializations'];
        unset($data['specializations']);

        $doctor = Doctor::create($data);
        $doctor->specializations()->attach($specializations);

        return redirect()->route('admin.doctor.index');
    }
}
