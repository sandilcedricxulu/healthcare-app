<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'api\AuthController@register');
Route::post('/login', 'api\AuthController@login');

Route::apiResource('/bloodbankadmin', 'api\BloodBankAdminController')->middleware('auth:api');
Route::apiResource('/bloodbank', 'api\BloodBankController')->middleware('auth:api');
Route::apiResource('/bloodgroup', 'api\BloodGroupController')->middleware('auth:api');
Route::apiResource('/donorappointment', 'api\DonorAppointmentController')->middleware('auth:api');
Route::apiResource('/donor', 'api\DonorController')->middleware('auth:api');
Route::apiResource('/hospitaladmin', 'api\HospitalAdminController')->middleware('auth:api');
Route::apiResource('/hospital', 'api\HospitalController')->middleware('auth:api');
Route::apiResource('/normappointment', 'api\NormAppointmentController')->middleware('auth:api');
Route::apiResource('/patient', 'api\PatientController')->middleware('auth:api');
Route::apiResource('/recipientappointment', 'api\RecipientAppointmentController')->middleware('auth:api');
Route::apiResource('/rejectdonorappointment', 'api\RejectDonorAppointmentController')->middleware('auth:api');
Route::apiResource('/rejectnormappointment', 'api\RejectNormAppointmentController')->middleware('auth:api');
Route::apiResource('/rejectrecipientappointment', 'api\RejectRecipientAppointmentController')->middleware('auth:api');
Route::apiResource('/user', 'api\UserController')->middleware('auth:api');