@extends('layouts.dashboard')

@section('navbar')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl navbar-custom" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            {{-- <h6 class="font-weight-bolder mb-0 text-white">Dashboard</h6> --}}
            {{ Breadcrumbs::render('edit_profile') }}
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
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong>EDIT PROFILE</strong>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}">
                    @method('PATCH')
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="name" class="col-12 col-form-label text-md-left"><strong>{{ __('Name') }}</strong></label>

                                <div class="col-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="email" class="col-12 col-form-label text-md-left"><strong>Email</strong></label>

                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
                            <input id="input_post_thumbnail" name="image" value="{{ old('image', $user->image) }}" type="text" class="form-control @error('image') is-invalid @enderror" placeholder="" readonly />
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-12 col-form-label text-md-left"><strong>{{ __('Desc') }}</strong></label>

                        <div class="col-12">
                            <textarea id="name" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" value="" autocomplete="name" autofocus placeholder="Tell who you are.." style="height: 200px">{{ old('desc', $user->desc) }}</textarea>

                            @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-12">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                Edit Profile
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css-external')
<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('vendor/tinymce5/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('vendor/tinymce5/tinymce.min.js') }}"></script>
<script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('vendor/select2/js/' . app()->getLocale() . '.js') }}"></script>
@endpush

@push('javascript-internal')
<script>
    // Event listener to preview image
    function previewImage() {
        const image = document.querySelector('#upload_img');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

<script>
    $(document).ready(function() {

        $('#button_post_thumbnail').filemanager('image');

    });
</script>
@endpush