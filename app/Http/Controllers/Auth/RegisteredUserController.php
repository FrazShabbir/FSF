<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // dd('hh');
        return view('backend.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],

            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms'=>'required'
        ],[
            'terms.required'=>'Please accept our terms and conditions'
        ]);
        $username = str_replace(' ', '-', $request->username);
        // check username exist
        $usernamefind = User::where('username', $username)->first();
        if ($usernamefind) {
            $username = $username.'-'.str_random(2);
        }
        $user = User::create([
            'full_name' => $request->full_name,
            'username' => $username,
            'status' => $request->status,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status'=>1,
        ]);
        $user->assignRole('Member');
        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
