<?php
namespace App\Http\Controllers\Patient\MedicalRecord;


use App\Models\MedicalRecord;
use App\Models\Specialization;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(MedicalRecord $medicalRecord)
    {
        $user = Auth()->user();
        // $doctorId = $medicalRecord->doctor->id;
        // $specializationId = DoctorSpecialization::where('doctor_id', $doctorId)->value('specialization_id');
        // dd($medicalRecord->doctor->specialization);

        // $specialization = Specialization::whereHas('doctors', function ($query) use ($doctorId) {
        //     $query->where('id', $doctorId);
        // })->first();

        // dd($specialization);


        return view('patient.medicalRecord.show', compact('medicalRecord','user'));
    }
}
