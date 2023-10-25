<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class MedicalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $doctor = Doctor::inRandomOrder()->first();
        $patient = Patient::inRandomOrder()->first();

        return [
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'health_condition' => $this->faker->paragraph,
            'body_temperature' => $this->faker->randomFloat(1, 35, 45.5),
            'prescription_image' => $this->faker->imageUrl(640, 480, 'jpg', true),
        ];
    }
}