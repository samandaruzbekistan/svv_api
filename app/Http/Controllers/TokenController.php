<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TokenController extends Controller
{
    public function createToken(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! md5(md5($request->password, $user->password))) {
            return response()->json([
                'message' => 'User not found'
            ]);
        }
        if ($user->api_token == null){
            $token = (string) Str::uuid();
            $user->api_token = $token;
            $user->save();
            return response()->json([
                'token' => $token
            ]);
        }
        else{
            return response()->json([
                'token' => $user->api_token
            ]);
        }
    }

    public function changeToken(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $bearer_token = $request->bearerToken();

        if (! $bearer_token){
            return response()->json([
                'message' => 'token not found'
            ]);
        }

        $user = User::where('email', $request->email)->first();
        if ($user->api_token != $bearer_token) return response()->json(['message' => 'token not valid']);
        if (! $user || ! md5(md5($request->password, $user->password))) {
            return response()->json([
                'message' => 'User not found'
            ]);
        }
        $token = (string) Str::uuid();
        $user->api_token = $token;
        $user->save();
        return response()->json([
            'token' => $token
        ]);

    }
}
