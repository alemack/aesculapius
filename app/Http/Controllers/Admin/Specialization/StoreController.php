<?php
namespace App\Http\Controllers\Admin\Specialization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Specialization;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = request()->validate(
            [
                'name'=>'string',
            ]
        );
        Specialization::create($data);

        return redirect()->route('admin.specialization.index');
    }
}
