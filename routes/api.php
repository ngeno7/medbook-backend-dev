<?php

use App\Http\Controllers\PatientRecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {

    Route::get('services', [PatientRecordController::class, 'services']);
    Route::get('genders', [PatientRecordController::class, 'genders']);
    Route::post('patient-record/save', [PatientRecordController::class, 'save']);
    Route::get('patient-record/all', [PatientRecordController::class, 'index']);
});
