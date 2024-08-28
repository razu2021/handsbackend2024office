@extends('layouts.adminmaster')
@section('admin_content')
<section class="section-padding mt-4">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
      @if(session('message'))
        <div class="alert alert-success ">
            {{ session('message') }}
        </div>
      @endif
      <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">Update Menus </h5>
            <small class="text-muted float-end">Update Menus Information</small>
          </div>
          <div class="card-body">
            <form method="post" action="{{url('admin/dashboard/manage-application/socialmediaurl/update')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->url_id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="admin_id"  value="{{ Auth::guard('admin')->user()->id; }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
              <!-- aphone end -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Set URL As<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select name="social_mediaid" id="social_mediaid" class="form-control">
                  <option value=""> {{$data->socialMediaName->social_media_name}}</option>
                @foreach($all as $alls)
                <option value="{{$alls->social_media_id}}">{{$alls->social_media_name}}</option>
                @endforeach
                </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Social Media Name <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Social Media Name " name="social_media_url"  value="{{$data->social_media_url}}"/>
                </div>
              </div>
              <!-- aphone end -->
              </div>
              <!-- row -->
              <button type="submit" class="btn btn-primary">Upload</button>
            </form>
          </div>
        </div>
      </div>
      <!-- col end  -->
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Update History</h5>
            <p class="card-text">
              <div>
                <h1><div id="clock"></div></h1>
              </div>
            </p>
            @if($data->updated_at != "")
              <p class="card-text"><small class="text-muted">Last updated at: </small>{{$data->updated_at->format('Y-m-d H:i:s A')}}</p>
            @else
            <p class="text-danger">Not Updated </p>
            @endif
            
          </div>
        </div>
      </div>
      <!-- col end  -->
    </div>
    <!-- row end  -->
  </div>
</section>

@endsection 