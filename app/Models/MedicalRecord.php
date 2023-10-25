<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'health_condition',
        'body_temperature',
        'prescription_image',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}