<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (auth()->attempt($request->all())) {
            return response([
                'user' => auth()->user(),
                'access_token' => auth()->user()->createToken('authToken', ['scope'])->accessToken
            ], Response::HTTP_OK);
        }

        return response([
            'message' => 'This User does not exist'
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response($user, Response::HTTP_CREATED);
    }


    public function user(){
        $user = auth()->guard('api')->user();
        if(empty($user)){
            return response()->json([
                'error' => 'non conncter'
            ],404);
        }
        else {
            return response()->json([
                auth()->guard('api')->user()
            ],201);
        }
    }
    public function Get_all(Request $request){
        $user = User::where('id', '!=', auth()->id())->get();
        return response()->json([
            $user
        ],201);
    }
}