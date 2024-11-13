@extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav') <!-- Include the navigation bar -->

        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar') <!-- Include the sidebar -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Enrollment Data Table</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Enrollments</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Student Enrollment List</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Student ID</th>
                                                    <th>Student Name</th>
                                                    <th>Subjects Enrolled</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($students as $student)
                                                    <tr>
                                                        <td>{{ $student->id }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>
                                                            <ul>
                                                                @forelse($student->subjects as $subject)
                                                                    <li>{{ $subject->name }}</li>
                                                                @empty
                                                                    <li>No subjects enrolled.</li>
                                                                @endforelse
                                                            </ul>
                                                        </td>
                                                        <td>




                                                            <div class="btn-group mr-7" role="group" aria-label="Enrollment Actions" >
                                                               <div>
                                                                <a href="{{ route('enrollments.edit', $student->id) }}"
                                                                   class="btn btn-warning" title="Edit Enrollment">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                                <button type="button" class="btn btn-danger"
                                                                        title="Delete Enrollment"
                                                                        onclick="confirmDelete({{ $student->id }})">
                                                                    <i class="fas fa-trash-alt"></i> Delete
                                                                </button>
                                                                </div>
                                                                <div>
                                                                <form action="{{ route('enrollments.destroy', $student->id) }}"
                                                                      method="POST" id="delete-form-{{ $student->id }}" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">No enrollments found.</td>
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
            if (confirm('Are you sure you want to delete this enrollment?')) {
                document.getElementById('delete-form-' + studentId).submit();
            }
        }
    </script>
@endsection
