<?php
namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
