<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientsSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan data pasien sesuai kebutuhan
        Patient::create([
            'name' => 'Alfa Fakhrur',
            'address' => 'Gedangan',
        ]);

        Patient::create([
            'name' => 'Aryan Shafa',
            'address' => 'Keputih',
        ]);

        Patient::create([
            'name' => 'Keyisa Raihan',
            'address' => 'Rungkut',
        ]);

        Patient::create([
            'name' => 'Akmal Ariq',
            'address' => 'Mulyosari',
        ]);
    }
}

