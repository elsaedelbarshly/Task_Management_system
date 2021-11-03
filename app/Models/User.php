<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\User_Type;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'gender',
        'status',
        'profile_photo',
        'user_type_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class,'user_id','id');
    }

    public function managers()
    {
        return $this->hasMany(Manager::class,'user_id','id');
    }

    public function users_types()
    {
        return $this->belongsTo(User_Type::class,'user_type_id','id');
    }
}
