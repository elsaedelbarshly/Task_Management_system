<?php

namespace Database\Seeders;

use App\Models\User_Type;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usertype = new User_Type();
        $usertype->type = 'Super Admin';
        $usertype->save();

        $usertype = new User_Type();
        $usertype->type = 'Admin';
        $usertype->save();

        $usertype = new User_Type();
        $usertype->type = 'Employee';
        $usertype->save();

        $usertype = new User_Type();
        $usertype->type = 'Mmanger';
        $usertype->save();
    }
}
