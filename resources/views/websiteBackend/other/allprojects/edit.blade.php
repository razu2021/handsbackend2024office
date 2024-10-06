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
            <small class="text-muted float-end">Update Information</small>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('allprojects.update')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->allprojects_id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="admin_id"  value="{{ Auth::guard('admin')->user()->id; }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Status<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="pro_status" id="pro_status">
                  <option value="{{$data->pro_status}}">{{$data->pro_status}}</option>
                  <option value="successfull">Projects Successfull</option>
                  <option value="running">Projects Running</option>
                  <option value="upcooming">Projects Upcoming</option>
                </select>
                <span class="text-danger">@error('title'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Category<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="category_as" id="category_as">
                  <option value="{{$data->category_as}}">{{$data->category_as}}</option>
                  <option value="health_campaign">Free Health campaign</option>
                  <option value="other">Other</option>
                </select>
                <span class="text-danger">@error('title'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Name<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="text" name="pro_name" id="pro_name" placeholder="Projects Name" value="{{$data->pro_name}}"/>
                <span class="text-danger">@error('pro_name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="text" name="pro_title" id="pro_title" placeholder="Projects Title" value="{{$data->pro_title}}"/>
                <span class="text-danger">@error('pro_title'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Heading<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="text" name="pro_heading" id="pro_heading" placeholder="Projects Heading" value="{{$data->pro_heading}}"/>
                <span class="text-danger">@error('pro_heading'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Location<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="text" name="pro_location" id="pro_location" placeholder="Projects Location" value="{{$data->pro_location}}"/>
                <span class="text-danger">@error('pro_location'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Start Date<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="date" name="pro_start" id="pro_start" placeholder="Projects Start Date" value="{{$data->pro_start}}"/>
                <span class="text-danger">@error('pro_start'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects End Date<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="date" name="pro_end" id="pro_end" placeholder="Projects End Date" value="{{$data->pro_end}}"/>
                <span class="text-danger">@error('pro_end'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Target Amount<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="number" name="target_amount" id="target_amount" placeholder="Projects Target Amount" value="{{$data->target_amount}}"/>
                <span class="text-danger">@error('target_amount'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Raised Amount<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="number" name="raised_amount" id="raised_amount" placeholder="Projects Raised Amount" value="{{$data->raised_amount}}"/>
                <span class="text-danger">@error('raised_amount'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Estimated Cost<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="number" name="cost" id="cost" placeholder="Projects Estimated cost" value="{{$data->cost}}"/>
                <span class="text-danger">@error('cost'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Benifited People <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="number" name="people" id="people" placeholder="Benifited People" value="{{$data->people}}"/>
                <span class="text-danger">@error('cost'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> project Purpose <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea class="form-control" name="pro_purpose" id="editor" value="{{$data->pro_purpose}}">{{$data->pro_purpose}}</textarea>
                <span class="text-danger">@error('pro_purpose'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> project Purpose <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea class="form-control" name="pro_des" id="editor2" value="{{$data->pro_des}}">{{$data->pro_purpose}}</textarea>
                <span class="text-danger">@error('pro_des'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- aphone end -->
              <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Service Image  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" id="basic-default-fullname" placeholder="Set-URL-for-this-Item" name="service_image" value="{{$data->service_image}}"/>
                <span class="text-danger">@error('service_image'){{$message}} @enderror</span>
              </div>
              </div>
              <div class="col-md-6 d-flex justify-content-end">
                <div class="mb-3">
                @if($data->service_image != "")
                <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="banner image" width="200px" height="200px" style="border-radius:10% ;background-size:cover">
                @else
                <img src="{{asset('uploads')}}/avatar.jpg" alt="banner image" width="200px" height="200px" style="border-radius:10%">
                @endif 
              </div>
              </div>
              </div>
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
            <h5 class="card-title"> Update History </h5>
            <p class="card-text">
              <div>
                <h1><div id="clock"></div></h1>
              </div>
            </p>
            @if($data->updated_at != "")
            <p class="card-text"><small class="text-muted">Last updated: </small> {{$data->updated_at->format('Y-m-d H:i:s A')}}</p>
            @else
              <h4>No Update Data </h4>
            @endif
          </div>
        </div>
      </div>
      <!--col end -->
    </div>
    <!-- row end  -->
  </div>
</section>
@endsection 