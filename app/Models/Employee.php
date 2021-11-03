<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Organization;
use App\Models\Task;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'address',
        'education',
        'phone',
        'date_of_birth',
        'user_id',
        'organization_id',
    ];

    /**
     * Get the user that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the user that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organizations()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class,'employee_id','id');
    }
}
