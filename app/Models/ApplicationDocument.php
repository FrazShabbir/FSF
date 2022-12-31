<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationDocument extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    function user(){
        return $this->belongsTo(User::class,'uploader');
    }
}
