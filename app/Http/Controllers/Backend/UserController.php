<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Str;
use App\Models\Application;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        if (! auth()->user()->hasPermissionTo('Read Users')) {
            abort(403);
        }
        $users= User::all();
        return view('backend.users.index')
        ->withUsers($users);
    }
    public function closedAccounts()
    {
        if (! auth()->user()->hasPermissionTo('Read Users')) {
            abort(403);
        }
        $users= User::where('status', '4')->get();
        return view('backend.users.index')
        ->withUsers($users);
    }
    public function semiclosedAccounts()
    {
        if (! auth()->user()->hasPermissionTo('Read Users')) {
            abort(403);
        }
        $users= User::where('status', '3')->get();
        return view('backend.users.index')
        ->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->hasPermissionTo('Create Users')) {
            abort(403);
        }
        $roles = Role::where('role_for', 'Admin')->get();
        return view('backend.users.create')
        ->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! auth()->user()->hasPermissionTo('Create Users')) {
            abort(403);
        }

        // dd($request->all());
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $username = str_replace(' ', '-', $request->username);
        // check username exist
        $usernamefind = User::where('username', $username)->first();
        if ($usernamefind) {
            $username = $username.'-'.str_random(2);
        }
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $username,
            'status' => $request->status,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (isset($request->roles)) {
            $user->assignRole($request->roles);
        }

        $user->save();
        Password::sendResetLink($request->only(['email']));
        alert()->success('New User Added');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! auth()->user()->hasPermissionTo('Read Users')) {
            abort(403);
        }

        // return redirect()->route('user.edit', $id);

        $user = User::findOrFail($id);

        return view('backend.users.show')
        ->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! auth()->user()->hasPermissionTo('Update Users')) {
            abort(403);
        }

        $user = User::findOrFail($id);
        $roles = Role::where('role_for', 'Admin')->get();
        return view('backend.users.edit')
        ->withUser($user)
        ->withRoles($roles);
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
        if (! auth()->user()->hasPermissionTo('Update Users')) {
            abort(403);
        }
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email,'.$user->id,
                // 'username' => 'required|unique:users,username,'.$user->id,
                // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        // $user->username = $request->username;
        $user->email = $request->email;
        $user->status = $request->status;
        // $user->password = Hash::make($request->password);

        if (isset($request->roles)) {
            $user->roles()->detach();
            $user->assignRole($$request->roles);
        }

        $user->save();

        alert()->success('User Details Updated');

        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! auth()->user()->hasPermissionTo('Delete Users')) {
            abort(403);
        }

        $user = User::findOrFail($id);
        if ($user->id==Auth::user()->id) {
            Alert::error('Sorry', 'You Cannot Delete Yourself');
            alert()->error('Cannot Delete this user');
        } else {
            $user->delete();
        }
        alert()->info('User Deleted');
        return redirect()->back();
    }
    public function reset_password(User $user)
    {
        Password::sendResetLink(['email' => $user->email]);
        alert()->info('Password Reset Link Sent', ['email' => $user->email]);
        return redirect()->route('users.index');
    }

    public function closeAccount($id)
    {
        try {
           DB::beginTransaction();
           $user = User::findOrFail($id);
           $user->status = 3;
           $user->save();
           DB::commit();
           return view('backend.users.closeAccount')
           ->with('user', $user);
        } catch (\Throwable $th) {
            DB::rollback();
            alert()->error('Error', $th->getMessage());
            //throw $th;
        }
       
    }
    public function closeAccountSave(Request $request, $id){

        // dd($request->all());
        $request->validate([
            'deceased_at' => 'required',
            'process_start_at' => 'required',
            'process_ends_at' => 'required',
            'amount_used' => 'required',
            'status' => 'required',
            'amount_to_rep' => 'required'
            
        ]);

        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->status = $request->status;
            $user->save();
            $application  = Application::where('user_id', $user->id)->first();
            // dd($user->totaldonations->sum('amount'));
    
            $application->deceased_at = $request->deceased_at;
            $application->process_start_at = $request->process_start_at;
            $application->process_ends_at = $request->process_ends_at;
            $application->total_donations = $user->totaldonations->sum('amount');
            $application->amount_used = $request->amount_used;
    
            $application->rep_received_amount = $request->rep_received_amount;
            $application->status = $request->status;
            $application->amount_to_rep = $request->amount_to_rep;
            $application->application_closed_by = Auth::user()->id;
            $application->application_closed_at= Carbon::now();
            
            $application->save();
            DB::commit();
            alert()->success('Account Closed');
            return redirect()->route('users.index');
            //code...
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
        }
       
    }
}
