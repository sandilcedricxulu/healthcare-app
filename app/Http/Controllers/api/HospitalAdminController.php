<?php

namespace App\Http\Controllers\api;

use App\HospitalAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\HospitalAdminResource;
use Illuminate\Support\Facades\Validator;

class HospitalAdminController extends Controller
{
    
    public function index()
    {
        $hospitaladmin = HospitalAdmin::all();
        
        return response([ 'hospitaladmin' => HospitalAdminResource::collection($hospitaladmin), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'id_number' => 'required|max:13|min:13',
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required|max:10|min:10',
            'email' => 'required|email',
            'username' => 'required|unique:users',
            'password' => 'required',
            'hospital_id' => 'required'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $hospitaladmin = HospitalAdmin::create($data);

        return response([ 'hospitaladmin' => new HospitalAdminResource($hospitaladmin), 'message' => 'Created successfully'], 200);
    }

    
    public function show(HospitalAdmin $hospitaladmin)
    {
        return response([ 'hospitaladmin' => new HospitalAdminResource($hospitaladmin), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function update(Request $request, HospitalAdmin $hospitaladmin)
    {
        $hospitaladmin->update($request->all());

        return response([ 'hospitaladmin' => new HospitalAdminResource($hospitaladmin), 'message' => 'Updated successfully'], 200);
    }

   
    public function destroy(HospitalAdmin $hospitaladmin)
    {
        $hospitaladmin->delete();

        return response(['message' => 'Removed Successfully']);
    }
}
