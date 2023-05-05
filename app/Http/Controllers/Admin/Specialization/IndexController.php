<?php
namespace App\Http\Controllers\Admin\Specialization;

use App\Http\Controllers\Controller;
use App\Models\Specialization;

class IndexController extends Controller
{
    public function __invoke()
    {
        $specializations = Specialization::paginate(5);

        return view('admin.specialization.index', compact('specializations'));
    }
}
