<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class User_Type extends Model
{
    use HasFactory;
    protected $table = 'users_types';
    protected $fillable = [
        'type',
    ];

    public function users()
    {
        return $this->hasMany(User::class,'user_type_id','id');
    }
}
