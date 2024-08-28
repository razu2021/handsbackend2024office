@extends('layouts.adminmaster')
@section('admin_content')
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
          <h5 class="mb-0 fw-bold">Add Reason Details Type  </h5>
          <small class="text-muted float-end">Add  Information</small>
        </div>
        <div class="card-body">
          <form method="post" action="{{url('admin/dashboard/manage/reason_types/submit')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <!-- name 1-->
            <div class="col-md-12">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Add Leave Details Type  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="add your type  " name="reason_name"  value="{{old('reason_name')}}"/>
              </div>
            </div>
            <!-- image1 end -->
            <!-- row -->
            <button type="submit" class="btn btn-primary">Upload</button>
          </form>
        </div>
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