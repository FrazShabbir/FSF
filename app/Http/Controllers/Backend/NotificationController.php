<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
    public function index()
    {
        $notifications = Notification::all();
        return view('backend.notifications.index')
        ->with('notifications', $notifications);
    }


    public function create()
    {
        if (! auth()->user()->hasPermissionTo('Send Notifications')) {
            abort(403);
        }

        
        return view('backend.notifications.create');
    }

    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token'=>$request->token]);
        return response()->json(['token saved successfully.']);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! auth()->user()->hasPermissionTo('Send Notifications')) {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);
        $notification = Notification::create([
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'sent_by'=>auth()->user()->id,
        ]);

        
        $applications = Application::all();
        foreach($applications as $application){
            dispatch(new RenewalJob($application));
        }

        alert()->success('Notification sent successfully', 'Success');
        return redirect()->route('notification.index');
    }


}
