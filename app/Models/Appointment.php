<?php

namespace App\Models;

use App\Models\User;
use App\Models\Patient;
use App\Models\Schedule;
use Psy\CodeCleaner\ReturnTypePass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'appointments';

    protected $fillable = [
        'user_id',
        'schedule_id',
        'status',
    ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }
}
