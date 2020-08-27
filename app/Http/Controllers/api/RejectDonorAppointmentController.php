<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\RejectDonorAppointment;
use Illuminate\Http\Request;

use App\Http\Resources\RejectDonorAppointmentResource;
use Illuminate\Support\Facades\Validator;

class RejectDonorAppointmentController extends Controller
{
   
    public function index()
    {
        $rejectdonorappointment = RejectDonorAppointment::all();
        
        return response([ 'rejectdonorappointment' => RejectDonorAppointmentResource::collection($rejectdonorappointment), 'message' => 'Retrieved successfully'], 200);
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

        $rejectdonorappointment = RejectDonorAppointment::create($data);

        return response([ 'rejectdonorappointment' => new RejectDonorAppointmentResource($rejectdonorappointment), 'message' => 'Created successfully'], 200);
    }

   
    public function show(RejectDonorAppointment $rejectdonorappointment)
    {
        return response([ 'rejectdonorappointment' => new RejectDonorAppointmentResource($rejectdonorappointment), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function update(Request $request, RejectDonorAppointment $rejectdonorappointment)
    {
        $rejectdonorappointment->update($request->all());

        return response([ 'rejectdonorappointment' => new RejectDonorAppointmentResource($rejectdonorappointment), 'message' => 'Updated successfully'], 200);
    }

    
    public function destroy(RejectDonorAppointment $rejectdonorappointment)
    {
        $rejectdonorappointment->delete();

        return response(['message' => 'Removed Successfully']);
    }
}
