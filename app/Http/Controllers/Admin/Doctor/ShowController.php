<?php
namespace App\Http\Controllers\Admin\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;

class ShowController extends Controller
{
    public function __invoke(Doctor $doctor)
    {
        return view('admin.doctor.show', compact('doctor'));
    }
}
