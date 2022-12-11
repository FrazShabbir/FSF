<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
// use Valida
// Models
use App\Models\Province;
use App\Models\Community;
use App\Models\City;
use App\Models\Application;
use App\Models\ApplicationComment;
use App\Models\User;
use App\Models\Country;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if(User::where('id',$request->user_id)->where('api_token',$request->api_token)->first()){
            $applications = Application::where('user_id',$request->user_id)->get(['id','application_id','passport_number','full_name','status']);
            return response()->json([
                'status' => 200,
                'message' => 'All Applications Fetched',
                'applications' => $applications,
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'User Not Found',
            ], 404);
        }
    }

    public function create(Request $request)
    {
        if (User::where('id', $request->user_id)->where('api_token', $request->api_token)->first()) {
            $countries = Country::all();
            return response()->json([
                'status' => 200,
                'message' => 'All Countries Fetched',
                'countries' => $countries,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User Not Found',
            ], 404);
        }
    }

    public function renew(Request $request)
    {
        if (User::where('id', $request->user_id)->where('api_token', $request->api_token)->first()) {
            $application = Application::where('application_id', $request->application_id)->first();
            if ($application) {
                if ($application->user_id != $request->user_id) {
                    return response()->json([
                        'status' => 403,
                        'message' => 'Unauthorized Access',
                    ], 403);
                }
                $countries = Country::all();
                return response()->json([
                    'status'=>'200',
                    'countries' => $countries,
                    'application'=>$application,
                    'message'=>'Application Fetched',
                ]);
            } else {
                return response()->json([
                    'status'=>'404',
                    'message'=>'Application Not Found',
                ]);
            }
        } else {
            return response()->json([
                'status'=>'404',
                'message'=>'User Not Found',
            ]);
        }
    }
    public function storeRenewApplication(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $validateApplicationRequest = Validator::make(
                $request->all(),
                [
                    'api_token' => 'required',
                    'user_id' => 'required',
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
                    'country_id'=>'required',
                    'community_id'=>'required',
                    'province_id'=>'required',
                    'city_id'=>'required',
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
                ]
            );

            if ($validateApplicationRequest->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateApplicationRequest->errors()
                ], 401);
            } else {
                $user = User::where('id', $request->user_id)->where('api_token', $request->api_token)->first();
                if (!$user) {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Invalid Request',
                    ], 404);
                }
                $application = Application::where('application_id', $request->application_id)->first();
                if (!$application) {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Application Not found.',
                    ], 404);
                }
                $application->passport_number = $request->passport_number;
                $application->nie = $request->nie;
                $application->native_id = $request->native_id;
                $application->full_name = $request->full_name;
                $application->father_name = $request->father_name;
                $application->surname = $request->surname;
                $application->gender=$request->gender;
                $application->phone=$request->phone;
                $application->dob=$request->dob;
                $application->native_country=$request->native_country;
                $application->native_country_address=$request->native_country_address;
                $application->country_id=$request->country_id;

                $application->community_id=$request->community_id;
                $application->province_id=$request->province_id;
                $application->city_id=$request->city_id;
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
                $application->rep_confirmed=$request->rep_confirmed;

                $application->buried_location=$request->buried_location;


                $application->registered_relatives=$request->registered_relatives;
                $application->registered_relative_passport_no=$request->registered_relative_passport_no;
                $application->annually_fund_amount=$request->annually_fund_amount;
                $application->declaration_confirm=$request->declaration_confirm;
                $application->status='PENDING';
                if ($request->avatar) {
                    $avatarValidator = Validator::make(
                        $request->all(),
                        [
                            'avatar' => 'requred|mimes:png,jpg,jpeg',]
                    );
                    if ($avatarValidator->fails()) {
                        DB::rollback();
                        return response()->json([
                            'status' => false,
                            'message' => 'validation error',
                            'errors' => $avatarValidator->errors()
                        ], 401);
                    }
                    $file = $request->avatar;
                    $extension = $file->getClientOriginalExtension();
                    $filename = getRandomString().'-'.time() . '.' . $extension;
                    $file->move('uploads/application/avatars/', $filename);
                    $application->avatar= env('APP_URL.url').'uploads/application/avatars/'. $filename;
                }

                $application->save();
                $comment = new ApplicationComment();
                $comment->application_id = $application->id;
                $comment->comment = 'Application Submitted for Renewal.';
                $comment->status = 'PENDING';
                $comment->save();

                $applicationRenewal = RenewApplication::create([
                    'application_id' => $application->id,
                    'annually_fund_amount' => $user->id,

                    'declaration_confirm' => $request->declaration_confirm,
                ]);

                if ($request->user_signature) {
                    $avatarValidator = Validator::make(
                        $request->all(),
                        [
                            'user_signature' => 'required|mimes:png,jpg,jpeg',]
                    );
                    if ($avatarValidator->fails()) {
                        DB::rollback();
                        return response()->json([
                            'status' => 401,
                            'message' => 'validation error',
                            'errors' => $avatarValidator->errors()
                        ], 401);
                    }

                    $file = $request->user_signature;
                    $extension = $file->getClientOriginalExtension();
                    $filename = getRandomString().'-'.time() . '.' . $extension;
                    $file->move('uploads/application/signatures/', $filename);
                    $applicationRenewal->user_signature= env('APP_URL.url').'uploads/application/signatures/'. $filename;
                    $applicationRenewal->save();
                }
                $application->save();
                DB::commit();
                return response()->json([
                    'status' => 200,
                    'message' => 'Application Submitted Successfully.',
                    'data' => $application
                ], 200);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function getCommunities(Request $request)
    {
        $communities = Community::where('country_id', $request->country_id)->get();

        if ($communities->count()>0) {
            return response()->json([
                'status' => 200,
                'total_communities' => $communities->count(),
                'message' => 'All communities fetched.',
                'communities' => $communities
            ], 200);
        } elseif ($cities->count()==0) {
            return response()->json([
                'status' => 404,
                'message' => 'No communities Found',
                'communities' => $communities,
                'total_communities'=>$communities->count(),
            ], 404);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong',
            ], 500);
        }
    }

    public function getCities(Request $request)
    {
        $cities = City::where('province_id', $request->province_id)->get();
        if ($cities->count()>0) {
            return response()->json([
                'status' => 200,
                'total_cities'=>$cities->count(),
                'message' => 'All Cities fetched.',
                'cities' => $cities
            ], 200);
        } elseif ($cities->count()==0) {
            return response()->json([
                'status' => 404,
                'message' => 'No Cities Found',
                'cities' => $cities,
                'total_cities'=>$cities->count(),
            ], 404);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong',
            ], 500);
        }
    }


    public function getProvinces(Request $request)
    {
        $provinces = Province::where('community_id', $request->community_id)->get();
        if ($provinces->count()>0) {
            return response()->json([
                'status' => true,
                'total_provinces'=>$provinces->count(),
                'message' => 'All Provinces fetched.',
                'provinces' => $provinces
            ], 200);
        } elseif ($provinces->count()==0) {
            return response()->json([
                'status' => 404,
                'message' => 'No provinces Found',
                'provinces' => $provinces,
                'total_cities'=>$provinces->count(),
            ], 404);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong',
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validateApplicationRequest = Validator::make(
                $request->all(),
                [
                    'api_token' => 'required',
                    'user_id' => 'required',
                    'passport_number' => 'required|unique:applications',
                    'nie' => 'required',
                    'native_id'=>'required',
                    'full_name'=>'required',
                    'father_name'=>'required',
                    'surname'=>'required',
                    'gender'=>'required',
                    'phone'=>'required',
                    'email'=>'required|unique:applications',
                    'dob'=>'required',
                    'native_country'=>'required',
                    'native_country_address'=>'required',
                    'country_id'=>'required',
                    'community_id'=>'required',
                    'province_id'=>'required',
                    'city_id'=>'required',
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
                ]
            );

            if ($validateApplicationRequest->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateApplicationRequest->errors()
                ], 401);
            } else {
                $user = User::where('id', $request->user_id)->where('api_token', $request->api_token)->first();
                if (!$user) {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Invalid Request',
                    ], 404);
                }

                DB::beginTransaction();
                $application = new Application();
                $application->application_id= 'M-App-'.date('YmdHis');
                $application->user_id = $request->user_id;
                $application->passport_number = $request->passport_number;
                $application->nie = $request->nie;
                $application->email = $request->email;
                $application->native_id = $request->native_id;
                $application->full_name = $request->full_name;
                $application->father_name = $request->father_name;
                $application->surname = $request->surname;
                $application->gender=$request->gender;
                $application->phone=$request->phone;
                $application->dob=$request->dob;
                $application->native_country=$request->native_country;
                $application->native_country_address=$request->native_country_address;
                $application->country_id=$request->country_id;

                $application->community_id=$request->community_id;
                $application->province_id=$request->province_id;
                $application->city_id=$request->city_id;
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
                $application->rep_confirmed=$request->rep_confirmed??1;

                $application->buried_location=$request->buried_location;


                $application->registered_relatives=$request->registered_relatives;
                $application->registered_relative_passport_no=$request->registered_relative_passport_no;
                $application->annually_fund_amount=$request->annually_fund_amount;
                $application->declaration_confirm=$request->declaration_confirm??1;

                if ($request->user_signature) {
                    $avatarValidator = Validator::make(
                        $request->all(),
                        [
                            'user_signature' => 'required|mimes:png,jpg,jpeg',]
                    );
                    if ($avatarValidator->fails()) {
                        DB::rollback();
                        return response()->json([
                            'status' => 401,
                            'message' => 'validation error',
                            'errors' => $avatarValidator->errors()
                        ], 401);
                    }

                    $file = $request->user_signature;
                    $extension = $file->getClientOriginalExtension();
                    $filename = getRandomString().'-'.time() . '.' . $extension;
                    $file->move('uploads/application/signatures/', $filename);
                    $application->user_signature= env('APP_URL.url').'uploads/application/signatures/'. $filename;
                }

                if ($request->avatar) {
                    $avatarValidator = Validator::make(
                        $request->all(),
                        [
                            'avatar' => 'required|mimes:png,jpg,jpeg',]
                    );
                    if ($avatarValidator->fails()) {
                        DB::rollback();
                        return response()->json([
                            'status' => false,
                            'message' => 'validation error',
                            'errors' => $avatarValidator->errors()
                        ], 401);
                    }
                    $file = $request->avatar;
                    $extension = $file->getClientOriginalExtension();
                    $filename = getRandomString().'-'.time() . '.' . $extension;
                    $file->move('uploads/application/avatars/', $filename);
                    $application->avatar= env('APP_URL.url').'uploads/application/avatars/'. $filename;
                }

                $application->save();
                $comment = new ApplicationComment();
                $comment->application_id = $application->id;
                $comment->comment = 'Application Submitted Successfully';
                $comment->status = 'SUBMITTED';
                $comment->save();
                DB::commit();
                return response()->json([
                    'status' => true,
                    'message' => 'Application created successfully',
                    'application' => $application
                ], 200);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
        // return json_encode($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $user_id, $token)
    {
        $user = User::where('id', $user_id)->where('api_token', $token)->get();
        if ($user->count()>0) {
            $user = User::where('id', $user_id)->where('api_token', $token)->first();
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid Request',
            ], 404);
        }

        $application = Application::with('comments')->where('application_id', $id)->where('user_id', $user->id)->get();

        if ($application->count()>0) {
            $application = Application::with('comments')->where('application_id', $id)->where('user_id', $user->id)->first();
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Application Not Found',
            ], 404);
        }
        if ($application) {
            return response()->json([
                'status' => true,
                'message' => 'Application found',
                'comments'=>$application->comments,
                'application' => [
                    'application_id' => $application->application_id,
                    'user_id' => $application->user_id,
                    'passport_number' => $application->passport_number,
                    'nie' => $application->nie,
                    'native_id' => $application->native_id,
                    'full_name' => $application->full_name,
                    'father_name' => $application->father_name,
                    'surname' => $application->surname,
                    'gender'=>$application->gender,
                    'phone'=>$application->phone,
                    'dob'=>$application->dob,
                    'native_country'=>$application->native_country,
                    'native_country_address'=>$application->native_country_address,
                    'country'=>[
                        'id'=>$application->country->id,
                        'name'=>$application->country->name
                    ],
                    'community'=>[
                                'id'=>$application->community->id,
                                'name'=>$application->community->name
                    ],
                    'province'=>[
                        'id'=>$application->province->id,
                        'name'=>$application->province->name
                    ],
                    'city'=>[
                        'id'=>$application->city->id,
                        'name'=>$application->city->name
                    ],
                    'area'=>$application->area,

                    's_relative_1_name'=>$application->s_relative_1_name,
                    's_relative_1_relation'=>$application->s_relative_1_relation,
                    's_relative_1_phone'=>$application->s_relative_1_phone,
                    's_relative_1_address'=>$application->s_relative_1_address,

                    's_relative_2_name'=>$application->s_relative_2_name,
                    's_relative_2_relation'=>$application->s_relative_2_relation,
                    's_relative_2_phone'=>$application->s_relative_2_phone,
                    's_relative_2_address'=>$application->s_relative_2_address,


                    'n_relative_1_name'=>$application->n_relative_1_name,
                    'n_relative_1_relation'=>$application->n_relative_1_relation,
                    'n_relative_1_phone'=>$application->n_relative_1_phone,
                    'n_relative_1_address'=>$application->n_relative_1_address,

                    'n_relative_2_name'=>$application->n_relative_2_name,
                    'n_relative_2_relation'=>$application->n_relative_2_relation,
                    'n_relative_2_phone'=>$application->n_relative_2_phone,
                    'n_relative_2_address'=>$application->n_relative_2_address,



                    'rep_name'=>$application->rep_name,
                    'rep_surname'=>$application->rep_surname,
                    'rep_passport_no'=>$application->rep_passport_no,
                    'rep_phone'=>$application->rep_phone,
                    'rep_address'=>$application->rep_address,
                    'rep_confirmed'=>$application->rep_confirmed==1 ? 'Yes' : 'No',
                    'buried_location'=>$application->buried_location,


                    'registered_relatives'=>$application->registered_relatives==1 ? 'Yes' : 'No',
                    'registered_relative_passport_no'=>$application->registered_relative_passport_no,
                    'annually_fund_amount'=>$application->annually_fund_amount,
                    'user_signature'=>$application->user_signature,
                    // 'declaration_confirm'=>$application->declaration_confirm,
                    'status'=>$application->status,

                ]
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Application not found',
                'application' => null
                ], 404);
        }
    }

    public function edit(Request $request)
    {
        $user = User::where('id', $request->user_id)->where('api_token', $request->api_token)->get();
        if ($user->count()>0) {
            $user = User::where('id', $request->user_id)->where('api_token', $request->api_token)->first();
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid Request',
            ], 404);
        }

        $application = Application::where('application_id', $request->application_id)->where('user_id', $user->id)->get();
        if ($application->count()>0) {
            $application = Application::with('comments')->where('application_id', $request->application_id)->where('user_id', $user->id)->first();
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Application Not Found',
            ], 404);
        }

        if ($application) {
            $countries = Country::all();
            return response()->json([
                'status' => true,
                'countries' => $countries,
                'message' => 'Application found',
                'application' => $application
                ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Application not found',
                'application' => null
                ], 404);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validateApplicationRequest = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'passport_number' => 'required',
                'application_id'=>'required',
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

                'country_id'=>'required',
                'community_id'=>'required',
                'province_id'=>'required',
                'city_id'=>'required',
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
            ]
        );

        if ($validateApplicationRequest->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateApplicationRequest->errors()
            ], 401);
        } else {
            try {
                DB::beginTransaction();
                $user = User::where('id', $request->user_id)->where('api_token', $request->api_token)->get();
                if ($user->count()>0) {
                    $user = User::where('id', $request->user_id)->where('api_token', $request->api_token)->first();
                } else {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Invalid Request',
                    ], 404);
                }

                $application = Application::where('application_id', $request->application_id)->where('user_id', $user->id)->get();
                if ($application->count()>0) {
                    $application = Application::with('comments')->where('application_id', $request->application_id)->where('user_id', $user->id)->first();
                } else {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Application Not Found',
                    ], 404);
                }
                if ($application) {
                    $application->passport_number = $request->passport_number;
                    $application->nie = $request->nie;
                    // $application->email = $request->email;
                    $application->native_id = $request->native_id;
                    $application->full_name = $request->full_name;
                    $application->father_name = $request->father_name;
                    $application->surname = $request->surname;
                    $application->gender=$request->gender;
                    $application->phone=$request->phone;
                    $application->dob=$request->dob;
                    $application->native_country=$request->native_country;
                    $application->native_country_address=$request->native_country_address;
                    $application->country_id=$request->country_id;

                    $application->community_id=$request->community_id;
                    $application->province_id=$request->province_id;
                    $application->city_id=$request->city_id;
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
                    $application->rep_confirmed=$request->rep_confirmed;

                    $application->buried_location=$request->buried_location;

                    $application->registered_relatives=$request->registered_relatives;
                    $application->registered_relative_passport_no=$request->registered_relative_passport_no;
                    $application->annually_fund_amount=$request->annually_fund_amount;
                    $application->declaration_confirm=$request->declaration_confirm;
                    $application->status='PENDING';

                    if ($request->user_signature) {
                        $avatarValidator = Validator::make(
                            $request->all(),
                            [
                                'user_signature' => 'required|mimes:png,jpg,jpeg',]
                        );
                        if ($avatarValidator->fails()) {
                            DB::rollback();
                            return response()->json([
                                'status' => 401,
                                'message' => 'validation error',
                                'errors' => $avatarValidator->errors()
                            ], 401);
                        }

                        $file = $request->user_signature;
                        $extension = $file->getClientOriginalExtension();
                        $filename = getRandomString().'-'.time() . '.' . $extension;
                        $file->move('uploads/application/signatures/', $filename);
                        $application->user_signature= env('APP_URL.url').'uploads/application/signatures/'. $filename;
                    }

                    if ($request->avatar) {
                        $avatarValidator = Validator::make(
                            $request->all(),
                            [
                                'avatar' => 'required|mimes:png,jpg,jpeg',]
                        );
                        if ($avatarValidator->fails()) {
                            DB::rollback();
                            return response()->json([
                                'status' => 401,
                                'message' => 'validation error',
                                'errors' => $avatarValidator->errors()
                            ], 401);
                        }
                        $file = $request->avatar;
                        $extension = $file->getClientOriginalExtension();
                        $filename = getRandomString().'-'.time() . '.' . $extension;
                        $file->move('uploads/application/avatars/', $filename);
                        $application->avatar= env('APP_URL.url').'uploads/application/avatars/'. $filename;
                    }

                    $application->save();
                    DB::commit();
                    return response()->json([
                        'status' => 200,
                        'message' => 'Application updated successfully',
                        'application' => $application
                    ], 200);
                }
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollback();
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong',
                    'error' => $th->getMessage().'dsdsds'
                ], 500);
            }
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






    public function passportInfo($id, $user_id, $token)
    {
        $user = User::where('id', $user_id)->where('api_token', $token)->get();
        if ($user->count()>0) {
            $user = User::where('id', $user_id)->where('api_token', $token)->first();
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid Request',
            ], 404);
        }

        $application = Application::where('passport_number', $id)->get();

        if ($application->count()>0) {
            $application = Application::where('passport_number', $id)->first();
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Passport Not Found',
            ], 404);
        }
        if ($application) {
            return response()->json([
                'status' => 200,
                'message' => 'Passport Found',
                'user' => [
                    'full_name' => $application->full_name,
                    'father_name' => $application->father_name,
                    'surname' => $application->surname,
                    'address'=>$application->area.','.$application->city->name.','.$application->province->name.','.$application->community->name.','.$application->country->name
                ]
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Passport not found',
                'user' => null
                ], 404);
        }
    }
}
