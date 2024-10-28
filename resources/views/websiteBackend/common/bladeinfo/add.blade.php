@extends('layouts.adminmaster')
@section('admin_content')
<section class="section-padding mt-4">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
      @if(session('message'))
        <div class="alert alert-success ">
            {{ session('message') }}
        </div>
      @endif
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0 fw-bold"> Add a New Banner Item </h5>
          <small class="text-muted float-end"> <button class="btn btn-success"> <a class="text-white" href="{{route('allbanner.add')}}">Add New Banner </a></button></small>
        </div>
        <div class="card-body">
          <form method="post" action="{{route('blade.submit')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <!-- aphone end -->
            <div class="col-md-12">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Banner Set Main Page As <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <select class="form-control" name="page_name" id="page_name">
                <option value=""> Insart Page </option>
                @foreach($viewNames as $viewNames)
                <option value="{{$viewNames}}">{{$viewNames}}</option>
                @endforeach
              </select>
              <span class="text-danger">@error('page_name'){{$message}} @enderror</span>
              </div>
            </div>
          
            </div>
            <!-- row -->
            <button type="submit" class="btn btn-primary">Add Item</button>
          </form>
       
        </div>
       
      </div>

      </div>
      <!-- col end  -->
      <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Active Pages</h5>
              <div>
                <ul style="text-align:left;list-style-type:none">
                  @foreach($inserted as $activepage)
                    <li> <span style="color:green"> <i class="far fa-check-circle"></i></span> {{$activepage->page_name }} </li>
                  @endforeach
                </ul>
              </div>
           
        
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Create History</h5>
            <p class="card-text">
              <div>
                <h1><div id="clock"></div></h1>
                <h3>Total Post: {{$totalpost}}</h3>
              </div>
            </p>
           
            
         
          </div>
        </div>
      </div>
      <!-- col end  -->
    </div>
    <!-- row end  -->
  </div>
</section>

@endsection 