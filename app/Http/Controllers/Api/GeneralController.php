<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
    public function myprofile($id, $token)
    {
        $arr=[];
        $user = User::where('id', $id)->where('api_token', $token)->first();
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
    public function updateProfile(Request $request, $id)
    {
        if (!$request->api_token) {
            return response()->json([
                'status' => 500,
                'message' => 'INVALID TOKEN',
                'errors' => 'NO API TOKEN'
            ], 500);
        }




        $checkUser = User::where('id', $id)->where('api_token', $request->api_token)->get();

        if ($checkUser->count()>0) {
            $user = User::where('id', $id)->where('api_token', $request->api_token)->first();
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User Not Found',
            ], 404);
        }

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

            if ($request->avatar) {
                $file = $request->avatar;
                $extension = $file->getClientOriginalExtension();
                $filename = getRandomString().'-'.time() . '.' . $extension;
                $file->move('uploads/avatars/', $filename);
                $user->update([
                    'avatar' =>  config('app.url').'uploads/avatars/'. $filename
                ]);
            }
            // $user->assignRole('member');
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
