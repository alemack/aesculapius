<?php
namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class IndexController extends Controller
{
    public function __invoke()
    {
        $doctors = Doctor::paginate(5);
        return view('admin.doctor.index', compact('doctors'));
    }
}
