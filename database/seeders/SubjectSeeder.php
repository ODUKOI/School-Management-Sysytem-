<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'name' => 'Mathematics',
            'code' => 'MATH101',
            'description' => 'Basic mathematics covering algebra and calculus.',
            'category' => 'Science',
            'level' => 'Advanced',
            'credits' => 4,
        ]);
        Subject::create([
                'name' => 'History',
                'code' => 'HIS104',
                'description' => 'World history from ancient to modern times.',
                'category' => 'Social Studies',
                'level' => 'Intermediate',
                'credits' => 3,
        ]);
         Subject::create([
            'name' => 'Geography',
            'code' => 'GEO105',
            'description' => 'Study of physical and human geography.',
            'category' => 'Social Studies',
            'level' => 'Beginner',
            'credits' => 2,
        ]);
        Subject::create([
                 'name' => 'Physics',
                'code' => 'PHY103',
                'description' => 'Fundamentals of physics including mechanics and optics.',
                'category' => 'Science',
                'level' => 'Advanced',
                'credits' => 5,
        ]);
        Subject::create([
                'name' => 'English Language',
                'code' => 'ENG102',
                'description' => 'English grammar, literature, and writing skills.',
                'category' => 'Arts',
                'level' => 'Intermediate',
                'credits' => 3,
        ]);


    }
}
