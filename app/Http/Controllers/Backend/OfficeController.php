<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;
class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::all();
       return view('backend.hierarchy.office.index')
            ->with('offices', $offices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.hierarchy.office.create');
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
            'name'=>'required',
            'phone'=>'required',
            'office_code'=>'required|unique:offices',
            'street'=>'required',
            'area'=>'required',
            'city_id'=>'required',
            'officehead'=>'required',
            'status'=>'required',
        ]);
        Office::create([
            'name' => $request->name,
            'office_code' => $request->office_code,
            'phone' => $request->phone,
            'street' => $request->street,
            'area' => $request->area,
            'city_id' => $request->city_id,
            'officehead' => $request->officehead,
            'status' => $request->status,
        ]);

        alert()->success('Office Created Successfully', 'Success');
        return redirect()->route('office.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $office = Office::where('office_code',$id)->first();
       return view('backend.hierarchy.office.show')
            ->with('office', $office);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = Office::where('office_code',$id)->first();
        return view('backend.hierarchy.office.edit')
            ->with('office', $office);
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
            'name'=>'required',
            'phone'=>'required',
            'street'=>'required',
            'area'=>'required',
            'city_id'=>'required',
            'officehead'=>'required',
            'status'=>'required',
        ]);
        $office = Office::where('office_code',$id)->first();
        $office->name = $request->name;
        $office->phone = $request->phone;
        $office->street = $request->street;
        $office->area = $request->area;
        $office->city_id = $request->city_id;
        $office->status = $request->status;
        $office->save();
        alert()->success('Office Updated Successfully', 'Success');
        return redirect()->route('office.index');
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
