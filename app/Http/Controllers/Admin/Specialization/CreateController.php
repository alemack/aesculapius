<?php
namespace App\Http\Controllers\Admin\Specialization;

use App\Http\Controllers\Controller;
use App\Models\Specialization;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.specialization.create');
    }
}
