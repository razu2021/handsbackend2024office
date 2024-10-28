@extends('dashboard')
@section('content')
<section class="section-padding mt-4">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
        <!-- session messages  -->
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
            {{ Session::get('success') }}
        </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                {{ Session::get('error') }}
            </div>
        @endif
    <!-- End session messages -->
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0 fw-bold"> Add Your work Status </h5>
          <small class="text-muted float-end"><button class="btn  btn-success"><a class="text-white" href="{{route('work_status.all')}}">All Information</a></button></small>
        </div>
        <div class="card-body">
          <form method="post" action="{{route('work_status.submit')}}" enctype="multipart/form-data" id="lastup">
            @csrf
            <div class="row">
            <!-- aphone end -->
            <div class="col-md-12">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Task Name   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="Name of the Organization " name="task_name"  value="{{old('task_name')}}"/>
              <span class="text-danger">@error('task_name'){{$message}} @enderror</span>
              </div>
            </div>
            <!-- aphone end -->

            <div class="col-md-4">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Select Date <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="date" class="form-control" id="basic-default-fullname" placeholder="Work Date optional!" name="curent_date"  value="{{old('curent_date')}}"/>
              <span class="text-danger">@error('curent_date'){{$message}} @enderror</span>
              </div>
            </div>

            <div class="col-md-4">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Starting Time   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="time" class="form-control" id="basic-default-fullname" placeholder="Your Current Position  " name="start_time"  value="{{old('start_time')}}"/>
              <span class="text-danger">@error('start_time'){{$message}} @enderror</span>
              </div>
            </div>
            <!-- aphone end -->
            <div class="col-md-4">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Endint Time    <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="time" class="form-control" id="basic-default-fullname" placeholder="Your Current Position  " name="ending_time"  value="{{old('ending_time')}}"/>
              <span class="text-danger">@error('ending_time'){{$message}} @enderror</span>
              </div>
            </div>
            <!-- aphone end -->
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Task Description </label>
              <textarea type="text" class="form-control" rows="7" id="editor" placeholder="about you " name="description"  value="{{old('description')}}"> {{old('description')}}</textarea>
              <span class="text-danger">@error('description'){{$message}} @enderror</span>
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
            <h5 class="card-title">Update History</h5>
            <p class="card-text">
              <div>
                <h1><div id="clock"></div></h1>
              </div>
            </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <hr>
        <div class="motivate">
          
          <iframe width="100%" height="315" src="https://www.youtube.com/embed/KQc9k_iVBnk?si=5bl6gy0YwcbFgXTR" title="YouTube video player" frameborder="0" autoplay controls allowfullscreen></iframe>
            

        </div>
      </div>
      <!-- col end  -->
    </div>
    <!-- row end  -->
  </div>
</section>


@endsection 