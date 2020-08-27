<?php

namespace App\Http\Controllers\api;

use App\DonorAppointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\DonorAppointmentResource;
use Illuminate\Support\Facades\Validator;

class DonorAppointmentController extends Controller
{
    
    public function index()
    {
        $donorappointment = DonorAppointment::all();
        
        return response([ 'donorappointment' => DonorAppointmentResource::collection($donorappointment), 'message' => 'Retrieved successfully'], 200);
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

        $donorappointment = DonorAppointment::create($data);

        return response([ 'donorappointment' => new DonorAppointmentResource($donorappointment), 'message' => 'Created successfully'], 200);
    }

    
    public function show(DonorAppointment $donorappointment)
    {
        return response([ 'donorappointment' => new DonorAppointmentResource($donorappointment), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function update(Request $request, DonorAppointment $donorappointment)
    {
        $donorappointment->update($request->all());

        return response([ 'donorappointment' => new DonorAppointmentResource($donorappointment), 'message' => 'Updated successfully'], 200);
    }

    
    public function destroy(DonorAppointment $donorappointment)
    {
        $donorappointment->delete();

        return response(['message' => 'Removed Successfully']);
    }
}
