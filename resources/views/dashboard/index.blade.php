@extends('layouts.dashboard')

@push('css-internal')
    <link rel="stylesheet" href="{{ asset('styles/flipTimer.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}" type="text/css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}" type="text/css"> -->

    <style>
        .result{
            background: #0095ff;
            color: white;
            padding: 20px;
            border-radius: 10px;
            font-size: 40px;
            font-weight: bold;
        }
    </style>
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
                        <span id="tanggal_siang"></span>
                    </div>
                </div>
            </div>
            <div class="body">
                <span class="result" id="result_siang"></span>
                {{-- <img id="prize1_img1" width="65" src="{{ asset('images/balls/blue/1.png') }}" />
                <img id="prize1_img2" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/1.png') }}" />
                <img id="prize1_img3" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/4.png') }}" />
                <img id="prize1_img4" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/8.png') }}" />
                <img id="prize1_img5" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/2.png') }}" /> --}}
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
                        <span id="tanggal_malam"></span>
                    </div>
                </div>
            </div>
            <div class="body">
                <span class="result" id="result_malam"></span>
                {{-- <img id="prize1_img1" width="65" src="{{ asset('images/balls/blue/1.png') }}" />
                <img id="prize1_img2" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/1.png') }}" />
                <img id="prize1_img3" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/4.png') }}" />
                <img id="prize1_img4" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/8.png') }}" />
                <img id="prize1_img5" width="65" style="margin-left:-5px;" src="{{ asset('images/balls/white/2.png') }}" /> --}}
            </div>
        </div> 
    </div>
</div>
@endsection




@push('javascript-internal')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/typeit/5.10.1/typeit.min.js"></script>



<script src="{{ asset('scripts/jquery.flipTimer.js') }}"></script>


<script>
    function type_kode_siang(kode){
            var instance =   new TypeIt('#result_siang', {
                strings: kode,
                speed: 3000,
                autoStart: true,
                afterComplete: function(instance){
                    instance.destroy();
                    // FUNGSI CALLBACK UNTUK MELAKUKAN RESET
                    
                }
                });
            }

    //FUNGSI COUNTDOWN
    function siangTimeCountdown(data){
        date = data.tanggal

        time = data.time

        // Mengatur waktu akhir perhitungan mundur
        var countDownDate = new Date(date+' '+time).getTime();

        var timer = new Date(date+' '+time);
        document.getElementById("timer").innerHTML = timer.toLocaleString();

        $('.flipTimer').flipTimer({
            direction:'down',
            date:timer,
            days:false,
        });
 
        // Memperbarui hitungan mundur setiap 1 detik
        var x = setInterval(function() {
        
        // Untuk mendapatkan tanggal dan waktu hari ini
        var now = new Date().getTime();
            
        // Temukan jarak antara sekarang dan tanggal hitung mundur
        var distance = countDownDate - now;
            
        // Perhitungan waktu untuk hari, jam, menit dan detik
        var days    = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours   = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
         // Jika hitungan mundur selesai, tulis beberapa teks 
        if (distance < 0) {
            // clearInterval(x);
            clearInterval(x);
            updateKodeSiang()

        }
        }, 1000);
    }

    async function getApiSiang(){

        let url = 'http://127.0.0.1:8000/api/setting/siang';

        let response = await fetch(url);

        let data = await response.json()

        if (data.status == "success") {

            siangTimeCountdown(data.data)
        }
    }

    async function setKodeSiang(){

        let url = 'http://127.0.0.1:8000/api/kode/siang';

        let response = await fetch(url);

        let data = await response.json()

        if (data.status == "success") {

            document.getElementById("result_siang").innerHTML = data.data.kode;
            document.getElementById("tanggal_siang").innerHTML = data.data.date
            
        }
    }

    async function updateKodeSiang(){

        let url = 'http://127.0.0.1:8000/api/kode/update/siang';

        let response = await fetch(url);

        let data = await response.json();

        if (data.status == "success") {

            document.getElementById("result_siang").innerHTML = '';
            type_kode_siang(data.kode);
            
            setTimeout(() => {
                document.location.reload();
            }, 3000);  

            }
    }
    updateKodeSiang()
    setKodeSiang()

    getApiSiang()
</script>


<script>

        function type_kode_malam(kode){
            var instance =   new TypeIt('#result_malam', {
                strings: kode,
                speed: 3000,
                autoStart: true,
                afterComplete: function(instance){
                    instance.destroy();
                    // FUNGSI CALLBACK UNTUK MELAKUKAN RESET
                    getApiMalam()
                }
                });
            }
        //FUNGSI COUNTDOWN
        function malamTimeCountdown(data){
        date = data.tanggal

        time = data.time

        // Mengatur waktu akhir perhitungan mundur
        var countDownDate = new Date(date+' '+time).getTime();

        var timer = new Date(date+' '+time);
        document.getElementById("timer2").innerHTML = timer.toLocaleString();

        $('.flipTimer2').flipTimer({
            direction:'down',
            date:timer,
            days:false,
        });
 
        // Memperbarui hitungan mundur setiap 1 detik
        var x = setInterval(function() {
        
        // Untuk mendapatkan tanggal dan waktu hari ini
        var now = new Date().getTime();
            
        // Temukan jarak antara sekarang dan tanggal hitung mundur
        var distance = countDownDate - now;
            
        // Perhitungan waktu untuk hari, jam, menit dan detik
        var days    = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours   = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
         // Jika hitungan mundur selesai, tulis beberapa teks 
        if (distance < 0) {
            // 
            clearInterval(x);
            updateKodeMalam()

        }
        }, 1000);
    }

    async function getApiMalam(){

        let url = 'http://127.0.0.1:8000/api/setting/malam';

        let response = await fetch(url);

        let data = await response.json()

        if (data.status == "success") {

            malamTimeCountdown(data.data)
        }
    }

    async function setKodeMalam(){

        let url = 'http://127.0.0.1:8000/api/kode/malam';

        let response = await fetch(url);

        let data = await response.json()

        if (data.status == "success") {
            document.getElementById("result_malam").innerHTML = data.data.kode;
            document.getElementById("tanggal_malam").innerHTML = data.data.date
            
        }
    }

    async function updateKodeMalam(){

        let url = 'http://127.0.0.1:8000/api/kode/update/malam';

        let response = await fetch(url);

        let data = await response.json();

        console.log(data.status)
        if (data.status == "success") {

            document.getElementById("result_malam").innerHTML ='';

            type_kode_malam(data.kode);   

            setTimeout(() => {
                document.location.reload();
            }, 3000);     

        }
        
    }
    updateKodeMalam()

    setKodeMalam()
    getApiMalam()
</script>
@endpush
