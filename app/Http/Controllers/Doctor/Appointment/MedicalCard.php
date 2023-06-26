<?php
namespace App\Http\Controllers\Doctor\Appointment;


use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MedicalCard extends Controller
{
    // public function index(int $patientId)
    // {
    //     // dd($appointment);
    //     // // dump($appointment->id);
    //     // dd($appointment->patient_id);
    //     $medical_records = MedicalRecord::where('patient_id', $patientId)->paginate(10);
    //     return view('doctor.appointment.medicalRecordsIndex', compact('medical_records'));
    // }

    public function index(int $patientId)
    {
        // $doctorId = Auth::id();
        $user = Auth()->user();
        $doctorId  = $user->doctor->id;
        $currentDate = Carbon::now();

        $medical_records = MedicalRecord::where('patient_id', $patientId)->paginate(10);

        if ($medical_records->isEmpty()) {
        // Создаем новую запись с данными "открыта медицинская карта"
        $medicalRecord = new MedicalRecord();
        $medicalRecord->patient_id = $patientId;
        $medicalRecord->doctor_id = $doctorId;
        $medicalRecord->appointment_date = $currentDate;
        $medicalRecord->diagnosis = 'Открыта медицинская карта';
        $medicalRecord->treatment = 'Открыта медицинская карта';
        $medicalRecord->save();

        // Обновляем список записей
        $medical_records = MedicalRecord::where('patient_id', $patientId)->paginate(10);
    }

    return view('doctor.appointment.medicalRecordsIndex', compact('medical_records'));
    }


    public function show(int $medicalRecord)
    {
        $medicalRecord = MedicalRecord::find($medicalRecord);
        if (!$medicalRecord) {
            abort(404); // Обработка ситуации, когда запись не найдена
        }

        return view('doctor.appointment.medicalRecordsShow', compact('medicalRecord'));
    }


    public function create(int $medicalRecord)
    {
        $medicalRecord = MedicalRecord::find($medicalRecord);
        if (!$medicalRecord) {
            abort(404); // Обработка ситуации, когда запись не найдена
        }

        $user = Auth()->user();


        return view('doctor.appointment.makeMedicalRecord', compact('medicalRecord', 'user'));
    }

    // public function store(Request $request)
    // {
    //     // dd($request);
    //     $data = request()->validate(
    //         [
    //             'patient_id'=>'',
    //             'doctor_id'=>'',
    //             'appointment_date'=>'',
    //             'diagnosis'=>'',
    //             'treatment'=>'',
    //         ]
    //     );

    //     // dd($data);
    //     MedicalRecord::create($data);
    //     return redirect()->route('doctor.appointment.index');
    // }

    public function store(Request $request)
    {
        $data = request()->validate([
            'patient_id' => '',
            'doctor_id' => '',
            'diagnosis' => '',
            'treatment' => '',
        ]);

        $data['appointment_date'] = now(); // Подставляем текущую дату

        MedicalRecord::create($data);
        return redirect()->route('doctor.appointment.index');
    }

}
