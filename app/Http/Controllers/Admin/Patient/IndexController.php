<?php
namespace App\Http\Controllers\Admin\Patient;


use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;

class IndexController extends Controller
{
    public function __invoke()
    {
        // $doctors = Doctor::paginate(5);
        $patients = Patient::paginate(5);
        return view('admin.patient.index', compact('patients'));
    }
}
