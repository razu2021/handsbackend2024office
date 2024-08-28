@extends('dashboard')
@section('content')
<section class="section-padding">
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
                      <h5 class="mb-0 fw-bold">Update your Profile Information </h5>
                      <small class="text-muted float-end">Add your Information</small>
                    </div>
                    <div class="card-body">
                      <form method="post" action="{{url('dashboard/user/services/submit')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <!-- email end -->
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Service Title  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="Service Title " name="service_title"  value="{{old('service_title')}}"/>
                          <span class="text-danger">@error('service_title'){{$message}} @enderror</span>
                          </div>
                        </div>
                        <!-- email end -->
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Service Subtitle <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="Service Subtitle"  name="service_subtitle"  value="{{old('service_subtitle')}}"/>
                          <span class="text-danger">@error('service_subtitle'){{$message}} @enderror</span>
                          </div>
                        </div>
                      
                        <!-- aphone end -->
                        <div class="col-md-12">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Service Information <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <textarea type="text" class="form-control" id="basic-default-fullname" placeholder="service info" name="service_info"  value="{{old('service_info')}}"> {{old('button_url')}}</textarea>
                          <span class="text-danger">@error('service_info'){{$message}} @enderror</span>
                          </div>
                        </div>
                        <!-- aphone end -->

                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Add Button <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="Your Current Position  " name="button"  value="{{old('button')}}"/>
                          </div>
                        </div>
                        <!-- aphone end -->
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Button url <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="button ulr " name="button_url"  value="{{old('button_url')}}"/>
                          </div>
                        </div>
                        <!-- aphone end -->
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Service image  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="file" class="form-control" id="basic-default-fullname" placeholder="upload service image  " name="service_image" />
                          
                          </div>
                          <!-- profile image -->
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