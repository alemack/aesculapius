<?php
namespace App\Http\Controllers\Admin\Patient;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;

class UpdateController extends Controller
{
    public function __invoke(user $user)
    {
        $data = request()->validate(
            [
                // 'name'=>'string',
                'name'=>'',
            ]
        );

        $data = request()->validate(
            [
                'name'=>'',
            ]
        );
        // dd($data);
        $user->update($data);
        return redirect()->route('admin.patient.show', $user->id);
    }
}
