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
                                <h4 class="card-title">Edit Student</h4>
                                <form class="forms-sample" method="POST" action="{{ route('student.update', $student->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="exampleInputName1">Admission ID</label>
                                        <input type="text" class="form-control" name="admission_id"
                                            value="{{ $student->admission_id }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $student->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Index Number<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="index_number"
                                            value="{{ $student->index_number }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                        <div class="">
                                            <input class="form-control" name="date_of_birth" type="date"
                                                value="{{ $student->date_of_birth }}" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Gender<span class="text-danger">*</span></label>
                                        <select class="form-control" name="gender" required>
                                            <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectGender">Section<span class="text-danger">*</span></label>
                                        <select class="form-control" name="section" required>
                                            <option value="O-Level" {{ $student->section == 'O-Level' ? 'selected' : '' }}>
                                                O-Level</option>
                                            <option value="A-Level" {{ $student->section == 'A-Level' ? 'selected' : '' }}>
                                                A-Level</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Level<span class="text-danger">*</span></label>
                                        <select class="form-control" name="level_id" required>
                                            @foreach($levels as $level)
                                                <option value="{{ $level->id }}"
                                                    {{ $student->level_id == $level->id ? 'selected' : '' }}>
                                                    {{ $level->level_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>File upload</label>
                                        <input type="file" name="upload" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info"
                                                value="{{ $student->upload }}" placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                                    <button class="btn btn-light">Cancel</button>
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
