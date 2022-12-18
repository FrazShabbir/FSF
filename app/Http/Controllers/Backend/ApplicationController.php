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
use App\Models\ApplicationComment;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Str;
use Carbon\Carbon;

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

    public function closedApplications()
    {
        if (! auth()->user()->hasPermissionTo('Read Applications')) {
            abort(403);
        }
        $applications = Application::where('status', 'PERMANENT-CLOSED')->get();
        return view('backend.applications.index')
        ->with('applications', $applications);
    }

    public function pendingApplications()
    {
        if (! auth()->user()->hasPermissionTo('Read Applications')) {
            abort(403);
        }
        $applications = Application::where('status', 'PENDING')->get();
        return view('backend.applications.index')
        ->with('applications', $applications);
    }

    public function approvedApplications()
    {
        if (! auth()->user()->hasPermissionTo('Read Applications')) {
            abort(403);
        }
        $applications = Application::where('status', 'APPROVED')->get();
        return view('backend.applications.index')
        ->with('applications', $applications);
    }

    public function rejectedApplications()
    {
        if (! auth()->user()->hasPermissionTo('Read Applications')) {
            abort(403);
        }
        $applications = Application::where('status', 'REJECTED')->get();
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
            'email'=>'required|email',
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
                'password'=>Hash::make($request->passport_number),
            ]);
            $user->assignRole('member');
            event(new Registered($user));

            $find_relative = Application::where('passport_number', $request->registered_relative_passport_no)->first();
            $registered = 0;
            if ($find_relative) {
                $registered = 1;
                $passport_number = $find_relative->passport_number;
            }

            $application = Application::create([
                'application_id'=>'W-'.rand(11, 99).'-'.rand(111, 999).'-'.rand(11, 99),
                'user_id'=>$user->id,
                'passport_number' => $request->passport_number,
                'nie' => $request->nie,
                'email'=>$request->email,
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
                'rep_confirmed'=>$request->rep_confirmed??'1',

                'buried_location'=>$request->buried_location,

                'registered_relatives'=>$registered,
                'registered_relative_passport_no'=>$passport_number??null,
                'annually_fund_amount'=>$request->annually_fund_amount,
                'user_signature'=>$request->user_signature??'DONE BY OPERATOR',
                'declaration_confirm'=>$request->declaration_confirm??'1',
                'renewal_date' =>Carbon::now()->addDays(365)->format('Y-m-d'),
                'avatar'=>config('app.url').'/placeholder.png',

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

            $comment = ApplicationComment::create([
                'application_id'=>$application->id,
                'comment'=>'Application submitted by'. auth()->user()->full_name,
                'status'=>'SUBMITTED',
                'receiver_id'=>auth()->user()->id,
            ]);

            $applicationRenewal = RenewApplication::create([
                'application_id' => $application->id,
                'annually_fund_amount' =>$request->annually_fund_amount,
                'user_signature' => $application->user_signature,
                'rep_confirmed' => $request->rep_confirmed??1,
                'declaration_confirm' => $request->declaration_confirm??1,
                'renewal_date' => Carbon::now()->addDays(365)->format('Y-m-d'),
            ]);

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
        $application = Application::where('application_id', $id)->firstOrFail();

        // dd(now()->diffInDays($application->renewal_date));
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
        $application = Application::where('application_id', $id)->firstOrFail();

        if ($application->status=='PERMANENT-CLOSED' or $application->status=='REJECTED') {
            alert()->error('Error', 'Application Already Closed/Rejected');
            return redirect()->back();
        }

        $countries = Country::where('status', 1)->get();

        return view('backend.applications.edit')
            ->with('application', $application)
            ->with('countries', $countries);
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
        // dd($request->all());
        $application = Application::where('application_id', $id)->firstOrFail();

        if ($application->status=='PERMANENT-CLOSED' or $application->status=='REJECTED') {
            alert()->error('Error', 'Application Already Closed/Rejected');
            return redirect()->back();
        }

        $user = User::where('id', $application->user_id)->firstOrFail();

        $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
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

            'buried_location'=>'required',

            'registered_relatives'=>'required',
            'registered_relative_passport_no'=>'nullable',

            'annually_fund_amount'=>'required',
            // 'user_signature'=>'required',
            'declaration_confirm'=>'required',
        ]);

        try {
            db::beginTransaction();

            $find_relative = Application::where('passport_number', $request->registered_relative_passport_no)->first();
            $registered = 0;
            if ($find_relative) {
                $registered = 1;
                $passport_number = $find_relative->passport_number;
            }


            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->passport_number = $request->passport_number;
            $user->save();

            $application->passport_number = $request->passport_number;
            $application->nie = $request->nie;
            $application->native_id=$request->native_id;
            $application->full_name=$request->full_name;
            $application->father_name=$request->father_name;
            $application->surname=$request->surname;

            $application->gender=$request->gender;
            $application->phone=$request->phone;
            $application->dob=$request->dob;
            $application->native_country=$request->native_country;
            $application->native_country_address=$request->native_country_address;
            $application->country_id=$request->country;

            $application->community_id=$request->community;
            $application->province_id=$request->province;
            $application->city_id=$request->city;
            $application->area=$request->area;

            $application->s_relative_1_name=$request->s_relative_1_name;
            $application->s_relative_1_relation=$request->s_relative_1_relation;
            $application->s_relative_1_phone=$request->s_relative_1_phone;
            $application->s_relative_1_address=$request->s_relative_1_address;

            $application->s_relative_2_name=$request->s_relative_2_name;
            $application->s_relative_2_relation=$request->s_relative_2_relation;
            $application->s_relative_2_phone=$request->s_relative_2_phone;
            $application->s_relative_2_address=$request->s_relative_2_address;


            $application->n_relative_1_name=$request->n_relative_1_name;
            $application->n_relative_1_relation=$request->n_relative_1_relation;
            $application->n_relative_1_phone=$request->n_relative_1_phone;
            $application->n_relative_1_address=$request->n_relative_1_address;

            $application->n_relative_2_name=$request->n_relative_2_name;
            $application->n_relative_2_relation=$request->n_relative_2_relation;
            $application->n_relative_2_phone=$request->n_relative_2_phone;
            $application->n_relative_2_address=$request->n_relative_2_address;



            $application->rep_name=$request->rep_name;
            $application->rep_surname=$request->rep_surname;
            $application->rep_passport_no=$request->rep_passport_no;
            $application->rep_phone=$request->rep_phone;
            $application->rep_address=$request->rep_address;
            $application->rep_confirmed=$request->rep_confirmed??'1';

            $application->buried_location=$request->buried_location;

            $application->registered_relatives=$registered;
            $application->registered_relative_passport_no=$passport_number??null;

            $application->annually_fund_amount=$request->annually_fund_amount;
            $application->user_signature=$request->user_signature??'DONE BY OPERATOR';
            $application->declaration_confirm=$request->declaration_confirm??'1';
            $application->save();

            $comment = ApplicationComment::create([
                'application_id'=>$application->id,
                'comment'=>'Application Edited and updated by '. auth()->user()->full_name,
                'status'=>'PENDING',
                'receiver_id'=>auth()->user()->id,
            ]);

            db::commit();
            alert()->success('Success', 'Application Updated Successfully');
            return redirect()->route('application.show', $application->application_id);
        } catch (\Throwable $th) {
            db::rollback();
            alert()->error('Error', $th->getMessage());
            return redirect()->back();
            //throw $th;
        }
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


    public function commentStore(Request $request, $id)
    {
        $request->validate([
            'comment'=>'required',
            'status'=>'required',
        ]);
        try {
            DB::beginTransaction();
            $application = Application::where('application_id', $id)->first();

            if ($application->status=='PERMANENT-CLOSED' or $application->status=='REJECTED') {
                alert()->error('Error', 'Application Already Closed/Rejected');
                return redirect()->back();
            }

            $comment = ApplicationComment::create([
                'application_id'=>$application->id,
                'comment'=>$request->comment.' by '. auth()->user()->full_name,
                'status'=>$request->status,
                'receiver_id'=>auth()->user()->id,
            ]);
            $application->status = $request->status;
            $application->save();
            DB::commit();
            alert()->success('Success', 'Comment Added Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();
            alert()->error('Error', $th->getMessage());
            return redirect()->back();
        }

        return redirect()->back();
    }



    public function closeApplication($id)
    {
        try {
            DB::beginTransaction();
            $application = Application::where('application_id', $id)->first();

            if ($application->status=='PERMANENT-CLOSED' or $application->status=='REJECTED') {
                alert()->error('Error', 'Application Already Closed/Rejected');
                return redirect()->back();
            }

            if ($application->status!='CLOSING-PROCESS') {
                $application->status = 'CLOSING-PROCESS';//'IN-CLOSING-PROCESS';
                $application->save();
                $comment = ApplicationComment::create([
                    'application_id'=>$application->id,
                    'comment'=>'Application Closing Started by '.auth()->user()->full_name.'.',
                    'status'=>'In Closing Process',
                    'receiver_id'=>auth()->user()->id,
                ]);
            }

            DB::commit();
            return view('backend.applications.closing.closing')
            ->with('application', $application);
        } catch (\Throwable $th) {
            DB::rollback();
            alert()->error('Error', $th->getMessage());
            return redirect()->route('application.index');
            //throw $th;
        }
    }

    public function cancelApplicationClosing($id)
    {
        try {
            DB::beginTransaction();
            $application = Application::where('application_id', $id)->first();

            if ($application->status=='PERMANENT-CLOSED' or $application->status=='REJECTED') {
                alert()->error('Error', 'Application Already Closed/Rejected');
                return redirect()->back();
            }

            $application->status = 'PENDING';
            $application->save();
            $comment = ApplicationComment::create([
                'application_id'=>$application->id,
                'comment'=>'Application Closing Cancelled by '.auth()->user()->full_name.'.',
                'status'=>'PENDING',
                'receiver_id'=>auth()->user()->id,
            ]);
            DB::commit();
            return redirect()->route('users.show', $application->user_id);
        } catch (\Throwable $th) {
            DB::rollback();
            alert()->error('Error', $th->getMessage());
            return redirect()->route('application.show', $application->application_id);
            //throw $th;
        }
    }

    public function closeApplicationSave(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'deceased_at' => 'required',
            'process_start_at' => 'required',
            'process_ends_at' => 'required',
            'amount_used' => 'required',
            'status' => 'required',
            'rep_received_amount' => 'required',
            'reason' => 'required'

        ]);

        try {
            DB::beginTransaction();
            // $user = User::findOrFail($id);
            // $user->status = $request->status;
            // $user->save();
            $application  = Application::where('application_id', $id)->first();
            // dd($user->totaldonations->sum('amount'));

            $application->deceased_at = $request->deceased_at;
            $application->process_start_at = $request->process_start_at;
            $application->process_ends_at = $request->process_ends_at;
            $application->total_donations = $application->totaldonations->sum('amount');
            $application->total_expense = $request->amount_used;

            $application->rep_received_amount = $request->rep_received_amount;
            $application->status = $request->status;
            $application->reason = $request->reason;
            $application->rep_received_amount = $request->rep_received_amount;
            $application->application_closed_by = Auth::user()->id;
            $application->application_closed_at= Carbon::now();

            $application->save();

            $comment = ApplicationComment::create([
                'application_id'=>$application->id,
                'comment'=>'Application Permanent Closed by '.auth()->user()->full_name.'.',
                'status'=>'PERMANENT-CLOSED',
                'receiver_id'=>auth()->user()->id,
            ]);

            // $account_transaction = AccountTransaction::create([
            //     'application_id'=>$application->id,
            //     'amount'=>$application->rep_received_amount,
            //     'type'=>'CREDIT',
            //     'status'=>'SUCCESS',
            //     'transaction_id'=>Str::random(10),
            //     'transaction_type'=>'APPLICATION-CLOSED',
            //     'transaction_date'=>Carbon::now(),
            //     'transaction_by'=>Auth::user()->id,
            // ]);

            DB::commit();

            alert()->success('Account Closed');
            return redirect()->route('users.show', $application->user_id);
            //code...
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            alert()->error('Error', $th->getMessage());
            return redirect()->back();
        }
    }




    public function addUserApplication($id)
    {
        $user = User::where('username', $id)->firstOrFail();
        $countries = Country::where('status', 1)->get();
        return view('backend.applications.user.addApplication')
        ->with('user', $user)
        ->with('countries', $countries);
    }


        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAddUserApplication(Request $request, $id)
    {
        $request->validate([
            'email'=>'required|email|unique:users,email',
            'passport_number' => 'required',
            'nie' => 'required',
            'email'=>'required|email',
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

            'buried_location'=>'required',

            'registered_relatives'=>'required',
            'registered_relative_passport_no'=>'nullable',

            'annually_fund_amount'=>'required',

            'declaration_confirm'=>'required',
        ]);

        try {
            DB::beginTransaction();
            $user = User::where('username', $id)->firstOrFail();
            $find_relative = Application::where('passport_number', $request->registered_relative_passport_no)->first();
            $registered = 0;
            if ($find_relative) {
                $registered = 1;
                $passport_number = $find_relative->passport_number;
            }
            $application = Application::create([
                'application_id'=>'W-'.rand(11, 99).'-'.rand(111, 999).'-'.rand(11, 99),
                'user_id'=>$user->id,
                'passport_number' => $request->passport_number,
                'nie' => $request->nie,
                'email'=>$request->email,
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
                'rep_confirmed'=>$request->rep_confirmed??'1',

                'buried_location'=>$request->buried_location,

                'registered_relatives'=>$registered,
                'registered_relative_passport_no'=>$passport_number??null,
                'annually_fund_amount'=>$request->annually_fund_amount,
                'user_signature'=>$request->user_signature??'DONE BY OPERATOR',
                'declaration_confirm'=>$request->declaration_confirm??'1',
                'renewal_date' =>Carbon::now()->addDays(365)->format('Y-m-d'),

                'avatar'=>config('app.url').'/placeholder.png',

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

            $comment = ApplicationComment::create([
                'application_id'=>$application->id,
                'comment'=>'Application submitted in OFFICE by'. auth()->user()->full_name.', Under the Name of'.$user->full_name.'.',
                'status'=>'SUBMITTED',
                'receiver_id'=>auth()->user()->id,
            ]);

            $applicationRenewal = RenewApplication::create([
                'application_id' => $application->id,
                'annually_fund_amount' =>$request->annually_fund_amount,
                'user_signature' => $application->user_signature,
                'rep_confirmed' => $request->rep_confirmed??1,
                'declaration_confirm' => $request->declaration_confirm??1,
                'renewal_date' => Carbon::now()->addDays(365)->format('Y-m-d'),
            ]);

            DB::commit();
            alert()->success('Success', 'Application Submitted Successfully');
            return redirect()->route('application.index');
            // return response()->json(['success'=>'Application Created Successfully']);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }



    public function applicationRenew($id)
    {
        $application = Application::where('application_id', $id)->firstOrfail();
        if ($application->status!='RENEWABLE') {
            alert()->info('Application is not Renewable right now.');
            return redirect()->back();
        }
        $countries = Country::where('status',1)->get();
        return view('backend.applications.renew.renew')
        ->with('application', $application)
        ->with('countries', $countries);
    }


    public function applicationRenewUpdate(Request $request,$id){

    }

}
