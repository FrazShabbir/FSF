<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonationCategory;
use App\Models\Account;
use App\Models\AccountTransaction;
class DonationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DonationCategory::all();
        $accounts = Account::where('status','1')->get();
        return view('backend.donation_category.index')
            ->with('categories', $categories)
            ->with('accounts', $accounts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.donation_category.create');
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
            'code' => 'required',
            'status'=>'required',
        ]);
        $category =DonationCategory::create([
            'name' => $request->name,
            'code' => $request->code,
            'status' => $request->status,
        ]);
        alert()->success('Success', 'Donation Category Created Successfully');
        return redirect()->route('category.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DonationCategory::where('code',$id)->first();


        $transactions = AccountTransaction::where('donation_category_id',$category->id)->when(!empty(request()->input('date_from')), function ($q) {
            return $q->whereBetween('created_at', [date(request()->date_from), date(request()->date_to)]);
        })

        ->when(!empty(request()->input('account')), function ($q) {
            return $q->where('account_id', '=', request()->input('account'));
        })
        ->orderBy('id', 'ASC')
        ->get();


      

        return view('backend.donation_category.show')
            ->with('category', $category)
            ->with('transactions', $transactions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DonationCategory::where('code',$id)->first();
        return view('backend.donation_category.edit')
            ->with('category', $category);
       
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
