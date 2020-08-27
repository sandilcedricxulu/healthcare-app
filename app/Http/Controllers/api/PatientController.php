<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Http\Request;

use App\Http\Resources\PatientResource;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    
    public function index()
    {
        $patient = Patient::all();
        
        return response([ 'patient' => PatientResource::collection($patient), 'message' => 'Retrieved successfully'], 200);
    }

   
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id_number' => 'required|max:13|min:13'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $patient = Patient::create($data);

        return response([ 'patient' => new PatientResource($patient), 'message' => 'Created successfully'], 200);
    }

    
    public function show(Patient $patient)
    {
        return response([ 'patient' => new PatientResource($patient), 'message' => 'Retrieved successfully'], 200);
    }

   
    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->all());

        return response([ 'patient' => new PatientResource($patient), 'message' => 'Updated successfully'], 200);
    }

    
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return response(['message' => 'Removed Successfully']);
    }
}
