@extends('layouts.dashboard')

@section('navbar')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl navbar-custom" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            {{-- <h6 class="font-weight-bolder mb-0 text-white">Dashboard</h6> --}}
            {{ Breadcrumbs::render('users') }}
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
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('users.index') }}" method="GET">
                            <div class="input-group">
                                <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" style="height: 40px;" placeholder="Search for users">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" style="height: 40px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        @can('User Create')
                        <a href="{{ route('users.create') }}" class="btn btn-primary float-right" role="button">
                            Add New
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse ($users as $user)
                    <div class="col-md-4">
                        <div class="card my-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <i class="fas fa-id-badge fa-5x"></i>
                                    </div>
                                    <div class="col-md-10">
                                        <table>
                                            <tr>
                                                <th>
                                                    Name
                                                </th>
                                                <td>&nbsp;:&nbsp;&nbsp;</td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Email
                                                </th>
                                                <td>&nbsp;:&nbsp;&nbsp;</td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Role
                                                </th>
                                                <td>&nbsp;:&nbsp;&nbsp;</td>
                                                <td>
                                                    {{ $user->roles->first()->name }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="float-right">
                                    @can('User Update')
                                    <!-- edit -->
                                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-sm btn-info" role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan

                                    <!-- delete -->
                                    @can('User Delete')
                                    <form class="d-inline" role="alert" action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <table>

                    </table>
                    <p style="margin: auto; padding-top: 50px;">
                        @if (request()->get('keyword'))
                        <strong>Users not Found</strong>

                        @else
                        <strong>No users data yet</strong>
                        @endif

                    </p>
                    @endforelse
                </div>
                <!-- table-responsive -->
                @if ($users->hasPages())
                <div class="card-footer">
                    {{ $users->links('vendor.pagination.bootstrap-4') }}
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

@push('javascript-internal')
<script>
    $(document).ready(function() {
        $("form[role='alert']").submit(function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Delete User',
                text: 'Are you sure want to remove User?',
                icon: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                cancelButtonText: "Cancel",
                reverseButtons: true,
                confirmButtonText: "Yes",
            }).then((result) => {
                if (result.isConfirmed) {
                    // todo: process of deleting categories
                    event.target.submit();
                }
            });
        });
    });
</script>
@endpush