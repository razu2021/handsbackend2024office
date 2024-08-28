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
                      <form method="post" action="{{url('dashboard/user/services/update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <!-- ======== -->
                          <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->Service_id }}" />
                          <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                          <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
                        <!-- email end -->
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Service Title <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder=" service title" name="service_title"  value="{{$data->service_title}}"/>
                          
                          </div>
                        </div>
                        <!-- email end -->
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Service Subtitle <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="upadate subtitle"  name="service_subtitle"  value="{{$data->service_subtitle}}"/>
                          
                          </div>
                        </div>
                      
                        <!-- aphone end -->
                        <div class="col-md-12">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Service Information <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <textarea type="text" class="form-control" id="basic-default-fullname" placeholder="service info" name="service_info"  value="{{$data->service_info}}"> {{$data->service_info}}</textarea>
                         
                          </div>
                        </div>
                        <!-- aphone end -->

                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Button <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="update button  " name="button" value="{{$data->button}}"/>
                          
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Button ulr<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="update button  " name="button_url" value="{{$data->button_url}}"/>
                          
                          </div>
                        </div>
                        <!-- aphone end -->

                    
                        <div class="col-lg-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Service image <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="file" class="form-control" id="basic-default-fullname" placeholder="upload Service image  " name="service_image" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                          @if($data->service_image!='')
                        <img height="200px" width="auto" src="{{asset('uploads/'.$data->service_image)}}"/>
                        @else
                        <img height="80px" width="auto"  src="{{asset('uploads/avatar.jpg')}}"/>
                        @endif
                          </div>
                        </div>
                          <!-- profile image -->
                        </div>
                        <!-- row -->
                        <button type="submit" class="btn btn-primary">Update Your Information</button>
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