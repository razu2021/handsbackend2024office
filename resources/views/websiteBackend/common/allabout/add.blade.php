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
            <form method="post" action="{{ route('allabout.submit') }}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <!-- aphone end -->
              <!-- item 2 starts  -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Category Set as<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="category_as" id="category_as">
                  <option value="">post Category as </option>
                  <option value="about_volunteer">About volunteer Page..</option>
                  <option value="about_product">About Product Page..</option>
                  <option value="about_health">About Health campaign..</option>
                  <option value="about_mission">About Mission & Vission </option>
                  <option value="about_faith">About Our Faith..</option>
                  <option value="about_other">About Other..</option>
                </select>
                <span class="text-danger">@error('category_as'){{$message}} @enderror</span>
                </div>
              </div>
               <!-- category end herre  -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add  Heading <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write Heading Name " name="heading"  value="{{old('heading')}}"/>
                <span class="text-danger">@error('heading'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Title " name="title"  value="{{old('title')}}"/>
                <span class="text-danger">@error('title'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Sub-Title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Sub Title " name="subtitle"  value="{{old('subtitle')}}"/>
                <span class="text-danger">@error('subtitle'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->

           

              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Caption <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea class="form-control" name="caption" id="editor" value="{{old('subtitle')}}"></textarea>
                <span class="text-danger">@error('button'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              
              
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Service Image  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" id="basic-default-fullname" placeholder="Set-URL-for-this-Item" name="service_image"  value="{{old('service_image')}}"/>
                <span class="text-danger">@error('service_image'){{$message}} @enderror</span>
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