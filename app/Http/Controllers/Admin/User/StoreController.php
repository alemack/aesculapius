<?php
namespace App\Http\Controllers\Admin\User;



use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        // dd(32);
        $data = request()->validate(
            [
                'name'=>'string',
                'email'=>'string',
                'password'=>'string',
                'role'=>'',
            ]
        );
        // dd(22);
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role'=>$request->input('role'),
        ]);
        // $user = User::create($data);
        return redirect()->route('admin.user.index');
    }
}
