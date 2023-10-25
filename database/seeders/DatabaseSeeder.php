<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\MedicalRecord;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DoctorsSeeder::class,
            PatientsSeeder::class,
            MedicalRecordSeeder::class,
        ]);
    }
}
