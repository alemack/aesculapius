<?php
namespace App\Http\Controllers\Admin\Specialization;





use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        // dd(22);
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }
}
