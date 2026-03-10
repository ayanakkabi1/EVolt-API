<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\loginUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function register(StoreUserRequest $request){
        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'User registered successfully',
        'token' => $token
    ]);
    }
    public function login(loginUserRequest $request){
        $loginUserData = $request->validate([
            'email'=>$request->email ,
            'password'=> $request->password ,
        ]);
        $user = User::where('email',$loginUserData['email'])->first();
        if(!$user || !Hash::check($loginUserData['password'],$user->password)){
            return response()->json([
                'message' => 'Invalid Credentials'
            ],401);
        }
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
        ]);
    }
}
