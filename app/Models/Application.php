<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    function comments(){
        return $this->hasMany('App\Models\ApplicationComment')->orderBy('created_at', 'desc');
    }
    function user(){
        return $this->belongsTo('App\Models\User');
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
    function nativecountry(){
        return $this->belongsTo('App\Models\Country','native_country');
    }

    function donations(){
        return $this->hasMany(Donation::class)->orderBy('created_at', 'desc');
    }
    function totaldonations(){
        return $this->hasMany(Donation::class)->where('status', 'APPROVED');
    }
    function rejecteddonations(){
        return $this->hasMany(Donation::class)->where('status', 'REJECTED');
    }
    function pendingdonations(){
        return $this->hasMany(Donation::class)->where('status', 'PENDING');
    }
}
