<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Country;
use App\Models\DonationCategory;
use App\Models\AccountTransaction;
use Illuminate\Support\Facades\DB;

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
        $account->code = 'Acc-'.rand(100, 999);
        $account->name = $request->name;
        $account->account_number = $request->account_number;
        $account->bank = $request->bank;
        $account->type = $request->type;
        $account->city = $request->city;
        $account->status = '1';
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
        $countries = Country::where('status', 1)->get();

        return view('backend.accounts.edit')
            ->with('account', $account)
            ->with('countries', $countries);
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


    public function addAmount(Request $request, $id)
    {
        $request->validate([
        'amount' => 'required',
        'details' => 'required',
        'city' => 'required',
        'province' => 'required',
        'country' => 'required',
        'community' => 'required',
        ]);


        try {
            db::beginTransaction();
            $account = Account::where('code', $id)->first();
            $account->balance = $account->balance + $request->amount;
            $account->save();

            $transaction = AccountTransaction::create([
                'transaction_id' => 'T-'.date('YmdHis'),
                'type' => 'Credit',
                'user_id'=> auth()->user()->id,
                'account_id' => $account->id,
                'debit'=>0,
                'city_id'=>$request->city,
                'province_id'=>$request->province,
                'country_id'=>$request->country,
                'community_id'=>$request->community,
                'credit'=>$request->amount,
                'balance'=>$account->balance,
                'summary'=>'[SYSTEM CHANGE] Account Credited by '. auth()->user()->full_name. ' for '.$request->details,
                'donation_category_id'=>$request->donation_category_id,

            ]);
            $donation_category = DonationCategory::where('id',  $request->donation_category_id)->first();
            $donation_category->donation = $donation_category->donation + $request->amount;
            $donation_category->save();
          

            db::commit();
            alert()->success('Success', 'Account Credited Successfully');
            return redirect()->route('account.index');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            alert()->error('Error', $th->getMessage());
            return redirect()->route('account.index');
        }


        alert()->success('Success', 'Account Updated Successfully');
        return redirect()->route('account.index');
    }


    public function payAmount(Request $request, $id)
    {
        $request->validate([
        'amount' => 'required',
        'details' => 'required',
        'city' => 'required',
        'province' => 'required',
        'country' => 'required',
        'community' => 'required',
        ]);


        try {
            db::beginTransaction();
            $account = Account::where('code', $id)->first();
            
            if($account->balance < $request->amount){
                alert()->error('Error', 'Insufficient Balance');
                return redirect()->route('account.index');
            }

            $account->balance = $account->balance - $request->amount;
            $account->save();

            $transaction = AccountTransaction::create([
                'transaction_id' => 'T-'.date('YmdHis'),
                'type' => 'Debit',
                'user_id'=> auth()->user()->id,
                'account_id' => $account->id,
                'credit'=>0,

                'city_id'=>$request->city,
                'province_id'=>$request->province,
                'country_id'=>$request->country,
                'community_id'=>$request->community,

                'debit'=>$request->amount,
                'balance'=>$account->balance,
                'summary'=>'[SYSTEM CHANGE] Account Debit by '. auth()->user()->full_name. ' for '.$request->details,
                'donation_category_id'=>$request->donation_category_id,

            ]);
            $donation_category = DonationCategory::where('id',  $request->donation_category_id)->first();
            $donation_category->donation = $donation_category->donation - $request->amount;
            $donation_category->save();
          
            db::commit();
            alert()->success('Success', 'Account Credited Successfully');
            return redirect()->route('account.index');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            alert()->error('Error', $th->getMessage());
            return redirect()->route('account.index');
        }


        alert()->success('Success', 'Account Updated Successfully');
        return redirect()->route('account.index');
    }
}
