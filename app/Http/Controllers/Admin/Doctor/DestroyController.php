<?php
namespace App\Http\Controllers\Admin\Doctor;

use App\Models\Doctor;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctor.index');
    }
}
