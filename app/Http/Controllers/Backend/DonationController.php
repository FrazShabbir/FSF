<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Account;
use App\Models\Country;
use App\Models\User;
use App\Models\Application;
use App\Models\AccountTransaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $donations = Donation::when(!empty(request()->input('date_from')), function ($q) {
        //     return $q->whereBetween('donation_date', [request()->date_from, request()->date_to]);
        // })
        // ->when(!empty(request()->input('date_from')), function ($q) {
        //     return $q->where('donation_date', '=', request()->input('date_from'));
        // })
        // ->when(!empty(request()->input('date_to')), function ($q) {
        //     return $q->where('donation_date', '=', request()->input('date_to'));
        // })
        // ->when(!empty(request()->input('account')), function ($q) {
        //     return $q->where('fsf_bank_id', '=', request()->input('account'));
        // })
        // ->orderBy('id', 'ASC')
        // ->get();


        //filter that filter the data from the database basis of date_from and date_to
        $donations = Donation::when(!empty(request()->input('date_from')), function ($q) {
            return $q->whereBetween('donation_date', [request()->date_from, request()->date_to]);
        })
        ->when(!empty(request()->input('account')), function ($q) {
            return $q->where('fsf_bank_id', '=', request()->input('account'));
        })
        ->orderBy('id', 'ASC')
        ->get();

        $accounts = Account::where('status','1')->get();
        return view('backend.donation.index')
            ->with('donations', $donations)
            ->with('accounts', $accounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::where('status','1')->get();
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
            'amount' => 'required|numeric|min:0|not_in:0',
            'passport_number' => 'required',
            'receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            //code...
            if ($request->amount < 0) {
                alert()->error('Amount Must Be Greater Than 0', 'Error');
                return redirect()->back();
            }
            
            DB::beginTransaction();

            $application = Application::where('application_id', $request->application_id)->orWhere('passport_number', $request->passport_number)->first();
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
                'donation_date'=>$request->donation_date,
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

        if ($donation->status == 'APPROVED' or $donation->status == 'REJECTED') {
            alert()->info('Donation Already '.$donation->status, 'Info');
            return redirect()->route('donation.show', $donation->donaton_code);
        }

        $accounts = Account::where('status','1')->get();
        $countries = Country::all();
        return view('backend.donation.edit')
        ->with('accounts', $accounts)
        ->with('donation', $donation)
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
            // 'application_id' => 'nullable',
            'donor_bank_name' => 'required',
            'donor_bank_no' => 'required',
            'fsf_bank_id' => 'required',
            'passport_number' => 'required',
            'amount' => 'required|numeric|min:0|not_in:0',
            'status' => 'required',
            'receipt' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'country' => 'required',
            'community' => 'required',
            'province' => 'required',
            'city' => 'required',
        ]);
        try {

            if ($request->amount < 0) {
                alert()->error('Amount Must Be Greater Than 0', 'Error');
                return redirect()->back();
            }

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
            $donation->donation_date=$request->donation_date;

            if ($request->receipt) {
                $file = $request->receipt;
                $extension = $file->getClientOriginalExtension();
                $filename = getRandomString().'-'.time() . '.' . $extension;
                $file->move('uploads/donations/receipts/', $filename);
                $donation->receipt= config('app.url').'uploads/donations/receipts/'. $filename;
            }
            $donation->save();

            if ($donation->status == 'APPROVED') {
                $transaction = AccountTransaction::create([
                'transaction_id' => 'T-'.date('YmdHis'),
                'type' => 'Credit',
                'user_id'=> $donation->user_id,
                'account_id' => $account->id,
                'donation_id' => $donation->id,
                'application_id' => $application_id,
                'debit'=>0,

                'country_id'=>$request->country,
                'community_id'=>$request->community,
                'province_id'=>$request->province,
                'city_id'=>$request->city,

                'credit'=>$request->amount,
                'balance'=>$account->balance + $request->amount,
                'summary'=>'Donation',

            ]);

                $account->balance = $account->balance + $request->amount;
                $account->save();

              
                    $applicant_message = 'Dear ' . $application->full_name . ', Your Application has been Donation for Application ID  ' . $application->application_id . 'has been Approved.';
                    $rep_messsage = 'Dear ' . $application->rep_name . ' ' . $application->rep_surname .', this SMS is to inform you that your relative\'s donation at  '.env('APP_NAME').'  has been approved.' ;
                    SendMessage($application->phone, $applicant_message);
                    SendMessage($application->rep_phone, $rep_messsage);
               

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
