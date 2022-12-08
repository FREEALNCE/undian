@extends('layouts.app')

@section('content')
<img class="wave" src="{{ asset('img/wave.png') }}">
<div class="container">
    <div class="img img-bz" style="margin-top: -300px;">
        <img src="{{ asset('img/bz-navbar.png') }}">
    </div>
    <div class="login-content">
        <form method="POST" action="{{ route('password.update') }}">
            <!-- @method('patch') -->
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group row">
                <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                <div class="col-md-6">
                    <h3 class="title">Form Reset Password</h3>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        </div>
                    </div>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                <div class="col-md-6">
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" required autocomplete="new-password">
                        </div>
                    </div>


                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> -->

                <div class="col-md-6">
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password" required autocomplete="new-password">
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>
@endsection