<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Task;


class Organization extends Model
{
    use HasFactory;

    protected $table = 'organizations';
    protected $fillable = [
        'name',
        'description',
        'status',
        'manager_id',
    ];


    public function employees()
    {
        return $this->hasMany(Employee::class, 'organization_id', 'id');
    }

    public function managers()
    {
        return $this->belongsTo(Manager::class,'manager_id','id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class,'organization_id','id');
    }

}
