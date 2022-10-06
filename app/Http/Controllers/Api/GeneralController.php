<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class GeneralController extends Controller
{
    public function myprofile($username)
    {
        $arr=[];
        $user = User::where('username', $username)->first();
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
        if ($user) {
            $user->update([
                'full_name' => $request->full_name??$user->full_name,
                'phone' => $request->phone ?? $user->phone,
                'email' => $request->email?? $user->email,
                // 'passport_number'=>$request->passport_number,
            ]);
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
