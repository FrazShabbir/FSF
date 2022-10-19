<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public function community(){
        return $this->belongsTo(Community::class,'community_id');
    }

}
