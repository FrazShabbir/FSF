<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Country;
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
        ->with('applications',$applications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('status',1)->get();
        return view('backend.applications.create')
        ->with('countries',$countries);
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
            'fullname'=>'required',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required',
            'passport_number'=>'required',
        ]);
        

        try {
            DB::beginTransaction();
            $user = User::create([
                'full_name'=>$request->full_name,
                'username'=>$request->username,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'passport_number'=>$request->passport_number,
                'status'=>'1',
                'password'=>Hash::make('12345678'),
            ]);
            $user->assignRole('member');
            event(new Registered($user));
            dd($user);

            DB::commit();
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
