<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Account;
use App\Models\User;
use App\Models\Application;
use App\Models\AccountTransaction;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $donations = Donation::when(!empty(request()->input('date_from')), function ($q) {
            return $q->whereBetween('created_at', [date(request()->date_from), date(request()->date_to)]);
        })
        ->when(!empty(request()->input('date_from')), function ($q) {
            return $q->where('created_at', '=', request()->input('date_from'));
        })
        ->when(!empty(request()->input('date_to')), function ($q) {
            return $q->where('created_at', '=', request()->input('date_to'));
        })
        ->orderBy('id', 'ASC')
        ->get();


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
            'passport_number' => 'required',
            'receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            //code...

            DB::beginTransaction();

            $application = Application::where('application_id', $request->application_id)->orWhere('passport_number',$request->passport_number)->first();
            if ($application) {
                $application_id = $application->id;
                $type = 'Application';
                $passport = $application->passport_number;                
            } else {
                $application_id = null;
                $type = 'General';
                $passport = $request->passport_number;
            }
            if ($request->fsf_bank_id) {
                $account = Account::where('id', $request->fsf_bank_id)->first();
            }

            $donation = Donation::create([
                'donation_code'=> 'D-'.date('YmdHis'),
                'user_id' => $application->user_id,
                'application_id' => $application_id,
                'passport_number' => $passport,
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
        $donation = Donation::where('donation_code', $id)->firstOrFail();
        return view('backend.donation.show')
        ->with('donation', $donation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donation = Donation::where('donation_code', $id)->firstOrFail();
        
        if($donation->status == 'APPROVED' or $donation->status == 'REJECTED'){
            alert()->info('Donation Already '.$donation->status, 'Error');
            return redirect()->route('donation.show', $donation->donaton_code);
        }

        $accounts = Account::all();
        if($donation->status == 'APPROVED' or $donation->status == 'REJECTED'){
            alert()->info('Donation Already '.$donation->status, 'Error');
            return redirect()->route('donation.show', $donation->donaton_code);
        }
        return view('backend.donation.edit')
        ->with('accounts', $accounts)
        ->with('donation', $donation);
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
            // 'application_id' => 'nullable',
            'donor_bank_name' => 'required',
            'donor_bank_no' => 'required',
            'fsf_bank_id' => 'required',
            'passport_number' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'receipt' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        try {
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
            $donation = Donation::where('donation_code', $id)->first();
            // $donation->application_id = $application_id;
            // $donation->passport_number = $request->passport_number;
            $donation->donor_bank_name = $request->donor_bank_name;
            $donation->donor_bank_no = $request->donor_bank_no;
            $donation->fsf_bank_id =  $account->id ?? null;
            $donation->fsf_bank_name = $account->name?? null;
            $donation->fsf_bank_no = $account->account_number??null;
            $donation->amount = $request->amount;
            $donation->status = $request->status;
            if ($request->receipt) {
                $file = $request->receipt;
                $extension = $file->getClientOriginalExtension();
                $filename = getRandomString().'-'.time() . '.' . $extension;
                $file->move('uploads/donations/receipts/', $filename);
                $donation->receipt= config('app.url').'uploads/donations/receipts/'. $filename;
            }
            $donation->save();

            if($donation->status == 'APPROVED'){
                $transaction = AccountTransaction::create([
                'transaction_id' => 'T-'.date('YmdHis'),
                'type' => 'Credit',
                'user_id'=> $donation->user_id,
                'account_id' => $account->id,
                'donation_id' => $donation->id,
                'application_id' => $application_id,
                'debit'=>0,
                'credit'=>$request->amount,
                'balance'=>$account->balance + $request->amount,
                'summary'=>'Donation',

            ]);

            }
            DB::commit();
            alert()->success('Donation Updated Successfully', 'Success');
            return redirect()->route('donation.index');
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
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
