@extends('layouts.dashboard')


@section('content')
<section class="home-section">
    {{ Breadcrumbs::render('file_manager') }}

    <div class="text">
        @section('title')
        Media Library
        @endsection
        Media Library
    </div>

    <div class="container-fluid">
        <!-- content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <iframe src="{{ route('unisharp.lfm.show') }}?type={{ $typeSelected }}" style="width: 100%; height: 620px; overflow: hidden; border: none;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection