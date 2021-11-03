<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
class Status_Task extends Model
{
    use HasFactory;

    protected $table = 'status_tasks';
    protected $fillable = [
        'status'
    ];

    public function tasks()
    {
        return $this->hasMany(Status_Task::class,'status_id','id');
    }
}
