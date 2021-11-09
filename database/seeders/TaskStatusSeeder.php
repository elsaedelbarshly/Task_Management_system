<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskStatus;
class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tas = new TaskStatus();
        $tas->status = 'Assigned';
        $tas->save();

        $tas = new TaskStatus();
        $tas->status = 'Closed';
        $tas->save();
        
        $tas = new TaskStatus();
        $tas->status = 'Projected';
        $tas->save();
    }
}
