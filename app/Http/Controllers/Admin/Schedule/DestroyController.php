<?php
namespace App\Http\Controllers\Admin\Schedule;



use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
