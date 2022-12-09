@extends('layouts.dashboard')

@section('navbar')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl navbar-custom" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            {{-- <h6 class="font-weight-bolder mb-0 text-white">Dashboard</h6> --}}
            {{ Breadcrumbs::render('detail_day', $day) }}
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
    <div class="col-md-12 dn-table">
        <form action="{{url('dashboard/update-day-time')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$row->id}}">
            <div class="card">
                <div class="card-body _card-body">
                    <div class="row d-flex align-items-stretch" style="justify-content: center;">
                        <div class="col-12">
                            <label for="time" class="form-label">time</label>
                            <input type="time" class="form-control form-control-sm" name="jam_siang" value="{{$row->jam_siang}}" id="time" required>
                        </div>
                    </div>

                    <div class="row" style="margin-top:20px">
                        <div class="col-sm-12">
                                <a class="btn btn-outline-secondary _btn-secondary px-4" href="{{ route('dashboard.index') }}">Back</a>
                                <button type="submit" class="btn btn-primary _btn-primary px-4">
                                    update
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('javascript-internal')

@endpush
