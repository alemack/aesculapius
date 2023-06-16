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

        $user = User::findOrFail($data['user_id']);

        // Update user role to 'doctor'
        $user->role = 'doctor';
        $user->save();

        // dd($data);
        $specializations = $data['specializations'];
        unset($data['specializations']);
        // dd($data);
        $doctor = Doctor::create($data);
        // dd($doctor);
        $doctor->specializations()->attach($specializations);
        // dd('wddw');

        return redirect()->route('admin.doctor.index');
    }


    // public function store(Request $request)
    // {
    //     $data = request()->validate([
    //         'user_id' => '',
    //         'specializations' => 'required|array',
    //     ]);

    //     $user = User::findOrFail($data['user_id']);

    //     // Update user role to 'doctor'
    //     $user->role = 'doctor';
    //     $user->save();

    //     $specializations = $data['specializations'];

    //     unset($data['user_id']);
    //     unset($data['specializations']);

    //     $doctor = Doctor::create($data);

    //     // Attach specializations to the doctor
    //     $doctor->specializations()->attach($specializations);

    //     return redirect()->route('admin.user.index');
    // }

}
