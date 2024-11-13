<?php

// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use App\Models\Student;

// class StudentSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         Student::create([
//             'admission_id' => 'ADM123456',
//             'name' => 'John Doe',
//             'index_number' => '123456',
//             'date_of_birth' => '2000-01-01',
//             'gender' => 'Male',
//             'section' => 'o-level',
//                 'level' => 'senior two',
//             'upload' => 'example_image1.png',
//         ]);
//         Student::create([
//                 'admission_id' => 'ADM789012',
//                 'name' => 'Jane Smith',
//                 'index_number' => '789012',
//                 'date_of_birth' => '1999-05-05',
//                 'gender' => 'Female',
//                 'section' => 'o-level',
//                 'level' => 'senior one',
//                 'upload' => 'example_image2.png',
//         ]);
//         Student::create([
//                 'admission_id' => 'ADM345678',
//                 'name' => 'Alice Johnson',
//                 'index_number' => '345678',
//                 'date_of_birth' => '2001-12-12',
//                 'gender' => 'Female',
//                 'section' => 'A-level',
//                 'level' => 'senior six',
//                 'upload' => 'example_image3.png',
//          ]);

//             // Add more entries as needed

//     }
// }


// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use App\Models\Student;
// use App\Models\Level;

// class StudentSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         // Fetching all the level IDs
//         $seniorOne = Level::where('level_name', 'Senior One')->first();
//         $seniorTwo = Level::where('level_name', 'Senior Two')->first();
//         $seniorThree = Level::where('level_name', 'Senior Three')->first();
//         $seniorFour = Level::where('level_name', 'Senior Four')->first();
//         $seniorFive = Level::where('level_name', 'Senior Five')->first();
//         $seniorSix = Level::where('level_name', 'Senior Six')->first();

//         // Creating students with a relationship to level_id
//         Student::create([
//             'admission_id' => 'ADM123456',
//             'name' => 'John Doe',
//             'index_number' => '123456',
//             'date_of_birth' => '2000-01-01',
//             'gender' => 'Male',
//             'section' => 'O-level',
//             'level_id' => $seniorTwo->id,  // Using level_id here
//             'upload' => 'example_image1.png',
//         ]);

//         Student::create([
//             'admission_id' => 'ADM789012',
//             'name' => 'Jane Smith',
//             'index_number' => '789012',
//             'date_of_birth' => '1999-05-05',
//             'gender' => 'Female',
//             'section' => 'O-level',
//             'level_id' => $seniorOne->id,  // Using level_id here
//             'upload' => 'example_image2.png',
//         ]);

//         Student::create([
//             'admission_id' => 'ADM345678',
//             'name' => 'Alice Johnson',
//             'index_number' => '345678',
//             'date_of_birth' => '2001-12-12',
//             'gender' => 'Female',
//             'section' => 'A-level',
//             'level_id' => $seniorSix->id,  // Using level_id here
//             'upload' => 'example_image3.png',
//         ]);
//     }
// }

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Level;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetching all the level IDs
        $seniorOne = Level::where('level_name', 'Senior One')->first();
        $seniorTwo = Level::where('level_name', 'Senior Two')->first();
        $seniorThree = Level::where('level_name', 'Senior Three')->first();
        $seniorFour = Level::where('level_name', 'Senior Four')->first();
        $seniorFive = Level::where('level_name', 'Senior Five')->first();
        $seniorSix = Level::where('level_name', 'Senior Six')->first();

        // Creating students with a relationship to level_id
        Student::create([
            'admission_id' => 'ADM123456',
            'name' => 'John Doe',
            'index_number' => '123456',
            'date_of_birth' => '2000-01-01',
            'gender' => 'Male',
            'section' => 'O-level',
            'level_id' => $seniorTwo->id,  // Using level_id here
            'level' => $seniorTwo->level_name, // Setting the level_name here
            'upload' => 'example_image1.png',
        ]);

        Student::create([
            'admission_id' => 'ADM789012',
            'name' => 'Jane Smith',
            'index_number' => '789012',
            'date_of_birth' => '1999-05-05',
            'gender' => 'Female',
            'section' => 'O-level',
            'level_id' => $seniorOne->id,  // Using level_id here
            'level' => $seniorOne->level_name, // Setting the level_name here
            'upload' => 'example_image2.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Alice Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'Female',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Alyyyy Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'Female',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Apetter Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'male',
            'section' => 'O-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Afilwa Johnertyu',
            'index_number' => '345667',
            'date_of_birth' => '2001-12-12',
            'gender' => 'male',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);
        Student::create([
            'admission_id' => 'ADM123456',
            'name' => 'John Doe',
            'index_number' => '123456',
            'date_of_birth' => '2000-01-01',
            'gender' => 'Male',
            'section' => 'O-level',
            'level_id' => $seniorTwo->id,  // Using level_id here
            'level' => $seniorTwo->level_name, // Setting the level_name here
            'upload' => 'example_image1.png',
        ]);

        Student::create([
            'admission_id' => 'ADM789012',
            'name' => 'Jane Smith',
            'index_number' => '789012',
            'date_of_birth' => '1999-05-05',
            'gender' => 'Female',
            'section' => 'O-level',
            'level_id' => $seniorOne->id,  // Using level_id here
            'level' => $seniorOne->level_name, // Setting the level_name here
            'upload' => 'example_image2.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Alice Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'Female',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Alyyyy Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'Female',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Apetter Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'male',
            'section' => 'O-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Afilwa Johnertyu',
            'index_number' => '345667',
            'date_of_birth' => '2001-12-12',
            'gender' => 'male',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM123456',
            'name' => 'John Doe',
            'index_number' => '123456',
            'date_of_birth' => '2000-01-01',
            'gender' => 'Male',
            'section' => 'O-level',
            'level_id' => $seniorTwo->id,  // Using level_id here
            'level' => $seniorTwo->level_name, // Setting the level_name here
            'upload' => 'example_image1.png',
        ]);

        Student::create([
            'admission_id' => 'ADM789012',
            'name' => 'Jane Smith',
            'index_number' => '789012',
            'date_of_birth' => '1999-05-05',
            'gender' => 'Female',
            'section' => 'O-level',
            'level_id' => $seniorOne->id,  // Using level_id here
            'level' => $seniorOne->level_name, // Setting the level_name here
            'upload' => 'example_image2.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Alice Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'Female',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Alyyyy Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'Female',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Apetter Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'male',
            'section' => 'O-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Afilwa Johnertyu',
            'index_number' => '345667',
            'date_of_birth' => '2001-12-12',
            'gender' => 'male',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);
        Student::create([
            'admission_id' => 'ADM123456',
            'name' => 'John Doe',
            'index_number' => '123456',
            'date_of_birth' => '2000-01-01',
            'gender' => 'Male',
            'section' => 'O-level',
            'level_id' => $seniorTwo->id,  // Using level_id here
            'level' => $seniorTwo->level_name, // Setting the level_name here
            'upload' => 'example_image1.png',
        ]);

        Student::create([
            'admission_id' => 'ADM789012',
            'name' => 'Jane Smith',
            'index_number' => '789012',
            'date_of_birth' => '1999-05-05',
            'gender' => 'Female',
            'section' => 'O-level',
            'level_id' => $seniorOne->id,  // Using level_id here
            'level' => $seniorOne->level_name, // Setting the level_name here
            'upload' => 'example_image2.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Alice Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'Female',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Alyyyy Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'Female',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Apetter Johnson',
            'index_number' => '345678',
            'date_of_birth' => '2001-12-12',
            'gender' => 'male',
            'section' => 'O-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

        Student::create([
            'admission_id' => 'ADM345678',
            'name' => 'Afilwa Johnertyu',
            'index_number' => '345667',
            'date_of_birth' => '2001-12-12',
            'gender' => 'male',
            'section' => 'A-level',
            'level_id' => $seniorSix->id,  // Using level_id here
            'level' => $seniorSix->level_name, // Setting the level_name here
            'upload' => 'example_image3.png',
        ]);

    }
}
