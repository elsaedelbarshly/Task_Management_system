<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manager;
class Membership extends Model
{
    use HasFactory;

    protected $table = 'memberships';
    protected $fillable = [
        'name',
        'price',
        'description',
        'duration',
        'status',
    ];

    public function mansgers()
    {
        return $this->hasMany(Manager::class,'membership_id','id');
    }
}
