@extends('dashboard')
@section('content')
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
            <h5 class="mb-0 fw-bold">Edite your work status  </h5>
            <small class="text-muted float-end"> <button class="btn btn-success "><a class="text-white" href="{{route('work_status.update')}}">All work Information</a></button></small>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('work_statuse.update')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->worker_id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
              <!-- aphone end -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Task Name  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write the task name " name="task_name"  value="{{$data->task_name}}"/>
                <span class="text-danger">@error('organization_name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- aphone end -->

              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Starting time <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="time" class="form-control" id="basic-default-fullname"  name="starting_time"  value="{{$data->start_time}}"/>
                <span class="text-danger">@error('curent_position'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Ending Date  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="time" class="form-control" id="basic-default-fullname"  name="ending_time"  value="{{$data->ending_time}}"/>
                <span class="text-danger">@error('starting_date'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- aphone end -->
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> About Description </label>
                <textarea type="text" class="form-control" id="basic-default-fullname" rows="7" placeholder="write the task description " name="description"  value="{{$data->description}}"> {{$data->description}}</textarea>

                </div>

        
              
              </div>
              <!-- row -->
              <button type="submit" class="btn btn-primary">Update Information</button>
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