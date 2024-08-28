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
            <form method="post" action="{{url('admin/dashboard/website-manage/home-banner/update')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->banner_id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="admin_id"  value="{{ Auth::guard('admin')->user()->id; }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
              <!-- aphone end -->
              
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Banner Set Main Page As <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <select class="form-control" name="page_unique_name" id="page_unique_name" disabled>
                    <option value="#" >{{$data->page_unique_name}}</option>
                  </select>
               
                </div>
              </div>
              
              <!-- item 2 starts  -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your banner Title " name="banner_title"  value="{{$data->banner_title}}"/>
                <span class="text-danger">@error('menu_name'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Heading<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your banner Heading " name="banner_heading"  value="{{$data->banner_heading}}"/>
                <span class="text-danger">@error('banner_heading'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->

              <!-- item 2 starts  -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Caption<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your banner Title " name="banner_caption"  value="{{$data->banner_caption}}"/>
                <span class="text-danger">@error('banner_caption'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Banner Button 1<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Banner Button 1. !optional " name="banner_button1"  value="{{$data->banner_button1}}"/>
                <span class="text-danger">@error('banner_button1'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <!-- item 2 starts  -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Button 1 Url <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder=" Button 1 URl Link" name="banner_button_url1"  value="{{$data->banner_button_url1}}"/>
                <span class="text-danger">@error('banner_button_url1'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Banner Button 2<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Banner Button 1. !optional " name="banner_button2"  value="{{$data->banner_button2}}"/>
                <span class="text-danger">@error('banner_button2'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Banner Button2 url<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Button 2 URl Link " name="banner_button_url2"  value="{{$data->banner_button_url2}}"/>
                <span class="text-danger">@error('banner_button_url2'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->

              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Background Image  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" id="basic-default-fullname" placeholder="Set-URL-for-this-Item" name="banner_bg_image"  value="{{old('banner_bg_image')}}"/>
                <span class="text-danger">@error('banner_bg_image'){{$message}} @enderror</span>
              </div>
              <div class="mb-3">
                @if($data->banner_bg_image != "")
                <img src="{{asset('uploads/website/'.$data->banner_bg_image)}}" alt="banner image" width="200px" height="200px" style="border-radius:10% ;background-size:cover">
                @else
                <img src="{{asset('uploads')}}/avatar.jpg" alt="banner image" width="200px" height="200px" style="border-radius:10%">
                @endif 
              </div>

              </div>
              <div class="col-md-6 ">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Banner Image  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" id="basic-default-fullname" placeholder="Set-URL-for-this-Item" name="banner_image"  value="{{old('banner_image')}}"/>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                @if($data->banner_image != "")
                <img src="{{asset('uploads/website/'.$data->banner_image)}}" alt="banner image" width="200px" height="200px" style="border-radius:10%">
                @else
                <img src="{{asset('uploads')}}/avatar.jpg" alt="banner image" width="200px" height="200px" style="border-radius:10%">
                @endif 
              </div>
              </div>
              <!-- aphone end -->
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