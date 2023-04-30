<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
        // $this->authorize('view', $user);
        $users = User::all();
        // dd(auth()->user()->role);
        return view('admin.index', compact('users'));
    }
}
