<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Odukoi',
            'email'=>'jash@gmail.com',
            'password'=>bcrypt('2200706771'),
        ]);
        User::create([
            'name'=>'Sharon',
            'email'=>'sharon@gmail.com',
            'password'=>bcrypt('2200705723'),
        ]);
    }
}
