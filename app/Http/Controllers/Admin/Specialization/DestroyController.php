<?php
namespace App\Http\Controllers\Admin\Specialization;

use App\Http\Controllers\Controller;
use App\Models\Specialization;

class DestroyController extends Controller
{
    public function __invoke(Specialization $specialization)
    {
        $specialization->delete();
        return redirect()->route('admin.specialization.index');
    }
}
