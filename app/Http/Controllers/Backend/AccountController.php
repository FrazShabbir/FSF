<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all();
        return view('backend.accounts.index')
            ->with('accounts', $accounts);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.accounts.create');
       
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
            'account_number' => 'required',
            'bank' => 'required',
            'type' => 'required',
            'city' => 'required',
           
           
        ]);
        $account = new Account();
        $account->code = 'Acc-'.rand(100,999);
        $account->name = $request->name;
        $account->account_number = $request->account_number;
        $account->bank = $request->bank;
        $account->type = $request->type;
        $account->city = $request->city;
        $account->status = 'ACTIVE';
        $account->save();
        return redirect()->route('account.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::where('code', $id)->first();
        return view('backend.accounts.show')
            ->with('account', $account);
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
        $account = Account::where('code', $id)->first();
        return view('backend.accounts.edit')
            ->with('account', $account);
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
            'account_number' => 'required',
            'bank' => 'required',
            'city' => 'required',
            'status' => 'required',
        ]);
        $account = Account::where('code', $id)->first();
      
        $account->name = $request->name;
        $account->account_number = $request->account_number;
        $account->bank = $request->bank;
        $account->city = $request->city;
        $account->status = $request->status;
        $account->save();
        alert()->success('Success', 'Account Updated Successfully');
        return redirect()->route('account.index');
        
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
