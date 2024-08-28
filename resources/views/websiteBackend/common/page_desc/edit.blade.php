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
            <form method="post" action="{{route('page_desc.update')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->page_desc_id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="admin_id"  value="{{ Auth::guard('admin')->user()->id; }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
              <!-- aphone end -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Page Category <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="category_as" id="category_as">
                  <option value="{{$data->category_as}}">{{$data->category_as}}</option>
                  <option value="micro_finace">Micro Finance ..</option>
                  <option value="sevings_service">Sevings Service..</option>
                  <option value="emergency_relief">Emergency Relief..</option>
                  <option value="economic_development">Economic Development..</option>
                  <option value="child_protection">Child Protection ..</option>
                  <option value="education">Education..</option>
                  <option value="health_nutrition">Health and Nutrition..</option>
                  <option value="water_sanitaion">Water Sanitation and Hygiene..</option>
                  <option value="products">Product for Human Bing..</option>
                  <option value="internship">Internship..</option>
                  <option value="career">Career..</option>
                </select>
                <span class="text-danger">@error('heading'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Title " name="title" value="{{$data->title}}"/>
                <span class="text-danger">@error('title'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- aphone end -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea name="caption" id="editor"  value="{!! $data->caption !!}">{!! $data->caption !!}</textarea>
                <span class="text-danger">@error('title'){{$message}} @enderror</span>
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