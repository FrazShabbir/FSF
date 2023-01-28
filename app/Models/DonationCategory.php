<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    function donations()
    {
        return $this->hasMany(Donation::class,'donation_category_id');
    }
}
