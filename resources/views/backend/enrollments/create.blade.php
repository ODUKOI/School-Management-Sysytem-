@extends('backend.layouts.main')
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
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="message-container">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert"
                                            id="successAlert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @elseif(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                            id="errorAlert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>
                                <h4 class="card-title">Create Enrollments</h4>
                                <p class="card-description">Enter the student Enrollment below</p>
                                    <form action="{{ route('enroll') }}" method="POST">
                                        @csrf
                                        <div>
                                            <label for="student_id">Student</label>
                                            <select name="student_id" id="student_id" class="form-control">
                                                @foreach($students as $student)
                                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="subject_id">Subject</label>
                                            <select name="subject_id" id="subject_id" class="form-control">
                                                @foreach($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-4">Enroll</button>
                                    </form>

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
    @endsection()
