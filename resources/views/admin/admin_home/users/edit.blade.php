@extends('layouts.adminmaster')
@section('admin_content')
<section class="section-padding mt-5">
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
                      <h5 class="mb-0 fw-bold">Add your work places </h5>
                      <small class="text-muted float-end">Add your work place Information</small>
                    </div>
                    <div class="card-body">
                      <form method="post" action="{{route('alluser.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->id }}" />
                        <!-- aphone end -->
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">  Name  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="Name of the Organization " name="name"  value="{{$data->name}}" disabled/>
                          <span class="text-danger">@error('name'){{$message}} @enderror</span>
                          </div>
                        </div>
                        <!-- aphone end -->

                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Email  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="Your Current Position  " name="email"  value="{{$data->email}}" disabled/>
                          <span class="text-danger">@error('curent_position'){{$message}} @enderror</span>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Request Role  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <select class="form-control" name="role" id="role" disabled>
                          @if($data->role_request == 0)
                              <option value="0">Normal User</option>
                            @elseif($data->role_request == 1)
                              <option value="1">Staff / Employee</option>
                            @elseif($data->role_request == 2)
                              <option value="2">Customer/Member</option>
                            @elseif($data->role_request == 3)
                              <option value="0">Volunteer</option>
                            @endif
                          </select>
                          <span class="text-danger">@error('curent_position'){{$message}} @enderror</span>
                          </div>
                        </div>
                        <!-- role end  -->

                        <div class="col-md-6">
                          <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname"> Current User Role  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                          <select class="form-control" name="role" id="role">
                          @if($data->role == 0)
                              <option value="0">Normal User</option>
                            @elseif($data->role == 1)
                              <option value="1">Staff / Employee</option>
                            @elseif($data->role == 2)
                              <option value="2">Customer/Member</option>
                            @elseif($data->role == 3)
                              <option value="0">Volunteer</option>
                            @endif
                            <option value="0">Normal User</option>
                            <option value="1">Staff / Employee</option>
                            <option value="2">Customer / Member</option>
                            <option value="3">Volunteer</option>
                          </select>
                          <span class="text-danger">@error('curent_position'){{$message}} @enderror</span>
                          </div>
                        </div>
                        <!-- role end  -->


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