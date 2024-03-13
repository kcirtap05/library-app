<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = User::where('email', '=', $request->email)->first();
            $success['token'] =  $user->createToken('Payroll')-> accessToken; 
            $success['name'] =  $user->name;
            return response()->json([
                'user_credentials' => [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                ],
                'token_type' => 'Bearer',
                'access_token' => $success['token']
            ], 200);
        } else { 
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
