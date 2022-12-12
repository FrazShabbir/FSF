<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    function application()
    {
        return $this->belongsTo(Application::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function account()
    {
        return $this->belongsTo(Account::class,'fsf_bank_id');
    }
    
    function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

}
