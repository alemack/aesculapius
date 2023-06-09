<?php
namespace App\Http\Controllers\Admin\User;



use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Specialization;

class CreateController extends Controller
{
    public function __invoke()
    {
        // dd(22);
        $roles = Role::all();
        // $specializations = Specialization::all();
        return view('admin.user.create', compact('roles'));
    }
}
