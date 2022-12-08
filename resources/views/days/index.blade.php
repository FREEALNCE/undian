@extends('layouts.dashboard')

@section('navbar')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl navbar-custom" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                {{-- <h6 class="font-weight-bolder mb-0 text-white">Dashboard</h6> --}}
                {{ Breadcrumbs::render('days') }}
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 logout-icon" id="navbar">
                <div class="pe-md-3 d-flex align-items-center">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
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
                            <!-- <form action="{{ route('days.index') }}" method="GET">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                        class="form-control" style="height: 40px;" placeholder="Pencarian wilayah..">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" style="height: 40px;">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form> -->
                        </div>
                        <div class="col-md-6">
                            @can('Partner Region Create')
                                <a href="{{ route('days.create') }}" class="btn btn-primary float-right"
                                    role="button">
                                    ADD NEW
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
                                        <th class="pd-y-5">Date</th>
                                        <th class="pd-y-5">Day Number</th>
                                        <th class="pd-y-5 tx-center t-center">Status</th>
                                        <th class="pd-y-5 tx-center t-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($days as $day)
                                        <tr>
                                            <td style="width: 40%; font-size: 20px; font-weight: 600" class="valign-middle tx-medium tx-inverse tx-14">
                                                {{ date('d - m - Y', strtotime($day->created_at)) }}
                                            </td>

                                            <td style="width: 40%; font-size: 36px; font-weight: 900" class="valign-middle tx-medium tx-inverse tx-14">
                                                {{ $day->num_one }}
                                                {{ $day->num_two }}
                                                {{ $day->num_three }}
                                                {{ $day->num_four }}
                                                {{ $day->num_five }}
                                            </td>

                                            <td style="width: 10%;" class="t-center valign-middle tx-center">
                                                @if ($day->is_active == 1)
                                                    <span class="status-active">RUNNING</span>
                                                @else
                                                    <span class="status-nonactive">DONE</span>
                                                @endif
                                            </td>

                                            <td style="width: 10%;" class="t-center valign-middle tx-center">
                                                <div class="row" style="margin-left: 0px; margin-right: 0px;">
                                                    <div class="col-md-6">
                                                        @can('Partner Region Update')
                                                            <a href="{{ route('days.edit', ['day' => $day]) }}"
                                                                class="btn btn-sm btn-info" role="button">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        @endcan
                                                    </div>
                                                    <div class="col-md-6">
                                                        @can('Partner Region Delete')
                                                            <form class="d-inline" role="alert"
                                                                action="{{ route('days.destroy', ['day' => $day]) }}"
                                                                method="POST">
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
                                                <strong>Result Day Number not found</strong>
                                            @else
                                                <strong>Result Day Number Empty</strong>
                                            @endif

                                        </p>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <!-- table-responsive -->

                    </ul>
                </div>
                <!-- table-responsive -->
                @if ($days->hasPages())
                    <div class="card-footer">
                        {{ $days->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
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
                    title: 'Delete Day Result?',
                    text: 'Are you sure want to delete Day Result?',
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
