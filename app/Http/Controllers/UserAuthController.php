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
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'User registered successfully',
        'token' => $token
    ], 201);
    }
    
    public function login(loginUserRequest $request){
        $loginuserData = $request -> validated();
        $user = User::where('email',$loginuserData['email'])->first();
        if(!$user || !Hash::check($loginuserData['password'],$user->password)){
               return response()->json([
                'message' => 'Invalid Credentials'
               ],401);
        }
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
        ]);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'logged out successfully'
        ]);
    }
}
