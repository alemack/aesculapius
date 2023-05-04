<?php
namespace App\Http\Controllers\Admin\Doctor;


use App\Http\Controllers\Controller;
use App\Models\Specialization;

class CreateController extends Controller
{
    public function __invoke()
    {
        $specializations = Specialization::all();
        return view('admin.doctor.create', compact('specializations'));
    }
}
