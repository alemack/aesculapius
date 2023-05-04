<?php
namespace App\Http\Controllers\Admin\Doctor;



use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;

class UpdateController extends Controller
{
    public function __invoke(Doctor $doctor)
    {
        $data = request()->validate(
            [
                'name'=>'string',
                'specializations'=>'',
            ]
        );

        $specializations = $data['specializations'];
        unset($data['specializations']);

        $doctor->update($data);
        $doctor->specializations()->sync($specializations);

        return redirect()->route('admin.doctor.show', $doctor->id);
    }
}
