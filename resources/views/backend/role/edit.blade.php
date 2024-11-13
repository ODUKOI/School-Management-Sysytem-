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
                            <h4 class="card-title">Edit Role</h4>
                            <form class="forms-sample" method="POST" action="{{ route('role.update', $role->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="roleName">Role Name</label>
                                    <input type="text" class="form-control" id="roleName" name="name"
                                           value="{{ $role->name }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <a href="{{ route('role.index') }}" class="btn btn-light">Cancel</a>
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
