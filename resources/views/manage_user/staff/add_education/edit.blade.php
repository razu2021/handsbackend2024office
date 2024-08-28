@extends('dashboard')
@section('content')
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
            <h5 class="mb-0 fw-bold">Add your work places </h5>
            <small class="text-muted float-end">Add your work place Information</small>
          </div>
          <div class="card-body">
            <form method="post" action="{{url('dashboard/user/Add_education/update')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->education_id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Collage / University Name <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Name of the collage/university " name="collage_name"  value="{{$data->collage_name}}"/>
                <span class="text-danger">@error('collage_name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- aphone end -->

              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Subject / Depertment Name   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Name of the Depertment " name="subject_name"  value="{{$data->subject_name}}"/>
                <span class="text-danger">@error('subject_name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Starting Date <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select name="starting_date" class="form-control" id="starting_date">
                  <option value="{{ $data->starting_date }}">{{ $data->starting_date }}</option>
                  @foreach ($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                  @endforeach
              </select>
                <span class="text-danger">@error('starting_date'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Ending Date <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select name="ending_date" class="form-control" id="ending_date">
                    <option value="{{ $data->ending_date }}">{{ $data->ending_date }}</option>
                    @foreach ($years as $year)
                      <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('ending_date'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Session <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Session year   " name="session_date" value="{{$data->session_date}}"/>
                <span class="text-danger">@error('session_date'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Degree of achievement  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Name of the Depertment " name="degree_name" value="{{$data->degree_name}}"/>
                <span class="text-danger">@error('degree_name'){{$message}} @enderror</span>
                </div>
              </div>
              <!--  -->
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
      </div>
      <!-- col end  -->
    </div>
    <!-- row end  -->
  </div>
</section>

@endsection 