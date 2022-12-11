<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{   
    use HasRoles;
    use SoftDeletes;

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'passport_number',
        'username',
        'status',
        'email',
        'phone',
        'password',
        'avatar',
        'application_status',
        'device_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'otp',
        'api_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function application(){
        return $this->hasMany(Application::class);
    }
  
    function donations(){
        return $this->hasMany(Donation::class)->orderBy('created_at', 'desc');
    }
    // function alldonations(){
    //     return $this->hasMany(Donation::class,'user_id');
    // }
    function totaldonations(){
        return $this->hasMany(Donation::class)->where('status', 'APPROVED');
    }
    function rejecteddonations(){
        return $this->hasMany(Donation::class)->where('status', 'REJECTED');
    }
    function pendingdonations(){
        return $this->hasMany(Donation::class)->where('status', 'PENDING');
    }

}
