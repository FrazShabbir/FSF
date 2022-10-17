<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
      * Create User
      * @param Request $request
      * @return User
      */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make(
                $request->all(),
                [
                    'full_name' => 'required',

                    'phone' => 'required',
                    'username' => 'required||unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    'passport_number' => 'required|unique:users,passport_number',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $otp = rand(1000, 9999);
            $user = User::create([
                'full_name' => $request->full_name,
                'username' => $request->username,
                'phone' => $request->phone,
                'email' => $request->email,
                'passport_number'=>$request->passport_number,
                'password' => Hash::make($request->password),
                'otp' => $otp,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
public function verifyOtp(Request $request)
{
    $validateUser = Validator::make(
        $request->all(),
        [

            'email' => 'required|email',
            'otp' => 'required'
        ]
    );

    if ($validateUser->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'validation error',
            'errors' => $validateUser->errors()
        ], 401);
    }
    $user = User::where('email', $request->email)->first();
    if ($user) {
        if ($user->otp == $request->otp) {
            $user->status = true;
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'User Verified Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid OTP'
            ], 401);
        }
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'User Not Found'
        ], 401);
    }
}

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'user'=> $user,
                'token' =>$user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
