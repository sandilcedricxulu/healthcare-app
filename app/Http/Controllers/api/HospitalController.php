<?php

namespace App\Http\Controllers\api;

use App\Hospital;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\HospitalResource;
use Illuminate\Support\Facades\Validator;

class HospitalController extends Controller
{

    public function index()
    {
        $hospital = Hospital::all();
        
        return response([ 'hospital' => HospitalResource::collection($hospital), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'phone' => 'required|max:10|min:10',
            'address' => 'required|'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $hospital = Hospital::create($data);

        return response([ 'hospital' => new HospitalResource($hospital), 'message' => 'Created successfully'], 200);
    }

    
    public function show(Hospital $hospital)
    {
        return response([ 'hospital' => new HospitalResource($hospital), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function update(Request $request, Hospital $hospital)
    {
        $hospital->update($request->all());

        return response([ 'hospital' => new HospitalResource($hospital), 'message' => 'Updated successfully'], 200);
    }

    public function destroy(Hospital $hospital)
    {
        $hospital->delete();

        return response(['message' => 'Removed Successfully']);
    }
}
