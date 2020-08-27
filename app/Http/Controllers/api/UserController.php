<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return response([ 'users' => UserResource::collection($users), 'message' => 'Retrieved successfully'], 200);
    }

    public function show(User $user)
    {
        return response([ 'user' => new UserResource($user), 'message' => 'Retrieved successfully'], 200);
    }


    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response([ 'user' => new UserResource($user), 'message' => 'Updated successfully'], 200);
    }


    public function destroy(User $user)
    {
        $user->delete();

        return response(['message' => 'Deleted']);
    }
    
}
