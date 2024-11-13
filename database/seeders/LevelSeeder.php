<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Level::create([
            'level_name' => 'Senior One',
            'section' => 'O-Level',
        ]);
        Level::create([
            'level_name' => 'Senior Two',
            'section' => 'O-Level',
        ]);
        Level::create([
            'level_name' => 'Senior Three', 'section' => 'O-Level',

        ]);
        Level::create([
           'level_name' => 'Senior Four', 'section' => 'O-Level',

        ]);
        Level::create([
            'level_name' => 'Senior Five', 'section' => 'A-Level',
        ]);
        Level::create([
            'level_name' => 'Senior Six',
            'section' => 'A-Level',
        ]);

    }
}
