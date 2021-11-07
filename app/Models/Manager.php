<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Organization;
use App\Models\Membership;
use App\Models\Task;
class Manager extends Model
{
    use HasFactory;

    protected $table = 'managers';
    protected $fillable = [
        'section',
        'join_date',
        'user_id',
        'membership_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class,'manager_id','id');
    }

    public function memberships()
    {
        return $this->belogsTo(Membership::class,'membership_id','id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class,'manager_id','id');
    }
}
