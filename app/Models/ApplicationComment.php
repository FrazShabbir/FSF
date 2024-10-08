<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationComment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    function user(){
        return $this->belongsTo(User::class,'receiver_id');
    }

}
