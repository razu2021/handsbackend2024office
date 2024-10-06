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
            <small class="text-muted float-end"><a href="{{ route('applyloan.all') }}"><button class="btn btn-success px-4">All Information</button></a> </small>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('applyloan.submit') }}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <!-- aphone end -->
            
            <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> First Name <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="fname" id="fname" value="{{old('fname')}}" placeholder="Write your First Name!">
                <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
            <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Last Name <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="lname" id="lname" value="{{old('lname')}}" placeholder="Write your last Name!">
                <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Email <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Write your email!">
                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> phone <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}" placeholder="Write your ephon!">
                <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Nid Number <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="nid" id="nid" value="{{old('nid')}}" placeholder="Write your NID !">
                <span class="text-danger">@error('nid'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Date of Birth <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="date" class="form-control" name="birth_date" id="birth_date" value="{{old('birth_date')}}" placeholder="Write your Birth Date !">
                <span class="text-danger">@error('nid'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Occupation <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="occupation" id="occupation" value="{{old('occupation')}}" placeholder="Write your Occupation !">
                <span class="text-danger">@error('occupation'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Monthly Income <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="number" class="form-control" name="monthly_income" id="monthly_income" value="{{old('monthly_income')}}" placeholder="Monthly income !">
                <span class="text-danger">@error('monthly_income'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Loan Amount <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="number" class="form-control" name="target_amount" id="target_amount" value="{{old('target_amount')}}" placeholder="Loan Amount !">
                <span class="text-danger">@error('target_amount'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Loan Category<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="loan_category" id="loan_category" value="{{old('loan_category')}}">
                  <option value="">Select Type of Loan</option>
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
                  @foreach($branch as $branchs)
                  <option value="{{$branchs->name}} ">{{$branchs->name}}</option>
                 @endforeach
                </select>
                <span class="text-danger">@error('branch_name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end loan category -->
           
            <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Address <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">
                <span class="text-danger">@error('address'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- end -->
              <!-- item 2 ends -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"> Caption <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea class="form-control" name="caption" id="editor" value="{{old('caption')}}"></textarea>
                <span class="text-danger">@error('button'){{$message}} @enderror</span>
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