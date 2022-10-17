<?php

namespace App\Http\Controllers\Backend\Hierarchy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Community;
class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communities = Community::all();
        return view('backend.hierarchy.community.index')
        ->with('communities',$communities);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.hierarchy.community.create');
        //
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
            'country_id' => 'required',
        ]);
        $community = Community::create([
            'name' => $request->name,
            'country_id' => $request->country_id,
        ]);
        alert()->success('Community Created Successfully');
        return redirect()->route('community.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $community = Community::find($id);
        return view('backend.hierarchy.community.show')
        ->with('community',$community);
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
        $community = Community::find($id);
        return view('backend.hierarchy.community.edit')
        ->with('community',$community);
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
        $request->validate([
            'name' => 'required',
            'country_id' => 'required',
        ]);
        $community = Community::find($id);
        $community->name = $request->name;
        $community->country_id = $request->country_id;
        $community->status = $request->status;
        $community->save();
        alert()->success('Community Updated Successfully');
        return redirect()->route('community.index');
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
