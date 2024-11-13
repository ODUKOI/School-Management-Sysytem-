<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}">
                </div>
                <div class="profile-name">
                    <p class="name">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    </p>
                    <p class="designation">
                        Super Admin
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fab fa-trello menu-icon"></i>
                <span class="menu-title">Students</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('student.create') }}">Add
                            student</a></li>
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('student.index') }}">View
                            student</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false"
                aria-controls="sidebar-layouts">
                <i class="fas fa-columns menu-icon"></i>
                <span class="menu-title">Teacher</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('teacher.create') }}">Add Teacher</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('teacher.index') }}">View Teacher</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="far fa-compass menu-icon"></i>
                <span class="menu-title">Subject</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('subject.create') }}">Add Subject</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('subject.index') }}">View Subject</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false"
                aria-controls="ui-advanced">
                <i class="fas fa-clipboard-list menu-icon"></i>
                <span class="menu-title">Roles</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/coming-soon') }}">Add Role</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/coming-soon') }}">View Roles</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="fab fa-wpforms menu-icon"></i>
                <span class="menu-title">Levels</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('levels.create') }}">Add Levels</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('levels.index') }}">View Levels</a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false"
                aria-controls="editors">
                <i class="fas fa-pen-square menu-icon"></i>
                <span class="menu-title">Enrollments</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="editors">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('enroll.create') }}">Enrol Student</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('enrollments.index') }}">View enroled students</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.show') }}">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Settings</span>
            </a>
        </li>


        {{--      <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="fas fa-chart-pie menu-icon"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/morris.html">Morris</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/flot-chart.html">Flot</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/google-charts.html">Google
                            charts</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/sparkline.html">Sparkline js</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/c3.html">C3 charts</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartist.html">Chartists</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/justGage.html">JustGage</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="fas fa-table menu-icon"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/data-table.html">Data table</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/js-grid.html">Js-grid</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/sortable-table.html">Sortable
                            table</a></li>
                </ul>
            </div>
        </li> --}}
    </ul>
</nav>
<script>
    document.querySelector('.btn-primary').addEventListener('click', function(e) {
        e.preventDefault();
        alert('This feature is coming soon!');
        window.location.href = "{{ url('/coming-soon') }}";
    });
</script>
