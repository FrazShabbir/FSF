<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function myProfile($username)
    {
        return view('members.pages.profile.profile');
    }
    public function profileUpdate(Request $request,$username)
    {
        dd($request->all());
        return view('members.pages.profile.profile');
    }
}
