<?php
namespace App\Http\Controllers\Admin\Patient;


use App\Models\Doctor;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Models\Patient;

class EditController extends Controller
{
    public function __invoke(Patient $patient)
    {
        // $specializations = Specialization::all();
        return view('admin.patient.edit', compact('patient'));
    }
}
