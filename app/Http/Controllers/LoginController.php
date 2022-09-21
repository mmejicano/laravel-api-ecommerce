<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $token = Auth::user()->createToken(Auth::id())->plainTextToken;
            return response()->json([
                'token' => $token
            ]);
        }
    }
}
