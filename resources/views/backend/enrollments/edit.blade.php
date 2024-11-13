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
                                <h4 class="card-title">Edit Enrollment</h4>
                                <p class="card-description">Update the student's enrollment details below</p>

                                <!-- Edit Enrollment Form -->
                                <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Use PUT method for update -->

                                    <div>
                                        <label for="student_id">Student</label>
                                        <select name="student_id" id="student_id" class="form-control">
                                            @foreach($students as $student)
                                                <option value="{{ $student->id }}" {{ $student->id == $enrollment->student_id ? 'selected' : '' }}>
                                                    {{ $student->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="subject_id">Subject</label>
                                        <select name="subject_id" id="subject_id" class="form-control">
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}" {{ $subject->id == $enrollment->subject_id ? 'selected' : '' }}>
                                                    {{ $subject->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4">Update Enrollment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    @include('backend.layouts.footer')
                </div>
            </div>
        </div>
    </div>
@endsection
