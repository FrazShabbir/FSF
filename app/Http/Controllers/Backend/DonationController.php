<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Account;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donation::all();
        return view('backend.donation.index')
            ->with('donations', $donations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::all();
        return view('backend.donation.create')
        ->with('accounts', $accounts);
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
            'application_id' => 'nullable',
            'donor_bank_name' => 'required',
            'donor_bank_no' => 'required',
            'fsf_bank_id' => 'required',
            'amount' => 'required',
   
            'receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            //code...

            DB::beginTransaction();
            $application = Application::where('application_id', $request->application_id)->first();
            if ($application) {
                $application_id = $application->id;
                $type = 'Application';
            } else {
                $application_id = null;
                $type = 'General';
            }
            if ($request->fsf_bank_id) {
                $account = Account::where('id', $request->fsf_bank_id)->first();
            }
            $donation = Donation::create([
                'user_id' => $request->user_id,
                'application_id' => $application_id,
                'donor_bank_name' => $request->donor_bank_name,
                'donor_bank_no' => $request->donor_bank_no,
                'fsf_bank_id' => $account->id ?? null,
                'fsf_bank_name' => $account->name?? null,
                'fsf_bank_no' => $account->account_number??null,
                'amount' => $request->amount,
                'type' => $type,
                'mode' => 'W-Online-Manual',
            ]);

            if ($request->receipt) {
                $file = $request->receipt;
                $extension = $file->getClientOriginalExtension();
                $filename = getRandomString().'-'.time() . '.' . $extension;
                $file->move('uploads/donations/receipts/', $filename);
                $donation->receipt= config('app.url').'uploads/donations/receipts/'. $filename;
                $donation->save();
            }

            $transaction = AccountTransaction::create([
                'tranasction_id' => $donation->id,
                'type' => 'Credit',
                'user_id'=> $request->user_id,
                'account_id' => $account->id,
                'donation_id' => $donation->id,
                'application_id' => $application_id,
                'debit'=>0,
                'credit'=>$request->amount,
                'balance'=>$account->balance + $request->amount,
                'summary'=>'Donation',

            ]);




            DB::commit();
            alert()->success('Donation Created Successfully', 'Success');
            return redirect()->route('donation.index');
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
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
        //
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
