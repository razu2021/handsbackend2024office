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
            <small class="text-muted float-end"><a class="p-2" href="{{route('faqs.all')}}"><button class="btn btn-success">All information</button></a></small>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('faqs.submit') }}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Write your name <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write Name " name="name"  value="{{old('name')}}"/>
                <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Write your phone <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write phone " name="phone"  value="{{old('phone')}}"/>
                <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Write your Email<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="email" class="form-control" id="basic-default-fullname" placeholder="Write email " name="email"  value="{{old('email')}}"/>
                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Where are From ?<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write district " name="district"  value="{{old('district')}}"/>
                <span class="text-danger">@error('district'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">What is your "Quastions" ? <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your qustion " name="qustion"  value="{{old('qustion')}}"/>
                <span class="text-danger">@error('qustion'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Answer<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea name="answer" id="editor"  value="{{old('answer')}}">{{ old('answer') }}</textarea>
                <span class="text-danger">@error('answer'){{$message}} @enderror</span>
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