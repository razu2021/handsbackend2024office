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
                      <h5 class="mb-0 fw-bold"> Add a New Menu Item </h5>
                      <small class="text-muted float-end"><a class="p-2" href="{{url('admin/dashboard/manage-application/socialmedia')}}"><button class="btn btn-success">All information</button></a></small>
                    </div>
                    <div class="card-body">
                      <form method="post" action="{{url('admin/dashboard/manage-application/socialmedia/submit')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <!-- aphone end -->
                        <div class="col-md-12">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Add Title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Item Name  " name="social_media_name"  value="{{old('social_media_name')}}"/>
                          <span class="text-danger">@error('social_media_name'){{$message}} @enderror</span>
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
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
      <!-- col end  -->
    </div>
    <!-- row end  -->
  </div>
</section>

@endsection 