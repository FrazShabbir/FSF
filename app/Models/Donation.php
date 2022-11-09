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
}
