<?php
namespace App\Http\Controllers;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function __invoke()
    {
        $user = Auth()->user();
        // dd($user->name);
        return view('cabinet', compact('user'));
    }
}
