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
            <h5 class="mb-0 fw-bold">Update address Number </h5>
            <small class="text-muted float-end">Update address Information</small>
          </div>
          <div class="card-body">
            <form method="post" action="{{url('admin/dashboard/manage-application/address/update')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->address_id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="admin_id"  value="{{ Auth::guard('admin')->user()->id; }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
              <!-- aaddress end -->
              
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Update address Title <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your address Address " name="address_title"  value="{{$data->address_title}}"/>
                </div>
              </div>
              <!-- aaddress end -->
                <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add address Details <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea type="text" class="form-control" name="address_name" id="editor" placeholder="Write your Item Name">  {!! $data->address_name !!} </textarea>
                </div>
              </div>
            <!-- aaddress end -->
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
            @if($data->updated_at != "")
              <p class="card-text"><small class="text-muted">Last updated at: </small>{{$data->updated_at->format('Y-m-d H:i:s A')}}</p>
            @else
            <p class="text-danger">Not Updated </p>
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