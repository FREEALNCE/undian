@extends('layouts.dashboard')

@section('navbar')
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl navbar-custom" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            {{-- <h6 class="font-weight-bolder mb-0 text-white">Dashboard</h6> --}}
            {{ Breadcrumbs::render('first_page') }}
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
      <div class="col-12">

        <form action="{{ route('first-page.update', 1) }}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="card _card ">
            <div class="card-body _card-body">
              @foreach($settings as $attribute)
              <div class="form-group _form-group">

                @if($attribute['type'] == 'text')
                <label for="input_copyright" class="font-weight-bold">{{ $attribute['name'] }}</label>
                <input class="form-control" placeholder="Write here.." value="{{ $attribute['value'] }}" name="{{ $attribute['key'] }}" type="text" id="input_copyright">

                @elseif($attribute['type'] == 'number')
                <label for="input_copyright" class="font-weight-bold">{{ $attribute['name'] }}</label>
                <input class="form-control" placeholder="Write here.." value="{{ $attribute['value'] }}" name="{{ $attribute['key'] }}" type="number" id="input_copyright">

                @elseif($attribute['type'] == 'file')
                <label for="input_copyright" class="font-weight-bold">{{ $attribute['name'] }}</label>
                <input class="form-control" value="{{ $attribute['value'] }}" name="{{ $attribute['key'] }}" type="file" id="input_copyright">
                <div class="imgBox" style="margin-top: 10px">
                  <img src="http://127.0.0.1:8000/{{ $attribute['value'] }}" alt="" style="width: 250px; height: 125px;object-fit: cover;">
                </div>

                @elseif($attribute['type'] == 'email')
                <label for="input_copyright" class="font-weight-bold">{{ $attribute['name'] }}</label>
                <input class="form-control" placeholder="Write here.." value="{{ $attribute['value'] }}" name="{{ $attribute['key'] }}" type="email" id="input_copyright">

                @elseif($attribute['type'] == 'textarea')
                <label for="input_copyright" class="font-weight-bold">{{ $attribute['name'] }}</label>
                <textarea id="input_post_description" name="{{ $attribute['key'] }}" placeholder="Write description here.." class="form-control" rows="20">{{ $attribute['value'] }}</textarea>
                @endif
              </div>
              @endforeach
              <div class="row">
                <div class="col-12">
                  <div class="float-right mTop">
                    <a class="btn btn-outline-primary _btn-primary px-4" href="{{ route('first-page.index') }}">Back</a>
                    <button type="submit" class="btn btn-primary _btn-primary px-4">
                      Save
                    </button>
                  </div>
                </div>
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
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('vendor/tinymce5/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('vendor/tinymce5/tinymce.min.js') }}"></script>
<script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('vendor/select2/js/' . app()->getLocale() . '.js') }}"></script>
@endpush

@push('javascript-internal')
<script>
  $(document).ready(function() {
      $("#input_post_title").change(function(event) {
          $("#input_post_slug").val(
              event.target.value
              .trim()
              .toLowerCase()
              .replace(/[^a-z\d-]/gi, "-")
              .replace(/-+/g, "-")
              .replace(/^-|-$/g, "")
          );
      });

      $('#button_post_thumbnail').filemanager('image');

      $("#input_post_description").tinymce({
          relative_urls: false,
          language: "en",
          plugins: [
              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
              "searchreplace wordcount visualblocks visualchars code fullscreen",
              "insertdatetime media nonbreaking save table directionality",
              "emoticons template paste textpattern",
          ],
          toolbar1: "fullscreen preview",
          toolbar2: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

          file_picker_callback: function(callback, value, meta) {
              let x = window.innerWidth || document.documentElement.clientWidth || document
                  .getElementsByTagName('body')[0].clientWidth;
              let y = window.innerHeight || document.documentElement.clientHeight || document
                  .getElementsByTagName('body')[0].clientHeight;

              let cmsURL =
                  "{{ route('unisharp.lfm.show') }}" +
                  '?editor=' + meta.fieldname;
              if (meta.filetype == 'image') {
                  cmsURL = cmsURL + "&type=Images";
              } else {
                  cmsURL = cmsURL + "&type=Files";
              }

              tinyMCE.activeEditor.windowManager.openUrl({
                  url: cmsURL,
                  title: 'Filemanager',
                  width: x * 0.8,
                  height: y * 0.8,
                  resizable: "yes",
                  close_previous: "no",
                  onMessage: (api, message) => {
                      callback(message.content);
                  }
              });
          }
      });
      //select2 tag

  });
</script>

<script>
   $('#button_post_thumbnail').filemanager('image');
</script>
@endpush