<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
// use Valida
// Models
use App\Models\Province;
use App\Models\City;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "hello";
    }

    public function create()
    {
        $provinces = Province::all();

        return response()->json([
            'status' => true,
            'message' => 'Provinces Found',
            'provinces' => $provinces
        ], 200);
    }
    public function getCities(Request $request)
    {
        $arr = [];

        $cities = City::where('province_id', $request->province_id)->get();
        if ($cities->count()>0) {
            return response()->json([
                'status' => true,
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = [];
        try {
            $validateApplicationRequest = Validator::make(
                $request->all(),
                [
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
                ]
            );

            if ($validateApplicationRequest->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateApplicationRequest->errors()
                ], 401);
            } else {
                DB::beginTransaction();
                $application = new Application();
                $application->application_id= 'App-'.getRandomString(10);
                $application->user_id = $request->user_id;
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
                $application->country=$request->country;

                $application->community=$request->community;
                $application->province=$request->province;
                $application->city=$request->city;
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
                $application->user_signature=$request->user_signature;
                $application->declaration_confirm=$request->declaration_confirm;
                $application->save();
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
    public function show($id)
    {
        $application = Application::where('application_id', $id)->first();
        if ($application) {
            return response()->json([
                'status' => true,
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
    public function edit($id)
    {
        $application = Application::where('application_id', $id)->first();
        if ($application) {
            return response()->json([
                'status' => true,
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
    public function update(Request $request, $id)
    {
        $validateApplicationRequest = Validator::make(
            $request->all(),
            [
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
                $application = Application::where('application_id', $id)->first();
                if ($application) {
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
                    $application->country=$request->country;

                    $application->community=$request->community;
                    $application->province=$request->province;
                    $application->city=$request->city;
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
                    $application->user_signature=$request->user_signature;
                    $application->declaration_confirm=$request->declaration_confirm;
                    $application->status='Pending';
                    $application->save();
                    DB::commit();
                    return response()->json([
                        'status' => true,
                        'message' => 'Application updated successfully',
                        'application' => $application
                    ], 200);
                }
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollback();
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong',
                    'error' => $th
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
}
