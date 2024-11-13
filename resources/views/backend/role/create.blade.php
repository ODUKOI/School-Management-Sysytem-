{{-- @extends('backend.layouts.main')

@section('content')
    <div class="container-scroller">
        <!-- Navbar -->
        @include('backend.layouts.nav')

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
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

                                <h4 class="card-title">Create New Role</h4>
                                <p class="card-description">Assign a new role and permissions</p>

                                <!-- Role creation form -->
                                <form class="forms-sample" method="POST" action="{{ route('role.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="roleName">Role Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="roleName" name="name" placeholder="Role Name" required>
                                    </div>

                                    <!-- Permissions Checkboxes -->
                                    <div class="form-group">
                                        <label>Assign Permissions <span class="text-danger">*</span></label>
                                        @foreach($permissions as $permission)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" id="permission{{ $permission->id }}" name="permissions[]">
                                                <label class="form-check-label" for="permission{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                @include('backend.layouts.footer')
            </div>
        </div>
    </div>
@endsection --}}
{{-- @extends('backend.layouts.main')

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
                                <h4 class="card-title">Create or Assign Permissions to Role</h4>
                                <form action="{{ route('role.store') }}" method="POST">
                                    @csrf

                                    <!-- Role Selection Dropdown -->
                                    <div class="form-group">
                                        <label for="roleSelect">Select Role</label>
                                        <select name="role_id" id="roleSelect" class="form-control">
                                            <option value="" disabled selected>Select an existing role or create a new one</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- New Role Name Field (Optional) -->
                                    <div class="form-group">
                                        <label for="newRoleName">Or Create New Role</label>
                                        <input type="text" name="name" class="form-control" id="newRoleName" placeholder="Enter role name">
                                    </div>

                                    <!-- Permissions Checkboxes -->
                                    <div class="form-group">
                                        <label>Assign Permissions</label>
                                        <div class="row">
                                            @foreach($permissions as $permission)
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}">
                                                        <label for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Role</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @include('backend.layouts.footer')
                </div>
            </div>
        </div>
    </div>
@endsection --}}
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
                                <h4 class="card-title">Create Role</h4>
                                <form class="forms-sample" method="POST" action="{{ route('role.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="roleName">Role Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="roleName" name="name"
                                            placeholder="Enter role name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="permissions">Assign Permissions</label>
                                        <select class="form-control" name="permissions[]" id="permissions" multiple>
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Create Role</button>
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
