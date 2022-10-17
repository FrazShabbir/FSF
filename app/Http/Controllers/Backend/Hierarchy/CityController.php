<?php

namespace App\Http\Controllers\Backend\Hierarchy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('backend.hierarchy.city.index')
        ->with('cities',$cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.hierarchy.city.create');
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
            'name' => 'required',
            'province_id' => 'required',
            'office_id' => 'required',
        ]);
        $city = City::create([
            'name' => $request->name,
            'province_id' => $request->province_id,
            'office_id' => $request->office_id,
        ]);
        alert()->success('City Created Successfully');
        return redirect()->route('city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        return view('backend.hierarchy.city.show')
        ->with('city',$city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('backend.hierarchy.city.edit')
        ->with('city',$city);
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
            'name' => 'required',
            'province_id' => 'required',
            'office_id' => 'required',
        ]);
        $city = City::find($id);
        $city->name = $request->name;
        $city->province_id = $request->province_id;
        $city->office_id = $request->office_id;
        $city->status = $request->status;
        $city->save();
        alert()->success('City Updated Successfully');
        return redirect()->route('city.index');
       
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
