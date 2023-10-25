<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Doctor;

class DoctorsSeeder extends Seeder
{
    public function run()
    {
        Doctor::create([
            'name' => 'Dr. Andika Laksana Sp.A',
            'address' => 'Depok',
        ]);

        Doctor::create([
            'name' => 'Dr. Adrian Karuna Sp.F',
            'address' => 'Jakarta',
        ]);

        Doctor::create([
            'name' => 'Dr. Daffa Harits. SpOG',
            'address' => 'Bogor',
        ]);

        Doctor::create([
            'name' => 'Dr. Syukra Wahyu Sp.KGA',
            'address' => 'Padang',
        ]);
    }
}

