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
            <h5 class="mb-0 fw-bold"> Add New Item </h5>
            <small class="text-muted float-end">A a New Item for website </small>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('allprojects.submit') }}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Status<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="pro_status" id="pro_status">
                  <option value="">Select Projects Status </option>
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
                  <option value="">Select Projects Category </option>
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
                <input class="form-control" type="text" name="pro_name" id="pro_name" placeholder="Projects Name" value="{{old('pro_name')}}"/>
                <span class="text-danger">@error('pro_name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="text" name="pro_title" id="pro_title" placeholder="Projects Title" value="{{old('pro_title')}}"/>
                <span class="text-danger">@error('pro_title'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Heading<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="text" name="pro_heading" id="pro_heading" placeholder="Projects Heading" value="{{old('pro_heading')}}"/>
                <span class="text-danger">@error('pro_heading'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Location<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="text" name="pro_location" id="pro_location" placeholder="Projects Location" value="{{old('pro_location')}}"/>
                <span class="text-danger">@error('pro_location'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects Start Date<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="date" name="pro_start" id="pro_start" placeholder="Projects Start Date" value="{{old('pro_start')}}"/>
                <span class="text-danger">@error('pro_start'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Projects End Date<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="date" name="pro_end" id="pro_end" placeholder="Projects End Date" value="{{old('pro_end')}}"/>
                <span class="text-danger">@error('pro_end'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Target Amount<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="number" name="target_amount" id="target_amount" placeholder=" Target Amount" value="{{old('target_amount')}}"/>
                <span class="text-danger">@error('target_amount'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Raised Amount<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="number" name="raised_amount" id="raised_amount" placeholder="Raised Amount " value="{{old('raised_amount')}}"/>
                <span class="text-danger">@error('target_amount'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Estimate Cost<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="number" name="cost" id="cost" placeholder="Estimated Cost" value="{{old('cost')}}"/>
                <span class="text-danger">@error('cost'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Estimate People<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="number" name="people" id="people" placeholder="Benifited People" value="{{old('people')}}"/>
                <span class="text-danger">@error('people'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->



              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> project Purpose <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea class="form-control" name="pro_purpose" id="editor" value="{{old('pro_purpose')}}"></textarea>
                <span class="text-danger">@error('pro_purpose'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> project Purpose <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea class="form-control" name="pro_des" id="editor2" value="{{old('pro_des')}}"></textarea>
                <span class="text-danger">@error('pro_des'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> project Purpose <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" name="service_image"  id="service_image" value="{{old('service_image')}}"/>
                <span class="text-danger">@error('pro_purpose'){{$message}} @enderror</span>
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
            <h5 class="card-title">Created History</h5>
            <p class="card-text">
              <div>
                <h1><div id="clock"></div></h1>
                <hr>
                <h3>Total Banner : <span class="text-danger"> {{$totalpost}}</span></h3>
              </div>
            </p>
            @if($lastcreat && $lastcreat->created_at)
                <p class="card-text"><small class="text-muted">Last Created at : {{ $lastcreat->created_at->format('Y-m-d H:i:s A') }} </small></p>
            @else
                <p class="card-text"><small class="text-muted">Last Created at : No Data Available </small></p>
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