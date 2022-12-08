@extends('layouts.dashboard')

@push('css-internal')
    <link rel="stylesheet" href="{{ asset('styles/flipTimer.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}" type="text/css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}" type="text/css"> -->
@endpush

@push('javascript-internal')
<script src="{{ asset('scripts/jquery.flipTimer.js') }}"></script>
<script>
    var timer = new Date("Dec 30, 2022 12:00:00");
    document.getElementById("timer").innerHTML = timer.toLocaleString();

    $(document).ready(function() {
        $('.flipTimer').flipTimer({
            direction:'down',
            date:timer,
            days:false,
        });
    });

    var timer2 = new Date("Dec 30, 2022 19:00:00");
    document.getElementById("timer2").innerHTML = timer2.toLocaleString();

    $(document).ready(function() {
        $('.flipTimer2').flipTimer({
            direction:'down',
            date:timer2,
            days: false
        });
    });
</script>
@endpush

@section('navbar')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl navbar-custom" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                {{-- <h6 class="font-weight-bolder mb-0 text-white">Dashboard</h6> --}}
                {{ Breadcrumbs::render('dashboard') }}
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
<div class="row db-front">
    <div class="col-md-6 col-sm-12">
        <!-- COUNTDOWN -->
        <div class="box">
            <div class="header">
                DAY SHIFT
            </div>
            <div class="sub-header">
                <div class="row">
                    <div class="col-6 side-left">
                        PUTARAN SIANG
                    </div>
                    <div class="col-6 side-right">
                        <span id="timer"></span>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="flipTimer timers1">
                    <div class="hours"></div>
                    <div class="minutes"></div>
                    <div class="seconds"></div>
                </div>
            </div>
        </div>

        <!-- RESULT -->
        <div class="box">
            <div class="header">
                RESULT SIANG
            </div>
            <div class="sub-header">
                <div class="row">
                    <div class="col-6 side-left">
                        PUTARAN SIANG
                    </div>
                    <div class="col-6 side-right">
                        <span>18/10/2022 12.00.00</span>
                    </div>
                </div>
            </div>
            <div class="body">
                <img id="prize1_img1" width="65" src="{{ asset('images/balls/blue/1.png') }}" />
                <img id="prize1_img2" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/1.png') }}" />
                <img id="prize1_img3" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/4.png') }}" />
                <img id="prize1_img4" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/8.png') }}" />
                <img id="prize1_img5" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/2.png') }}" />
            </div>
        </div> 

    </div>
    <div class="col-md-6 col-sm-12">
        <!-- COUNTDOWN -->
        <div class="box">
            <div class="header">
                NIGHT SHIFT
            </div>
            <div class="sub-header">
                <div class="row">
                    <div class="col-6 side-left">
                        PUTARAN MALAM
                    </div>
                    <div class="col-6 side-right">
                        <span id="timer2"></span>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="flipTimer2 timers1">
                    <div class="hours"></div>
                    <div class="minutes"></div>
                    <div class="seconds"></div>
                </div>
            </div>
        </div>

        <!-- RESULT -->
        <div class="box">
            <div class="header">
                RESULT MALAM
            </div>
            <div class="sub-header">
                <div class="row">
                    <div class="col-6 side-left">
                        PUTARAN MALAM
                    </div>
                    <div class="col-6 side-right">
                        <span>18/10/2022 19.00.00</span>
                    </div>
                </div>
            </div>
            <div class="body">
                <img id="prize1_img1" width="65" src="{{ asset('images/balls/blue/1.png') }}" />
                <img id="prize1_img2" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/1.png') }}" />
                <img id="prize1_img3" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/4.png') }}" />
                <img id="prize1_img4" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/8.png') }}" />
                <img id="prize1_img5" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/2.png') }}" />
            </div>
        </div> 
    </div>
</div>
@endsection


@push('javascript-internal')
<script>
    var timer = new Date("Dec 30, 2022 12:00:00");
    document.getElementById("timer").innerHTML = timer.toLocaleString([], { timeStyle: 'short' });

    $(document).ready(function() {
        $('.flipTimer').flipTimer({
            direction:'down',
            date:timer,
            days:false,
        });
    });

    var timer2 = new Date("Dec 30, 2022 19:00:00");
    document.getElementById("timer2").innerHTML = timer2.toLocaleString([], { timeStyle: 'short' });

    $(document).ready(function() {
        $('.flipTimer2').flipTimer({
            direction:'down',
            date:timer2,
            days: false
        });
    });
</script>
@endpush
