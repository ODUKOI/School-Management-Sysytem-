@extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav') <!-- Include the navigation bar -->

        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar') <!-- Include the sidebar -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Data table</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data table</li>
                            </ol>
                        </nav>
                    </div>
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
                            <h4 class="card-title">Student Table</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Admission ID</th>
                                                    <th>Name</th>
                                                    <th>Index Number</th>
                                                    <th>Date of Birth</th>
                                                    <th>Gender</th>
                                                    <th>Section</th>
                                                    <th>Level</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($students as $student)
                                                    <tr>
                                                        <td>{{ $student->admission_id }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->index_number }}</td>
                                                        <td>{{ $student->date_of_birth }}</td>
                                                        <td>{{ $student->gender }}</td>
                                                        <td>{{ $student->section }}</td>
                                                        <td>{{ $student->level }}</td>  <!-- Display the level name -->
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Student Actions">
                                                                <div class="mr-2">
                                                                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning" title="Edit">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                                {{-- <div>
                                                                    <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger" title="Delete">
                                                                            <i class="fas fa-trash-alt"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </div> --}}
                                                                <div>
                                                                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" id="delete-form-{{ $student->id }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button" class="btn btn-danger" title="Delete" onclick="confirmDelete({{ $student->id }})">
                                                                            <i class="fas fa-trash-alt"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">No students found.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @include('backend.layouts.footer') <!-- Include the footer -->
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(studentId) {
            // Use the JavaScript confirm() method to prompt the user
            if (confirm('Are you sure you want to delete this student?')) {
                // If the user confirms, submit the form
                document.getElementById('delete-form-' + studentId).submit();
            }
        }
    </script>
@endsection
