<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'schedules';

    protected $fillable = [
        'doctor_id', 'day_of_week', 'start_time', 'end_time',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
