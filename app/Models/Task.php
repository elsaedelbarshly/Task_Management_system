<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Organization;
use App\Models\Status_Task;
use App\Models\Image;
class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'title',
        'description',
        'from',
        'to',
        'employee_id',
        'manager_id',
        'organization_id',
        'status_id'
    ];

    public function employees()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function managers()
    {
        return $this->belongsTo(Manger::class,'manager_id','id');
    }

    public function organizations()
    {
        return $this->belongsTo(Organization::class,'organization_id','id');
    }

    public function status_tasks()
    {
        return $this->belongsTo(Status_Task::class,'status_id','id');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class,'images_to_tasks','image_id','task_id');
    }
}
