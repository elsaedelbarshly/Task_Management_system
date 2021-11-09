<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = 'elsaed';
        $user->username = 'elsaed12';
        $user->email = 'elsaed@gmail.com';
        $user->gender = 'male';
        $user->password = Hash::make(123456);
        $user->save();

        $user = new User();
        $user->name = 'medo';
        $user->username = 'medo123';
        $user->email = 'medo@gmail.com';
        $user->gender = 'male';
        $user->password = Hash::make(123456);
        $user->save();

        $user = new User();
        $user->name = 'menaa';
        $user->username = 'menna124';
        $user->email = 'menaam@gmail.com';
        $user->gender = 'female';
        $user->password = Hash::make(123456);
        $user->save();

        $user = new User();
        $user->name = 'islam';
        $user->username = 'islam125';
        $user->email = 'islam@gmail.com';
        $user->gender = 'male';
        $user->password = Hash::make(123456);
        $user->save();

        $user = new User();
        $user->name = 'mostafa';
        $user->username = 'memostafa126';
        $user->email = 'mostafa@gmail.com';
        $user->gender = 'male';
        $user->password = Hash::make(123456);
        $user->save();

        $user = new User();
        $user->name = 'elnamr';
        $user->username = 'elnamr127';
        $user->email = 'elnamr@gmail.com';
        $user->gender = 'male';
        $user->password = Hash::make(123456);
        $user->save();
    }
}
