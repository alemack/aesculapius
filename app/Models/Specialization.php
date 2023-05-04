<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialization extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'specializations';

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
