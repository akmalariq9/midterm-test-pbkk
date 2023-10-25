<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'address',
    ];

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
