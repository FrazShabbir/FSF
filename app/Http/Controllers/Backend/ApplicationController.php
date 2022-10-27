<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Facades\DB;


use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Str;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::all();
        return view('backend.applications.index')
        ->with('applications', $applications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        return view('backend.applications.create')
        ->with('countries', $countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'email'=>'required|email|unique:users,email',
        //     'passport_number' => 'required',
        //     'nie' => 'required',
        //     'native_id'=>'required',
        //     'full_name'=>'required',
        //     'father_name'=>'required',
        //     'surname'=>'required',
        //     'gender'=>'required',
        //     'phone'=>'required',
        //     'dob'=>'required',
        //     'native_country'=>'required',
        //     'native_country_address'=>'required',
        //     'country_id'=>'required',
        //     'community_id'=>'required',
        //     'province_id'=>'required',
        //     'city_id'=>'required',
        //     'area'=>'required',

        //     's_relative_1_name'=>'required',
        //     's_relative_1_relation'=>'required',
        //     's_relative_1_phone'=>'required',
        //     's_relative_1_address'=>'required',

        //     's_relative_2_name'=>'required',
        //     's_relative_2_relation'=>'required',
        //     's_relative_2_phone'=>'required',
        //     's_relative_2_address'=>'required',

        //     'n_relative_1_name'=>'required',
        //     'n_relative_1_relation'=>'required',
        //     'n_relative_1_phone'=>'required',
        //     'n_relative_1_address'=>'required',


        //     'n_relative_2_name'=>'required',
        //     'n_relative_2_relation'=>'required',
        //     'n_relative_2_phone'=>'required',
        //     'n_relative_2_address'=>'required',

        //     'rep_name'=>'required',
        //     'rep_surname'=>'required',
        //     'rep_passport_no'=>'required',
        //     'rep_phone'=>'required',
        //     'rep_address'=>'required',
        //     'rep_confirmed'=>'required',

        //     'buried_location'=>'required',

        //     'registered_relatives'=>'required',
        //     'registered_relative_passport_no'=>'nullable',

        //     'annually_fund_amount'=>'required',
        //     'user_signature'=>'required',
        //     'declaration_confirm'=>'required',
        // ]);

        try {
            DB::beginTransaction();

            $username = str_replace(' ', '.', $request->full_name);
            $alreadyUser = User::where('username', $username)->first();
            if ($alreadyUser) {
                $username = $username.''.rand(1000, 9999);
            }

            $user = User::create([
                'full_name'=>$request->full_name,
                'username'=>$username,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'passport_number'=>$request->passport_number,
                'status'=>'1',
                'password'=>Hash::make('12345678'),
            ]);
            $user->assignRole('member');
            event(new Registered($user));

            $application = Application::create([
                'application_id'=>'W-App-'.getRandomString(10),
                'user_id'=>$user->id??'0',
                'passport_number' => $request->passport_number??'0',
                'nie' => $request->nie??'0',
                'native_id'=>$request->native_id??'0',
                'full_name'=>$request->full_name??'0',
                'father_name'=>$request->father_name??'0',
                'surname'=>$request->surname??'0',

                'gender'=>$request->gender??'0',
                'phone'=>$request->phone??'0',
                'dob'=>$request->dob??'0',
                'native_country'=>$request->native_country??'0',
                'native_country_address'=>$request->native_country_address??'0',
                'country_id'=>$request->country_id??'0',

                'community_id'=>$request->community_id??'0',
                'province_id'=>$request->province_id??'0',
                'city_id'=>$request->city_id??'0',
                'area'=>$request->area??'0',





                's_relative_1_name'=>$request->s_relative_1_name??'0',
                's_relative_1_relation'=>$request->s_relative_1_relation??'0',
                's_relative_1_phone'=>$request->s_relative_1_phone??'0',
                's_relative_1_address'=>$request->s_relative_1_address??'0',

                's_relative_2_name'=>$request->s_relative_2_name??'0',
                's_relative_2_relation'=>$request->s_relative_2_relation??'0',
                's_relative_2_phone'=>$request->s_relative_2_phone??'0',
                's_relative_2_address'=>$request->s_relative_2_address??'0',


                'n_relative_1_name'=>$request->n_relative_1_name??'0',
                'n_relative_1_relation'=>$request->n_relative_1_relation??'0',
                'n_relative_1_phone'=>$request->n_relative_1_phone??'0',
                'n_relative_1_address'=>$request->n_relative_1_address??'0',

                'n_relative_2_name'=>$request->n_relative_2_name??'0',
                'n_relative_2_relation'=>$request->n_relative_2_relation??'0',
                'n_relative_2_phone'=>$request->n_relative_2_phone??'0',
                'n_relative_2_address'=>$request->n_relative_2_address??'0',



                'rep_name'=>$request->rep_name??'0',
                'rep_surname'=>$request->rep_surname??'0',
                'rep_passport_no'=>$request->rep_passport_no??'0',
                'rep_phone'=>$request->rep_phone??'0',
                'rep_address'=>$request->rep_address??'0',
                'rep_confirmed'=>$request->rep_confirmed??'0',

                'buried_location'=>$request->buried_location??'0',

                'registered_relatives'=>'1',
                'registered_relative_passport_no'=>$request->registered_relative_passport_no??'0',
                'annually_fund_amount'=>$request->annually_fund_amount??'0',
                'user_signature'=>$request->user_signature??'0',
                'declaration_confirm'=>$request->declaration_confirm??'0',

            ]);
            DB::commit();
            return response()->json(['success'=>'Application Created Successfully']);
            
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
