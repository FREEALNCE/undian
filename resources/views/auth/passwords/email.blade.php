@extends('layouts.app')


@section('content')
<img class="wave" src="{{ asset('img/wave.png') }}">
<div class="container">
    <div class="img img-bz" style="margin-top: -300px;">
        <img src="{{ asset('img/bz-navbar.png') }}">
    </div>

    <div class="login-content">

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <h3 class="title">{{ __('Reset Password') }}</h3>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="form-group row">
                <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                <div class="col-md-6">

                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                    </div>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <a href="{{ route('login') }}" class="float-right" style="margin-top: -20px;">Back to login</a>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Link') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>

</html>

@endsection