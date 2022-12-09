<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use App\Models\Office;
use App\Models\GeneralSetting;
use App\Models\Notification;
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
                // 'passport_number' => 'required|unique:users,passport_number,'.$user->id,

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
                // 'passport_number'=>$request->passport_number,
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
    public function nearOffice(Request $request)
    {
        $application = Application::where('user_id', $request->user_id)->first();
        if ($application) {
            $offices = Office::where('city_id', $application->city_id)->get();
            return response()->json([
                'offices' => $offices,
                'status' => 200,
                'message' => 'Office(s) Found',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Application Not Found.',
            ], 404);
        }
    }
    public function terms()
    {
        $terms = GeneralSetting::where('key', 'terms')->first();
        if ($terms) {
            return response()->json([
                'terms' => $terms,
                'status' => 200,
                'message' => 'Terms Found',
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Terms Not Found',
            ], 404);
        }
     
    }

    public function about()
    {
        $about = GeneralSetting::where('key', 'about')->first();
        if ($about) {
            return response()->json([
                'About' => $about,
                'status' => 200,
                'message' => 'About Found',
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'About Not Found',
            ], 404);
        }
     
    }

    public function privacy()
    {
        $privacy = GeneralSetting::where('key', 'privacy')->first();
        if ($privacy) {
            return response()->json([
                'privacy' => $privacy,
                'status' => 200,
                'message' => 'Privacy Found',
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Privacy Not Found',
            ], 404);
        }
     
    }


    public function termsdownload()
    {
        $eng_terms = GeneralSetting::where('key', 'terms_pdf')->first();
        $urd_terms = GeneralSetting::where('key', 'terms_pdf_urdu')->first();
        if ($eng_terms and $urd_terms ) {;
            return response()->json([
                'english' => env('APP_URL').$eng_terms->value,
                'urdu' => env('APP_URL').$urd_terms->value,
                'status' => 200,
                'message' => 'Pdf Found',
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'PDf Not Found',
            ], 404);
        }
     
    }

    public function notifications()
    {
        $arr=[];
        $notifications = Notification::all();
        if ($notifications) {
            return response()->json([
                'notifications' => $notifications,
                'status' => true,
                'message' => 'notifications Found',
            ], 200);
        } else {
            $arr['status'] = 404;
            $arr['message'] = 'notifications Not Found';
            return response()->json($arr, 404);
        }
    }
    public function notificationsDetail($id)
    {
        $arr=[];
        $notification = Notification::where('id',$id)->first();
        if ($notification) {
            return response()->json([
                'notification' => $notification,
                'status' => true,
                'message' => 'notification Found',
            ], 200);
        } else {
            $arr['status'] = 404;
            $arr['message'] = 'notification Not Found';
            return response()->json($arr, 404);
        }
    }

    public function notificationsCheck()
    {
        $arr=[];
        $icon = GeneralSetting::where('key', 'notification_icon')->first();

        if ($icon) {
            return response()->json([
                'icon' => 1,
                'status' => 200,
                'message' => 'Data Found',
            ], 200);
        } else {
          
            return  response()->json([
                'icon' => 0,
                'status' => 404,
                'message' => 'Do not show',
            ], 404);
        }
    }
    

}
