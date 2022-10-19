<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;
    public function province(){
        return $this->belongsTo(Province::class,'province_id');
    }
}
