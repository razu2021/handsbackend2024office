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
            <h5 class="mb-0 fw-bold">Update Information</h5>
            <small class="text-muted float-end"><a href="{{ route('applyloan.all') }}"><button class="btn btn-success px-4">All Information</button></a></small>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('applyloan.update')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->applyloan_id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="admin_id"  value="{{ Auth::guard('admin')->user()->id; }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
              <!-- aphone end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> First Name <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="fname" id="fname" value="{{$data->fname}}" placeholder="Write your First Name!">
                <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
            <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Last Name <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="lname" id="lname" value="{{$data->lname}}" placeholder="Write your last Name!">
                <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Email <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="email" class="form-control" name="email" id="email" value="{{$data->email}}" placeholder="Write your email!">
                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> phone <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{$data->phone}}" placeholder="Write your ephon!">
                <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Nid Number <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="nid" id="nid" value="{{$data->nid}}" placeholder="Write your NID !">
                <span class="text-danger">@error('nid'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Date of Birth <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="date" class="form-control" name="birth_date" id="birth_date" value="{{$data->birth_date}}" placeholder="Write your Birth Date !">
                <span class="text-danger">@error('nid'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Occupation <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="occupation" id="occupation" value="{{$data->occupation}}" placeholder="Write your Occupation !">
                <span class="text-danger">@error('occupation'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Monthly Income <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="number" class="form-control" name="monthly_income" id="monthly_income" value="{{$data->monthly_income}}" placeholder="Monthly income !">
                <span class="text-danger">@error('monthly_income'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Loan Amount <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="number" class="form-control" name="target_amount" id="target_amount" value="{{$data->target_amount}}" placeholder="Loan Amount !">
                <span class="text-danger">@error('target_amount'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Loan Category<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="loan_category" id="loan_category" >
                  <option value="{{$data->loan_category}}">{{$data->loan_category}}</option>
                  @foreach($micro as $loan)
                  <option value="{{$loan->title}} ">{{$loan->title}}</option>
                 @endforeach
                </select>
                <span class="text-danger">@error('loan_category'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end loan category -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Branch Name<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="branch_name" id="branch_name" value="{{old('branch_name')}}">
                  <option value="{{$data->branch_name}}">{{$data->branch_name}}</option>
                  @foreach($branch as $branchs)
                  <option value="{{$branchs->name}} ">{{$branchs->name}}</option>
                 @endforeach
                </select>
                <span class="text-danger">@error('branch_name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end loan category -->
           
                <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Address <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">
                <span class="text-danger">@error('address'){{$message}} @enderror</span>
                </div>
              </div>
                <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> caption <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="caption" id="caption" value="{{old('caption')}}">
                <span class="text-danger">@error('caption'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- roe end  -->
              </div>
              <!-- image end  -->
             
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