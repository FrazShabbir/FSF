<?php

namespace App\Http\Controllers\Backend\Hierarchy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('backend.hierarchy.country.index')
        ->with('countries',$countries);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.hierarchy.country.create');

    
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
            'region' => 'required',
            'iso2' => 'required',
            'iso3' => 'required',
        ]);
        $country = Country::create([
            'name' => $request->name,
            'region' => $request->region,
            'iso2' => $request->iso2,
            'iso3' => $request->iso3,
        ]);
        alert()->success('Country Created Successfully');
        return redirect()->route('country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
        return view('backend.hierarchy.country.show')
        ->with('country',$country);
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
        $country = Country::find($id);
        return view('backend.hierarchy.country.edit')
        ->with('country',$country);
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
            'region' => 'required',
            'iso2' => 'required',
            'iso3' => 'required',
        ]);
        $country = Country::find($id);
        $country->name = $request->name;
        $country->region = $request->region;
        $country->iso2 = $request->iso2;
        $country->iso3 = $request->iso3;
        $country->status = $request->status;
        $country->save();
        alert()->success('Country Updated Successfully');
        return redirect()->route('country.index');

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
