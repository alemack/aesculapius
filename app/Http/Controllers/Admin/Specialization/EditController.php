<?php
namespace App\Http\Controllers\Admin\Specialization;

use App\Http\Controllers\Controller;
use App\Models\Specialization;

class EditController extends Controller
{
    public function __invoke(Specialization $specialization)
    {
        return view('admin.specialization.edit', compact('specialization'));
    }
}
