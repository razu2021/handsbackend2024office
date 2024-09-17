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
            <form method="post" action="{{route('allstaff.update')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->allstaff_id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="admin_id"  value="{{ Auth::guard('admin')->user()->id; }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
              <!-- aphone end -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Name<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
               <select class="form-control" name="category_as" id="category_as">
                <option value="">{{$data->category_as}} </option>
                <option value="Executive_Leadership">Executive Leadership:</option>  
                <option value="Management_and_Program_Leadership"> Management and Program Leadership</option>  
                <option value="Field_Level_Staff">  Field-Level Staff</option>
                <option value="Administrative_and_Support_Roles">Administrative and Support Roles</option>
                <option value="Finance_and_Credit_Roles">Finance and Credit Roles</option>
                <option value="Training_and_Capacity_Building">Training and Capacity Building</option>
                <option value="Marketing_and_Outreach<">Marketing and Outreach</strong></option>
                <option value="Research_and_Development">Research and Development (R&D)</option>
                <option value="Legal_and_Compliance_Roles">Legal and Compliance Roles</option>
                <option value="Technology_and_Innovation_Roles">Technology and Innovation Roles</option>
                <option value="Monitoring_Evaluation">Monitoring & Evaluation (M&E)</option>
                <option value="Volunteer_and">Volunteer </option>
                <option value="Intern_Positions"> Intern Positions</option>
               </select>
                <span class="text-danger">@error('category_as'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- categpry end -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Name<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Name " name="name" value="{{$data->name}}"/>
                <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Email<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="email" class="form-control" id="basic-default-fullname" placeholder="Write your Email " name="email" value="{{$data->email}}"/>
                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- email end here  -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Email<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Phone " name="phone" value="{{$data->phone}}"/>
                <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Designation<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="Write your Designation " name="designation" value="{{$data->designation}}"/>
                <span class="text-danger">@error('designation'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- item 2 ends -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Caption<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <textarea class="form-control" name="caption" id="editor" value="{!! $data->caption !!}">{!! $data->caption !!}</textarea>
                <span class="text-danger">@error('subtitle'){{$message}} @enderror</span>
                </div>
              </div>
              <!-- aphone end -->
               <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Service Image  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="file" class="form-control" id="basic-default-fullname" placeholder="Set-URL-for-this-Item" name="service_image" value="{{$data->service_image}}"/>
                <span class="text-danger">@error('service_image'){{$message}} @enderror</span>
              </div>
              </div>
              <div class="col-md-6 d-flex justify-content-end">
                <div class="mb-3">
                @if($data->service_image != "")
                <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="banner image" width="200px" height="200px" style="border-radius:10% ;background-size:cover">
                @else
                <img src="{{asset('uploads')}}/avatar.jpg" alt="banner image" width="200px" height="200px" style="border-radius:10%">
                @endif 
              </div>
              </div>
              </div>
              <!-- image end  -->
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