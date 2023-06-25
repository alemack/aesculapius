<?php
namespace App\Http\Controllers\Admin\Patient;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;

class ShowController extends Controller
{
    public function __invoke(Patient $patient)
    {
        return view('admin.patient.show', compact('patient'));
    }
}
