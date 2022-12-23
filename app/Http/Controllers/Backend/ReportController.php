<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountTransaction;
use App\Models\City;
use App\Models\Province;
use App\Models\Community;
use App\Models\Country;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ReportController extends Controller
{
    public function reportCountries()
    {
        $credit = [];
        $debit = [];
        $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        $places = AccountTransaction::select(DB::raw('SUM(credit) as credit'), 'country_id')
            ->groupBy('country_id')
            ->get(['credit', 'country_id']);
        $debit_places = AccountTransaction::select(DB::raw('SUM(debit) as debit'), 'country_id')
        ->groupBy('country_id')
        ->get(['debit', 'country_id']);
        
        foreach ($places as $place) {
            $area = Country::where('id', $place->country_id)->first();
            $credit[$area->name] = $place->credit;
        }
      
        foreach ($debit_places as $place) {
            $area = Country::where('id', $place->country_id)->first();
            $debit[$area->name] = $place->debit;
        }

    $credit_transactions = AccountTransaction::where('type', 'credit')->get();
    $debit_transactions = AccountTransaction::where('type', 'debit')->get();
        return view('backend.reports.areaReport')
            ->with('credit', $credit)
            ->with('debit', $debit)
            ->with('months', $months)
            ->with('credit_transactions', $credit_transactions)
            ->with('debit_transactions', $debit_transactions)
            ->with('area','Countries');
    }


    public function reportCommunities()
    {
        $credit = [];
        $debit = [];
        $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        $places = AccountTransaction::select(DB::raw('SUM(credit) as credit'), 'community_id')
            ->groupBy('community_id')
            ->get(['credit', 'community_id']);
        $debit_places = AccountTransaction::select(DB::raw('SUM(debit) as debit'), 'community_id')
        ->groupBy('community_id')
        ->get(['debit', 'community_id']);
        
        foreach ($places as $place) {
            $area = Community::where('id', $place->community_id)->first();
            $credit[$area->name] = $place->credit;
        }
      
        foreach ($debit_places as $place) {
            $area = Community::where('id', $place->community_id)->first();
            $debit[$area->name] = $place->debit;
        }

    $credit_transactions = AccountTransaction::where('type', 'credit')->get();
    $debit_transactions = AccountTransaction::where('type', 'debit')->get();
        return view('backend.reports.areaReport')
            ->with('credit', $credit)
            ->with('debit', $debit)
            ->with('months', $months)
            ->with('credit_transactions', $credit_transactions)
            ->with('debit_transactions', $debit_transactions)
            ->with('area','Communities');
    }


    public function reportProvinces()
    {
        $credit = [];
        $debit = [];
        $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        $places = AccountTransaction::select(DB::raw('SUM(credit) as credit'), 'province_id')
            ->groupBy('province_id')
            ->get(['credit', 'province_id']);
        $debit_places = AccountTransaction::select(DB::raw('SUM(debit) as debit'), 'province_id')
        ->groupBy('province_id')
        ->get(['debit', 'province_id']);
        
        foreach ($places as $place) {
            $area = Province::where('id', $place->province_id)->first();
            $credit[$area->name] = $place->credit;
        }
      
        foreach ($debit_places as $place) {
            $area = Province::where('id', $place->province_id)->first();
            $debit[$area->name] = $place->debit;
        }

    $credit_transactions = AccountTransaction::where('type', 'credit')->get();
    $debit_transactions = AccountTransaction::where('type', 'debit')->get();
        return view('backend.reports.areaReport')
            ->with('credit', $credit)
            ->with('debit', $debit)
            ->with('months', $months)
            ->with('credit_transactions', $credit_transactions)
            ->with('debit_transactions', $debit_transactions)
            ->with('area','Provinces');
    }

    public function reportCities()
    {
        $credit = [];
        $debit = [];
        $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        $places = AccountTransaction::select(DB::raw('SUM(credit) as credit'), 'city_id')
            ->groupBy('city_id')
            ->get(['credit', 'city_id']);
        $debit_places = AccountTransaction::select(DB::raw('SUM(debit) as debit'), 'city_id')
        ->groupBy('city_id')
        ->get(['debit', 'city_id']);
        
        foreach ($places as $place) {
            $area = City::where('id', $place->city_id)->first();
            $credit[$area->name] = $place->credit;
        }
      
        foreach ($debit_places as $place) {
            $area = City::where('id', $place->city_id)->first();
            $debit[$area->name] = $place->debit;
        }
        
    //    $transaction_credit = AccountTransaction::select(DB::raw('SUM(credit) as credit'), DB::raw('MONTH(created_at) as month'))
    //         ->groupBy('month')
    //         ->get(['credit', 'month']);
    //         dd($transaction_credit);

    $credit_transactions = AccountTransaction::where('type', 'credit')->get();
    $debit_transactions = AccountTransaction::where('type', 'debit')->get();
        return view('backend.reports.areaReport')
            ->with('credit', $credit)
            ->with('debit', $debit)
            ->with('months', $months)
            ->with('credit_transactions', $credit_transactions)
            ->with('debit_transactions', $debit_transactions)
            ->with('area','Cities');
    }

    public function ledger(Request $request)
    {
        //  dd($request->all());

        $transactions = AccountTransaction::when(!empty(request()->input('date_from')), function ($q) {
            return $q->whereBetween('created_at', [date(request()->date_from), date(request()->date_to)]);
        })

        ->when(!empty(request()->input('account')), function ($q) {
            return $q->where('account_id', '=', request()->input('account'));
        })
        ->orderBy('id', 'ASC')
        ->get();
        // dd($transactions);
        $accounts = Account::all();
        //$transactions = AccountTransaction::all();
        return view('backend.journals.ledger')
        ->with('transactions', $transactions)
        ->with('accounts', $accounts);
    }


    public function ledgerByAccount(Request $request, $id)
    {
        $account = Account::where('code', $id)->first();
        // $transactions = AccountTransaction::where('account_id', $account->id)->get();



        $transactions = AccountTransaction::when(!empty(request()->input('date_from')), function ($q) {
            return $q->whereBetween('created_at', [date(request()->date_from), date(request()->date_to)]);
        })

        ->when(!empty(request()->input('account')), function ($q) {
            return $q->where('account_id', '=', request()->input('account'));
        })
        ->orderBy('id', 'ASC')
        ->get();


        $opening_balance = $account->balance;
        $closing_balance = $account->balance;

        if ($transactions->count() > 0) {
            $opening_balance = $transactions[0]->balance - $transactions[0]->credit + $transactions[0]->debit;

            //$opening_balance = $transactions->first()->amount;
            $closing_balance = $transactions->last()->amount;
        }
        //dd($opening_balance);
        return view('backend.journals.accounts.ledger')
        ->with('transactions', $transactions)
        ->with('account', $account)
        ->with('opening_balance', $opening_balance);
    }


    public function ledgerOfSixMonths(Request $request)
    {
        // dd($request->all());
        $transactions = AccountTransaction::whereBetween('created_at', [Carbon::now()->subMonth(6), Carbon::now()])
        ->orderBy('id', 'ASC')
        ->get();

        $accounts = Account::all();
        //$transactions = AccountTransaction::all();
        return view('backend.journals.ledger')
        ->with('transactions', $transactions)
        ->with('accounts', $accounts);
    }
    public function ledgerOfThreeMonths(Request $request)
    {
        // dd($request->all());
        $transactions = AccountTransaction::whereBetween('created_at', [Carbon::now()->subMonth(3), Carbon::now()])
        ->orderBy('id', 'ASC')
        ->get();

        $accounts = Account::all();
        //$transactions = AccountTransaction::all();
        return view('backend.journals.ledger')
        ->with('transactions', $transactions)
        ->with('accounts', $accounts);
    }
    public function ledgerOfTewelveMonths(Request $request)
    {
        // dd($request->all());
        $transactions = AccountTransaction::whereBetween('created_at', [Carbon::now()->subMonth(12), Carbon::now()])
        ->orderBy('id', 'ASC')
        ->get();

        $accounts = Account::all();
        //$transactions = AccountTransaction::all();
        return view('backend.journals.ledger')
        ->with('transactions', $transactions)
        ->with('accounts', $accounts);
    }

    public function masterReport()
    {
        $accounts = Account::where('status', 1)->get();
        return view('backend.journals.masterLedger')
        ->with('accounts', $accounts);
    }

    public function masterReportRequest(Request $request)
    {
        // dd($request->all());
         $arr = [];
        // add all values to array
        foreach ($request->all() as $key => $value) {
            $arr[] = $key;
        }
        
        $transactions = AccountTransaction::when(!empty(request()->input('date_from')), function ($q) {
            return $q->whereBetween('created_at', [date(request()->date_from), date(request()->date_to)]);
        })
        ->when(!empty(request()->input('date_from')), function ($q) {
            return $q->where('created_at', '=', request()->input('date_from'));
        })
        ->when(!empty(request()->input('date_to')), function ($q) {
            return $q->where('created_at', '=', request()->input('date_to'));
        })
        ->when(!empty(request()->input('document_date')), function ($q) {
            return $q->where('document_date', '=', request()->input('document_date'));
        })
        ->when(!empty(request()->input('account_id')), function ($q) {
            return $q->where('account_id', '=', request()->input('account_id'));
        })
        ->orderBy('id', 'ASC')
        ->get();

        return view('backend.journals.masterDownload')
        ->with('transactions', $transactions)
        ->with('arr', $arr);
    }

}
