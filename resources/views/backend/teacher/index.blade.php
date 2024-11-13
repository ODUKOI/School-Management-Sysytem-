@extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav') <!-- Include the navigation bar -->

        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar') <!-- Include the sidebar -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Teachers Data Table</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Teachers</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Teachers List</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Teacher ID</th>
                                                    <th>Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Gender</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($teachers as $teacher)
                                                    <tr>
                                                        <td>{{ $teacher->id }}</td>
                                                        <td>{{ $teacher->name }}</td>
                                                        <td>{{ $teacher->date_of_birth }}</td>
                                                        <td>{{ $teacher->gender }}</td>
                                                        <td>{{ $teacher->phone }}</td>
                                                        <td>{{ $teacher->email }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Teacher Actions">
                                                                <div class="mr-2">
                                                                    <a href="{{ route('teacher.edit', $teacher->id) }}"
                                                                        class="btn btn-warning" title="Edit">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                                <div>
                                                                <form action="{{ route('teacher.destroy', $teacher->id) }}"
                                                                    method="POST" id="delete-form-{{ $teacher->id }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-danger"
                                                                        title="Delete"
                                                                        onclick="confirmDelete({{ $teacher->id }})">
                                                                        <i class="fas fa-trash-alt"></i> Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                    </div>
                                    </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No teachers found.</td>
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
        function confirmDelete(teacherId) {
            // Use the JavaScript confirm() method to prompt the user
            if (confirm('Are you sure you want to delete this teacher?')) {
                // If the user confirms, submit the form
                document.getElementById('delete-form-' + teacherId).submit();
            }
        }
    </script>
@endsection
