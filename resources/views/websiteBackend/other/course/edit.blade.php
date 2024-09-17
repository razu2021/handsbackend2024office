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
            <form method="post" action="{{route('course.update')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->course_id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="admin_id"  value="{{ Auth::guard('admin')->user()->id; }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
              <!-- aphone end -->

                  <!-- aphone end -->
                <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Organization Name<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Organization Name " name="provider_name" value="{{$data->provider_name}}"/>
                <span class="text-danger">@error('provider_name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Title " name="course_title"  value="{{$data->course_title}}"/>
                <span class="text-danger">@error('course_title'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Location<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Location " name="course_location"  value="{{$data->course_location}}"/>
                <span class="text-danger">@error('course_location'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Type<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="course_type" id="course_type">
                  <option value="{{$data->course_type}}">{{$data->course_type}}</option>
                  <option value="Online">Online</option>
                  <option value="Of-Line">Of Line</option>
                </select>
                <span class="text-danger">@error('type'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Price<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Basic Salary" name="course_price"  value="{{$data->course_price}}"/>
                <span class="text-danger">@error('course_price'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Application  link<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Application Link" name="app_instruction"  value="{{$data->app_instruction}}"/>
                <span class="text-danger">@error('app_instruction'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Application Target<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Application Mail" name="app_target"  value="{{$data->app_target}}"/>
                <span class="text-danger">@error('app_target'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Application Deadline<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="date" class="form-control" id="basic-default-fullname" placeholder="Application Deadline" name="app_deadline"  value="{{$data->app_deadline}}"/>
                <span class="text-danger">@error('app_deadline'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Education<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Application Gender" name="app_education"  value="{{$data->app_education}}"/>
                <span class="text-danger">@error('app_education'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Gender<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Application " name="app_gender"  value="{{$data->app_gender}}"/>
                <span class="text-danger">@error('app_gender'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Duration<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="number" class="form-control" id="basic-default-fullname" placeholder="Course Duration" name="course_duration"  value="{{$data->course_duration}}"/>
                <span class="text-danger">@error('course_duration'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course Started At<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="date" class="form-control" id="basic-default-fullname" placeholder="Course start" name="course_start"  value="{{$data->course_start}}"/>
                <span class="text-danger">@error('course_start'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Course end At<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="date" class="form-control" id="basic-default-fullname" placeholder="Course start" name="course_end"  value="{{$data->course_end}}"/>
                <span class="text-danger">@error('course_end'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Class Duration<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="number" class="form-control" id="basic-default-fullname" placeholder="Class Duration" name="class_duration"  value="{{$data->class_duration}}"/>
                <span class="text-danger">@error('class_duration'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Class Start<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="time" class="form-control" id="basic-default-fullname" placeholder="Class Start" name="class_start"  value="{{$data->class_start}}"/>
                <span class="text-danger">@error('class_start'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Class End<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="time" class="form-control" id="basic-default-fullname" placeholder="Class End" name="class_end"  value="{{$data->class_end}}"/>
                <span class="text-danger">@error('class_end'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Total Class<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="number" class="form-control" id="basic-default-fullname" placeholder="Total Class" name="total_class"  value="{{$data->total_class}}"/>
                <span class="text-danger">@error('total_class'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Certificate<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Total Class" name="certificate"  value="{{$data->certificate}}"/>
                <span class="text-danger">@error('certificate'){{$message}} @enderror</span>
                </div>
              </div>

              <!-- item  ends -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Other Note<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Other Note" name="note" value="{{$data->note}}"/>
                <span class="text-danger">@error('note'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item  ends -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Course Context <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea class="form-control" name="caption" id="editor" value="{{$data->caption}}">{{$data->caption}}</textarea>
                <span class="text-danger">@error('caption'){{$message}} @enderror</span>
                </div>
              </div>

                <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Service Image  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" id="basic-default-fullname" placeholder="Set-URL-for-this-Item" name="service_image" value="{{$data->service_image}}"/>
                <span class="text-danger">@error('service_image'){{$message}} @enderror</span>
              </div>
              <div class="mb-3">
                @if($data->service_image != "")
                <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="banner image" width="200px" height="200px" style="border-radius:10% ;background-size:cover">
                @else
                <img src="{{asset('uploads')}}/avatar.jpg" alt="banner image" width="200px" height="200px" style="border-radius:10%">
                @endif 
              </div>
              </div>
                <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Service Details Image  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" id="basic-default-fullname" placeholder="Set-URL-for-this-Item" name="service_bg_image" value="{{$data->service_bg_image}}"/>
                <span class="text-danger">@error('service_image'){{$message}} @enderror</span>
              </div>
              <div class="mb-3">
                @if($data->service_bg_image != "")
                <img src="{{asset('uploads/website/'.$data->service_bg_image)}}" alt="banner image" width="200px" height="200px" style="border-radius:10% ;background-size:cover">
                @else
                <img src="{{asset('uploads')}}/avatar.jpg" alt="banner image" width="200px" height="200px" style="border-radius:10%">
                @endif 
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