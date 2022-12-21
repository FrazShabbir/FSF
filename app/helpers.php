<?php


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\GeneralSetting;
use App\Models\Application;
use Twilio\Rest\Client;


use App\Models\Country;
use App\Models\Community;
use App\Models\Province;
use App\Models\City;
use App\Models\Office;

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
        } elseif ($user->status==4) {
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
        } elseif ($num=2) {
            return 'Pending';
        } elseif ($num==0) {
            return 'In Active';
        } elseif ($num==3) {
            return 'In Closing Process';
        } elseif ($num==4) {
            return 'Permanent Closed';
        } elseif ($num==5) {
            return 'Rejected';
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




if (! function_exists('SendMessage')) {
    function SendMessage($number, $message)
    {
        try {
            $account_sid = env("TWILIO_SID");
            $auth_token = env("TWILIO_TOKEN");
            $twilio_number = env("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($number, [
                'from' => $twilio_number,
                'body' => $message
                // 'body' => 'Your Application at ' . env('APP_NAME') . ' has been submitted successfully. Your Application ID is ' . $application->application_id . '.'
                ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    if (! function_exists('allApplicationsCount')) {
        function allApplicationsCount()
        {
            return Application::get()->count();
        }
    }

    if (! function_exists('allApprovedApplicationsCount')) {
        function allApprovedApplicationsCount()
        {
            return Application::where('status', 'APPROVED')->get()->count();
        }
    }

    if (! function_exists('allPendingApplicationsCount')) {
        function allPendingApplicationsCount()
        {
            return Application::where('status', 'PENDING')->get()->count();
        }
    }

    if (! function_exists('allRejectedApplicationsCount')) {
        function allRejectedApplicationsCount()
        {
            return Application::where('status', 'REJECTED')->get()->count();
        }
    }
    if (! function_exists('allRenewablepplicationsCount')) {
        function allRenewablepplicationsCount()
        {
            return Application::where('status', 'RENEWABLE')->get()->count();
        }
    }


    if (! function_exists('pendingApproval')) {
        function pendingApproval()
        {
            return Application::where('status', 'PENDING-APPROVAL')->get()->count();
        }
    }



    if (! function_exists('allApplications')) {
        function allApplications()
        {
            return Application::get();
        }
    }

    if (! function_exists('officeUsers')) {
        function officeUsers()
        {
            return User::where('is_office_member', 1)->get();
        }
    }

    if (! function_exists('getCities')) {
        function getCities()
        {
            return City::where('status', 1)->get();
        }
    }


    if (! function_exists('cityHOD')) {
        function cityHOD()
        {
            $city_hod = City::where('hod', auth()->user()->id)->get();

            return $city_hod;
        }
    }


    if (! function_exists('cityApplications')) {
        function cityApplications($id)
        {
            return Application::where('city_id', $id)->get();
        }
    }


    if (! function_exists('provinceHOD')) {
        function provinceHOD()
        {
            $province_hod = Province::where('hod', auth()->user()->id)->get();

            return $province_hod;
        }
    }
    if (! function_exists('provinceApplications')) {
        function provinceApplications($id)
        {
            return Application::where('province_id', $id)->get();
        }
    }


    if (! function_exists('communityHOD')) {
        function communityHOD()
        {
            $community_hod = Community::where('hod', auth()->user()->id)->get();

            return $community_hod;
        }
    }
    if (! function_exists('communityApplications')) {
        function communityApplications($id)
        {
            return Application::where('community_id', $id)->get();
        }
    }


    if (! function_exists('countryHOD')) {
        function countryHOD()
        {
            $country_hod = Country::where('hod', auth()->user()->id)->get();
            return $country_hod;
        }
    }

    if (! function_exists('countryApplications')) {
        function countryApplications($id)
        {
            return Application::where('country_id', $id)->get();
        }
    }


    if (! function_exists('officeHOD')) {
        function officeHOD()
        {
            $office_hod = Office::where('officehead', auth()->user()->id)->get();
            return $office_hod;
        }
    }

    if (! function_exists('officeApplications')) {
        function officeApplications($id)
        {
            $office = Office::where('id', $id)->first();
            return Application::where('city_id', $office->city_id)->get();
        }
    }
    
    if (! function_exists('getPendingApplications')) {
        function getPendingApplications()
        {
            return Application::where('status', 'PENDING')->limit(10)->get();
        }
    }

    if (! function_exists('checkPermission')) {
        function checkPermission($status)
        {
            if ($status == 'APPROVED') {
                if (! auth()->user()->hasPermissionTo('Approve Applications')) {
                    return true;
                } else {
                    return false;
                }
            } elseif ($status == 'PENDING') {
                if (! auth()->user()->hasPermissionTo('Update Applications')) {
                    return true;
                } else {
                    return false;
                }
            } elseif ($status == 'REJECTED') {
                if (! auth()->user()->hasPermissionTo('Reject Applications')) {
                    return true;
                } else {
                    return false;
                }
            } elseif ($status == 'RENEWABLE') {
                if (! auth()->user()->hasPermissionTo('Renew Applications')) {
                    return true;
                } else {
                    return false;
                }
            } elseif ($status == 'CLOSED') {
                if (! auth()->user()->hasPermissionTo('Close Applications')) {
                    return true;
                } else {
                    return false;
                }
            } elseif ($status == 'CLOSING-PROCESS') {
                if (! auth()->user()->hasPermissionTo('Close Applications')) {
                    return true;
                } else {
                    return false;
                }
            } elseif ($status == 'PERMANENT-CLOSED') {
                if (! auth()->user()->hasPermissionTo('Permanent Close Applications')) {
                    return true;
                } else {
                    return false;
                }
            } elseif ($status=='INACTIVE') {
                if (! auth()->user()->hasPermissionTo('Close Applications')) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
}
