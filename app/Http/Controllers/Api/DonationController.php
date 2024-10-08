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
            $accounts = Account::where('status', 1)->get(['id', 'name', 'account_number','bank','city']);
            $applications_ = Application::where('user_id', $request->user_id)->where('status', 'APPROVED')->get(['id', 'application_id', 'passport_number','full_name']);
            
            $applications = [];
            foreach ($applications_ as $application) {
                $dob = Carbon::parse($application->dob);
                $now = Carbon::now();
                $diff = Carbon::parse($application->dob)->age;
                if ($diff >= 14) {
                    $applications[] = $application;
                }
            }

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
                // $donations = Donation::with(['application' => function ($query) {
                //     $query->select('id', 'application_id','passport_number','full_name');
                // }])->where('user_id', $request->user_id)->when(!empty(request()->input('date_from')), function ($q) {
                //     return $q->whereBetween('created_at', [date(request()->date_from), date(request()->date_to)]);
                // })
                // ->when(!empty(request()->input('date_from')), function ($q) {
                //     return $q->where('created_at', '=', request()->input('date_from'));
                // })
                // ->when(!empty(request()->input('date_to')), function ($q) {
                //     return $q->where('created_at', '=', request()->input('date_to'));
                // })
                // ->orderBy('id', 'ASC')
                // ->get();

                $donations = Donation::with(['application' => function ($query) {
                    $query->select('id', 'application_id', 'passport_number', 'full_name');
                }])->where('user_id', $request->user_id)->when(!empty(request()->input('date_from')), function ($q) {
                    return $q->whereBetween('donation_date', [request()->date_from, request()->date_to]);
                })
                ->when(!empty(request()->input('date_from')), function ($q) {
                    return $q->whereBetween('created_at', [request()->date_from, request()->date_to]);
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
                    'application_id' => 'required',
                    'donor_bank_name' => 'required',
                    'donor_bank_no' => 'required',
                    'donation_date' => 'required',
                    'fsf_bank_id' => 'required',
                    'amount' => 'required',
                    'receipt' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',

                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => 401,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            
            if ($request->amount < 0) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Amount must be greater than 0',
                ], 401);
            }

            DB::beginTransaction();

        
            $user = User::where('id', $request->user_id)->where('api_token', $request->api_token)->first();
            if ($user) {
                $application = Application::where('application_id', $request->application_id)->first();

                if ($application) {
                    $application_id = $application->id;
                    $type = 'Application';
                    if ($application->status!='APPROVED') {
                        return response()->json([
                            'status' => 401,
                            'message' => 'Application is not approved',
                        ], 401);
                    }

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
                    'passport_number' => $application->passport_number??'',
                    'donor_bank_name' => $request->donor_bank_name,
                    'donor_bank_no' => $request->donor_bank_no,
                    'fsf_bank_id' => $account->id ?? null,
                    'fsf_bank_name' => $account->name?? null,
                    'fsf_bank_no' => $account->account_number??null,
                    'amount' => $request->amount,
                    'donation_date'=>$request->donation_date,
                    'type' => $type,
                    'mode' => 'M-Online',
                ]);

                if ($request->receipt) {
                    $file = $request->receipt;
                    $extension = $file->getClientOriginalExtension();
                    $filename = getRandomString().'-'.time() . '.' . $extension;
                    $file->move('uploads/donations/receipts/', $filename);
                    $donation->receipt= env('APP_URL').'uploads/donations/receipts/'. $filename;
                    $donation->save();
                }

                $applicant_message = 'Dear ' . $application->full_name . ', Your Donation under Application ID  ' . $application->application_id . 'is received. You will be notified once your donation is approved.';


                SendMessage($application->phone, $applicant_message);

                // $transaction = AccountTransaction::create([
                //     'transaction_id' => 'T-'.date('YmdHis'),
                //     'type' => 'Credit',
                //     'user_id'=> $request->user_id,
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
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            throw $th;
        }
    }


    public function show($id, $user_id, $token)
    {
        $user = User::where('id', $user_id)->where('api_token', $token)->get();
        if ($user->count()>0) {
            $user = User::where('id', $user_id)->where('api_token', $token)->first();
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid Request',
            ], 404);
        }
        $donation = Donation::where('donation_code', $id)->where('user_id', $user_id)->first();
        if ($donation) {
            $info = [
                'full_name'=>$donation->user->full_name,
                'application'=>$donation->application->application_id,
                'passport_number'=>$donation->application->passport_number,
                'donor_bank_name'=>$donation->donor_bank_name,
                'donor_bank_no'=>$donation->donor_bank_no,
                'fsf_bank_name'=>$donation->fsf_bank_name,
                'fsf_bank_no'=>$donation->fsf_bank_no,
                'amount'=>$donation->amount,
                'status'=>$donation->status,
                'donation_date'=>$donation->donation_date,
                'created_at'=>$donation->created_at,
                'receipt'=>$donation->receipt,
            ];
            return response()->json([
                'donation' => $info,
                'donor'=>[
                    'full_name'=>$donation->application->full_name,
                    'father_name'=>$donation->application->father_name,
                    'application_id'=>$donation->application->application_id,
                ],

                'status' => 200,
                'message' => 'Donation Found',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Donation Not Found',
            ], 404);
        }
    }
}
