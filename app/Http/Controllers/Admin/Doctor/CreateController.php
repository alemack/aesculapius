<?php
namespace App\Http\Controllers\Admin\Doctor;


use App\Models\User;
use App\Models\Specialization;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        // берем пользователей ,которые имеют роль "doctor" и
        // которые не были ещё добавлены в таблицу "doctors"
        $users = User::where('role', 'doctor')->whereNotIn('id', function ($query) {
            $query->select('user_id')->from('doctors');
        })->get();


        $specializations = Specialization::all();
        return view('admin.doctor.create', compact('specializations', 'users'));
    }
}
