<?php
namespace App\Http\Controllers\Admin\Specialization;

use App\Http\Controllers\Controller;
use App\Models\Specialization;

class UpdateController extends Controller
{
    public function __invoke(Specialization $specialization)
    {
        $data = request()->validate(
            [
                'name'=>'string',
            ]
        );
        $specialization->update($data);

        return redirect()->route('admin.specialization.show', $specialization->id);
    }
}
