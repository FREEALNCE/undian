@extends('layouts.dashboard')

@section('navbar')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl navbar-custom" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            {{-- <h6 class="font-weight-bolder mb-0 text-white">Dashboard</h6> --}}
            {{ Breadcrumbs::render('roles') }}
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
                        <form action="{{ route('roles.index') }}" method="GET">
                            <div class="input-group">
                                <input name="keyword" value="{{ request()->get('keyword') }}" type="search" class="form-control" style="height: 40px;" placeholder="Search for roles">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" style="height: 40px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        @can('Role Create')
                        <a href="{{ route('roles.create') }}" class="btn btn-primary float-right" role="button">
                            Add New

                        </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <!-- card-header -->
                    <div class="table-responsive table-striped">
                        <table class="table mg-b-0 tx-13">
                            <thead>
                                <tr class="tx-10">
                                    <th class="pd-y-5">Roles</th>

                                    <th class="pd-y-5 tx-center t-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                <tr>
                                    <td style="width: 90%;" class="valign-middle tx-medium tx-inverse tx-14">
                                        {{ $role->name }}
                                    </td>

                                    <td style="width: 10%;" class="valign-middle tx-center t-center">
                                        <div class="row" style="margin-left: 0px; margin-right: 0px;">
                                            <!-- <div class="col-md-4">
                                                        <a href="{{ route('roles.show', ['role' => $role]) }}" class="btn btn-sm btn-primary" role="button">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div> -->
                                            <div class="col-md-6">
                                                @can('Role Update')
                                                <a href="{{ route('roles.edit', ['role' => $role]) }}" class="btn btn-sm btn-info" role="button">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @endcan
                                            </div>
                                            <div class="col-md-6">
                                                @can('Role Delete')
                                                <form class="d-inline" role="alert" action="{{ route('roles.destroy', ['role' => $role]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                @endcan
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @empty
                                <table>

                                </table>
                                <p style="text-align: center; padding-top: 50px;">
                                    @if (request()->get('keyword'))
                                    <strong>Roles not Found</strong>

                                    @else
                                    <strong>No Roles data yet</strong>
                                    @endif

                                </p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
                    @if ($roles->hasPages())
                    <div class="card-footer">
                        {{ $roles->links('vendor.pagination.bootstrap-4') }}
                    </div>
                    @endif
                </ul>
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
                title: 'Delete Banner',
                text: 'Are you sure want to remove Banner?',
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