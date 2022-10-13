<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country_id',
    ];
    public function provinces(){
        return $this->hasMany(Province::class);
    }
    public function applications(){
        return $this->hasMany(Application::class);
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }

}
