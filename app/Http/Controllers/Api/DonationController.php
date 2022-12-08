<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Account;
use App\Models\Donation;
use App\Models\Application;
use App\Models\AccountTransaction;

class DonationController extends Controller
{
    public function create(Request $request)
    {
        if (User::where('id', $request->user_id)->where('api_token', $request->api_token)->first()) {
            $accounts = Account::where('status',1)->get(['id', 'name', 'account_number','bank','city']);
            $applications = Application::where('user_id', $request->user_id)->get(['id', 'application_id', 'passport_number','full_name']);
            return response()->json([
                'status' => 200,
                'message' => 'All data Fetched',
                'applications' => $applications,
                'accounts' => $accounts,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User Not Found',
            ], 404);
        }
    }


    public function allDonation(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required',
                    'api_token' => 'required',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => 401,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::where('id', $request->user_id)->where('api_token', $request->api_token)->first();
            if ($user) {
                // $donations = Donation::where('user_id', $request->user_id)->get();
                $donations = Donation::where('user_id', $request->user_id)->when(!empty(request()->input('date_from')), function ($q) {
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

                
                return response()->json([
                    'donations' => $donations,
                    'status' => true,
                    'message' => 'Donations Found',
                ], 200);
            } else {
                $arr['status'] = 404;
                $arr['message'] = 'User Not Found';
                return response()->json($arr, 404);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function store(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'user_id' => 'required',
                    'api_token' => 'required',

                    'application_id' => 'nullable',
                    'donor_bank_name' => 'required',
                    'donor_bank_no' => 'required',
                    'fsf_bank_id' => 'required',
                    // 'fsf_bank_no' => 'nullable',
                    'amount' => 'required',
                    'receipt' => 'required',

                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => 401,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            DB::beginTransaction();

            $user = User::where('id', $request->user_id)->where('api_token', $request->api_token)->first();
            if ($user) {
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
                    'donation_code'=> 'D-'.date('YmdHis'),
                    'user_id' => $request->user_id,
                    'application_id' => $application_id,
                    'passport_number' => $application->passport_number,
                    'donor_bank_name' => $request->donor_bank_name,
                    'donor_bank_no' => $request->donor_bank_no,
                    'fsf_bank_id' => $account->id ?? null,
                    'fsf_bank_name' => $account->name?? null,
                    'fsf_bank_no' => $account->account_number??null,
                    'amount' => $request->amount,
                    'type' => $type,
                    'mode' => 'M-Online',
                ]);

                if ($request->receipt) {
                    $file = $request->receipt;
                    $extension = $file->getClientOriginalExtension();
                    $filename = getRandomString().'-'.time() . '.' . $extension;
                    $file->move('uploads/donations/receipts/', $filename);
                    $donation->receipt= env('APP_URL.url').'uploads/donations/receipts/'. $filename;
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
                return response()->json([
                    'donation' => $donation,
                    'status' => 200,
                    'message' => 'Donation Created',
                ], 200);
            } else {
                DB::rollback();
                return response()->json([
                    'status' => 404,
                    'message' => 'User Not Found',
                ], 404);
            }
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            throw $th;
        }
    }
}
