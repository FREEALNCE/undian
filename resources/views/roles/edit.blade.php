@extends('layouts.dashboard')

@section('navbar')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl navbar-custom" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            {{-- <h6 class="font-weight-bolder mb-0 text-white">Dashboard</h6> --}}
            {{ Breadcrumbs::render('edit_role', $role) }}
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 logout-icon" id="navbar">
            <div class="pe-md-3 d-flex align-items-center">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out'></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <div class="user-setting">
                <div class="imgBox">
                    <img src="{{ asset('images/placeholder/user.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</nav>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('roles.update', ['role' => $role]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body _card-body">
                    <div class="form-group _form-group">
                        <label for="input_role_name" class="font-weight-bold">
                            Role name
                        </label>
                        <input id="input_role_name" value="{{ old('name', $role->name) }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" />
                        @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <!-- permission -->
                    <div class="form-group _form-group">
                        <label for="input_role_permission" class="font-weight-bold">
                            Permission
                        </label>
                        <div class="form-control overflow-hidden h-100 @error('permissions') is-invalid @enderror" id="input_role_permission" style="padding: 30px;">
                            <div class="row">
                                <!-- list manage name:start -->
                                @foreach ($authorities as $manageName => $permissions)
                                <div class="col-md-2" style="margin-bottom: 30px;">
                                    <ul class="list-group mx-1">
                                        <li class="list-group-item bg-dark text-white">
                                            {{ $manageName }}
                                        </li>
                                        <!-- list permission:start -->
                                        @foreach ($permissions as $permission)
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                @if (old('permissions', $permissionChecked))
                                                <input id="{{ $permission }}" name="permissions[]" class="form-check-input" type="checkbox" value="{{ $permission }}" {{ in_array($permission, old('permissions', $permissionChecked)) ? "Checked" : null }}>
                                                @else
                                                <input id="{{ $permission }}" name="permissions[]" class="form-check-input" type="checkbox" value="{{ $permission }}">
                                                @endif
                                                <label for="{{ $permission }}" class="form-check-label">
                                                    {{ $permission }}
                                                </label>
                                            </div>
                                        </li>
                                        @endforeach
                                        <!-- list permission:end -->
                                    </ul>
                                </div>


                                <!-- list manage name:end  -->
                                @endforeach
                            </div>
                        </div>
                        @error('permissions')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="float-right mb-4">
                        <a class="btn btn-outline-secondary _btn-secondary px-4 mx-2" href="{{ route('roles.index') }}">
                            Back
                        </a>
                        <button type="submit" class="btn btn-primary _btn-primary px-4">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection