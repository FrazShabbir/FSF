<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function transactions()
    {
        return $this->hasMany(AccountTransaction::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function donation()
    {
        return $this->hasMany(Donation::class);
    }
    public function application()
    {
        return $this->hasMany(Application::class);
    }
    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'province_id');
    }

    public function community()
    {
        return $this->belongsTo('App\Models\Community', 'community_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
