<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\RejectRecipientAppointment;
use Illuminate\Http\Request;

use App\Http\Resources\RejectRecipientAppointmentResource;
use Illuminate\Support\Facades\Validator;

class RejectRecipientAppointmentController extends Controller
{
    
    public function index()
    {
        $rejectrecipientappointment = RejectRecipientAppointment::all();
        
        return response([ 'rejectrecipientappointment' => RejectRecipientAppointmentResource::collection($rejectrecipientappointment), 'message' => 'Retrieved successfully'], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id_number' => 'required|max:255',
            'blood_bank_admin_id' => 'required|max:50|min:1',
            'blood_bank_id' => 'required',
            'date_of_reject' => 'required',
            'reason' => 'required'
        
        ]);


        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $rejectrecipientappointment = RejectRecipientAppointment::create($data);

        return response([ 'rejectrecipientappointment' => new RejectRecipientAppointmentResource($rejectrecipientappointment), 'message' => 'Created successfully'], 200);
    }

    
    public function show(RejectRecipientAppointment $rejectrecipientappointment)
    {
        return response([ 'rejectrecipientappointment' => new RejectRecipientAppointmentResource($rejectrecipientappointment), 'message' => 'Retrieved successfully'], 200);
    }

   
    public function update(Request $request, RejectRecipientAppointment $rejectrecipientappointment)
    {
        $rejectrecipientappointment->update($request->all());

        return response([ 'rejectrecipientappointment' => new RejectRecipientAppointmentResource($rejectrecipientappointment), 'message' => 'Updated successfully'], 200);
    }

    
    public function destroy(RejectRecipientAppointment $rejectrecipientappointment)
    {
        $rejectrecipientappointment->delete();

        return response(['message' => 'Removed Successfully']);
    }
}
