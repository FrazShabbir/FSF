<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountTransaction;
use App\Models\City;
use App\Models\Province;
use App\Models\Community;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

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
}
