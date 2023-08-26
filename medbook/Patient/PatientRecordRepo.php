<?php

namespace Medbook\Patient;

use App\Models\Gender;
use App\Models\Patient;
use App\Models\PatientService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientRecordRepo implements PatientRecordInterface {

    public function all(Request $request)
    {
        if($request->input('limit')) {
           $patientservices = PatientService::with(['patient.gender', 'service']);
        } else {
            $patientservices = PatientService::with(['patient.gender', 'service']);
        }

        return response()->json([
            'data' => $patientservices->get(),
            'message' => 'All services',
        ], 200);
    }

    public function save(Request $request)
    {
        //existing patient
        if ($request->input('patient_id')) {
            $data = $request->only('patient_id', 'service_id', 'comment');
            $patientservice = PatientService::create($data);
        } // new patient
         else {
            
            $patientservice = DB::transaction(function() use($request) {
                $patientData = $request->only('name', 'dob', 'gender_id');
                $patient = Patient::create($patientData);
                $data = $request->only('service_id', 'comment');
                $data['patient_id'] = $patient->id;
                $patientservice = PatientService::create($data);

                return $patientservice;
            });
        }

        return response()->json([
            'data' => $patientservice,
            'message' => 'Patient record added successfully',
        ], 201);
    }

    public function update(Request $request)
    {
        
    }

    public function services()
    {
        return response()->json(Service::latest()->get(), 200);
    }

    public function genders()
    {
        return response()->json(Gender::latest()->get(), 200);
    }
}