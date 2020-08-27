<?php

namespace App\Http\Controllers\api;

use App\BloodBank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\BloodBankResource;
use Illuminate\Support\Facades\Validator;

class BloodBankController extends Controller
{
 
    public function index()
    {
        $bloodbank = BloodBank::all();
        
        return response([ 'bloodbank' => BloodBankResource::collection($bloodbank), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'phone' => 'required|max:10|min:10',
            'address' => 'required',
            'blood_group_id' => 'required'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $bloodbank = BloodBank::create($data);

        return response([ 'bloodbank' => new BloodBankResource($bloodbank), 'message' => 'Created successfully'], 200);
    }

    
    public function show(BloodBank $bloodbank)
    {
        return response([ 'bloodbank' => new BloodBankResource($bloodbank), 'message' => 'Retrieved successfully'], 200);
    }

    public function update(Request $request, BloodBank $bloodbank)
    {
        $bloodbank->update($request->all());

        return response([ 'bloodbank' => new BloodBankResource($bloodbank), 'message' => 'Retrieved successfully'], 200);
    }

    public function destroy(BloodBank $bloodbank)
    {
        $bloodbank->delete();

        return response(['message' => 'Deleted']);
    }
}
