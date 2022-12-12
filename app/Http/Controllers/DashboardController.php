<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\Donation;
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
        $applications = Application::where('user_id', auth()->user()->id)->get();
        $donations = Donation::where('user_id', auth()->user()->id)->get();
       return view('members.pages.index')
            ->with('applications', $applications)
            ->with('donations', $donations);
    }
     
    public function adminDashboard()
    {
        return view('backend.dashboard.dashboard');

    }

}
