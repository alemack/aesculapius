<?php
namespace App\Http\Controllers\Admin\User;



use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        // dd(22);
        $users = User::all();
        // dd(auth()->user()->role);
        return view('admin.user.index', compact('users'));
    }
}
