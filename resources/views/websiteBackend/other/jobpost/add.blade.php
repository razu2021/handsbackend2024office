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
            <form method="post" action="{{ route('jobpost.submit') }}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <!-- aphone end -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Organization Name<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Organization Name " name="name"  value="{{old('name')}}"/>
                <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Job Title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Title " name="title"  value="{{old('title')}}"/>
                <span class="text-danger">@error('title'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Job Location<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Location " name="location"  value="{{old('location')}}"/>
                <span class="text-danger">@error('location'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Job Type<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="type" id="type">
                  <option value="">Select Your Job Type</option>
                  <option value=" Full-time"> Full-time</option>
                  <option value="Part-time">Part-time</option>
                  <option value="Remot">Work From Home</option>
                  <option value="Apprenticeship">Apprenticeship</option>
                  <option value="Traineeship">Traineeship</option>
                  <option value="Internship">Internship</option>
                  <option value="Casual employment">Casual employment</option>
                  <option value="Employment on commission">Employment on commission</option>
                  <option value="Contract employment">Contract employment</option>
                  <option value="Probation">Probation</option>
                  <option value="Seasonal employment">Seasonal employment</option>
                  <option value="Leased employment">Leased employment</option>
                  <option value="Contingent employment">Contingent employment</option>
                </select>
                <span class="text-danger">@error('type'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Basic Salary<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Basic Salary  " name="salary"  value="{{old('salary')}}"/>
                <span class="text-danger">@error('salary'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Application Instruction link<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Application Instruction" name="app_instruction"  value="{{old('app_instruction')}}"/>
                <span class="text-danger">@error('app_instruction'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Application Mail<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="email" class="form-control" id="basic-default-fullname" placeholder="Application Mail" name="app_mail"  value="{{old('app_mail')}}"/>
                <span class="text-danger">@error('app_mail'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Application Deadline<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="date" class="form-control" id="basic-default-fullname" placeholder="Application Deadline" name="app_deadline"  value="{{old('app_deadline')}}"/>
                <span class="text-danger">@error('app_deadline'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Other Note<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Other Note" name="note"  value="{{old('note')}}"/>
                <span class="text-danger">@error('note'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Job Context <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea class="form-control" name="caption" id="editor" value="{{old('captoin')}}">{{ old('caption') }}</textarea>
                <span class="text-danger">@error('caption'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Job Context <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" id="basic-default-fullname" placeholder="Other Note" name="service_image"  value="{{old('service_image')}}"/>
                <span class="text-danger">@error('caption'){{$message}} @enderror</span>
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