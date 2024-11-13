@extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        @include('backend.layouts.nav') <!-- Include the navigation bar -->

        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar') <!-- Include the sidebar -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Subjects Data Table</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Subjects</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Subjects Table</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>Category</th>
                                                    <th>Level</th>
                                                    <th>Credits</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($subjects as $subject)
                                                    <tr>
                                                        <td>{{ $subject->id }}</td>
                                                        <td>{{ $subject->name }}</td>
                                                        <td>{{ $subject->code }}</td>
                                                        <td>{{ $subject->description }}</td>
                                                        <td>{{ $subject->category }}</td>
                                                        <td>{{ $subject->level }}</td>
                                                        <td>{{ $subject->credits }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Subject Actions">
                                                                <div class="mr-2">
                                                                    <a href="{{ route('subject.edit', $subject->id) }}"
                                                                        class="btn btn-warning" title="Edit">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                                <div>
                                                                    <form
                                                                        action="{{ route('subject.destroy', $subject->id) }}"
                                                                        method="POST" id="delete-form-{{ $subject->id }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button" class="btn btn-danger"
                                                                            title="Delete"
                                                                            onclick="confirmDelete({{ $subject->id }})">
                                                                            <i class="fas fa-trash-alt"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">No subjects found.</td>
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

    To implement the confirmation prompt for deleting a subject, you can use a similar approach to the student deletion
    example.

    Here’s how you can modify your code to add the confirmation prompt before the subject is deleted:

    Updated Delete Button with Confirmation for Subject:
    html
    Copy code
    <div>
        <form action="{{ route('subject.destroy', $subject->id) }}" method="POST" id="delete-form-{{ $subject->id }}">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger" title="Delete" onclick="confirmDelete({{ $subject->id }})">
                <i class="fas fa-trash-alt"></i> Delete
            </button>
        </form>
    </div>

    <script>
        function confirmDelete(subjectId) {
            // Use the JavaScript confirm() method to prompt the user
            if (confirm('Are you sure you want to delete this subject?')) {
                // If the user confirms, submit the form
                document.getElementById('delete-form-' + subjectId).submit();
            }
        }
    </script>
@endsection
