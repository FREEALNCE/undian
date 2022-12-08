@extends('layouts.pagelayout')

@section('title')
    First Page
@endsection

@section('content')
<div class="content">
			<div class="clearfix"></div><br />

			<div class="container contentchild" style="margin-top:-5px;">
                <div class="clearfix" ></div>

                <div class="col-lg-12 col-md-12 col-xs-12" style="padding:0px;margin:0px;" >
                    <div class="boxOther">
                        <div class="col-xs-5">
                            @foreach($imageFirst as $att)
                                <img src="http://127.0.0.1:8000/{{ $att['value'] }}" alt="" class="img-responsive mb-20">
                            @endforeach
                           
                            @foreach($imageSecond as $att)
                                <img src="http://127.0.0.1:8000/{{ $att['value'] }}" alt="" class="img-responsive mb-20">
                            @endforeach
                        </div>
                        <div class="col-xs-7">
                           <span>
                            @foreach($descs as $att)
                                {!! $att['value'] !!}
                            @endforeach
                           </span>
                        </div>
                    </div>
                   
                </div>
                
                <div class="clearfix" ></div>				
			</div>
			
			<div class="clearfix"></div><br />
</div>
@endsection