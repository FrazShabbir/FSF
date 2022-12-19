<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function head()
    {
        return $this->belongsTo(User::class,'officehead');
    }

}
