<?php

namespace App\Http\Controllers\api;

use App\Donor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\DonorResource;
use Illuminate\Support\Facades\Validator;

class DonorController extends Controller
{
   
    public function index()
    {
        $donor = Donor::all();
        
        return response([ 'donor' => DonorResource::collection($donor), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id_number' => 'required|max:13|min:13',
            'blood_type' => 'required',
            'amount_payed' => 'required'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $donor = Donor::create($data);

        return response([ 'donor' => new DonorResource($donor), 'message' => 'Created successfully'], 200);
    }

    
    public function show(Donor $donor)
    {
        return response([ 'donor' => new DonorResource($donor), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function update(Request $request, Donor $donor)
    {
        $donor->update($request->all());

        return response([ 'donor' => new DonorResource($donor), 'message' => 'Updated successfully'], 200);
    }

    
    public function destroy(Donor $donor)
    {
        $donor->delete();

        return response(['message' => 'Removed Successfully']);
    }
}
