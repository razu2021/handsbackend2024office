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
            <form method="post" action="{{route('designation.update')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $data->designation_id }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="admin_id"  value="{{ Auth::guard('admin')->user()->id; }}" />
                <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $data->slug }}" />
              <!-- aphone end -->
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Add Caption<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input class="form-control" type="text" name="designation_name" id="designation_name" value="{{$data->designation_name}}" />
                <span class="text-danger">@error('designation_name'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Designation<span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <select class="form-control" name="title" id="title" value="{{old('title')}}">
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong>Executive Leadership</strong></option>
                  <option value="{{$data->title}}">{{$data->title}}</option>
                  <option value="CEO">Chief Executive Officer (CEO)</option>
                  <option value="Executive_Director">Executive Director</option>
                  <option value="COO">Chief Operating Officer (COO)</option>
                  <option value="CFO">Chief Financial Officer (CFO)</option>
                  <option value="CDO">Chief Development Officer (CDO)</option>
                  <hr>
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong>Management and Program Leadership</strong></option>
                  <option value="Program_Director_Manager">Program Director/Manager</option>
                  <option value="Microfinance_Manager">Microfinance Manager</option>
                  <option value="Operations_Manager">Operations Manager</option>
                  <option value="Finance_Manager">Finance Manager</option>
                  <option value="Risk_Compliance_Manager">Risk & Compliance Manager</option>
                  <option value="Monitoring_and_Evaluation_Manager">Monitoring and Evaluation (M&E) Manager</option>
                  <option value="Human_Resources_Manager">Human Resources Manager</option>
                  <option value="IT_Manager">IT Manager</option>
                  <hr>
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong> Field-Level Staff:</strong></option>
                  <option value="Loan_Officer_Field_Officer">Loan Officer/Field Officer</option>
                  <option value="Credit_Officer">Credit Officer</option>
                  <option value="Field_Coordinator">Field Coordinator</option>
                  <option value="Community_Mobilizer">Community Mobilizer</option>
                  <option value="Field_Supervisor">Field Supervisor</option>
                  <option value="Client_Relationship_Officer">Client Relationship Officer</option>
                  <hr>
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong> Administrative and Support Roles:</strong></option>
                  <option value="Administrative_Officer">Administrative Officer</option>
                  <option value="Accountant">Accountant</option>
                  <option value="Data_Entry_Officer">Data Entry Officer</option>
                  <option value="Office_Assistant">Office Assistant</option>
                  <option value="Receptionist">Receptionist</option>
                  <option value="Clerk">Clerk</option>
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong> Finance and Credit Roles:</strong></option>
                  <option value="Credit_Analyst">Credit Analyst</option>
                  <option value="Loan_Recovery_Officer">Loan Recovery Officer</option>
                  <option value="Internal_Auditor">Internal Auditor</option>
                  <option value="Treasurer">Treasurer</option>
                  <option value="Financial_Analyst">Financial Analyst</option>
                  <hr>
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong> Training and Capacity Building:</strong></option>
                  <option value="Training_Officer">Training Officer</option>
                  <option value="Capacity_Building_Specialist">Capacity Building Specialist</option>
                  <option value="Financial_Literacy_Coordinator">Financial Literacy Coordinator</option>
                  <hr>
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong> Marketing and Outreach:</strong></option>
                  <option value="Marketing_Officer">Marketing Officer</option>
                  <option value="Outreach_Coordinator">Outreach Coordinator</option>
                  <option value="Public_Relations_Officer">Public Relations Officer</option>
                  <hr>
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong>  Research and Development (R&D):</strong></option>
                  <option value="Research_Officer">Research Officer</option>
                  <option value="Development_Specialist">Development Specialist</option>
                  <hr>
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong>  Legal and Compliance Roles:</strong></option>
                  <option value="Legal_Officer">Legal Officer</option>
                  <option value="Legal_Aid">Legal Aid</option>
                  <option value="Compliance_Officer">Compliance Officer</option>
                  <hr>
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong> Technology and Innovation Roles:</strong></option>
                  <option value="IT_Officer">IT Officer</option>
                  <option value="IT_Executive">IT Executive</option>
                  <option value="Systems_Analyst">Systems Analyst</option>
                  <hr>
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong>  Monitoring & Evaluation (M&E):</strong></option>
                  <option value="Monitoring_Evaluation_Officer">Monitoring & Evaluation Officer</option>
                  <option value="Data_Analyst">Data Analyst</option>
                  <hr>
                  <option class="text-success pb-2" value="avascript:void(0)" disabled> <strong>Volunteer and Intern Positions:</strong></option>
                  <option value="Program_Volunteer">Program Volunteer</option>
                  <option value="Intern ">Intern</option>
                  <hr>
                </select>
                <span class="text-danger">@error('title'){{$message}} @enderror</span>
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