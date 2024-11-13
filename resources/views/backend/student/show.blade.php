@extends('backend.layouts.main')
@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav')
        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Student Details</h4>
                                <p class="card-description">
                                    Viewing details for {{ $student->name }}
                                </p>

                                <div class="mb-3">
                                    <label for="admission_id">Admission ID:</label>
                                    <p id="admission_id">{{ $student->admission_id }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="name">Name:</label>
                                    <p id="name">{{ $student->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="index_number">Index Number:</label>
                                    <p id="index_number">{{ $student->index_number }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="date_of_birth">Date of Birth:</label>
                                    <p id="date_of_birth">{{ $student->date_of_birth }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="gender">Gender:</label>
                                    <p id="gender">{{ $student->gender }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="section">Section:</label>
                                    <p id="section">{{ $student->section }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="level">Level:</label>
                                    <p id="level">{{ $student->level }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="upload">Uploaded File:</label>
                                    @if ($student->upload)
                                        <p id="upload"><a href="{{ asset('uploads/' . $student->upload) }}"
                                                target="_blank">View File</a></p>
                                    @else
                                        <p id="upload">No file uploaded</p>
                                    @endif
                                </div>

                                <a href="{{ route('student.index') }}" class="btn btn-primary">Back to Students List</a>
                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">Edit
                                    Student</a>
                                <form action="{{ route('student.destroy', $student->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete Student</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>
@endsection
