<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use Medbook\Patient\PatientRecordInterface;

class PatientRecordController extends Controller
{
    //

    protected $patientRecord;

    public function __construct(PatientRecordInterface $patientRecord)
    {
        $this->patientRecord = $patientRecord;
    }

    public function index(Request $request)
    {
        return $this->patientRecord->all($request);
    }

    public function save(Request $request)
    {
       return $this->patientRecord->save($request);
    }

    public function genders()
    {
        return $this->patientRecord->genders();
    }
    public function services()
    {
        return $this->patientRecord->services();
    }
}
