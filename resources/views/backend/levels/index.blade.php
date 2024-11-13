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
                                                    <th>Level Name</th>
                                                    <th>Section</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($levels as $level)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $level->level_name }}</td>
                                                        <td>{{ $level->section }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Subject Actions">
                                                                <div class="mr-2">
                                                                    <a href="{{ route('levels.edit', $level->id) }}"
                                                                        class="btn btn-warning btn-sm">Edit</a>
                                                                </div>
                                                                <div>
                                                                    <form action="{{ route('levels.destroy', $level->id) }}"
                                                                        method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                            onclick="return confirm('Are you sure you want to delete this level?')">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">No levels found.</td>
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
@endsection
