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
                                <h4 class="card-title">Edit Subject</h4>
                                <form class="forms-sample" method="POST" action="{{ route('subject.update', $subject->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="code">Subject Code<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="code" value="{{ $subject->code }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{ $subject->name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description">{{ $subject->description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Category<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="category" value="{{ $subject->category }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="level">Level<span class="text-danger">*</span></label>
                                        <select class="form-control" name="level" required>
                                            <option value="Beginner" {{ $subject->level == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                            <option value="Intermediate" {{ $subject->level == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                            <option value="Advanced" {{ $subject->level == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="credits">Credits</label>
                                        <input type="number" class="form-control" name="credits" value="{{ $subject->credits }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                    <a href="{{ route('subject.index') }}" class="btn btn-light">Cancel</a>
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
