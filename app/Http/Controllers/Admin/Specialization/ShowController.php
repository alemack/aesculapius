<?php
namespace App\Http\Controllers\Admin\Specialization;

use App\Http\Controllers\Controller;
use App\Models\Specialization;

class ShowController extends Controller
{
    public function __invoke(Specialization $specialization)
    {
        return view('admin.specialization.show', compact('specialization'));
    }
}
