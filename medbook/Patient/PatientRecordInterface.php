<?php

namespace Medbook\Patient;

use Illuminate\Http\Request;

interface PatientRecordInterface {

    public function all(Request $request);

    public function save(Request $request);

    public function update(Request $request);

    public function services();
    public function genders();
}