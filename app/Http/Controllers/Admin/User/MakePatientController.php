<?php
namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MakePatientController extends Controller
{
    public function create(User $user)
    {
        return view('admin.user.makePatient', compact('user'));
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd($request);
        $data = request()->validate(
            [
                'user_id'=>'',
            ]
        );

        $user = User::findOrFail($data['user_id']);

        // Update user role to 'doctor'
        $user->role = 'patient';
        $user->save();

        $patient = Patient::create($data);

        return redirect()->route('admin.user.index');
    }
}
