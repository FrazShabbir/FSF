<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
    public function myprofile($username)
    {
        $arr=[];
        $user = User::where('username', $username)->orWhere('email',$username)->first();
        if ($user) {
            return response()->json([
                'user' => $user,
                'status' => true,
                'message' => 'User Found',
            ], 200);
        
        } else {
            $arr['status'] = 404;
            $arr['message'] = 'User Not Found';
            return response()->json($arr, 404);
        }
      
    }
    public function updateProfile(Request $request, $username){
        $user = User::where('username', $username)->first();

        $validateUser = Validator::make(
            $request->all(),
            [
                'full_name' => 'required',
                'phone' => 'required',
                // 'username' => 'required||unique:users,username',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'passport_number' => 'required|unique:users,passport_number,'.$user->id,
           
            ]
        );

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }

        if ($user) {
            $user->update([
                'full_name' => $request->full_name??$user->full_name,
                'phone' => $request->phone ?? $user->phone,
                'email' => $request->email?? $user->email,
                'passport_number'=>$request->passport_number,
            ]);
            
            if($request->avatar){
                $file = $request->avatar;
                $extension = $file->getClientOriginalExtension();
                $filename = getRandomString().'-'.time() . '.' . $extension;
                $file->move('uploads/avatars', $filename);
                $user->update([
                    'avatar' =>  config('app.url').'uploads/avatars'. $filename
                ]);
            }
            $user->assignRole('member');
            return response()->json([
                'user' => $user,
                'status' => 200,
                'message' => 'User Updated Successfully',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User Not Found',
       
            ], 404);
        }
    }

}
