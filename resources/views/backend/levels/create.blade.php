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
                                <h4 class="card-title">Add New Level</h4>
                                <p class="card-description">Enter the level details below</p>

                                <!-- Display success or error messages -->
                                <div class="message-container">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @elseif(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                </div>

                                <!-- Form for adding new level -->
                                <form class="forms-sample" method="POST" action="{{ route('levels.store') }}">
                                    @csrf

                                    <!-- Level Name -->
                                    <div class="form-group">
                                        <label for="level_name">Level Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('level_name') is-invalid @enderror"
                                            id="level_name" name="level_name" placeholder="Level Name" value="{{ old('level_name') }}" required>
                                        @error('level_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Section -->
                                    <div class="form-group">
                                        <label for="section">Section<span class="text-danger">*</span></label>
                                        <select class="form-control @error('section') is-invalid @enderror" id="section" name="section" required>
                                            <option value="" disabled selected>Select Section</option>
                                            <option value="O-Level" {{ old('section') == 'O-Level' ? 'selected' : '' }}>O-Level</option>
                                            <option value="A-Level" {{ old('section') == 'A-Level' ? 'selected' : '' }}>A-Level</option>
                                        </select>
                                        @error('section')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{ route('levels.index') }}" class="btn btn-light">Cancel</a>
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
