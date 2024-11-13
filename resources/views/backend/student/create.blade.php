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
                                <h4 class="card-title">Register Student</h4>
                                <p class="card-description">
                                    Create Student
                                </p>
                                <form class="forms-sample" method="POST" action="{{ route('student.store') }}"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <input type="hidden" class="form-control" id="exampleInputName1" name="admission_id"
                                        placeholder="Name">

                                    <div class="form-group">
                                        <label for="exampleInputName1">Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="name"
                                            placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Index Number<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail3"
                                            name="index_number" placeholder="Index Number">
                                    </div>
                                    <div class="form-group">
                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                        <div class="">
                                            <input class="form-control" name="date_of_birth" type="date" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Gender<span class="text-danger">*</span></label>
                                        <select class="form-control" name="gender" id="exampleSelectGender">
                                            <option value="" disabled selected>Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectGender">Section<span class="text-danger">*</span></label>
                                        <select class="form-control" name="section" id="exampleSelectGender">
                                            <option value="" disabled selected>Select Section</option>
                                            <option>O-Level</option>
                                            <option>A-Level</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Level<span class="text-danger">*</span></label>
                                        <select class="form-control" name="level_id" id="exampleSelectGender">
                                            <option value="" disabled selected>Select Level</option>
                                            @foreach($levels as $level)
                                                <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label>Student Photo</label>
                                            <div class="col-sm-12">
                                                <input type="file" class="form-control" name="upload" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputCity1">City</label>
                                        <input type="text" class="form-control" id="exampleInputCity1" name=""
                                            placeholder="Location">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Additional Notes</label>
                                        <textarea class="form-control" id="exampleTextarea1" name="" rows="4"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                                </form>
                            </div>
                        </div>


                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    @include('backend.layouts.footer')
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    @endsection()
