<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\RecipientAppointment;
use Illuminate\Http\Request;

use App\Http\Resources\RecipientAppointmentResource;
use Illuminate\Support\Facades\Validator;

class RecipientAppointmentController extends Controller
{
   
    public function index()
    {
        $recipientappointment = RecipientAppointment::all();
        
        return response([ 'recipientappointment' => RecipientAppointmentResource::collection($recipientappointment), 'message' => 'Retrieved successfully'], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id_number' => 'required|max:255',
            'blood_bank_id' => 'required|max:50|min:1',
            'blood_bank_admin_id' => 'required',
            'date_of_booking' => 'required',
            'date_of_appointment' => 'required',
            'blood_type' => 'required',
            'conductor' => 'required|max:255|min:2'
        ]);


        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $recipientappointment = RecipientAppointment::create($data);

        return response([ 'recipientappointment' => new RecipientAppointmentResource($recipientappointment), 'message' => 'Created successfully'], 200);
    }

    
    public function show(RecipientAppointment $recipientappointment)
    {
        return response([ 'recipientappointment' => new RecipientAppointmentResource($recipientappointment), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function update(Request $request, RecipientAppointment $recipientappointment)
    {
        $recipientappointment->update($request->all());

        return response([ 'recipientappointment' => new RecipientAppointmentResource($recipientappointment), 'message' => 'Updated successfully'], 200);
    }

    
    public function destroy(RecipientAppointment $recipientappointment)
    {
        $recipientappointment->delete();

        return response(['message' => 'Removed Successfully']);
    }
}
