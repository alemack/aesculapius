<?php
namespace App\Http\Controllers\Doctor\Appointment;


use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Auth;

class MedicalCard extends Controller
{
    public function index()
    {
        dd('index medical records');
    }
    public function show()
    {
        dd('index medical records');
    }

    public function create(appointment $appointment)
    {
        // $user = Auth()->user();
        // dd($user);
        // dd($schedule->id);
        // dd($)
        return view('doctor.appointment.makeMedicalRecord', compact('appointment'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = request()->validate(
            [
                'patient_id'=>'',
                'doctor_id'=>'',
                'appointment_date'=>'',
                'diagnosis'=>'',
                'treatment'=>'',
            ]
        );

        // dd($data);
        MedicalRecord::create($data);
        return redirect()->route('doctor.appointment.index');
    }
}
