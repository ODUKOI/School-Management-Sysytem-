{{-- @extends('backend.layouts.main')
@section('content')
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.layouts.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->

        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('backend.layouts.sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                        Dashboard
                    </h3>
                </div>
                <div class="row grid-margin">
                    <div class="col-12">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fa fa-user mr-2"></i>
                                            New users
                                        </p>
                                        <h2>54000</h2>
                                        <label class="badge badge-outline-success badge-pill">2.7% increase</label>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                                            Avg Time
                                        </p>
                                        <h2>123.50</h2>
                                        <label class="badge badge-outline-danger badge-pill">30% decrease</label>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                                            Downloads
                                        </p>
                                        <h2>3500</h2>
                                        <label class="badge badge-outline-success badge-pill">12% increase</label>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-check-circle mr-2"></i>
                                            Update
                                        </p>
                                        <h2>7500</h2>
                                        <label class="badge badge-outline-success badge-pill">57% increase</label>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-chart-line mr-2"></i>
                                            Sales
                                        </p>
                                        <h2>9000</h2>
                                        <label class="badge badge-outline-success badge-pill">10% increase</label>
                                    </div>
                                    <div class="statistics-item">
                                        <p>
                                            <i class="icon-sm fas fa-circle-notch mr-2"></i>
                                            Pending
                                        </p>
                                        <h2>7500</h2>
                                        <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-gift"></i>
                                    Orders
                                </h4>
                                <canvas id="orders-chart"></canvas>
                                <div id="orders-chart-legend" class="orders-chart-legend"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-chart-line"></i>
                                    Sales
                                </h4>
                                <h2 class="mb-5">56000 <span class="text-muted h4 font-weight-normal">Sales</span>
                                </h2>
                                <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('backend.layouts.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@endsection() --}}

{{-- second dash --}}
{{-- @extends('backend.layouts.main')
@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav')
        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Dashboard</h3>
                    </div>
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                                        <div class="statistics-item">
                                            <p><i class="icon-sm fa fa-user mr-2"></i> New Users</p>
                                            <h2>{{ $newUsers }}</h2>
                                            <label
                                                class="badge badge-outline-{{ $newUsersLabel }} badge-pill">{{ $percentageChangeNewUsers }}%
                                                change</label>
                                        </div>
                                        <div class="statistics-item">
                                            <p><i class="icon-sm fas fa-user-check mr-2"></i> Active Users</p>
                                            <h2>{{ $activeUsers }}</h2>
                                            <label
                                                class="badge badge-outline-{{ $activeUsersLabel }} badge-pill">{{ $percentageChangeActiveUsers }}%
                                                change</label>
                                        </div>
                                        <div class="statistics-item">
                                            <p><i class="icon-sm fas fa-graduation-cap mr-2"></i> Total Students</p>
                                            <h2>{{ $totalStudents }}</h2>
                                            <label class="badge badge-outline-primary badge-pill">Overall Count</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-chart-line"></i> User Growth</h4>
                                    <canvas id="user-growth-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-chart-pie"></i> Active Users</h4>
                                    <canvas id="active-users-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // User Growth Chart
            const ctxUserGrowth = document.getElementById('user-growth-chart').getContext('2d');
            new Chart(ctxUserGrowth, {
                type: 'line',
                data: {
                    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
                    "Sun"], // Replace with dynamic labels if needed
                    datasets: [{
                        label: 'New Users',
                        data: [10, 15, 12, 20, 30, 25,
                        35], // Replace with dynamic data from your backend
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Active Users Chart
            const ctxActiveUsers = document.getElementById('active-users-chart').getContext('2d');
            new Chart(ctxActiveUsers, {
                type: 'doughnut',
                data: {
                    labels: ['Active', 'Inactive'],
                    datasets: [{
                        label: 'Users',
                        data: [{{ $activeUsers }}, {{ $totalStudents - $activeUsers }}],
                        backgroundColor: ['#4CAF50', '#FFC107'],
                        borderColor: ['#4CAF50', '#FFC107'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        });
    </script>
@endsection --}}


{{-- last --}}
{{-- @extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav')
        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Dashboard</h3>
                    </div>

                    <!-- Statistic Cards Row -->
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                                        <!-- New Users Card -->
                                        <div class="statistics-item">
                                            <p><i class="icon-sm fa fa-user mr-2"></i> New Users</p>
                                            <h2>{{ $newUsers }}</h2>
                                            <label class="badge badge-outline-{{ $newUsersLabel }} badge-pill">
                                                {{ $percentageChangeNewUsers }}% change
                                            </label>
                                        </div>
                                        <!-- Active Users Card -->
                                        <div class="statistics-item">
                                            <p><i class="icon-sm fas fa-user-check mr-2"></i> Active Users</p>
                                            <h2>{{ $activeUsers }}</h2>
                                            <label class="badge badge-outline-{{ $activeUsersLabel }} badge-pill">
                                                {{ $percentageChangeActiveUsers }}% change
                                            </label>
                                        </div>
                                        <!-- Total Students Card -->
                                        <div class="statistics-item">
                                            <p><i class="icon-sm fas fa-graduation-cap mr-2"></i> Total Students</p>
                                            <h2>{{ $totalStudents }}</h2>
                                            <label class="badge badge-outline-primary badge-pill">Overall Count</label>
                                        </div>
                                        <!-- Total Teachers Card -->
                                        <div class="statistics-item">
                                            <p><i class="icon-sm fas fa-chalkboard-teacher mr-2"></i> Total Teachers</p>
                                            <h2>{{ $totalTeachers }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Row -->
                    <div class="row">
                        <!-- Student Statistics Chart -->
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-chart-line"></i> Student Statistics</h4>
                                    <canvas id="student-statistics-chart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Teacher Statistics Chart -->
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-chart-pie"></i> Teacher Statistics</h4>
                                    <canvas id="teacher-statistics-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Student Statistics Chart
            const studentCtx = document.getElementById('student-statistics-chart').getContext('2d');
            new Chart(studentCtx, {
                type: 'bar',
                data: {
                    labels: ['Total Students', 'New Students This Week'],
                    datasets: [{
                        label: 'Students',
                        data: [{{ $totalStudents }}, {{ $newStudentsThisWeek }}],
                        backgroundColor: ['#4CAF50', '#FFC107'],
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Teacher Statistics Chart
            const teacherCtx = document.getElementById('teacher-statistics-chart').getContext('2d');
            new Chart(teacherCtx, {
                type: 'bar',
                data: {
                    labels: ['Total Teachers', 'New Teachers This Week'],
                    datasets: [{
                        label: 'Teachers',
                        data: [{{ $totalTeachers }}, {{ $newTeachersThisWeek }}],
                        backgroundColor: ['#36A2EB', '#FF6384'],
                    }]
                },
                options: {
                    responsive: true
                }
            });
        });
    </script>
@endsection --}}

{{-- fin --}}
@extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav')
        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Dashboard</h3>
                    </div>

                    <!-- Statistic Cards Row -->
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div class="card card-statistics">
                                <div class="card-body">
                                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                                        <!-- New Users Card -->
                                        <div class="statistics-item">
                                            <p><i class="icon-sm fa fa-user mr-2"></i> New Users</p>
                                            <h2>{{ $newUsers }}</h2>
                                            <label class="badge badge-outline-{{ $newUsersLabel }} badge-pill">
                                                {{ $percentageChangeNewUsers }}% change
                                            </label>
                                        </div>
                                        <!-- Active Users Card -->
                                        <div class="statistics-item">
                                            <p><i class="icon-sm fas fa-user-check mr-2"></i> Active Users</p>
                                            <h2>{{ $activeUsers }}</h2>
                                            <label class="badge badge-outline-{{ $activeUsersLabel }} badge-pill">
                                                {{ $percentageChangeActiveUsers }}% change
                                            </label>
                                        </div>
                                        <!-- Total Students Card -->
                                        <div class="statistics-item">
                                            <p><i class="icon-sm fas fa-graduation-cap mr-2"></i> Total Students</p>
                                            <h2>{{ $totalStudents }}</h2>
                                            <label class="badge badge-outline-primary badge-pill">Overall Count</label>
                                        </div>
                                        <!-- Total Teachers Card -->
                                        <div class="statistics-item">
                                            <p><i class="icon-sm fas fa-chalkboard-teacher mr-2"></i> Total Teachers</p>
                                            <h2>{{ $totalTeachers }}</h2>
                                            <label class="badge badge-outline-primary badge-pill">Overall Count</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Row -->
                    <div class="row">
                        <!-- Student Statistics Chart -->
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-chart-line"></i> Student Statistics</h4>
                                    <canvas id="student-statistics-chart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Teacher Statistics Chart -->
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-chart-pie"></i> Teacher Statistics</h4>
                                    <canvas id="teacher-statistics-chart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Levels Distribution Chart -->
                        {{-- <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fas fa-users"></i> Students Per Level</h4>
                                    <canvas id="levels-distribution-chart"></canvas>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Student Statistics Chart
            const studentCtx = document.getElementById('student-statistics-chart').getContext('2d');
            new Chart(studentCtx, {
                type: 'bar',
                data: {
                    labels: ['Total Students', 'New Students This Week'],
                    datasets: [{
                        label: 'Students',
                        data: [{{ $totalStudents }}, {{ $newStudentsThisWeek }}],
                        backgroundColor: ['#4CAF50', '#FFC107'],
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Teacher Statistics Chart
            const teacherCtx = document.getElementById('teacher-statistics-chart').getContext('2d');
            new Chart(teacherCtx, {
                type: 'bar',
                data: {
                    labels: ['Total Teachers', 'New Teachers This Week'],
                    datasets: [{
                        label: 'Teachers',
                        data: [{{ $totalTeachers }}, {{ $newTeachersThisWeek }}],
                        backgroundColor: ['#36A2EB', '#FF6384'],
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Levels Distribution Chart
            const levelsCtx = document.getElementById('levels-distribution-chart').getContext('2d');

// // Convert PHP data to JavaScript
// const levelData = {!! json_encode($levelsStats) !!};

// // Prepare the labels (level names) and the dataset (student counts)
// const levelLabels = levelData.map(level => level.id);  // Level names
// const studentCounts = levelData.map(level => level.students_count);  // Student counts per level

// new Chart(levelsCtx, {
//     type: 'pie',
//     data: {
//         labels: levelLabels,  // Use the level names as labels
//         datasets: [{
//             label: 'Students per Level',
//             data: studentCounts,  // Use the student counts as data
//             backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#57FF33', '#FF8C00', '#800080'], // Colors for the chart segments
//         }]
//     },
//     options: {
//         responsive: true
//     }
// });
        });
    </script>
@endsection
