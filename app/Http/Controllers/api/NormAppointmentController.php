<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\NormAppointment;
use Illuminate\Http\Request;

use App\Http\Resources\NormAppointmentResource;
use Illuminate\Support\Facades\Validator;

class NormAppointmentController extends Controller
{
    
    public function index()
    {
        $normappointment = NormAppointment::all();
        
        return response([ 'normappointment' => NormAppointmentResource::collection($normappointment), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id_number' => 'required|max:255',
            'hospital_id' => 'required|max:50|min:1',
            'hospital_admin_id' => 'required',
            'date_of_booking' => 'required',
            'date_of_appointment' => 'required',
            'reason' => 'required',
            'conductor' => 'required|max:255|min:2'
        ]);


        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $normappointment = NormAppointment::create($data);

        return response([ 'normappointment' => new NormAppointmentResource($normappointment), 'message' => 'Created successfully'], 200);
    }

    
    public function show(NormAppointment $normappointment)
    {
        return response([ 'normappointment' => new NormAppointmentResource($normappointment), 'message' => 'Retrieved successfully'], 200);
    }

   
    public function update(Request $request, NormAppointment $normappointment)
    {
        $normappointment->update($request->all());

        return response([ 'normappointment' => new NormAppointmentResource($normappointment), 'message' => 'Updated successfully'], 200);
    }

    public function destroy(NormAppointment $normappointment)
    {
        $normappointment->delete();

        return response(['message' => 'Removed Successfully']);
    }
}
