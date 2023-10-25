<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\MedicalRecord; // Ganti modelnya dengan yang sesuai
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MedicalRecordController extends Controller
{
    public function create(): Response
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return Inertia::render('MedicalRecord/MedicalRecordForm')->with('patients', $patients)->with('doctors', $doctors);
    }

    public function getAll(): Response
    {
        $medicalRecords = MedicalRecord::all();
        return Inertia::render('MedicalRecord/MedicalRecordList')->with('medicalRecords', $medicalRecords);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'health_condition' => 'required|string',
            'body_temperature' => 'required|numeric|between:35,45.5',
            'prescription' => 'mimes:pdf,png,jpg,jpeg'
        ]);

        // Lakukan penyimpanan data rekam medis sesuai kebutuhan Anda

        return redirect()->route('medical-records.getAll')->with('message', 'Medical record created successfully.');
    }
}