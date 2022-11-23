<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   
    public function dashboard()
    {
        if(Auth::user()->hasRole('Member')){
           
            return redirect()->route('member.dashboard');
        }else{
           
            return redirect()->route('admin.dashboard');
        }
    }

    public function memberDashboard()
    {
       return view('members.pages.index');
    }
     
    public function adminDashboard()
    {
        return view('backend.dashboard.dashboard');

    }

}
