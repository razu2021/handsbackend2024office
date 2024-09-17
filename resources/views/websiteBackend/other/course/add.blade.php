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
            <form method="post" action="{{ route('course.submit') }}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <!-- aphone end -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Organization Name<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Organization Name " name="provider_name"  value="{{old('provider_name')}}"/>
                <span class="text-danger">@error('provider_name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Title " name="course_title"  value="{{old('course_title')}}"/>
                <span class="text-danger">@error('course_title'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Location<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Location !" name="course_location"  value="{{old('course_location')}}"/>
                <span class="text-danger">@error('course_location'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Type<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="course_type" id="course_type">
                  <option value="">Select Your Course Type</option>
                  <option value="online"> Online </option>
                  <option value="Of-online">Of Online </option>
                </select>
                <span class="text-danger">@error('type'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Price<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Course Price" name="course_price"  value="{{old('course_price')}}"/>
                <span class="text-danger">@error('course_price'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Application link<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Application Link" name="app_instruction"  value="{{old('app_instruction')}}"/>
                <span class="text-danger">@error('app_instruction'){{$message}} @enderror</span>
                </div>
              </div>

              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Application Reased<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Application Reased" name="app_target"  value="{{old('app_target')}}"/>
                <span class="text-danger">@error('app_target'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Application Deadline<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="date" class="form-control" id="basic-default-fullname" placeholder="Application Deadline" name="app_deadline"  value="{{old('app_deadline')}}"/>
                <span class="text-danger">@error('app_deadline'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Education Qualification<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Application Reased" name="app_education"  value="{{old('app_education')}}"/>
                <span class="text-danger">@error('app_education'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Applicant Gender<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Application Reased" name="app_gender"  value="{{old('app_gender')}}"/>
                <span class="text-danger">@error('app_gender'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <hr>  
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Duration<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="number" class="form-control" id="basic-default-fullname" placeholder="Course Duration" name="course_duration"  value="{{old('course_duration')}}"/>
                <span class="text-danger">@error('course_duration'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Start At<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="date" class="form-control" id="basic-default-fullname" placeholder="Course Start Date" name="course_start"  value="{{old('course_start')}}"/>
                <span class="text-danger">@error('course_start'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course End Date<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="date" class="form-control" id="basic-default-fullname" placeholder="Course End Date" name="course_end"  value="{{old('course_end')}}"/>
                <span class="text-danger">@error('course_end'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Class Duration<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="number" class="form-control" id="basic-default-fullname" placeholder="Class Duration" name="class_duration"  value="{{old('class_duration')}}"/>
                <span class="text-danger">@error('class_duration'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Class Srarted At <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="time" class="form-control" id="basic-default-fullname" placeholder="Class Start" name="class_start"  value="{{old('class_start')}}"/>
                <span class="text-danger">@error('class_start'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Class End At <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="time" class="form-control" id="basic-default-fullname" placeholder="Class end" name="class_end"  value="{{old('class_end')}}"/>
                <span class="text-danger">@error('class_end'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Total Class <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="number" class="form-control" id="basic-default-fullname" placeholder="Class end" name="total_class"  value="{{old('total_class')}}"/>
                <span class="text-danger">@error('total_class'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Certificate<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Class end" name="certificate"  value="{{old('certificate')}}"/>
                <span class="text-danger">@error('certificate'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->

              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Other Note<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Other Note" name="note"  value="{{old('note')}}"/>
                <span class="text-danger">@error('note'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Course Context <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea class="form-control" name="caption" id="editor" value="{{old('captoin')}}">{{ old('caption') }}</textarea>
                <span class="text-danger">@error('caption'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Course Context <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" id="basic-default-fullname" placeholder="Other Note" name="service_image"  value="{{old('service_image')}}"/>
                <span class="text-danger">@error('service_image'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- service image end  -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Course Context <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" id="basic-default-fullname" placeholder="Other Note" name="service_bg_image"  value="{{old('service_bg_image')}}"/>
                <span class="text-danger">@error('service_bg_image'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- service image end  -->
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