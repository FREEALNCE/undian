<!DOCTYPE html>
<html lang="en">
<head>
	  <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="theme-color" content="#1e1e1e">

    <link rel="stylesheet" href="{{ asset('styles/flipTimer.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}" type="text/css">	
    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}" type="text/css">	
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
        <div class="topnav" id="myTopnav" style="background:#298abf;">
            <div class="container">
                <a class="navbar-brand" href="#">
                    @foreach($imageLogo as $att)
                        <img style="margin-top:-10px; margin-left: -25px; margin-right: 25px;" width="200" src="http://127.0.0.1:8000/{{ $att['value'] }}" />
                    @endforeach
                </a>
                <a href="{{ route('pages.index') }}" class="{{ set_active(['pages.index']) }}" title="LOREM IPSUM" rel="index,follow" style="font-size:12px;text-decoration:none;font-weight:600">HOME</a>
                <a href="{{ route('pages.dayresults') }}" class="{{ set_active(['pages.dayresults']) }}" title="LOREM IPSUM" rel="index,follow" style="font-size:12px;text-decoration:none;font-weight:600">DAY RESULT</a>
                <a href="{{ route('pages.nightresults') }}" class="{{ set_active(['pages.nightresults']) }}" title="LOREM IPSUM" rel="index,follow" style="font-size:12px;text-decoration:none;font-weight:600">NIGHT RESULT</a>
                <a href="{{ route('pages.firstpage') }}" class="{{ set_active(['pages.firstpage']) }}" title="LOREM IPSUM" rel="index,follow" style="font-size:12px;text-decoration:none;font-weight:600">FIRST PAGE</a>
                <a href="{{ route('pages.secondpage') }}" class="{{ set_active(['pages.secondpage']) }}" title="LOREM IPSUM" rel="index,follow" style="font-size:12px;text-decoration:none;font-weight:600">SECOND PAGE</a>
                <a href="{{ route('pages.thirdpage') }}" class="{{ set_active(['pages.thirdpage']) }}" title="LOREM IPSUM" rel="index,follow" style="font-size:12px;text-decoration:none;font-weight:600">THIRD PAGE</a>
             <a href="javascript:void(0);" class="icon" onclick="myFunction()">
               <i class="fa fa-bars"></i>
             </a>
            </div>  
        </div>
    <div class="clearfix"></div>
</head>

<body>
  <div id="content-boxes">
    @yield('content')
  </div>

  <div class="container" style="margin-bottom: 5px;">
            <div class="col-xs-4" style="padding:0px;margin:0px;">
                <a href="/">
                    @foreach($ads1 as $att)
                        <img style="border:2px solid #e8e8e8; border-radius: 0px;" src="http://127.0.0.1:8000/{{ $att['value'] }}" class="img-responsive" />
                    @endforeach
                </a>
            </div>
            <div class="col-xs-4" style="padding:0px;margin:0px;">
                <a href="/">
                    @foreach($ads2 as $att)
                        <img style="border:2px solid #e8e8e8; border-radius: 0px;" src="http://127.0.0.1:8000/{{ $att['value'] }}" class="img-responsive" />
                    @endforeach
                </a>
            </div>
            <div class="col-xs-4" style="padding:0px;margin:0px;">
                <a href="/">
                    @foreach($ads3 as $att)
                        <img style="border:2px solid #e8e8e8; border-radius: 0px;" src="http://127.0.0.1:8000/{{ $att['value'] }}" class="img-responsive" />
                    @endforeach
                </a>
            </div>
  </div>

  <footer id="footer" style="background:#298abf;">
            <br />
            <div class="container">
                <div class="col-xs-12">
                    <hr />
                    <div class="clearfix"></div>
                    <div class="col-xs-4">
                        @foreach($imageFooter as $att)
                            <img src="http://127.0.0.1:8000/{{ $att['value'] }}" class="img-responsive" style=" border-radius: 0px;" />
                        @endforeach
                    </div>
                    <div class="col-xs-8">
                        <span style="font-size:12px;line-height:15px;color:white;">
                            <br />
                            @foreach($footerDesc as $att)
                            {!! $att['value'] !!}
                            @endforeach
                        </span>
                    </div>
                    <div class="clearfix"></div>
                    <hr />
                    <center>
                        <p style="text-align:center;color:white;font-size:12px;font-weight:bold;margin-top:5px;">
                            @foreach($footerCopy as $att)
                                {{ $att['value'] }}
                            @endforeach			
                        </p>
                    </center>
                </div>
                
            </div>
  </footer>		
       
  <!-- Library JS & Vendor -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script src="{{ asset('scripts/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('scripts/jquery.flipTimer.js') }}"></script>
  <script src="{{ asset('scripts/main.js') }}"></script>

  @stack('javascript-internal')

  <script>
    jQuery(document).ready(function($){
      var contaier_center = $('.col-xs-7').width();
        $('#loader_live').css({
          'margin-left':(contaier_center/2)-10,
        })
    });
  </script>

</body>

</html>