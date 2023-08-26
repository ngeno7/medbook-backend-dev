<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'tbl_patient';

    protected $fillable = [
        'name', 'gender_id', 'dob',
    ];



    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function services()
    {
        return $this->hasMany(PatientService::class, 'patient_id');
    }
}
