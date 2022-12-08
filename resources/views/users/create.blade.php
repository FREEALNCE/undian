@extends('layouts.dashboard')

@section('navbar')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl navbar-custom" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            {{-- <h6 class="font-weight-bolder mb-0 text-white">Dashboard</h6> --}}
            {{ Breadcrumbs::render('add_user') }}
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
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body _card-body">
                    <div class="row d-flex align-items-stretch">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <!-- name -->
                            <div class="form-group _form-group">
                                <label for="input_user_name" class="font-weight-bold">
                                    Name
                                </label>
                                <input id="input_user_name" value="{{ old('name') }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Write name here.." />
                                @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                                <!-- error message -->
                            </div>
                            <!-- role -->
                            <div class="form-group _form-group">
                                <label for="select_user_role" class="font-weight-bold">
                                    Role
                                </label>
                                <select id="select_user_role" name="role" data-placeholder="Choose Role" class="custom-select w-100 @error('role') is-invalid @enderror">
                                    @if (old('role'))
                                    <option value="{{ old('role')->id }}" selected>
                                        {{ old('role')->name }}
                                    </option>
                                    @endif
                                </select>
                                @error('role')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                                <!-- error message -->
                            </div>
                            <!-- email -->
                            <div class="form-group _form-group">
                                <label for="input_user_email" class="font-weight-bold">
                                    Email
                                </label>
                                <input id="input_user_email" value="{{ old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Write email here.." autocomplete="email" />
                                @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                                <!-- error message -->
                            </div>
                            <!-- password -->
                            <div class="form-group _form-group">
                                <label for="input_user_password" class="font-weight-bold">
                                    Password
                                </label>
                                <input id="input_user_password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Write password.." autocomplete="new-password" />
                                @error('password')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                                <!-- error message -->
                            </div>
                            <!-- password_confirmation -->
                            <div class="form-group _form-group">
                                <label for="input_user_password_confirmation" class="font-weight-bold">
                                    Password confirmation
                                </label>
                                <input id="input_user_password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Write password confirmation.." autocomplete="new-password" />
                                <!-- error message -->

                            </div>

                            <!-- thumbnail -->
                            <div class="form-group _form-group">
                                <label for="input_post_thumbnail" class="font-weight-bold">
                                    Image Profile <span class="wajib">* </span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button id="button_post_thumbnail" data-input="input_post_thumbnail" class="btn btn-primary" type="button" style="padding: 0px 10px 0px 10px">
                                            Browse
                                        </button>
                                    </div>
                                    <input id="input_post_thumbnail" name="image" value="{{ old('image') }}" type="text" class="form-control @error('image') is-invalid @enderror" placeholder="" readonly />
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-12 col-form-label text-md-left"><strong>Facebook</strong></label>

                                        <div class="col-12">
                                            <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook') }}" autocomplete="facebook" autofocus>

                                            @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-12 col-form-label text-md-left"><strong>Twitter</strong></label>

                                        <div class="col-12">
                                            <input id="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ old('twitter') }}" autocomplete="twitter" autofocus>

                                            @error('twitter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-12 col-form-label text-md-left"><strong>Instagram</strong></label>

                                        <div class="col-12">
                                            <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ old('instagram') }}" autocomplete="instagram" autofocus>

                                            @error('instagram')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-12 col-form-label text-md-left"><strong>Linkedin</strong></label>

                                        <div class="col-12">
                                            <input id="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ old('linkedin') }}" autocomplete="linkedin" autofocus>

                                            @error('linkedin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-12 col-form-label text-md-left"><strong>{{ __('Desc') }}</strong></label>

                                <div class="col-12">
                                    <textarea id="name" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" value="" autocomplete="name" autofocus placeholder="Tell who you are.." style="height: 200px">{{ old('desc') }}</textarea>

                                    @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <a class="btn btn-outline-secondary _btn-secondary px-4" href="{{ route('users.index') }}">Back</a>
                                <button type="submit" class="btn btn-primary _btn-primary px-4">
                                    Save
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('css-external')
<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
<script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('vendor/select2/js/' . app()->getLocale() . '.js') }}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush

@push('javascript-internal')
<script>
    $(function() {
        //parent category
        $('#select_user_role').select2({
            theme: 'bootstrap4',
            language: "{{ app()->getLocale() }}",
            allowClear: true,
            ajax: {
                url: "{{ route('roles.select') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        $('#button_post_thumbnail').filemanager('image');

    });
</script>
@endpush