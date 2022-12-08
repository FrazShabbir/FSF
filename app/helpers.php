<?php


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\GeneralSetting;
use App\Models\Application;

if (! function_exists('fromSettings')) {
    function fromSettings(string $key, $alternative = null)
    {
        return GeneralSetting::where('key', $key)->first()->value ?? $alternative;
    }
}

if (! function_exists('setSettings')) {
    function setSettings(string $key, string $value)
    {
        GeneralSetting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
        return true;
    }
}

if (! function_exists('getuser')) {
    function getuser()
    {
        return Auth::user();
    }
}

if (! function_exists('getFullName')) {
    function getFullName()
    {
        $user = Auth::user();
        return $user->full_name;
    }
}
if (! function_exists('getFullNameById')) {
    function getFullNameById($id)
    {
        $user = User::find($id);
        return $user->full_name;
    }
}
if (! function_exists('getUserStatus')) {
    function getUserStatus($id)
    {
        $user = User::find($id);
        if ($user->status==1) {
            return 'Active';
        } elseif ($user->status==0) {
            return 'In Active';
        } elseif ($user->status==3) {
            return 'In Closing Process, Person DECEASED.';
        }
         elseif ($user->status==4) {
            return 'Permanent Closed, Person DECEASED.';
        } else {
            return 'Contact Support';
        }

       
    }
}
// make a function that will print 15 char random string
if (! function_exists('getRandomString')) {
    function getRandomString($length = 15)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (! function_exists('generateAlphaNumeric')) {
    function generateAlphaNumeric($length = 3)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $random1 = rand(100, 999);
        $random2 = rand(100, 999);

        $alphanumeric = $randomString.$random1.$random2;
        return $alphanumeric;
    }
}
if (! function_exists('generateAlpha')) {
    function generateAlpha($length = 5)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // $random1 = rand(100, 999);
        // $random2 = rand(100, 999);

        $alphanumeric = $randomString;
        return $alphanumeric;
    }
}
if (! function_exists('generateNumeric')) {
    function generateNumeric()
    {
        $random1 = rand(100, 999);
        $random2 = rand(100, 999);
        $random3 = rand(100, 999);


        $alphanumeric = $random1.$random2.$random3;
        return $alphanumeric;
    }
}
if (! function_exists('generateNumericSix')) {
    function generateNumericSix()
    {
        $random1 = rand(10, 99);
        $random2 = rand(10, 99);
        $random3 = rand(10, 99);


        $alphanumeric = $random1.$random2.$random3;
        return $alphanumeric;
    }
}

if (! function_exists('getStatus')) {
    function getStatus($num)
    {
        if ($num==1) {
            return 'Active';
        } elseif ($num==0) {
            return 'In Active';
        } elseif ($num==3) {
            return 'In Closing Process, Person DECEASED.';
        }
         elseif ($num==4) {
            return 'Permanent Closed, Person DECEASED.';
        } else {
            return 'Contact Support';
        }
    }
}

if (! function_exists('loadCountries')) {
    function loadCountries()
    {
        return  config('countries.countries');
    }
}
if (! function_exists('getAddress')) {
    function getAddress($id)
    {
        $application =Application::where('user_id', $id)->first();
        $country = $application->country->name ??'';
        $community = $application->community->name ??'';
        $province = $application->province->name ??'';
        $city = $application->country->name ??'';
        $address = $application->area ??'';
        return $address.', '.$city.', '.$province.', '.$community.', '.$country;
    }
}



 // $notification_id, $title, $message, $id,$type
function send_notification_FCM($notification_id, $title, $message, $id,$type)
 {
     $notification_id =1;
     $title = 'test';
     $message = 'test';
     $id = 1;
     $type = 'test';
     $accesstoken = config('fcm.token');

     $URL = 'https://fcm.googleapis.com/fcm/send';


     $post_data = '{
             "to" : "' . $notification_id . '",
             "data" : {
               "body" : "",
               "title" : "' . $title . '",
               "type" : "' . $type . '",
               "id" : "' . $id . '",
               "message" : "' . $message . '",
             },
             "notification" : {
                  "body" : "' . $message . '",
                  "title" : "' . $title . '",
                   "type" : "' . $type . '",
                  "id" : "' . $id . '",
                  "message" : "' . $message . '",
                 "icon" : "new",
                 "sound" : "default"
                 },
  
           }';
     // print_r($post_data);die;

     $crl = curl_init();

     $headr = array();
     $headr[] = 'Content-type: application/json';
     $headr[] = 'Authorization: ' . $accesstoken;
     curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);

     curl_setopt($crl, CURLOPT_URL, $URL);
     curl_setopt($crl, CURLOPT_HTTPHEADER, $headr);

     curl_setopt($crl, CURLOPT_POST, true);
     curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
     curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);

     $rest = curl_exec($crl);

     if ($rest === false) {
         // throw new Exception('Curl error: ' . curl_error($crl));
         //print_r('Curl error: ' . curl_error($crl));
         $result_noti = 0;
     } else {
         $result_noti = 1;
     }

     //curl_close($crl);
     //print_r($result_noti);die;
     return $result_noti;
 }
