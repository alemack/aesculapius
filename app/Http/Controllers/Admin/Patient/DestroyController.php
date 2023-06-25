<?php
namespace App\Http\Controllers\Admin\Patient;


use App\Models\Doctor;
use App\Http\Controllers\Controller;
use App\Models\Patient;

class DestroyController extends Controller
{
    public function __invoke(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('admin.patient.index');
    }
}
