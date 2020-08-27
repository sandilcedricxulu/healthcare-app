<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\RejectNormAppointment;
use Illuminate\Http\Request;

use App\Http\Resources\RejectNormAppointmentResource;
use Illuminate\Support\Facades\Validator;

class RejectNormAppointmentController extends Controller
{
   
    public function index()
    {
        $rejectnormappointment = RejectNormAppointment::all();
        
        return response([ 'rejectnormappointment' => RejectNormAppointmentResource::collection($rejectnormappointment), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function store(Request $request)
    {
         $data = $request->all();

        $validator = Validator::make($data, [
            'user_id_number' => 'required|max:255',
            'hospital_admin_id' => 'required|max:50|min:1',
            'hospital_id' => 'required',
            'date_of_reject' => 'required',
            'reason' => 'required'
        
        ]);


        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $rejectnormappointment = RejectNormAppointment::create($data);

        return response([ 'rejectnormappointment' => new RejectNormAppointmentResource($rejectnormappointment), 'message' => 'Created successfully'], 200);
    }

    
    public function show(RejectNormAppointment $rejectnormappointment)
    {
        return response([ 'rejectnormappointment' => new RejectNormAppointmentResource($rejectnormappointment), 'message' => 'Retrieved successfully'], 200);
    }

    public function update(Request $request, RejectNormAppointment $rejectnormappointment)
    {
        $rejectnormappointment->update($request->all());

        return response([ 'rejectnormappointment' => new RejectNormAppointmentResource($rejectnormappointment), 'message' => 'Updated successfully'], 200);
    }

   
    public function destroy(RejectNormAppointment $rejectnormappointment)
    {
        $rejectnormappointment->delete();

        return response(['message' => 'Removed Successfully']);
    }
}
