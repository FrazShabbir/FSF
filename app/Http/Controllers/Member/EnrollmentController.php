<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\ApplicationComment;
use App\Models\Country;
use App\Models\Community;
use App\Models\Province;
use App\Models\RenewApplication;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;
use Twilio\Rest\Client;
use Carbon\Carbon;
use App\Service\Twilio\PhoneNumberLookupService;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::where('user_id', auth()->user()->id)->get();
        return view('members.pages.application.index')
        ->with('applications', $applications);
        // $application = Application::where('user_id', auth()->user()->id)->first();
        // if ($application) {
        //     return redirect()->route('enrollment.show', $application->application_id);
        // } else {
        //     return redirect()->route('enrollment.create');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        return view('members.pages.application.create')
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

        // dd($request->all());
        $request->validate([
         'passport_number' => 'required',
         'nie' => 'required',
         'email' => 'required',
         'native_id'=>'required',
         'full_name'=>'required',
         'father_name'=>'required',
         'surname'=>'required',
         'gender'=>'required',
         'phone' => ['required'],
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
         'user_signature'=>'required',
         'declaration_confirm'=>'required',
        ]);


        try {
            //code...
            DB::beginTransaction();

            $phone = $request->phone;
            $rep_phone = $request->rep_phone;
            $s_relative_1_phone = $request->s_relative_1_phone;
            $s_relative_2_phone = $request->s_relative_2_phone;
            $n_relative_1_phone = $request->n_relative_1_phone;
            $n_relative_2_phone = $request->n_relative_2_phone;

            if (substr($request->phone, 0, 1) != '+') {
                $phone = '+'.$request->phone;

            }
            if (substr($request->rep_phone, 0, 1) != '+') {
                $rep_phone = '+'.$request->rep_phone;

            }
            if (substr($request->s_relative_1_phone, 0, 1) != '+') {
                $s_relative_1_phone = '+'.$request->s_relative_1_phone;

            }
            if (substr($request->s_relative_2_phone, 0, 1) != '+') {
                $s_relative_2_phone = '+'.$request->s_relative_2_phone;

            }
            if (substr($request->n_relative_1_phone, 0, 1) != '+') {
                $n_relative_1_phone = '+'.$request->n_relative_1_phone;

            }
            if (substr($request->n_relative_2_phone, 0, 1) != '+') {
                $n_relative_2_phone = '+'.$request->n_relative_2_phone;

            }

            $application = new Application();
            $application->application_id= 'U-'.rand(11, 99).'-'.rand(111, 999).'-'.rand(11, 99);
            $application->user_id = auth()->user()->id;
            $application->passport_number = $request->passport_number;
            $application->nie = $request->nie;
            $application->email = $request->email;
            $application->native_id = $request->native_id;
            $application->full_name = $request->full_name;
            $application->father_name = $request->father_name;
            $application->surname = $request->surname;
            $application->gender=$request->gender;
            $application->phone=$phone;
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
            $application->s_relative_1_phone=$s_relative_1_phone;
            $application->s_relative_1_address=$request->s_relative_1_address;

            $application->s_relative_2_name=$request->s_relative_2_name;
            $application->s_relative_2_relation=$request->s_relative_2_relation;
            $application->s_relative_2_phone=$s_relative_2_phone;
            $application->s_relative_2_address=$request->s_relative_2_address;


            $application->n_relative_1_name=$request->n_relative_1_name;
            $application->n_relative_1_relation=$request->n_relative_1_relation;
            $application->n_relative_1_phone=$n_relative_1_phone;
            $application->n_relative_1_address=$request->n_relative_1_address;

            $application->n_relative_2_name=$request->n_relative_2_name;
            $application->n_relative_2_relation=$request->n_relative_2_relation;
            $application->n_relative_2_phone=$n_relative_2_phone;
            $application->n_relative_2_address=$request->n_relative_2_address;



            $application->rep_name=$request->rep_name;
            $application->rep_surname=$request->rep_surname;
            $application->rep_passport_no=$request->rep_passport_no;
            $application->rep_phone=$rep_phone;
            $application->rep_address=$request->rep_address;
            $application->rep_confirmed=$request->rep_confirmed??1;

            $application->buried_location=$request->buried_location;


            $application->registered_relatives=$request->registered_relatives;
            $application->registered_relative_passport_no=$request->registered_relative_passport_no;
            $application->annually_fund_amount=$request->annually_fund_amount;
            $application->declaration_confirm=$request->declaration_confirm??1;
            $application->user_signature=$request->user_signature;
            $application->status='PENDING';

            // if ($request->user_signature) {
        //     $request->validate([
        //         'user_signature' => 'required|mimes:png,jpg,jpeg'
        //     ]);
        //     $file = $request->user_signature;
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = getRandomString().'-'.time() . '.' . $extension;
        //     $file->move('uploads/application/signatures/', $filename);
        //     $application->user_signature= env('APP_URL').'uploads/application/signatures/'. $filename;
            // }


            if ($request->avatar) {
                $request->validate([

                    'avatar' => 'required|mimes:png,jpg,jpeg'
                ]);
                $file = $request->avatar;
                $extension = $file->getClientOriginalExtension();
                $filename = getRandomString().'-'.time() . '.' . $extension;
                $file->move('uploads/application/avatars/', $filename);
                $application->avatar= env('APP_URL').'uploads/application/avatars/'. $filename;
            }

            $application->save();
            $comment = new ApplicationComment();
            $comment->application_id = $application->id;
            $comment->comment = 'Application Submitted Successfully';
            $comment->status = $application->status;
            $comment->receiver_id = $application->user_id;

            $comment->save();


            $applicationRenewal = RenewApplication::create([
                'application_id' => $application->id,
                'annually_fund_amount' =>$request->annually_fund_amount,
                'user_signature' => $application->user_signature,
                'rep_confirmed' => $request->rep_confirmed??1,
                'declaration_confirm' => $request->declaration_confirm??1,
                'renewal_date' => Carbon::now()->addDays(365)->format('Y-m-d'),
            ]);

            DB::commit();

            $applicant_message = 'Dear ' . $application->full_name . ', Your Application has been submitted successfully with Application ID  ' . $application->application_id . '. You will be notified once your application is approved.';
            $rep_messsage = 'Dear ' . $application->rep_name . ' ' . $application->rep_surname . ', Your Relative  ' . $application->full_name. ' has choosen you as his representative at '.env('APP_NAME').' with  Application ID  ' . $application->application_id . '.';


            SendMessage($application->phone,$applicant_message);
            SendMessage($application->rep_phone,$rep_messsage);

            alert()->success('Application Submitted Successfully');
            return redirect()->route('enrollment.show', $application->application_id);
        } catch (\Throwable $th) {
            DB::rollback();
            // dd($th->getMessage());
            alert()->error('Error', $th->getMessage());
            return redirect()->back();
            //throw $th;
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
        $application = Application::where('application_id', $id)->firstOrfail();
        return view('members.pages.application.show')
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
        $countries = Country::where('status', 1)->get();

        $application = Application::where('application_id', $id)->firstOrfail();

        if ($application->user_id != Auth::user()->id) {
            alert()->error('Unauthorized Access', 'You are not authorized to edit this application');
            return redirect()->back();
        }
        if($application->status!='PENDING'){
            alert()->info('Info', 'This application is not in EDITABLE state');
            return redirect()->back();
        }

        return view('members.pages.application.edit')
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


        $request->validate([
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
            'user_signature'=>'required',
            'declaration_confirm'=>'required',
           ]);


        try {
            //code...
            DB::beginTransaction();

            $phone = $request->phone;
            $rep_phone = $request->rep_phone;
            $s_relative_1_phone = $request->s_relative_1_phone;
            $s_relative_2_phone = $request->s_relative_2_phone;
            $n_relative_1_phone = $request->n_relative_1_phone;
            $n_relative_2_phone = $request->n_relative_2_phone;

            if (substr($request->phone, 0, 1) != '+') {
                $phone = '+'.$request->phone;

            }
            if (substr($request->rep_phone, 0, 1) != '+') {
                $rep_phone = '+'.$request->rep_phone;

            }
            if (substr($request->s_relative_1_phone, 0, 1) != '+') {
                $s_relative_1_phone = '+'.$request->s_relative_1_phone;

            }
            if (substr($request->s_relative_2_phone, 0, 1) != '+') {
                $s_relative_2_phone = '+'.$request->s_relative_2_phone;

            }
            if (substr($request->n_relative_1_phone, 0, 1) != '+') {
                $n_relative_1_phone = '+'.$request->n_relative_1_phone;

            }
            if (substr($request->n_relative_2_phone, 0, 1) != '+') {
                $n_relative_2_phone = '+'.$request->n_relative_2_phone;

            }

            $application = Application::where('application_id', $id)->firstOrfail();

            if ($application->user_id != Auth::user()->id) {
                alert()->error('Unauthorized Access', 'You are not authorized to edit this application');
                return redirect()->back();
            }

            if($application->status!='PENDING'){
                alert()->info('Info', 'This application is not in EDITABLE state');
                return redirect()->back();
            }

            $old_rep_name = $application->rep_name;
            $old_rep_phone = $application->rep_phone;

            $application->passport_number = $request->passport_number;
            $application->nie = $request->nie;
            $application->native_id = $request->native_id;
            $application->full_name = $request->full_name;
            $application->father_name = $request->father_name;
            $application->surname = $request->surname;
            $application->gender=$request->gender;
            $application->phone=$phone;
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
            $application->s_relative_1_phone=$s_relative_1_phone;
            $application->s_relative_1_address=$request->s_relative_1_address;

            $application->s_relative_2_name=$request->s_relative_2_name;
            $application->s_relative_2_relation=$request->s_relative_2_relation;
            $application->s_relative_2_phone=$s_relative_2_phone;
            $application->s_relative_2_address=$request->s_relative_2_address;


            $application->n_relative_1_name=$request->n_relative_1_name;
            $application->n_relative_1_relation=$request->n_relative_1_relation;
            $application->n_relative_1_phone=$n_relative_1_phone;
            $application->n_relative_1_address=$request->n_relative_1_address;

            $application->n_relative_2_name=$request->n_relative_2_name;
            $application->n_relative_2_relation=$request->n_relative_2_relation;
            $application->n_relative_2_phone=$n_relative_2_phone;
            $application->n_relative_2_address=$request->n_relative_2_address;



            $application->rep_name=$request->rep_name;
            $application->rep_surname=$request->rep_surname;
            $application->rep_passport_no=$request->rep_passport_no;
            $application->rep_phone=$rep_phone;
            $application->rep_address=$request->rep_address;
            $application->rep_confirmed=$request->rep_confirmed??1;

            $application->buried_location=$request->buried_location;


            $application->registered_relatives=$request->registered_relatives;
            $application->registered_relative_passport_no=$request->registered_relative_passport_no;
            $application->annually_fund_amount=$request->annually_fund_amount;
            $application->declaration_confirm=$request->declaration_confirm??1;
            $application->user_signature=$request->user_signature;

            // if ($request->user_signature) {
        //     $request->validate([
        //         'user_signature' => 'required|mimes:png,jpg,jpeg'
        //     ]);
        //     $file = $request->user_signature;
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = getRandomString().'-'.time() . '.' . $extension;
        //     $file->move('uploads/application/signatures/', $filename);
        //     $application->user_signature= env('APP_URL').'uploads/application/signatures/'. $filename;
            // }


            if ($request->avatar) {
                $request->validate([

                    'avatar' => 'required|mimes:png,jpg,jpeg'
                ]);
                $file = $request->avatar;
                $extension = $file->getClientOriginalExtension();
                $filename = getRandomString().'-'.time() . '.' . $extension;
                $file->move('uploads/application/avatars/', $filename);
                $application->avatar= env('APP_URL').'uploads/application/avatars/'. $filename;
            }

            $application->save();
            $comment = new ApplicationComment();
            $comment->application_id = $application->id;
            $comment->comment = 'Application Submitted for Update';
            $comment->status = 'UPDATED';
            $comment->receiver_id = $application->user_id;

            $comment->save();
            DB::commit();

            $applicant_message = 'Dear ' . $application->full_name . ', Your Application has been updated and submitted successfully with Application ID  ' . $application->application_id . '. You will be notified once your application is approved.';
            $rep_messsage = 'Dear ' . $application->rep_name . ' ' . $application->rep_surname . ', Your Relative  ' . $application->full_name. ' has choosen you as his representative at '.env('APP_NAME').' with  Application ID  ' . $application->application_id . '.';

            SendMessage($application->phone,$applicant_message);
            if($application->rep_phone != $old_rep_phone and $old_rep_name != $application->rep_name){
                SendMessage($application->rep_phone,$rep_messsage);
            }

            alert()->success('Application Submitted Successfully');
            return redirect()->route('enrollment.index');
        } catch (\Throwable $th) {
            DB::rollback();

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

    public function renewableIndex()
    {
        $applications = Application::where('user_id',auth()->user()->id)->where('status', 'RENEWABLE')->get();
        return view('members.pages.application.renew.index')
        ->with('applications', $applications);
    }
    public function renewableEdit($id)
    {
        $countries = Country::where('status', 1)->get();

        $application = Application::where('application_id', $id)->firstOrfail();

        if ($application->user_id != Auth::user()->id) {
            alert()->error('Unauthorized Access', 'You are not authorized to edit this application');
            return redirect()->back();
        }


        if($application->status!='RENEWABLE'){
            alert()->error('Error', 'This application is not in EDITABLE state');
            return redirect()->back();
        }

        return view('members.pages.application.renew.edit')
        ->with('application', $application)
        ->with('countries', $countries);
    }
    public function renewableUpdate(Request $request, $id)
    {
        $request->validate([
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
            'user_signature'=>'required',
            'declaration_confirm'=>'required',
           ]);


        try {
            //code...
            DB::beginTransaction();

            $phone = $request->phone;
            $rep_phone = $request->rep_phone;
            $s_relative_1_phone = $request->s_relative_1_phone;
            $s_relative_2_phone = $request->s_relative_2_phone;
            $n_relative_1_phone = $request->n_relative_1_phone;
            $n_relative_2_phone = $request->n_relative_2_phone;

            if (substr($request->phone, 0, 1) != '+') {
                $phone = '+'.$request->phone;

            }
            if (substr($request->rep_phone, 0, 1) != '+') {
                $rep_phone = '+'.$request->rep_phone;

            }
            if (substr($request->s_relative_1_phone, 0, 1) != '+') {
                $s_relative_1_phone = '+'.$request->s_relative_1_phone;

            }
            if (substr($request->s_relative_2_phone, 0, 1) != '+') {
                $s_relative_2_phone = '+'.$request->s_relative_2_phone;

            }
            if (substr($request->n_relative_1_phone, 0, 1) != '+') {
                $n_relative_1_phone = '+'.$request->n_relative_1_phone;

            }
            if (substr($request->n_relative_2_phone, 0, 1) != '+') {
                $n_relative_2_phone = '+'.$request->n_relative_2_phone;

            }

            $application = Application::where('application_id', $id)->firstOrfail();
            if ($application->user_id != Auth::user()->id) {
                alert()->error('Unauthorized Access', 'You are not authorized to edit this application');
                return redirect()->back();
            }
            if($application->status!='RENEWABLE'){
                alert()->info('Info', 'This application is not in EDITABLE state');
                return redirect()->back();
            }

            $application->passport_number = $request->passport_number;
            $application->nie = $request->nie;
            $application->native_id = $request->native_id;
            $application->full_name = $request->full_name;
            $application->father_name = $request->father_name;
            $application->surname = $request->surname;
            $application->gender=$request->gender;
            $application->phone=$phone;
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
            $application->s_relative_1_phone=$s_relative_1_phone;
            $application->s_relative_1_address=$request->s_relative_1_address;

            $application->s_relative_2_name=$request->s_relative_2_name;
            $application->s_relative_2_relation=$request->s_relative_2_relation;
            $application->s_relative_2_phone=$s_relative_2_phone;
            $application->s_relative_2_address=$request->s_relative_2_address;


            $application->n_relative_1_name=$request->n_relative_1_name;
            $application->n_relative_1_relation=$request->n_relative_1_relation;
            $application->n_relative_1_phone=$n_relative_1_phone;
            $application->n_relative_1_address=$request->n_relative_1_address;

            $application->n_relative_2_name=$request->n_relative_2_name;
            $application->n_relative_2_relation=$request->n_relative_2_relation;
            $application->n_relative_2_phone=$n_relative_2_phone;
            $application->n_relative_2_address=$request->n_relative_2_address;



            $application->rep_name=$request->rep_name;
            $application->rep_surname=$request->rep_surname;
            $application->rep_passport_no=$request->rep_passport_no;
            $application->rep_phone=$rep_phone;
            $application->rep_address=$request->rep_address;
            $application->rep_confirmed=$request->rep_confirmed??1;

            $application->buried_location=$request->buried_location;


            $application->registered_relatives=$request->registered_relatives;
            $application->registered_relative_passport_no=$request->registered_relative_passport_no;
            $application->annually_fund_amount=$request->annually_fund_amount;
            $application->declaration_confirm=$request->declaration_confirm??1;
            $application->user_signature=$request->user_signature;
            $application->status='RENEWAL-REQUESTED';

            // if ($request->user_signature) {
        //     $request->validate([
        //         'user_signature' => 'required|mimes:png,jpg,jpeg'
        //     ]);
        //     $file = $request->user_signature;
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = getRandomString().'-'.time() . '.' . $extension;
        //     $file->move('uploads/application/signatures/', $filename);
        //     $application->user_signature= env('APP_URL').'uploads/application/signatures/'. $filename;
            // }


            if ($request->avatar) {
                $request->validate([

                    'avatar' => 'required|mimes:png,jpg,jpeg'
                ]);
                $file = $request->avatar;
                $extension = $file->getClientOriginalExtension();
                $filename = getRandomString().'-'.time() . '.' . $extension;
                $file->move('uploads/application/avatars/', $filename);
                $application->avatar= env('APP_URL').'uploads/application/avatars/'. $filename;
            }

            $application->save();
            $comment = new ApplicationComment();
            $comment->application_id = $application->id;
            $comment->comment = 'Application Submitted for Renewal';
            $comment->status = 'RENEWAL-REQUESTED';
            $comment->receiver_id = $application->user_id;

            $comment->save();

            DB::commit();
            $applicant_message = 'Dear ' . $application->full_name . ', Your Application has been submitted successfully for Renewal with Application ID  ' . $application->application_id . '. You will be notified once your application is approved. You will be notified once his application is approved.';
            $rep_messsage = 'Dear ' . $application->rep_name . ' ' . $application->rep_surname . ', Your Relative  ' . $application->full_name. ' has choosen you as his representative at '.env('APP_NAME').' with  Application ID  ' . $application->application_id . '.Now he applied for Renewal of his membership. You will be notified once his application is approved.';
            SendMessage($application->phone,$applicant_message);
            SendMessage($application->rep_phone,$rep_messsage);

            alert()->success('Application Submitted Successfully for Renewal');
            return redirect()->route('enrollment.index');
        } catch (\Throwable $th) {
            DB::rollback();
            alert()->error('Error', $th->getMessage());
            return redirect()->back();
            //throw $th;
        }
    }
}
