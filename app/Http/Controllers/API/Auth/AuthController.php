<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use HasApiTokens;

class AuthController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request)
    {
		// validate to check if email and password are filled out

        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required',
		]); 
		
		// return a HTTP error if the validation doesn't pass
		if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
		
        if (Auth::attempt($validator->valid())) { // if the validator passes
            $token = Auth::user()->createToken('authToken'); // create a new auth access token
            $success['token'] = $token->accessToken;

            /* This logs the device IP and user agent so the user can view all logged in devices on their dashboard
            $token->token->user_agent = $request->header('User-Agent');
            $token->token->ip_address = \Request::ip();
			$token->token->save();
			*/

			// yayy!
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function logout(Request $request)
    {
        Auth::user()->token()->revoke();
        return response()->json(['success' => 'logged out'], $this->successStatus);
	}
	
	public function verifyEmail($email)
	{
        // return a bool for whether the email exists using the query builder
	    return response()->json(['success' => User::where('email', '=', $email)->exists()], $this->successStatus);;
	}

    public function details() 
    { 
        return response()->json(['success' => Auth::user(), "extra"=> Auth::user()->token()->id], $this-> successStatus); 
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];
    }
}
