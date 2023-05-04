<?php

namespace App\Models;

use App\Models\Schedule;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'doctors';

    protected $fillable = [
        'name', 'specialization',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }
}
