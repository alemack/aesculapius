<?php

namespace App\Models;

use App\Models\User;
use App\Models\Schedule;
use App\Models\MedicalRecord;
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
        'user_id',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
