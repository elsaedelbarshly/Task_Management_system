<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_To_Task extends Model
{
    use HasFactory;
    
    protected $table = 'images_to_tasks';
    protected $fillable = [
        'task_id',
        'image_id',
    ];
}
