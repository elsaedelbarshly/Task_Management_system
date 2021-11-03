<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'image'
    ];

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'images_to_tasks', 'task_id', 'image_id');
    }
}
