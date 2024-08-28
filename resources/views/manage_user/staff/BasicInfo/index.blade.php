@extends('dashboard')
@section('content')
@if(count($all) !== 0)
@if(count($profileinfo) !==0)
<section class="card mt-2">
<div class="container mt-4 mb-10">
                <div class="row">
                  @foreach($profileinfo as $data)
                    <div class="col-lg-12">
                        <div class="content cover mb-10">
                        <div class="card text-bg-dark your_content" >
                           @if($data->ban_image !="")
                              <img class="img-fluid" src="{{asset('uploads/'.$data->ban_image)}}" class="card-img" alt="cover photo" style="max-height:300px">
                           @else
                              <div clss="content cover text-center " style="padding:100px;"><h1 class="text-white text-center">UPLOAD PROFILE</h1></div>
                           @endif
                              <div class="card-img-overlay">
                              </div>
                              <div class="profile_image mb-10">
                              @if($data->profile_image !="")
                                <img src="{{asset('uploads/'.$data->profile_image)}}"  class="img-fluid">
                              @endif
                              </div>
                            </div>
                            
                            <div class="contetns">
                                  <h1 class="pb-1">{{$data->name}}</h1>
                                  <h5>{{$data->curent_position}} <strong>at </strong> <i>{{$data->organization_name}}</i> </h5>
                                    <div class="row">
                                      <div class="col-lg-6"><p>Success rate : 80% || Response rate: 100% </p><br><p><span class="text-warning"><i class="fas fa-solid fa-star"></i></span> <span class="text-warning"> <i class="fas fa-solid fa-star"></i></span>  <span class="text-warning"><i class="fas fa-solid fa-star"></i></span> <span class="text-warning"> <i class="fas fa-solid fa-star"></i></span> <span span class="text-warning"><i class="bi bi-star-half"></i></span> |<i> 4.5 out of 5</i></p></div>
                            
                                      <div class="col-lg-6 text-end">
                                        <div class="r-cont px-5">
                                        
                                        <div class="dropdown">
                                        @foreach($all as $data)
                                        @if($data->post_status == 2)
                                          <a class="btn btn-danger dropdown-toggle text-white"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Status Unpublished</a>
                                        @elseif($data->post_status == 0)
                                          <a class="btn btn-warning text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Status Pending</a>
                                        @elseif($data->post_status == 1)
                                        <a class="btn btn-success text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Status Active </a>
                                        @endif
                                          @endforeach
                                          <ul class="dropdown-menu">
                                          @foreach($all as $data)
                                          @if($data->post_status == 2)
                                          <li class=""><a class="dropdown-item text-danger" href="{{url('dashboard/user/BasicInfo/post_active/'.$data->Creator_id)}}">Request for Published</a></li>
                                          @elseif($data->post_status == 0)
                                          <li clas=""><a class="dropdown-item text-warning disabled" href="#">Request Pending </a></li>
                                          @elseif($data->post_status == 1)
                                          <li class=""><a class="dropdown-item text-dark" href="{{url('dashboard/user/BasicInfo/post_deactive/'.$data->Creator_id)}}">Post Deactive </a></li>
                                          @endif
                                          <li class=""><a class="dropdown-item text-dark" href="{{url('dashboard/user/BasicInfo/softdelete/'.$data->Creator_id)}}">Delete</a></li>

                                          @endforeach
                                          </ul>
                                        </div>
                                       
                                        </div>
                                      </div>
                                    </div>
                                  
                                  <hr> 
                            </div>
                             <!-- card end  -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
@else
<section class="card mt-2">
<div class="container mt-4 mb-10">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content cover mb-10">
                        <div class="card text-bg-dark your_content" style="height:300px;">
                              <img class="img-fluid" src="" class="card-img"  >
                              <div class="card-img-overlay"> </div>
                              <div class="profile_image bg-dark mb-10">
                                <img src=""  class="img-fluid">
                             </div>
                            </div>  
                            <div class="contetns">
                                  <h1 class="pb-1">{{ Auth::user()->name }}</h1>                         
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <p>
                                        @if(count($all) === 0)
                                          <form method="post" action="{{url('dashboard/user/BasicInfo/submit')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                            <!-- aphone end -->
                                            <div class="col-md-12 mt-2">
                                              <div class="mb-3">
                                              <div class="input-group">
                                              <input type="text" name="user_name" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"/>
                                              <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                                              <span class="text-danger">@error('user_name'){{$message}} @enderror</span>
                                            </div>
                                            <!-- aphone end -->
                                            </div>
                                            <!-- row -->
                                          </form>
                                          @else
                                          <p class="pt-2">
                                            @foreach($all as $data)
                                            {{$data->user_name}}</p>
                                            @endforeach
                                          @endif
                                        </p>
                                        <p class="text-danger">Profile Information is Empty: Please Update Your Profile <a href="{{url('/dashboard/user/profile')}}">Information</a>
                                
                                        </p>
                                      </div>
                                      <div class="col-lg-6 text-end">
                                        <div class="r-cont px-5">
                                        @foreach($all as $alldata)
                                        <p class="text-dark"><button class="btn btn-primary"><a class="text-white" href="{{url('dashboard/user/BasicInfo/edit/'.$alldata->slug)}}"> <span><i class="bi bi-pencil-square"></i> </span>Update Information </a></button></p>
                                        @endforeach
                                      </div>
                                      </div>
                                    </div>
                                  <hr>
                            </div>
                             <!-- card end  -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
 @endif

 @else
 <section class="card mt-2">
<div class="container mt-4 mb-10">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content cover mb-10">
                        <div class="card text-bg-dark your_content" style="height:300px;">
                              <img class="img-fluid" src="" class="card-img"  >
                              <div class="card-img-overlay"> </div>
                              <div class="profile_image bg-dark mb-10">
                                <img src=""  class="img-fluid">
                             </div>
                            </div>  
                            <div class="contetn">                      
                                    <div class="row">
                                      <div class="col-lg-8 offset-lg-2 col-sm-12 col-md-8 offset-md-2 col-12 xl-8 offset-xl-2 col-xxl-8 offset-xxl-2">
                                        <div class="conts">                                          
                                          <h1 class=" pt-1">{{ Auth::user()->name }}</h1> 
                                            <p>
                                            @if(count($all) === 0)
                                              <form method="post" action="{{url('dashboard/user/BasicInfo/submit')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                <!-- aphone end -->
                                                <div class="col-md-12 col-lg-6 mt-2">
                                                  <div class="mb-3">
                                                  <div class="input-group">
                                                  <input type="text" name="user_name" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"/>
                                                  <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                                                  <span class="text-danger">@error('user_name'){{$message}} @enderror</span>
                                                </div>
                                                <!-- aphone end -->
                                                </div>
                                                <!-- row -->
                                              </form>
                                              @else
                                              <p class="pt-2">
                                                @foreach($all as $data)
                                                {{$data->user_name}}</p>
                                                @endforeach
                                              @endif
                                            </p>
                                            <p class="text-danger">Profile Information already Exists! Do you want to update your basic information? Please create your user name first! <a href="{{url('/dashboard/user/profile')}}">Information</a>
                                        </div>
                                        <!--  -->
                                      </div>
                                      <div class="col-lg-6 text-end">
                                        <div class="r-cont px-5">
                                        @foreach($all as $alldata)
                                        <p class="text-dark"><button class="btn btn-primary"><a class="text-white" href="{{url('dashboard/user/BasicInfo/edit/'.$alldata->slug)}}"> <span><i class="bi bi-pencil-square"></i> </span>Update Information </a></button></p>
                                        @endforeach
                                      </div>
                                      </div>
                                    </div>
                                  <hr>
                            </div>
                             <!-- card end  -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
 @endif


@foreach($all as $data)
  <section class="section-padding">

    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 ">
        @if ($data['website']!="" && $data['facebook']!== "" && $data['twitter']!=="" && $data['linkedin']!== "" && $data['instagram']!=="" ) 
            <div class="edi card">
                <div class="card-body">
                    <table class="table">
                        <tbody>
                        @if($data->website!="")
                            <tr >
                              <td style="border-bottom:none">
                                <h5>Website : </h5>
                                <span style="font-size:18px ;padding-right:5px "><i class="bi bi-browser-chrome"></i></span> <strong><a class="text-dark"  href="{{$data->website}}">{{$data->website}}</a></strong>
                                <p class="text-dark"  style="margin-left:25px "><i>website</i></p>
                              </td>
                              <td  style="border-bottom:none">
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/website_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endif
                          @if($data->facebook!="")
                            <tr class="">
                              <td style="border-bottom:none">
                                <h5>Facebook : </h5>
                                <span style="font-size:18px ;padding-right:5px "><i class="bi bi-facebook"></i></span> <strong><a class="text-dark" href="{{$data->facebook}}">{{$data->facebook}}</a></strong>
                                <p style="margin-left:25px "><i>facebook</i></p>
                              </td>
                              <td style="border-bottom:none">
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/facebook_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endif
                          @if($data->twitter!="")
                            <tr class="">
                              <td style="border-bottom:none">
                                <h5>Twitter : </h5>
                                <span style="font-size:18px ;padding-right:5px "><i class="bi bi-twitter"></i></span> <strong><a class="text-dark" href="{{$data->twitter}}">{{$data->twitter}}</a></strong>
                                <p style="margin-left:25px "><i>Twitter</i></p>
                              </td>
                              <td style="border-bottom:none">
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/twitter_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endif
                          @if($data->linkedin!="")
                            <tr class="">
                              <td style="border-bottom:none">
                                <h5>Linkedin : </h5>
                                <span style="font-size:18px ;padding-right:5px "><i class="bi bi-linkedin"></i></span> <strong><a class="text-dark" href="{{$data->linkedin}}">{{$data->linkedin}}</a></strong>
                                <p style="margin-left:25px "><i>Linkedin</i></p>
                              </td>
                              <td style="border-bottom:none">
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/linkedin_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endif
                          @if($data->instagram!="")
                            <tr class="">
                              <td style="border-bottom:none">
                                <h5>Instagram : </h5>
                                <span style="font-size:18px ;padding-right:5px "><i class="bi bi-instagram"></i></span> <strong><a class="text-dark" href="{{$data->instagram}}">{{$data->instagram}}</a></strong>
                                <p style="margin-left:25px "><i>Instagram</i></p>
                              </td>
                              <td style="border-bottom:none">
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/instagram_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="card">
                <div class="card-body">
                  <h4>Web & Social Midea  </h4>
                  <hr>
                  <h5><i>Data is not availbale</i></h5>
                </div>
              </div>
            @endif
        </div>
      </div>
    </div>
  </section>
  <section class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
        @if($data['relationship']!="" && $data['family_member']!=="" && $data['father_name']!=="" && $data['mother_name']!=="") 
        <div class="edit card">
          <div class="card-body">
              <table class="table">
                <tbody>
                    @if($data->relationship!="")
                    <tr class="">
                      <td style="border-bottom:none" class="pb-4">
                        <h5>Relationship Status : </h5>
                        <span style="font-size:18px ;padding-right:5px "><i class="bi bi-heart-fill"></i> </span> <strong>{{$data->relationship}}</strong>
                      </td>
                      <td style="border-bottom:none">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/relationship_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endif
                  @if($data->family_member!="")
                    <tr class="">
                      <td style="border-bottom:none" class="pb-4">
                        <h5>family Memebers : </h5>
                        <span style="font-size:18px ;padding-right:5px "><i class="bi bi-person-hearts"></i> </span> <strong>{{$data->family_member}} person</strong>
                      </td>
                      <td style="border-bottom:none">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/family_member_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endif
                  @if($data->father_name!="")
                    <tr class="">
                      <td style="border-bottom:none" class="pb-4">
                        <h5>Legal Guardian 01 : </h5>
                        <span style="font-size:18px ;padding-right:5px "><i class="bi bi-people-fill"></i> </span> <strong>{{$data->father_name}} </strong><br>
                        <span style="font-size:18px ;padding-right:5px "><i class="bi bi-hearts"></i></span> <strong>{{$data->father_ocupation}} </strong><br>
                        <span style="font-size:18px ;padding-right:5px "><i class="bi bi-telephone"></i> </span> <strong>{{$data->father_phone}} </strong>
                      </td>
                      <td style="border-bottom:none">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/fatherinfo_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endif
                  @if($data->mother_name!="")
                    <tr class="">
                      <td style="border-bottom:none" class="pb-4">
                        <h5>Legal Guardian 02 : </h5>
                        <span style="font-size:18px ;padding-right:5px "><i class="bi bi-people-fill"></i> </span> <strong>{{$data->mother_name}} </strong><br>
                        <span style="font-size:18px ;padding-right:5px "><i class="bi bi-hearts"></i></span> <strong>{{$data->mother_ocupation}} </strong><br>
                        <span style="font-size:18px ;padding-right:5px "><i class="bi bi-telephone"></i> </span> <strong>{{$data->mother_phone}} </strong>
                      </td>
                      <td style="border-bottom:none">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/motherinfo_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endif
                </tbody>
              </table>
          </div>
        </div>
      @else
        <div class="card">
          <div class="card-body">
            <h4>Family & Relationship </h4>
            <hr>
            <h5><i>Data is not availbale</i></h5>
          </div>
        </div>
      @endif
        </div>
      </div>
    </div>
  </section>
<!-- -------------------------------------------- -->
  <section class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
        @if ($data['birth_date']!="" && $data['birth_place']!== "" && $data['blood']!=="" && $data['language']!== "" && $data['hobies']!=="" && $data['present_address']!=="" && $data['permanet_address']!=="" && $data['other_activitis']!=="")
          <div class="content card">
              <div class="card-body">
              <table class="table">
              <tbody>
              @if($data->birth_date!="")
                <tr class="">
                  <td style="border-bottom:none" class="pb-4">
                    <h5>Birth Date : </h5>
                    <span style="font-size:18px ;padding-right:5px "><i class="bi bi-people-fill"></i> </span> <strong>{{$data->birth_date}} </strong><br>
                  </td>
                  <td style="border-bottom:none">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/birthdate_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endif

              @if($data->birth_place!="")
                <tr class="">
                  <td style="border-bottom:none" class="pb-4">
                    <h5>Birth Place : </h5>
                    <span style="font-size:18px ;padding-right:5px "><i class="bi bi-people-fill"></i> </span> <strong>{{$data->birth_place}} </strong><br>
                  </td>
                  <td style="border-bottom:none">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/birthplace_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endif
              @if($data->blood!="")
                <tr class="">
                  <td style="border-bottom:none" class="pb-4">
                    <h5>Blood Group : </h5>
                    <span style="font-size:18px ;padding-right:5px "><i class="bi bi-people-fill"></i> </span> <strong>{{$data->blood}} </strong><br>
                  </td>
                  <td style="border-bottom:none">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/blood_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endif
              @if($data->language!="")
                <tr class="">
                  <td style="border-bottom:none" class="pb-4">
                    <h5>Language : </h5>
                    <span style="font-size:18px ;padding-right:5px "><i class="bi bi-people-fill"></i> </span> <strong>{{$data->language}} </strong><br>
                  </td>
                  <td style="border-bottom:none">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/language_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endif
              @if($data->hobies!="")
                <tr class="">
                  <td style="border-bottom:none" class="pb-4">
                    <h5>Hobbis  : </h5>
                    <span style="font-size:18px ;padding-right:5px "><i class="bi bi-people-fill"></i> </span> <strong>{{$data->hobies}} </strong><br>
                  </td>
                  <td style="border-bottom:none">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/hobies_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endif
              @if($data->present_address!="")
                <tr class="">
                  <td style="border-bottom:none" class="pb-4">
                    <h5>Present Address  : </h5>
                    <span style="font-size:18px ;padding-right:5px "><i class="bi bi-people-fill"></i> </span> <strong>{{$data->present_address}} </strong><br>
                  </td>
                  <td style="border-bottom:none">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/presentaddress_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endif
              @if($data->permanet_address!="")
                <tr class="">
                  <td style="border-bottom:none" class="pb-4">
                    <h5>Permanent Address  : </h5>
                    <span style="font-size:18px ;padding-right:5px "><i class="bi bi-people-fill"></i> </span> <strong>{{$data->permanet_address}} </strong><br>
                  </td>
                  <td style="border-bottom:none">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/permanentaddress_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endif
              @if($data->other_activitis!="")
                <tr class="">
                  <td style="border-bottom:none" class="pb-4">
                    <h5>Other activitis : </h5>
                    <span style="font-size:18px ;padding-right:5px "><i class="bi bi-people-fill"></i> </span> <strong>{{$data->other_activitis}} </strong><br>
                  </td>
                  <td style="border-bottom:none">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle " data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/edit/'.$data->slug)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/otheractivitis_delete/'.$data->Creator_id)}}" ><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endif

              </tbody>
            </table>
              </div>
          </div>
          @else
          <div class="card">
          <div class="card-body">
            <h4>Place in live & other activitis </h4>
            <hr>
            <h5><i>Data is not availbale</i></h5>
          </div>
        </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endforeach
@endsection