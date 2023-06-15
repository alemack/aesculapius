<?php
namespace App\Http\Controllers\Patient\MedicalRecord;

use App\Models\MedicalRecord;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth()->user();
        $patientId = $user->patient->id;
        // $appointments = Appointment::where('patient_id', $patientId)->paginate(10);
        $medical_records = MedicalRecord::where('patient_id', $patientId)->paginate(10);
        return view('patient.medicalRecord.index', compact('medical_records'));
    }
}
