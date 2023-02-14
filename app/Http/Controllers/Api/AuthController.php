<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //-----------------------------------------------------------------
    //-----------------------------------------------------------------
    //-------------------------Register New User-----------------------
    //-----------------------------------------------------------------
    //-----------------------------------------------------------------
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
                    // 'phone' => 'required',
                    // 'username' => 'required||unique:users,username',
                    'email' => 'required|email|unique:users,email',
                    // 'passport_number' => 'required|unique:users,passport_number',
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
            $username = str_replace(' ', '.', $request->full_name);
            $alreadyUser = User::where('username', $username)->first();
            if ($alreadyUser) {
                $username = $username.''.rand(1000, 9999);
            }
            // $imagePath=base64_encode(public_path('placeholder.png'));
            // dd(public_path('placeholder.png'));
            $user = User::create([
                'full_name' => $request->full_name,
                'username' => $username,
                'avatar' => config('app.url').'placeholder.png',
                'email' => $request->email,
                // 'passport_number'=>$request->passport_number,
                'password' => Hash::make($request->password),
                'otp' => $otp,
                'api_token' => Str::random(60),
                // 'avatar' =>"data:image/png;base64,".base64_encode(file_get_contents($imagePath)),
            ]);
            $email = $request->email;
            $user->otp= $otp;
            $user->save();
            $user->assignRole('member');
            $mail = Mail::raw('Your account activation OTP is  '.$user->otp.'.', function ($message) use ($email) {
                $message->to($email)
              ->subject('Your OTP ');
            });

            return response()->json([
                'status' => 200,
                'message' => 'User Created Successfully',
                'api_token' => $user->api_token
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage()
            ], 500);
        }
    }



    //-----------------------------------------------------------------
    //-----------------------------------------------------------------
    //--------------------------Login User-----------------------------
    //-----------------------------------------------------------------
    //-----------------------------------------------------------------
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

            if ($user->status == 0) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Please verify your account first.',
                ], 401);
            }
            if($user->api_token==null){
                $user->api_token = Str::random(60);
                
            }
            $user->save();
            $applications = Application::where('user_id', $user->id)->get(['application_id','full_name','status']);
            return response()->json([
                'status' => 200,
                'message' => 'User Logged In Successfully',
                'user'=> $user,
                'applications'=>$applications,
                'token' =>$user->api_token
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    //-----------------------------------------------------------------
    //-----------------------------------------------------------------
    //-------------------------Resend OTPs-----------------------------
    //-----------------------------------------------------------------
    //-----------------------------------------------------------------

    public function resendOtp(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
            ]
        );

        if ($validateUser->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $otp = rand(1000, 9999);
            $user->otp = $otp;
            $user->save();
            $email = $request->email;
            $mail = Mail::raw('Your account activation OTP is  '.$user->otp.'.', function ($message) use ($email) {
                $message->to($email)
          ->subject('Your OTP ');
            });
            return response()->json([
                'status' => 200,
                'message' => 'OTP Resend Successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User Not Found'
            ], 401);
        }
    }
    //-----------------------------------------------------------------
    //-----------------------------------------------------------------
    //-------------------Forget Password Request------------------------
    //-----------------------------------------------------------------
    //-----------------------------------------------------------------

    public function forgetPassword(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
            ]
        );

        if ($validateUser->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $otp = rand(1000, 9999);
            $user->otp = $otp;
            $user->save();
            $email = $request->email;
            $mail = Mail::raw('Your  OTP FOR PASSWORD RESET is  '.$user->otp.'.', function ($message) use ($email) {
                $message->to($email)
                ->subject('Your OTP ');
            });

            return response()->json([
                'status' => 200,
                'message' => 'OTP Resend Successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User Not Found'
            ], 401);
        }
    }

    //-----------------------------------------------------------------
    //-----------------------------------------------------------------
    //-------------------------Set New Password------------------------
    //-----------------------------------------------------------------
    //-----------------------------------------------------------------


    public function setNewPassword(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
                'otp' => 'required',
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
                $user->password = Hash::make($request->password);
                $user->otp = null;
                $user->save();
                $email = $request->email;
                $mail = Mail::raw('Your Password has been updated.', function ($message) use ($email) {
                    $message->to($email)
                ->subject('Your OTP ');
                });
                return response()->json([
                    'status' => 200,
                    'message' => 'Password Changed Successfully',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'Invalid Request'
                ], 401);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User Not Found'
            ], 401);
        }
    }

    //-----------------------------------------------------------------
    //-----------------------------------------------------------------
    //-------------------Verify Email Request--------------------------
    //-----------------------------------------------------------------
    //-----------------------------------------------------------------

    public function verfiyEmail(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
            ]
        );

        if ($validateUser->fails()) {
            return response()->json([
                'status' => 401,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $otp = rand(1000, 9999);
            $user->otp = $otp;
            $user->save();
            $email = $request->email;
            $mail = Mail::raw('Your OTP FOR Email Verfication is  '.$user->otp.'.', function ($message) use ($email) {
                $message->to($email)
          ->subject('Your OTP ');
            });

            return response()->json([
                'status' => 200,
                'message' => 'OTP for Email Verification Sent Successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User Not Found'
            ], 401);
        }
    }


    //-----------------------------------------------------------------
    //-----------------------------------------------------------------
    //-------------------------Verify OTPs-----------------------------
    //-----------------------------------------------------------------
    //-----------------------------------------------------------------

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
                'status' => 401,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->otp == $request->otp) {
                $user->status = 1;
                if ($user->email_verified_at == null) {
                    $user->email_verified_at = Carbon::now();
                }
                // $user->otp = null;
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


    public function logout(Request $request)
    {
        $user = User::where('id', $request->user_id)->where('api_token', $request->token)->first();
        if($user){
            $user->api_token = null;
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'User Logged Out Successfully',
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'User Not Found'
            ], 401);
        }
        
    }
}
