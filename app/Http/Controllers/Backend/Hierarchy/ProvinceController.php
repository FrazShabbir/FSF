<?php

namespace App\Http\Controllers\Backend\Hierarchy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Community;
class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        return view('backend.hierarchy.province.index')
        ->with('provinces',$provinces);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communities = Community::where('status',1)->get();
        return view('backend.hierarchy.province.create')
        ->with('communities',$communities);
        
        
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
            'community_id' => 'required',
            'status' => 'required',
            'hod' => 'required'

        ]);
        $province = Province::create([
            'name' => $request->name,
            'community_id' => $request->community_id,
            'status' => $request->status,
            'hod' => $request->hod,
        ]);
        alert()->success('Province Created Successfully');
        return redirect()->route('province.index');
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
        $province = Province::find($id);
        return view('backend.hierarchy.province.show')
        ->with('province',$province);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $province = Province::find($id);
        $communities = Community::where('status',1)->get();
        return view('backend.hierarchy.province.edit')
        ->with('province',$province)
        ->with('communities',$communities);
        
    
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
            'community_id' => 'required',
            'hod' => 'required'

        ]);
        $province = Province::find($id);
        $province->name = $request->name;
        $province->community_id = $request->community_id;
        $province->status = $request->status;
        $province->hod = $request->hod;
        $province->save();
        alert()->success('Province Updated Successfully');
        return redirect()->route('province.index');
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
