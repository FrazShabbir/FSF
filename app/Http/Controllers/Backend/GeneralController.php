<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard.dashboard');
    }

    public function siteSettings()
    {
        return view('backend.general.settings');
    }

    public function save_general_settings(Request $request)
    {
        if ($request->site_title) {
            setSettings('site_title', request('site_title'));
        }
        if ($request->short_title) {
            setSettings('short_title', request('short_title'));
        }
        if ($request->copyrights) {
            setSettings('copyrights', request('copyrights'));
        }
        
        if ($request->terms) {
            setSettings('terms', request('terms'));
        }
     
        if ($request->about) {
            setSettings('about', request('about'));
        }
        if ($request->privacy) {
            setSettings('privacy', request('privacy'));
        }

        if ($request->hasFile('terms_pdf')) {

            $request->validate([
                'terms_pdf' => 'mimes:pdf|max:1024',
            ]);
            $file = $request->file('terms_pdf');
            $extension = $file->getClientOriginalExtension();
            $filename = getRandomString().'-'.time() . '.' . $extension;
            $file->move('uploads/pdf', $filename);
            setSettings('terms_pdf', 'uploads/pdf/'.$filename);
        }
        if ($request->hasFile('terms_pdf_urdu')) {
            $request->validate([
                'terms_pdf_urdu' => 'mimes:pdf|max:1024',
            ]);
            $file = $request->file('terms_pdf_urdu');
            $extension = $file->getClientOriginalExtension();
            $filename = getRandomString().'-'.time() . '.' . $extension;
            $file->move('uploads/pdf', $filename);
            setSettings('terms_pdf_urdu', 'uploads/pdf/'.$filename);
        }

        if ($request->hasFile('manual')) {
            $request->validate([
                'manual' => 'mimes:pdf|max:1024',
            ]);
            $file = $request->file('manual');
            $extension = $file->getClientOriginalExtension();
            $filename = getRandomString().'-'.time() . '.' . $extension;
            $file->move('uploads/pdf', $filename);
            setSettings('manual', 'uploads/pdf/'.$filename);
        }

        
        if ($request->hasFile('logo')) {

            $request->validate([
                'logo' => 'image|mimes:jpeg,png,jpg|max:1024',
            ]);
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = getRandomString().'-'.time() . '.' . $extension;
            $file->move('uploads/logo', $filename);
            setSettings('logo', 'uploads/logo/'.$filename);
        }
        if ($request->hasFile('favicon')) {

            $request->validate([
                'favicon' => 'image|mimes:jpeg,png,jpg|max:1024',
            ]);

            $file = $request->file('favicon');
            $extension = $file->getClientOriginalExtension();
            $filename = getRandomString().'-'.time() . '.' . $extension;
            $file->move('uploads/favicon', $filename);
            setSettings('favicon', 'uploads/favicon/'.$filename);
        }


        if ($request->email) {
            setSettings('email', request('email'));
        }
        if ($request->phone) {
            setSettings('phone', request('phone'));
        }
        if ($request->address) {
            setSettings('address', request('address'));
        }

        if ($request->notification_icon) {
            setSettings('notification_icon', request('notification_icon'));
        }

        return redirect()->back();
    }

    public function myProfile()
    {
        return view('backend.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'username' => 'required|unique:users,username,'.$user->id,
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        // if(Auth::user()->id!=$user->id){
        //     return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        // }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        //code to upload picture to server
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $name = time() . '.' . $image->getClientOriginalExtension();
        //     $destinationPath = public_path('/images/users');
        //     $image->move($destinationPath, $name);
        //     $user->image = $name;
        // }
        $user->save();
        alert()->success('Profile Updated Successfully');
        return redirect()->back();
    }    


    
}
