<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Application;
use App\Models\Donation;
use Illuminate\Support\Facades\DB;
use App\Models\AccountTransaction;

class MemberDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donation::where('user_id', auth()->user()->id)->get();
        return view('members.pages.donation.index')
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
        $applications = Application::where('user_id', auth()->user()->id)->where('status','APPROVED')->get();
        return view('members.pages.donation.create')
            ->with('accounts', $accounts)
            ->with('applications', $applications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'application_id' => 'required',
            'donor_bank_name' => 'required',
            'donor_bank_no' => 'required',
            'fsf_bank_id' => 'required',
            'amount' => 'required',
            'receipt' => 'required',
        ]);

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

        try {
            DB::beginTransaction();
            $donation = Donation::create([
                'donation_code'=> 'D-'.date('YmdHis'),
                'user_id' => auth()->user()->id,
                'application_id' => $application_id,
                'passport_number' => $application->passport_number,
                'donor_bank_name' => $request->donor_bank_name,
                'donor_bank_no' => $request->donor_bank_no,
                'fsf_bank_id' => $account->id ?? null,
                'fsf_bank_name' => $account->name?? null,
                'fsf_bank_no' => $account->account_number??null,
                'amount' => $request->amount,
                'type' => $type,
                'mode' => 'W-Online',
            ]);
            if ($request->receipt) {
                $request->validate([
    
                    'receipt' => 'required|mimes:png,jpg,jpeg|max:2048'
                ]);
                $file = $request->receipt;
                $extension = $file->getClientOriginalExtension();
                $filename = getRandomString().'-'.time() . '.' . $extension;
                $file->move('uploads/application/receipts/', $filename);
                $donation->receipt= env('APP_URL.url').'uploads/application/receipts/'. $filename;
                $donation->save();
            }
            // Create Transaction
            // $transaction = AccountTransaction::create([
            //     'transaction_id' => 'T-'.date('YmdHis'),
            //     'type' => 'Credit',
            //     'user_id'=> auth()->user()->id,
            //     'account_id' => $account->id,
            //     'donation_id' => $donation->id,
            //     'application_id' => $application_id,
              
                
            //     'country_id' => $application->country_id,
            //     'community_id' => $application->community_id,
            //     'province_id' => $application->province_id,
            //     'city_id' => $application->city_id,

            //     'debit'=>0,
            //     'credit'=>$request->amount,
            //     'balance'=>$account->balance + $request->amount,
            //     'summary'=>'Donation',
            // ]);
            //end transaction
            DB::commit();
            $donation_message = 'Dear '.$application->full_name.', Your Donation of '.$request->amount.' has been received and in processing. Team '.env('APP_NAME').'.';
            SendMessage($application->phone,$donation_message);

            alert()->success('Donation Created Successfully', 'Success');
            return redirect()->route('member.donation.index');
        
          
        } catch (\Throwable $th) {
            DB::rollback();
            alert()->error('Donation Creation Failed', $th->getMessage());
            return redirect()->back();
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
        return view('members.pages.donation.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view('members.pages.donation.edit');
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
