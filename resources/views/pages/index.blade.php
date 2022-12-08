@extends('layouts.pagelayout') 

@section('title')
    Home
@endsection

@section('content')
<div class="content">
			<div class="container" style="margin-top:5px;">
				<img src="{{ asset('images/banner.jpg') }}" class="img-responsive" />
			</div>

			<div class="clearfix"></div><br />

			<div class="container contentchild" style="margin-top:-5px;">
                <div class="clearfix" ></div>

                <div class="col-lg-6 col-md-6 col-xs-12" style="padding:0px;margin:0px;" >
                    <div>
                        <div class="panel panel-default p-timer" style="border:1px solid #298abf;background:none;">
                            <div class="panel-heading" style="border-bottom:1px solid #298abf;background:#298abf;">
                                <h1 style="color:#fff;font-size:20px;font-weight:bold;margin:0px;padding:0px;">
                                    <center>
                                        LOREM IPSUM			
                                    </center>
                                </h1>
                            </div>
                            <div class="panel-body" style="background-color:none;padding:0px;margin:0px;">
                                <table class="table" style="background:none;">
                                    <tr>
                                        <td style="text-align:left;font-size:13px;background:white;color:black;font-weight:bold;padding-left:15px; border-top: none"  width="50%">JADWAL</td>
                                        <td id="timer" style="text-align:right;font-size:15px;background:white;color:#565656;padding-right:15px; border-top: none"  width="*"></td>
                                    </tr>
                                </table>
                                <div class="flipTimer timers1">
                                    <div class="hours"></div>
                                    <div class="minutes"></div>
                                    <div class="seconds"></div>
                                </div>
                                    
                                <div class="clearfix"></div>
                                <br />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="panel panel-default" style="border:1px solid #298abf;background:none;">
                            <div class="panel-heading" style="border:none;background:#298abf;">
                                <h1 style="color:#fff;font-size:30px;font-weight:bold;margin:0px;padding:0px;">
                                    <center>
                                        LOREM IPSUM			
                                    </center>
                                </h1>
                            </div>
                            <div class="panel-body" style="background-color:none;padding:5px;margin:0px;">
                                <table class="table" style="margin-top:1px;background:none;border:none;">
                                    <tr>
                                        <td style="text-align:left;font-size:13px;background:white;color:black;font-weight:bold;padding-left:15px; border: none;border-top-left-radius: 10px !important;"  width="30%">LOREM IPSUM</td>
                                        <td style="text-align:right;font-size:15px;background:white;color:#565656;padding-right:15px; border: none;border-top-right-radius: 10px !important;"  width="30%">21/9/2022 11.30.30</td>
                                    </tr>
                                </table>
                                <table class="table" style="margin-top:1px;background:none;border:none;">
                                    <tbody>
                                        <tr>
                                            <td width="30%" style="text-align:center;vertical-align:middle;font-size:15px;background:#e4e4e4;color:black;border-bottom:1px solid white; border: none;border-bottom-left-radius: 10px !important;"><b>LOREM</b></td>
                                            <td width="*" style="text-align:right;vertical-align:middle;font-size:25px;background:#e4e4e4;color:#e0313c;border-bottom:1px solid white; border: none;border-bottom-right-radius: 10px !important;" >
                                                <img id="prize1_img1" width="35" src="{{ asset('images/balls/blue/1.png') }}" />
                                                <img id="prize1_img2" width="35" style="margin-left:-5px;" src="{{ asset('images/balls/white/1.png') }}" />
                                                <img id="prize1_img3" width="35" style="margin-left:-5px;" src="{{ asset('images/balls/white/4.png') }}" />
                                                <img id="prize1_img4" width="35" style="margin-left:-5px;" src="{{ asset('images/balls/white/8.png') }}" />
                                                <img id="prize1_img5" width="35" style="margin-left:-5px;" src="{{ asset('images/balls/white/2.png') }}" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default" style="border:none;background:#298abf;">
                        <div class="panel-heading" style="background-color:#298abf;border-bottom:1px solid #298abf;">
                            <h1 style="color:#fff;font-size:15px;margin:0px;padding:0px;font-weight:bold;">
                                <center>
                                    LOREM IPSUM		
                                </center>
                            </h1>
                        </div>
                        <div class="panel-body" style="background-color:#e4e4e4;padding:0px;margin:0px;">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th style="text-align:center;vertical-align:top;font-size:12px;color:#fff;background-color:#298abf;border:1px solid #298abf;" width="*">DATA</th>
                                        <th style="text-align:center;vertical-align:top;font-size:12px;color:#fff;background-color:#298abf;border:1px solid #298abf;" width="60%">PRIMO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($days as $day)
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;font-size:17px;background:white;color:black;border:1px solid #298abf;">{{ date('d - m - Y', strtotime($day->created_at)) }}</td>
                                        <td style="text-align:center;vertical-align:top;font-size:17px;background:white;color:black;border:1px solid #298abf;">
                                            {{ $day->num_one }}
                                            {{ $day->num_two }}
                                            {{ $day->num_three }}
                                            {{ $day->num_four }}
                                            {{ $day->num_five }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-xs-12" style="padding-right:4px;padding-left:4px;">
                    <div>
                        <div class="panel panel-default p-timer" style="border:1px solid #298abf;background:none;">
                            <div class="panel-heading" style="border-bottom:1px solid #298abf;background:#298abf;">
                                <h1 style="color:#fff;font-size:20px;font-weight:bold;margin:0px;padding:0px;">
                                    <center>
                                        LOREM IPSUM		
                                    </center>
                                </h1>
                            </div>
                            <div class="panel-body" style="background-color:none;padding:0px;margin:0px;">
                                <table class="table" style="margin-top:1px;background:none;border:none;">
                                    <tr>
                                        <td style="text-align:left;font-size:13px;background:white;color:black;font-weight:bold;padding-left:15px; border: none;"  width="50%">LOREM</td>
                                        <td id="timer2" style="text-align:right;font-size:15px;background:white;color:#565656;padding-right:15px; border: none;"  width="*"></td>
                                    </tr>
                                </table>
                                <div class="flipTimer2 timers2">
                                    <div class="hours"></div>
                                    <div class="minutes"></div>
                                    <div class="seconds"></div>
                                </div>
                                <div class="clearfix"></div>
                                <br />
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="panel panel-default" style="border:1px solid #298abf;background:none;">
                            <div class="panel-heading" style="border:none;background:#298abf;">
                                <h1 style="color:#fff;font-size:30px;font-weight:bold;margin:0px;padding:0px;">
                                    <center>
                                        LOREM IPSUM				
                                    </center>
                                </h1>
                            </div>
                            <div class="panel-body" style="background-color:none;padding:5px;margin:0px;">
                                <table class="table" style="margin-top:1px;background:none;border:none;">
                                    <tr>
                                        <td style="text-align:left;font-size:13px;background:white;color:black;font-weight:bold;padding-left:15px; border: none; border-top-left-radius: 10px;"  width="30%">LOREM IPSUM</td>
                                        <td id="timer4" style="text-align:right;font-size:15px;background:white;color:#565656;padding-right:15px; border: none; border-top-right-radius: 10px;"  width="30%">21/9/2022 11.30.30</td>
                                    </tr>
                                </table>
                                <table class="table" style="margin-top:1px;background:none;border:none;">
                                    <tbody>
                                        <tr>
                                            <td width="30%" style="text-align:center;vertical-align:middle;font-size:15px;background:#e4e4e4;color:black;border-bottom:1px solid white; border: none; border-bottom-left-radius: 10px;"><b>LOREM</b></td>
                                            <td width="*" style="text-align:right;vertical-align:middle;font-size:25px;background:#e4e4e4;color:#e0313c;border-bottom:1px solid white; border: none; border-bottom-right-radius: 10px;">
                                                <img id="prize1_night_img1" width="35" src="{{ asset('images/balls/blue/1.png') }}" />
                                                <img id="prize1_night_img2" width="35" style="margin-left:-5px;" src="{{ asset('images/balls/white/3.png') }}" />
                                                <img id="prize1_night_img3" width="35" style="margin-left:-5px;" src="{{ asset('images/balls/white/4.png') }}" />
                                                <img id="prize1_night_img4" width="35" style="margin-left:-5px;" src="{{ asset('images/balls/white/7.png') }}" />
                                                <img id="prize1_night_img5" width="35" style="margin-left:-5px;" src="{{ asset('images/balls/white/8.png') }}" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" style="border:none;background:#298abf;">
                        <div class="panel-heading" style="background-color:#298abf;border-bottom:1px solid #298abf;">
                            <h1 style="color:#fff;font-size:15px;margin:0px;padding:0px;font-weight:bold;">
                                <center>
                                    LOREM IPSUM	
                                </center>
                            </h1>
                        </div>
                        <div class="panel-body" style="background-color:#e4e4e4;padding:0px;margin:0px;">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th style="text-align:center;vertical-align:top;font-size:12px;color:#fff;background-color:#298abf;border:1px solid #298abf;" width="*">DATA</th>
                                        <th style="text-align:center;vertical-align:top;font-size:12px;color:#fff;background-color:#298abf;border:1px solid #298abf;" width="60%">PRIMO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($nights as $night)
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;font-size:17px;background:white;color:black;border:1px solid #298abf;">{{ date('d - m - Y', strtotime($night->created_at)) }}</td>
                                        <td style="text-align:center;vertical-align:top;font-size:17px;background:white;color:black;border:1px solid #298abf;">
                                            {{ $night->num_one }}
                                            {{ $night->num_two }}
                                            {{ $night->num_three }}
                                            {{ $night->num_four }}
                                            {{ $night->num_five }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="clearfix" ></div>				
			</div>
			
			<div class="clearfix"></div><br />
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