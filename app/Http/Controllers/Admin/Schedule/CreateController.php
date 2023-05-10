<?php
namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class CreateController extends Controller
{
    public function __invoke()
    {
        $doctors = Doctor::all();
        return view('admin.schedule.create', compact('doctors'));
    }
}
