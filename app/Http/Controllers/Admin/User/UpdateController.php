<?php
namespace App\Http\Controllers\Admin\User;



use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(User $user)
    {
        $data = request()->validate(
            [
                'name'=>'string',
                'email'=>'string',
                'password'=>'string',
                'role'=>'',
            ]
        );
        // dd($data);
        $user->update($data);
        return redirect()->route('admin.user.show', $user->id);

    }
}
