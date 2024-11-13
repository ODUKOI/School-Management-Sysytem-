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
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Subject</h4>
                                <p class="card-description">Enter the subject details below</p>
                                <form action="{{ route('subject.store') }}" method="POST" class="forms-sample">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Subject Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Subject Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="code">Subject Code</label>
                                        <input type="text" name="code" id="code" class="form-control" placeholder="Subject Code" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="" disabled selected>Select Category</option>
                                            <option value="Compulsory">Compulsory</option>
                                            <option value="Elective">Elective</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="O-Level">O-Level</option>
                                            <option value="A-Level">A-Level</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="credits">Credits</label>
                                        <input type="number" name="credits" id="credits" class="form-control" placeholder="Credits">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Save Subject</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
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
