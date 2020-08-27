<?php

namespace App\Http\Controllers\api;

use App\BloodGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\BloodGroupResource;
use Illuminate\Support\Facades\Validator;

class BloodGroupController extends Controller
{
   
    public function index()
    {
        $bloodgroup = BloodGroup::all();
        
        return response([ 'bloodgroup' => BloodGroupResource::collection($bloodgroup), 'message' => 'Retrieved successfully'], 200);
    }

   
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'blood_group_id' => 'required|max:255',
            'blood_type' => 'required|max:50|min:1',
            'blood_amount' => 'required'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $bloodgroup = BloodGroup::create($data);

        return response([ 'bloodgroup' => new BloodGroupResource($bloodgroup), 'message' => 'Created successfully'], 200);
    }

    
    public function show(BloodGroup $bloodgroup)
    {
        return response([ 'bloodgroup' => new BloodBankResource($bloodgroup), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function update(Request $request, BloodGroup $bloodgroup)
    {
        $bloodgroup->update($request->all());

        return response([ 'bloodgroup' => new BloodGroupResource($bloodgroup), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function destroy(BloodGroup $bloodgroup)
    {
        $bloodgroup->delete();

        return response(['message' => 'Deleted']);
    }
}
