<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportCountries()
    {

        return view('backend.reports.countries');
    }

    public function reportCommunities()
    {

        return view('backend.reports.communites');
    }

    public function reportProvinces()
    {

        return view('backend.reports.provinces');
    }

    public function reportCities()
    {

        return view('backend.reports.cities');
    }

    
}
