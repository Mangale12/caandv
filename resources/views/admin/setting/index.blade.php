@extends('admin.layouts.app')

@section('title')
Settings
@endsection

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Settings</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Settings</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid">
          <form action="{{route('settings.update',[$item->id])}}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="row">
                <div class="col-12 mb-2 text-align-right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              <div class="col-8">
                  <div class="card">
                      <div class="card-body">
                          <div class="form-group">
                              <label for="name">Phone</label>
                              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Value" value="{{$item->phone}}">
                          </div>
                          <div class="form-group">
                              <label for="name">Mobile</label>
                              <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Value" value="{{$item->mobile}}">
                          </div>
                          <div class="form-group">
                              <label for="name">Email</label>
                              <input type="text" class="form-control" id="email" name="email" placeholder="Enter Value" value="{{$item->email}}">
                          </div>
                          <div class="form-group">
                              <label for="name">Opening Hours</label>
                              <input type="text" class="form-control" id="opening-hours" name="opening_hours" placeholder="Enter Value" value="{{$item->opening_hours}}">
                          </div>
                          <div class="form-group">
                              <label for="name">Location</label>
                              <input type="text" class="form-control" id="location" name="location" placeholder="Enter Value" value="{{$item->location}}">
                          </div>
                          <div class="form-group">
                              <label for="name">Address</label>
                              <input type="text" class="form-control" id="address" name="address" placeholder="Enter Value" value="{{$item->address}}">
                          </div>
                          <div class="form-group">
                              <label for="name">Instagram</label>
                              <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter Value" value="{{$item->instagram}}">
                          </div>
                          <div class="form-group">
                              <label for="name">Facebook</label>
                              <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter Value" value="{{$item->facebook}}">
                          </div>
                          <div class="form-group">
                              <label for="name">Twitter</label>
                              <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter Value" value="{{$item->twitter}}">
                          </div>
                          <div class="form-group">
                              <label for="name">Youtube</label>
                              <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Enter Value" value="{{$item->youtube}}">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-4">
                  <div class="card">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="name">Logo</label>
                          <input type="file" class="form-control" id="logo" name="logo" value="">
                          @if(!empty($item->logo) && fileExists($item->logo,''))
                              <img src="{{asset('images/'.$item->logo)}}" alt="" class="w-100 form-image">
                          @endif
                        </div>
                      </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Register Image</label>
                        <input type="file" class="form-control" name="register_image" id="book-image" onchange="loadFile(event)">
                        <img id="preview-logo-before-upload"  height="200" width="200" class="rounded me-2 d-none">
                      </div>
                    </div>
                </div>
              </div>
            </div>
            </div>
        </form>
    </div>
</section>
<script>
    var loadFile = function(event) {
      var output = document.getElementById('preview-logo-before-upload');
      output.className = 'd-block';
      var reader = new FileReader();
      reader.onload = function(){
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
  </script>

@endsection

@section('script')
{{-- <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script> --}}
@endsection
