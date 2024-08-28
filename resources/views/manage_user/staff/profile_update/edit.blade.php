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
                      <form method="post" action="{{url('dashboard/user/profile/update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <!-- ======== -->
                          <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->Creator_id }}" />
                          <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                          <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
                        <!-- edit informatin  -->
                          <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Name <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="" value="{{ Auth::user()->name }}" disabled/>
                          </div>
                        </div>
                        <!-- col end  -->
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> E-mail <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="emai" class="form-control" id="basic-default-fullname" placeholder="John Doe" value="{{ Auth::user()->email }}" disabled/>
                          </div>
                        </div>
                        <!-- email end -->
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Add another Email <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="email" class="form-control" id="basic-default-fullname" placeholder="optional! Add another email " name="another_email"  value="{{$data->another_email}}"/>
                          <span class="text-danger">@error('another_email'){{$message}} @enderror</span>
                          </div>
                        </div>
                        <!-- email end -->
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Add phone number <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="add phone number"  name="phone"  value="{{$data->phone}}"/>
                          <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                          </div>
                        </div>
                      
                        <!-- aphone end -->
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Organization Name  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="Name of the Organization " name="organization_name" value="{{$data->organization_name}}"/>
                          <span class="text-danger">@error('organization_name'){{$message}} @enderror</span>
                          </div>
                        </div>
                        <!-- aphone end -->

                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Current Position  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="Your Current Position  " name="curent_position" value="{{$data->curent_position}}"/>
                          <span class="text-danger">@error('curent_position'){{$message}} @enderror</span>
                          </div>
                        </div>
                        <!-- aphone end -->

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> About BIO <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <textarea type="text" class="form-control" id="basic-default-fullname" placeholder="about you " name="about" value="{{$data->about}}">{{$data->about}}</textarea>
                          <span class="text-danger">@error('about'){{$message}} @enderror</span>
                        </div>

                        <div class="col-lg-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> upload  profile picture <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="file" class="form-control" id="basic-default-fullname" placeholder="upload profile picture  " name="profile_image" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                          @if($data->profile_image!='')
                        <img height="200px" width="auto" src="{{asset('uploads/'.$data->profile_image)}}"/>
                        @else
                        <img height="80px" width="auto"  src="{{asset('uploads/avatar.jpg')}}"/>
                        @endif
                          </div>
                        </div>
                          <!-- profile image -->
                        <div class="col-lg-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> upload cover photo <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="file" class="form-control" id="basic-default-fullname" placeholder="upload cover photo  " name="ban_image"  />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="mb-3">
                          @if($data->ban_image!='')
                            <img height="200px" width="auto" src="{{asset('uploads/'.$data->ban_image)}}"/>
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