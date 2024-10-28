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
            <small class="text-muted float-end"><a href="{{route('micro_service.all')}}">All Information </a></small>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('micro_service.submit') }}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <!-- aphone end -->
              <!-- item 2 starts  -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add  Heading <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
               <select class="form-control" name="category_as" id="category_as">
                  <option value="">Service Category As</option>
                  <option value="micro_finance">Micro Finance</option>
                  <option value="seving_service">Savings Service</option>
                  <option value="legal_aid">Legal Aid Service</option>
               </select>
                <span class="text-danger">@error('category_as'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- category end  -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Unique Name <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
               <select class="form-control" name="unique_name" id="unique_name">
               <option value="">Select your URL </option>
                  <option value="basic_loan">Basic Loan</option>
                  <option value="microenterprice_loan">Microenterprice Loan</option>
                  <option value="crop_loan">Crop Loan</option>
                  <option value="livestock_loan">Live Stock Loan</option>
                  <option value="special_loan">Special Loan</option>
                  <option value="house_loan">House Loan</option>
                  <option value="agriculture_loan">Agriculter Loan</option>
                  <option value="higher_education_loan">Higher Education Loan</option>
                  <option value="woman_empowerment_loan">Woman Empowerment Loan</option>
                  <option value="hands_pension_scheme">Hands Pension Scheme</option>
                  <option value="fixed_dipsit_plan">Fixed Diposit Plan</option>
                  <option value="dubble_and_8years_diposit">Dubble and 8 years Diposit</option>
                  <option value="family_welfair_saving_plan">Family Welfair Savings</option>
                  <option value="two_years_saving">2 Years Savings</option>
                  <option value="awareness_and_training">Awareness and Training </option>
                  <option value="mediation">Madiation</option>
                  <option value="public_interest_litigation">Public Interest Litigation</option>
                  <option value="litigation">Litigation</option>
               </select>
                <span class="text-danger">@error('category_as'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- category end  -->

              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add  Heading <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write Heading Name " name="heading"  value="{{old('heading')}}"/>
                <span class="text-danger">@error('heading'){{$message}} @enderror</span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Title<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Title " name="title"  value="{{old('title')}}"/>
                <span class="text-danger">@error('title'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Caption<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea name="caption" id="editor"  value="{{old('caption')}}">{{ old('caption') }}</textarea>
                <span class="text-danger">@error('caption'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Button<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Button " name="button"  value="{{old('button')}}"/>
                <span class="text-danger">@error('button'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- button -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Button URL<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="button_url" id="button_url" value="{{old('button_url')}}">
                  <option value="">Select your URL </option>
                  <option value="basic-loan">Basic Loan</option>
                  <option value="microenterprice-loan">Microenterprice Loan</option>
                  <option value="crop-loan">Crop Loan</option>
                  <option value="livestock-loan">Live Stock Loan</option>
                  <option value="special-loan">Special Loan</option>
                  <option value="house-loan">House Loan</option>
                  <option value="agriculture-loan">Agriculter Loan</option>
                  <option value="higher-education-loan">Higher Education Loan</option>
                  <option value="woman-empowerment-loan">Woman Empowerment Loan</option>
                  <option value="hands-pension-scheme">Hands Pension Scheme</option>
                  <option value="fixed-dipsit-plan">Fixed Diposit Plan</option>
                  <option value="dubble-and-8years-diposit">Dubble and 8 years Diposit</option>
                  <option value="family-welfair-saving-plan">Family Welfair Savings</option>
                  <option value="two-years-saving">2 Years Savings</option>
                  <option value="legal-aid-awareness-and-training">Awareness and Training </option>
                  <option value="mediation">Madiation</option>
                  <option value="public-interest-litigation">Public Interest Litigation</option>
                  <option value="litigation">Litigation</option>
                </select>
                <span class="text-danger">@error('button_url'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- button -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Service Image  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" id="basic-default-fullname" placeholder="Set-URL-for-this-Item" name="service_image"  value="{{old('service_image')}}"/>
                <span class="text-danger">@error('service_image'){{$message}} @enderror</span>
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