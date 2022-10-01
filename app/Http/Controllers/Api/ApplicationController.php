<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = [];


        $arr['message'] = 'Hello';
        $arr['status'] = 'success';

        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'passport_number' => 'required',
                    'nie' => 'required',
                    'native_id'=>'',
                    'full_name'=>'',
                    'father_name'=>'',
                    'surname'=>'',
                    'gender'=>'',
                    'phone'=>'',
                    'dob'=>'',
                    'native_country'=>'',
                    'native_country_address'=>'',
                    'country'=>'',
                    'community'=>'',
                    'province'=>'',
                    'city'=>'',
                    'area'=>'',

                    's_relative_1_name'=>'',
                    's_relative_1_relation'=>'',
                    's_relative_1_phone'=>'',
                    's_relative_1_address'=>'',

                    's_relative_2_name'=>'',
                    's_relative_2_relation'=>'',
                    's_relative_2_phone'=>'',
                    's_relative_2_address'=>'',

                    'n_relative_1_name'=>'',
                    'n_relative_1_relation'=>'',
                    'n_relative_1_phone'=>'',
                    'n_relative_1_address'=>'',


                    'n_relative_2_name'=>'',
                    'n_relative_2_relation'=>'',
                    'n_relative_2_phone'=>'',
                    'n_relative_2_address'=>'',

                    'rep_name'=>'',
                    'rep_sername'=>'',
                    'rep_passport_no'=>'',
                    'rep_phone'=>'',
                    'rep_address'=>'',
                    'rep_confirmed'=>'',

                    'buried_location'=>'requried',

                    'registered_relatives'=>'requried',
                    'registered_relative_passport_no'=>'requried',
                    
                    'annually_fund_amount'=>'requried',
                    'user_signature'=>'requried',
                    'declaration_confirm'=>'requried',
                    'status'=>'requried',
                    'receiver_id'=>'requried',

                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        return json_encode($arr);
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
