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
          <h5 class="mb-0 fw-bold">Update your Portfolio information </h5>
          <small class="text-muted float-end">Add your Information</small>
        </div>
        <div class="card-body">
          <form method="post" action="{{url('dashboard/user/portfolio_image/submit')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <!-- name 1-->
            <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Image Name 01 <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="Service Title " name="name1"  value="{{old('name1')}}"/>
              </div>
            </div>
            <!-- name1 end  -->
            <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Portfolio image 01 <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="file" class="form-control" id="basic-default-fullname" placeholder="Portfolio image 1 " name="image1"  />
              </div>
            </div>
            <!-- image1 end -->
            <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> image Name 02<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="Service Title " name="name2"  value="{{old('name2')}}"/>
              </div>
            </div>
            <!-- name1 end  -->
            <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Portfolio Image 02<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="file" class="form-control" id="basic-default-fullname" placeholder="Portfolio image 2 " name="image2"  />
              </div>
            </div>
            <!-- image1 end -->
            <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> image Name 02<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="Service Title " name="name3"  value="{{old('name3')}}"/>
              </div>
            </div>
            <!-- name1 end  -->
            <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Portfolio Image 02<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="file" class="form-control" id="basic-default-fullname" placeholder="Portfolio image 3 " name="image3"  />
              </div>
            </div>
            <!-- image1 end -->
            <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> image Name 04<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="Service Title " name="name4"  value="{{old('name4')}}"/>
              </div>
            </div>
            <!-- name1 end  -->
            <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Portfolio Image 02<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="file" class="form-control" id="basic-default-fullname" placeholder="Portfolio image 3 " name="image4"  />
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