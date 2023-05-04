<?php
namespace App\Http\Controllers\Admin\Doctor;

use App\Models\Doctor;
use App\Models\Specialization;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(Doctor $doctor)
    {
        $specializations = Specialization::all();
        return view('admin.doctor.edit', compact('doctor', 'specializations'));
    }
}
