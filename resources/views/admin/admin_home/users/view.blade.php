@extends('layouts.adminmaster')
@section('admin_content')

<section>
  <div class="container ">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
          <div class="card mb-4 mt-4">
            <div class="bt text-end pt-4 pb-2" style="padding-right:50px ">
                <a href=""><button class="btn btn-success">status</button></a>
                <a href="{{url('admin/dashboard/admin_allusers/delete/'.$data->id)}}"><button class="btn btn-danger">Delete </button></a>
            </div>
            <hr>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4 " style="border-right:2px solid #000">
                  <h4>{{$data->name}}</h4>
                  <h4>{{$data->email}}</h4>
                  <h4>{{$data->verified_at}}</h4>
                </div>
                <div class="col-lg-4" style="border-right:2px solid #000">
                  <h4><span>Created at:</span> {{$data->created_at}}</h4>
                  <h4><span>Updated at:</span>{{$data->updated_at}}</h4>
                </div>
                <div class="col-lg-4 text-center">
                  no data 
                </div>
                
              </div>
              <!-- card body end -->
            </div>
          </div>
        <!-- col end  -->
      </div>
    <!-- row end  -->
    </div>
  </div>
</section>
<!-- profile information  -->
<section>
  <div class="container ">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
      @foreach($profileinfo as $data)
          <div class="card mb-4 mt-4">
            <div class="bt  d-inline pt-4 pb-2">
            <div class="row">
              <div class="col-lg-6">
              <div class="con" style="padding-left:50px ">
              @if($data->post_status == 2)
            <h5 class="text-danger ">User Post is not Published </h5>
              @elseif($data->post_status == 0)
              <h5 class="text-warning">Post Status is Pending  </h5>
              @elseif($data->post_status == 1)
              <h5 class="text-success fw-bold">Active post</h5>
              @endif
              </div>
                <!-- col end  -->
              </div>
              <div class="col-lg-6 text-end">
                <div class="con " style="padding-right:50px ">
                
                <div class="dropdown">
                @if($data->post_status == 2)
                <button class="btn btn-danger">Unpublished</button>
                @elseif($data->post_status == 0)
                <button class="btn btn-warning">Pending</button>
                @elseif($data->post_status == 1)
                <button class="btn btn-success">Active post </button>
                @endif


                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Status 
                </button>
                
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_/post_active_profile/'.$data->Creator_id)}}">Active </a></li>
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_/post_deactive_profile/'.$data->Creator_id)}}">Deactive </a></li>
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_/delete/'.$data->Creator_id)}}">Delete</a></li>
                </ul>
                
              </div>
                </div>
              </div>
            </div>
            <!-- row end  -->
              
            </div>
            <hr>
            <div class="card-body">
            <form>
                <div class="row">
               
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname"> Another Email  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->another_email}}" disabled/>
                  </div>
                </div>
                <!-- end  -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname"> Phone  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->phone}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname"> Organization Name   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->organization_name}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname"> Curent Position   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->curent_position }}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-12">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname"> About me    <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <textarea class="form-control" value="{{$data->about}}" disabled>{{$data->about}}</textarea>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-12">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname"> Profile image    <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                    @if($data->profile_image !="")
                    <img src="{{asset('uploads/'.$data->profile_image)}}" alt="profile image " style="height:200px ;width:auto">
                    @else
                    <img src="{{asset('uploads/avatar.png')}}" alt="image" style="height:120px;width:auto">
                    @endif

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname"> Cover photo   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  @if($data->ban_image !="")
                    <img src="{{asset('uploads/'.$data->ban_image)}}" alt="profile image " style="height:200px ;width:auto">
                    @else
                    <img src="{{asset('uploads/avatar.png')}}" alt="image" style="height:120px;width:auto">
                    @endif
                  </div>
                </div>
                <!-- end -->
                @endforeach
                </div>
                <!-- row -->
              </form>
              <!-- card body end -->
            </div>
          </div>
        <!-- col end  -->
      </div>
    <!-- row end  -->
    </div>
  </div>
</section>

<!-- WORK PLACE  information  -->
@foreach($addworkplace as $data)
<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
          <div class="card mb-4 mt-4">
            <h1 class="" style="padding:10px 10px ">work places </h1>
            <div class="bt  d-inline pt-4 pb-2">
            <div class="row">
              <div class="col-lg-6">
              <div class="con" style="padding-left:50px ">
              @if($data->post_status == 2)
            <h5 class="text-danger ">User Post is not Published </h5>
              @elseif($data->post_status == 0)
              <h5 class="text-warning">Post Status is Pending  </h5>
              @elseif($data->post_status == 1)
              <h5 class="text-success fw-bold">Active post</h5>
              @endif
              </div>
                <!-- col end  -->
              </div>
              <div class="col-lg-6 text-end">
                <div class="con " style="padding-right:50px">
                
                <div class="dropdown">
                @if($data->post_status == 2)
                <button class="btn btn-danger">Unpublished</button>
                @elseif($data->post_status == 0)
                <button class="btn btn-warning">Pending</button>
                @elseif($data->post_status == 1)
                <button class="btn btn-success">Active post </button>
                @endif
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Status 
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_/post_active_work/'.$data->Creator_id)}}">Active </a></li>
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_/post_deactive_work/'.$data->Creator_id)}}">Deactive </a></li>
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_work_place/delete/'.$data->Creator_id)}}">Delete</a></li>
                </ul>
              </div>
                </div>
              </div>
            </div>
            <!-- row end  -->
            </div>
            <hr>
            <div class="card-body">
            <form>
                <div class="row">
 
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname"> Organization Name   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->organization_name}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">  Position   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->curent_position }}" disabled/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">  Start at    <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->starting_date }}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">  Start at    <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->ending_date }}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-12">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname"> Job description   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <textarea class="form-control" value="{{$data->job_des}}" disabled>{{$data->job_des}}</textarea>
                  </div>
                </div>
                <!-- end -->

               
                </div>
                <!-- row -->
              </form>
              <!-- card body end -->
            </div>
          </div>
        <!-- col end  -->
      </div>
    <!-- row end  -->
    </div>
  </div>
</section>
@endforeach

<!-- Education   information  -->
@foreach($education as $data)
<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
          <div class="card mb-4 mt-4">
            <h1 class="" style="padding:10px 10px ">Educaton information  </h1>
            <div class="bt  d-inline pt-4 pb-2">
            <div class="row">
              <div class="col-lg-6">
              <div class="con" style="padding-left:50px ">
              @if($data->post_status == 2)
            <h5 class="text-danger ">User Post is not Published </h5>
              @elseif($data->post_status == 0)
              <h5 class="text-warning">Post Status is Pending  </h5>
              @elseif($data->post_status == 1)
              <h5 class="text-success fw-bold">Active post</h5>
              @endif
              </div>
                <!-- col end  -->
              </div>
              <div class="col-lg-6 text-end">
                <div class="con " style="padding-right:50px">
                
                <div class="dropdown">
                @if($data->post_status == 2)
                <button class="btn btn-danger">Unpublished</button>
                @elseif($data->post_status == 0)
                <button class="btn btn-warning">Pending</button>
                @elseif($data->post_status == 1)
                <button class="btn btn-success">Active post </button>
                @endif
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Status 
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_/post_active_education/'.$data->Creator_id)}}">Active </a></li>
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_/post_deactive_education/'.$data->Creator_id)}}">Deactive </a></li>
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_edicaton/delete/'.$data->Creator_id)}}">Delete</a></li>
                </ul>
              </div>
                </div>
              </div>
            </div>
            <!-- row end  -->
            </div>
            <hr>
            <div class="card-body">
            <form>
                <div class="row">
 
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname"> Organization Name   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->organization_name}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">  Position   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->curent_position }}" disabled/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">  Start at    <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->starting_date }}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">  Start at    <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->ending_date }}" disabled/>
                  </div>
                </div>
                <!-- end -->
                </div>
                <!-- row -->
              </form>
              <!-- card body end -->
            </div>
          </div>
        <!-- col end  -->
      </div>
    <!-- row end  -->
    </div>
  </div>
</section>
@endforeach
<!-- Basic   information  -->
@foreach($basicinfo as $data)
<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
          <div class="card mb-4 mt-4">
            <h1 class="" style="padding:10px 10px ">Basic Information  </h1>
            <div class="bt  d-inline pt-4 pb-2">
            <div class="row">
              <div class="col-lg-6">
              <div class="con" style="padding-left:50px ">
              @if($data->post_status == 2)
            <h5 class="text-danger ">User Post is not Published </h5>
              @elseif($data->post_status == 0)
              <h5 class="text-warning">Post Status is Pending  </h5>
              @elseif($data->post_status == 1)
              <h5 class="text-success fw-bold">Active post</h5>
              @endif
              </div>
                <!-- col end  -->
              </div>
              <div class="col-lg-6 text-end">
                <div class="con " style="padding-right:50px">
                <div class="dropdown">
                @if($data->post_status == 2)
                <button class="btn btn-danger">Unpublished</button>
                @elseif($data->post_status == 0)
                <button class="btn btn-warning">Pending</button>
                @elseif($data->post_status == 1)
                <button class="btn btn-success">Active post </button>
                @endif
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Status 
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_/post_active_education/'.$data->Creator_id)}}">Active </a></li>
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_/post_deactive_education/'.$data->Creator_id)}}">Deactive </a></li>
                  <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers_edicaton/delete/'.$data->Creator_id)}}">Delete</a></li>
                </ul>
              </div>
                </div>
              </div>
            </div>
            <!-- row end  -->
            </div>
            <hr>
            <div class="card-body">
            <form>
                <div class="row">
 
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Website  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->website}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Facbook  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->facebook}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Twitter  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->twitter}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Linkedin  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->linkedin}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Instagram  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->instagram}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-6">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Family Members  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->family_member}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Legal Guardian name 01  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->father_name}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">relationship with   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->father_ocupation}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Phone Number  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->father_phone}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Legal Guardian name 02  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->mother_name}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">relationship with   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->mother_ocupation}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Phone Number  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->mother_phone}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Birth Date <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->birth_date}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Birth Place <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->birth_place}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">relationship Status <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->relationship}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Blood Group <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->blood}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Language <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->language}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-4">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Hobbies <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->hobies}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-12">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Other Activitis <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <input type="text" class="form-control" id="basic-default-fullname"  value="{{$data->other_activitis}}" disabled/>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-12">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Present Address <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <textarea name="" class="form-control" value="{{$data->present_address}}" disabled>{{$data->present_address}}</textarea>
                  </div>
                </div>
                <!-- end -->
                <div class="col-md-12">
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Permanent Address <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                  <textarea name="" class="form-control" value="{{$data->permanet_address}}" disabled>{{$data->permanet_address}}</textarea>
                  </div>
                </div>
                <!-- end -->
                
               
            
                </div>
                <!-- row -->
              </form>
              <!-- card body end -->
            </div>
          </div>
        <!-- col end  -->
      </div>
    <!-- row end  -->
    </div>
  </div>
</section>
@endforeach





@endsection