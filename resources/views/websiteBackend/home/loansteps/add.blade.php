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
            <small class="text-muted float-end"><a href="{{route('loansteps.all')}}">All information</a></small>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('loansteps.submit') }}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Top Heading <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write top Heading Name " name="heading"  value="{{old('heading')}}"/>
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
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Caption<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea name="caption" id="editor" value="{{old('caption')}}">{{old('caption')}}</textarea>
                <span class="text-danger">@error('caption'){{$message}} @enderror</span>
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