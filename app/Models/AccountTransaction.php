<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountTransaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    function donation(){
        return $this->belongsTo(Donation::class);
    }
    function account(){
        return $this->belongsTo(Account::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
    function application(){
        return $this->belongsTo(Application::class);
    }
    function province(){
        return $this->belongsTo('App\Models\Province','province_id');
    }
    function community(){
        return $this->belongsTo('App\Models\Community','community_id');
    }
    function city(){
        return $this->belongsTo('App\Models\City','city_id');
    }
    function country(){
        return $this->belongsTo('App\Models\Country','country_id');
    }

}
