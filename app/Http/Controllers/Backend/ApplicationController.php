<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\User;
use App\Models\Country;
use App\Models\Community;
use App\Models\Province;
use App\Models\City;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

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
        $request->validate([
            'email'=>'required|email|unique:users,email',
            'passport_number' => 'required',
            'nie' => 'required',
            'native_id'=>'required',
            'full_name'=>'required',
            'father_name'=>'required',
            'surname'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'dob'=>'required',
            'native_country'=>'required',
            'native_country_address'=>'required',
            'country'=>'required',
            'community'=>'required',
            'province'=>'required',
            'city'=>'required',
            'area'=>'required',

            's_relative_1_name'=>'required',
            's_relative_1_relation'=>'required',
            's_relative_1_phone'=>'required',
            's_relative_1_address'=>'required',

            's_relative_2_name'=>'required',
            's_relative_2_relation'=>'required',
            's_relative_2_phone'=>'required',
            's_relative_2_address'=>'required',

            'n_relative_1_name'=>'required',
            'n_relative_1_relation'=>'required',
            'n_relative_1_phone'=>'required',
            'n_relative_1_address'=>'required',


            'n_relative_2_name'=>'required',
            'n_relative_2_relation'=>'required',
            'n_relative_2_phone'=>'required',
            'n_relative_2_address'=>'required',

            'rep_name'=>'required',
            'rep_surname'=>'required',
            'rep_passport_no'=>'required',
            'rep_phone'=>'required',
            'rep_address'=>'required',
            'rep_confirmed'=>'required',

            'buried_location'=>'required',

            'registered_relatives'=>'required',
            'registered_relative_passport_no'=>'nullable',

            'annually_fund_amount'=>'required',
            // 'user_signature'=>'required',
            'declaration_confirm'=>'required',
        ]);

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
                'user_id'=>$user->id,
                'passport_number' => $request->passport_number,
                'nie' => $request->nie,
                'native_id'=>$request->native_id,
                'full_name'=>$request->full_name,
                'father_name'=>$request->father_name,
                'surname'=>$request->surname,

                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'dob'=>$request->dob,
                'native_country'=>$request->native_country,
                'native_country_address'=>$request->native_country_address,
                'country_id'=>$request->country,

                'community_id'=>$request->community,
                'province_id'=>$request->province,
                'city_id'=>$request->city,
                'area'=>$request->area,





                's_relative_1_name'=>$request->s_relative_1_name,
                's_relative_1_relation'=>$request->s_relative_1_relation,
                's_relative_1_phone'=>$request->s_relative_1_phone,
                's_relative_1_address'=>$request->s_relative_1_address,

                's_relative_2_name'=>$request->s_relative_2_name,
                's_relative_2_relation'=>$request->s_relative_2_relation,
                's_relative_2_phone'=>$request->s_relative_2_phone,
                's_relative_2_address'=>$request->s_relative_2_address,


                'n_relative_1_name'=>$request->n_relative_1_name,
                'n_relative_1_relation'=>$request->n_relative_1_relation,
                'n_relative_1_phone'=>$request->n_relative_1_phone,
                'n_relative_1_address'=>$request->n_relative_1_address,

                'n_relative_2_name'=>$request->n_relative_2_name,
                'n_relative_2_relation'=>$request->n_relative_2_relation,
                'n_relative_2_phone'=>$request->n_relative_2_phone,
                'n_relative_2_address'=>$request->n_relative_2_address,



                'rep_name'=>$request->rep_name,
                'rep_surname'=>$request->rep_surname,
                'rep_passport_no'=>$request->rep_passport_no,
                'rep_phone'=>$request->rep_phone,
                'rep_address'=>$request->rep_address,
                'rep_confirmed'=>$request->rep_confirmed,

                'buried_location'=>$request->buried_location,

                'registered_relatives'=>'1',
                'registered_relative_passport_no'=>$request->registered_relative_passport_no,
                'annually_fund_amount'=>$request->annually_fund_amount,
                'user_signature'=>$request->user_signature??'DONE BY OPERATOR',
                'declaration_confirm'=>$request->declaration_confirm??'0',

            ]);

            if ($request->avatar) {
                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                ]);

               
                $file = $request->avatar;
                $extension = $file->getClientOriginalExtension();
                $filename = getRandomString().'-'.time() . '.' . $extension;
                $file->move('uploads/application/avatars/', $filename);
                $application->avatar= config('app.url').'uploads/application/avatars/'. $filename;
                $application->save();
            }


            DB::commit();
            alert()->success('Success', 'Application Submitted Successfully');
            return redirect()->route('application.index');
            // return response()->json(['success'=>'Application Created Successfully']);
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
        $application = Application::where('application_id',$id)->firstOrFail();
        return view('backend.applications.show')
            ->with('application', $application);
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


    public function getCommunities(Request $request)
    {
        $data['community'] = Community::where("country_id", $request->country_id)
        ->get(["name", "id"]);

        return response()->json($data);
    }

    public function getProvinces(Request $request)
    {
        $data['provinces'] = Province::where("community_id", $request->community_id)
        ->get(["name", "id"]);

        return response()->json($data);
    }

    public function getCities(Request $request)
    {
        $data['cities'] = City::where("province_id", $request->province_id)
        ->get(["name", "id"]);

        return response()->json($data);
    }
}
