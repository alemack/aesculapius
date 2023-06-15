<?php
namespace App\Http\Controllers\Patient\MedicalRecord;

use App\Models\MedicalRecord;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $medical_records = MedicalRecord::all();
        return view('patient.medicalRecord.index', compact('medical_records'));
    }
}
