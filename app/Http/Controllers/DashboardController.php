<?php

// namespace App\Http\Controllers;

// use App\Models\crs;
// use App\Models\Student;
// use App\Models\User;
// use Illuminate\Support\Facades\DB;

// use Carbon\Carbon;

// use Illuminate\Http\Request;

// class DashboardController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         // Count new users registered in the past week
//         $newUsers = User::where('created_at', '>=', Carbon::now()->subWeek())->count();

//         // Count total students
//         $totalStudents = Student::count();

//         // Count active users based on session activity
//         $activeUsers = DB::table('sessions')
//             ->where('last_activity', '>=', Carbon::now()->subDay()->timestamp)
//             ->count();

//         // Sample percentage change calculations
//         $percentageChangeNewUsers = $this->calculatePercentageChange($newUsers, User::count() - $newUsers);
//         $percentageChangeActiveUsers = $this->calculatePercentageChange($activeUsers, User::count() - $activeUsers);

//         // Status labels based on percentage
//         $newUsersLabel = $percentageChangeNewUsers > 0 ? 'success' : 'danger';
//         $activeUsersLabel = $percentageChangeActiveUsers > 0 ? 'success' : 'danger';

//         return view('dashboard', compact('newUsers', 'totalStudents', 'activeUsers', 'percentageChangeNewUsers', 'newUsersLabel', 'percentageChangeActiveUsers', 'activeUsersLabel'));
//     }
//     private function calculatePercentageChange($current, $previous)
//     {
//         if ($previous == 0) return 100; // Avoid division by zero
//         return round((($current - $previous) / $previous) * 100, 2);
//     }
// }


namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\crs;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Level;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Count new users registered in the past week
        $newUsers = User::where('created_at', '>=', Carbon::now()->subWeek())->count();

        // Count total students
        $totalStudents = Student::count();

        // Count active users based on session activity
        $activeUsers = DB::table('sessions')
            ->where('last_activity', '>=', Carbon::now()->subDay()->timestamp)
            ->count();

        // Sample percentage change calculations
        $percentageChangeNewUsers = $this->calculatePercentageChange($newUsers, User::count() - $newUsers);
        $percentageChangeActiveUsers = $this->calculatePercentageChange($activeUsers, User::count() - $activeUsers);

        // Status labels based on percentage
        $newUsersLabel = $percentageChangeNewUsers > 0 ? 'success' : 'danger';
        $activeUsersLabel = $percentageChangeActiveUsers > 0 ? 'success' : 'danger';

        // Existing statistics
        $newUsers = User::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $totalStudents = Student::count();
        $activeUsers = DB::table('sessions')
            ->where('last_activity', '>=', Carbon::now()->subDay()->timestamp)
            ->count();

        // Additional statistics
        $newStudents = Student::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $totalTeachers = Teacher::count();
        $newTeachers = Teacher::where('created_at', '>=', Carbon::now()->subWeek())->count();
        // $teacherSpecializations = Teacher::select('specialization', DB::raw('count(*) as count'))
        //     ->groupBy('specialization')->get();

        $totalSubjects = Subject::count();
        $totalLevels = Level::count();
        $studentsPerLevel = Student::select('level_id', DB::raw('count(*) as count'))
            ->groupBy('level_id')->get();

        // Calculations for percentage changes and status labels
        $percentageChangeNewUsers = $this->calculatePercentageChange($newUsers, User::count() - $newUsers);
        $percentageChangeActiveUsers = $this->calculatePercentageChange($activeUsers, User::count() - $activeUsers);
        $newUsersLabel = $percentageChangeNewUsers > 0 ? 'success' : 'danger';
        $activeUsersLabel = $percentageChangeActiveUsers > 0 ? 'success' : 'danger';

        $newUsers = User::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $totalStudents = Student::count();
        $activeUsers = DB::table('sessions')
            ->where('last_activity', '>=', Carbon::now()->subDay()->timestamp)
            ->count();

        $percentageChangeNewUsers = $this->calculatePercentageChange($newUsers, User::count() - $newUsers);
        $percentageChangeActiveUsers = $this->calculatePercentageChange($activeUsers, User::count() - $activeUsers);
        $newUsersLabel = $percentageChangeNewUsers > 0 ? 'success' : 'danger';
        $activeUsersLabel = $percentageChangeActiveUsers > 0 ? 'success' : 'danger';

        // Additional statistics
        $newStudentsThisWeek = Student::where('created_at', '>=', Carbon::now()->subWeek())->count();
        $totalTeachers = Teacher::count();
        $newTeachersThisWeek = Teacher::where('created_at', '>=', Carbon::now()->subWeek())->count();
        // $teacherSpecializationStats = Teacher::select('specialization', DB::raw('count(*) as count'))
        //     ->groupBy('specialization')
        //     ->get();
        $totalSubjects = Subject::count();
        // $levelsStats = Level::withCount('students')->get();

        $levelsStats = DB::table('students')
        ->select('level_id', DB::raw('count(*) as students_count'))
        ->groupBy('level_id')
        ->join('levels', 'students.level_id', '=', 'levels.id')
        ->get();

        return view('dashboard', compact(
            'newUsers', 'totalStudents', 'activeUsers', 'percentageChangeNewUsers',
            'newUsersLabel', 'percentageChangeActiveUsers', 'activeUsersLabel',
            'newStudentsThisWeek', 'totalTeachers', 'newTeachersThisWeek','studentsPerLevel',
            'totalSubjects', 'levelsStats'
        ));
    }

    private function calculatePercentageChange($current, $previous)
    {
        if ($previous == 0) return 100; // Avoid division by zero
        return round((($current - $previous) / $previous) * 100, 2);
    }
}


// namespace App\Http\Controllers;

// use App\Models\Student;
// use App\Models\User;
// use App\Models\Teacher;
// use App\Models\Subject;
// use App\Models\Level;
// use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

// class DashboardController extends Controller
// {
//     public function index()
//     {
//         // Count new users registered in the past week
//         $newUsers = User::where('created_at', '>=', Carbon::now()->subWeek())->count();

//         // Count total students
//         $totalStudents = Student::count();

//         // Count active users based on session activity
//         $activeUsers = DB::table('sessions')
//             ->where('last_activity', '>=', Carbon::now()->subDay()->timestamp)
//             ->count();

//         // Additional statistics
//         $newStudentsThisWeek = Student::where('created_at', '>=', Carbon::now()->subWeek())->count();
//         $totalTeachers = Teacher::count();
//         $newTeachersThisWeek = Teacher::where('created_at', '>=', Carbon::now()->subWeek())->count();
//         $totalSubjects = Subject::count();
//         $levelsStats = Level::withCount('students')->get();

//         return view('dashboard', compact(
//             'newUsers', 'totalStudents', 'activeUsers', 'newStudentsThisWeek',
//             'totalTeachers', 'newTeachersThisWeek', 'totalSubjects', 'levelsStats'
//         ));
//     }

//     private function calculatePercentageChange($current, $previous)
//     {
//         if ($previous == 0) return 100; // Avoid division by zero
//         return round((($current - $previous) / $previous) * 100, 2);
//     }
// }
