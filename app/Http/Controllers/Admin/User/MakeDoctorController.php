<?php
namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;

class MakeDoctorController extends Controller
{
    public function create(User $user)
    {
        $specializations = Specialization::all();
        return view('admin.user.makeDoctor', compact('user', 'specializations'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = request()->validate(
            [
                'user_id'=>'',
                'specializations'=>'',
            ]
        );
        // dd($data);
        $specializations = $data['specializations'];
        unset($data['specializations']);
        // dd($data);
        $doctor = Doctor::create($data);
        // dd($doctor);
        $doctor->specializations()->attach($specializations);
        dd('wddw');

        return redirect()->route('admin.user.index');
    }
}
