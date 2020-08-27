<?php

namespace App\Http\Controllers\api;

use App\BloodBankAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\BloodBankAdminResource;
use Illuminate\Support\Facades\Validator;

class BloodBankAdminController extends Controller
{
    
    public function index()
    {
        $bloodbankadmin = BloodBankAdmin::all();
        
        return response([ 'bloodbankadmin' => BloodBankAdminResource::collection($bloodbankadmin), 'message' => 'Retrieved successfully'], 200);
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'id_number' => 'required|max:13|min:13',
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'phone' => 'required|max:10|min:10',
            'email' => 'required|email|unique:users',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'blood_bank_id' => 'required'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $bloodbankadmin = BloodBankAdmin::create($data);

        return response([ 'bloodbankadmin' => new BloodBankAdminResource($bloodbankadmin), 'message' => 'Created successfully'], 200);
    }

    
    public function show(BloodBankAdmin $bloodbankadmin)
    {
        return response([ 'bloodbankadmin' => new BloodBankAdminResource($bloodbankadmin), 'message' => 'Retrieved successfully'], 200);
    }

    
    public function update(Request $request, BloodBankAdmin $bloodbankadmin)
    {
        $bloodbankadmin->update($request->all());

        return response([ 'bloodbankadmin' => new BloodBankAdminResource($bloodbankadmin), 'message' => 'Retrieved successfully'], 200);
    }


    public function destroy(BloodBankAdmin $bloodbankadmin)
    {
        $bloodbankadmin->delete();

        return response(['message' => 'Deleted']);
    }
}
