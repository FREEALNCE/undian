@extends('layouts.dashboard')

@section('navbar')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl navbar-custom" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            {{-- <h6 class="font-weight-bolder mb-0 text-white">Dashboard</h6> --}}
            {{-- {{ Breadcrumbs::render('detail_day', $day) }} --}}
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
        <form action="{{url('dashboard/nights/update')}}" method="POST">
            @php
                $kode = str_split($row->kode_malam);
            @endphp
            @csrf
            <input type="hidden" name="id" value="{{$row->id}}">
            <div class="card">
                <div class="card-body _card-body">
                    <div class="row d-flex align-items-stretch" style="justify-content: center;">
                        <div class="col-md-2">
                            <!-- Num One -->
                            <div class="form-group _form-group">
                                <label for="input_banner_title" class="font-weight-bold">
                                    First <span class="wajib">* </span>
                                </label>
                                <input id="input_banner_title" value="{{ $kode[0] }}" name="num_one" type="number" min="0" class="form-control num-box @error('num_one') is-invalid @enderror" placeholder="Ex: 0" />
                                @error('num_one')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <!-- Num two -->
                            <div class="form-group _form-group">
                                <label for="input_banner_title" class="font-weight-bold">
                                    Second <span class="wajib">* </span>
                                </label>
                                <input id="input_banner_title" value="{{ $kode[1] }}" name="num_two" type="number" min="0" class="form-control num-box @error('num_two') is-invalid @enderror" placeholder="Ex: 0" />
                                @error('num_two')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <!-- Num three -->
                            <div class="form-group _form-group">
                                <label for="input_banner_title" class="font-weight-bold">
                                    Third <span class="wajib">* </span>
                                </label>
                                <input id="input_banner_title" value="{{$kode[2] }}" name="num_three" type="number" min="0" class="form-control num-box @error('num_three') is-invalid @enderror" placeholder="Ex: 0" />
                                @error('num_three')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <!-- Num four -->
                            <div class="form-group _form-group">
                                <label for="input_banner_title" class="font-weight-bold">
                                    Fourth <span class="wajib">* </span>
                                </label>
                                <input id="input_banner_title" value="{{ $kode[3] }}" name="num_four" type="number" min="0" class="form-control num-box @error('num_four') is-invalid @enderror" placeholder="Ex: 0" />
                                @error('num_four')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <!-- Num five -->
                            <div class="form-group _form-group">
                                <label for="input_banner_title" class="font-weight-bold">
                                    Fifth <span class="wajib">* </span>
                                </label>
                                <input id="input_banner_title" value="{{ $kode[4] }}" name="num_five" type="number" min="0" class="form-control num-box @error('num_five') is-invalid @enderror" placeholder="Ex: 0" />
                                @error('num_five')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12" style="display: flex; justify-content: center; align-items: center;">
                            <!-- status -->
                            <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} _form-group" style="display: flex; justify-content: center; align-items: center; text-align: center;">
                                <label for="input_post_status" class="font-weight-bold" style="margin-top: -10px; margin-right: 10px">
                                    Status
                                </label>
                                <div class="form-group">
                                    <label class="switch">
                                        <input type="checkbox" name="is_active"  @if($row->status == 1 ) checked @endif>
                                        <span class="slider-switch round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-12"></div>
                        <div class="col-md-8 col-sm-12">
                            <div class="float-right">
                                <a class="btn btn-outline-secondary _btn-secondary px-4" href="{{ route('days.index') }}">Back</a>
                                <button type="submit" class="btn btn-primary _btn-primary px-4">
                                    Save
                                </button>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-12"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('javascript-internal')
<script>
    $(document).ready(function() {
        $("#input_banner_title").change(function(event) {
            $("#input_banner_slug").val(
                event.target.value
                .trim()
                .toLowerCase()
                .replace(/[^a-z\d-]/gi, "-")
                .replace(/-+/g, "-")
                .replace(/^-|-$/g, "")
            );
        });
    });
</script>
@endpush
