<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manager;
class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Manager::class,2)->create();
    }
}
