<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status_Task;
class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tas = new Status_Task();
        $tas->status = 'Assigned';
        $tas->save();

        $tas = new Status_Task();
        $tas->status = 'Closed';
        $tas->save();
        
        $tas = new Status_Task();
        $tas->status = 'Projected';
        $tas->save();
    }
}
