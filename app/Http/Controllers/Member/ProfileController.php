<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function myProfile($username)
    {
        if (auth()->user()->username != $username) {
            abort(403);
            return redirect()->route('home');
        }

        return view('members.pages.profile.profile');
    }
    public function profileUpdate(Request $request, $username)
    {
        if (auth()->user()->username != $username) {
            abort(403);
            return redirect()->route('home');
        }
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'avatar' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);
        $user = auth()->user();
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->passport_number = $request->passport_number;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/members/avatars/', $filename);
            $user->avatar = 'uploads/members/avatars/'.$filename;
        }
        $user->save();
        return view('members.pages.profile.profile');
    }
}
