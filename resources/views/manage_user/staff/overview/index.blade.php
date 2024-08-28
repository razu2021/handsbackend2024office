@extends('dashboard')
@section('content')

@if(count($profileinfo) !== 0)
<section style="background: #ffff;box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;">
@foreach($profileinfo as $data)
        <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner">
                        <div class="card">
                            <img src="{{asset('uploads/'.$data->ban_image)}}" class="card-img-top img-fluid" alt="Wild Landscape" style="max-height:300px"/>
                          </div>
                          <!-- banner end  -->
                          </div>
                        <!-- col end  -->
                    </div>
                    <div class="col-lg-2 d-flex justify-content-sm-center justify-content-lg-end">
                        <div class="profile ">
                            <img src="{{asset('uploads/'.$data->profile_image)}}" alt="" class="img-fluid ">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="profile_info">
                            <h1>{{$data->name}}</h1>
                            <p>{{$data->curent_position}} <span class="text-lowercase"> at</span> {{$data->organization_name}}</p>
                            <p>Success rate : 80% || Response rate: 100% </p>
                            <p><span class="text-warning"><i class="fas fa-solid fa-star"></i></span> <span class="text-warning"> <i class="fas fa-solid fa-star"></i></span>  <span class="text-warning"><i class="fas fa-solid fa-star"></i></span> <span class="text-warning"> <i class="fas fa-solid fa-star"></i></span> <span span class="text-warning"><i class="bi bi-star-half"></i></span> |<i> 4.5 out of 5</i></p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="additional_info">
                        <p class="text-dark "><a class="text-dark"  href="https://www.google.com/search?q={{$data->organization_name}}" target="_blank"> <span><i class="bi bi-browser-chrome"></i> </span> {{$data->organization_name}} </a></p>
                        @foreach($education1 as $data)
                        <p class="text-dark "><a class="text-dark" href="https://www.google.com/search?q={{$data->collage_name}}"  target="_blank"> <span><i class="bi bi-mortarboard-fill"></i> </span> {{$data->collage_name}} </a></p>
                        @endforeach
                        </div>
                    </div>
                <!-- row end  -->
                </div>
                <hr>
            </div>
           
        
        
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="menu ">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">Navbar</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                              <ul class="navbar-nav">
                                <li class="nav-item">
                                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">Features</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">Pricing</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                                </li>
                              </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="link_info">
                        <a href="#"><button class="btn btn-success">Update Profile</button></a>
                        <a href="#"><button class="btn btn-success">Status</button></a>
                    </div>
                </div>
                <!-- row end  -->
            </div>  
        </div>
        @endforeach
        <!--  -->
    </section>

  @else
    <section class="card">
    <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner">
                        <div class="card text-center">
                            <h1 style="padding:150px 0px ;background:#000;letter-spacing: 10px;">UPLOAD COVER PHOTO</h1>
                          </div>
                          <!-- banner end  -->
                          </div>
                        <!-- col end  -->
                    </div>
                    <div class="col-lg-2 d-flex justify-content-sm-center justify-content-lg-end">
                        <div class="profile ">
                            <img src="img" alt="" class="img-fluid " style="background: #050505">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="profile_info">
                            <h1>{{ Auth::user()->name }}</h1>
                            <p>XXXX-XXXXXXXX<span class="text-lowercase"> at</span> XXXX-XXXXXXXX</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="additional_info">
                        <p class="text-dark "><a class="text-dark"  href="#" target="_blank"> <span><i class="bi bi-browser-chrome"></i> </span> xxxx-xxxxxxx</a></p>
                        
                        <p class="text-dark "><a class="text-dark" href="#"  target="_blank"> <span><i class="bi bi-mortarboard-fill"></i> </span>xxxx-xxxxxxx </a></p>
                       
                        </div>
                    </div>
                <!-- row end  -->
                </div>
                <hr>
            </div>
    </section>
  @endif
<!-- banner end here  -->


@foreach($profileinfo as $data)
<section class="section-padding " id="about">
  <div class="container ">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
          <div class="about-profile pt-2 ">
            @if($data->profile_image !="")
            <img src="{{url('uploads/'.$data->profile_image)}}" alt="profile image" class="img-fluid w-100 rounded-2">
            @else
            <img src="" alt="profile image ">
            @endif
          </div>
      </div>
      <!-- col end  -->
      <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
          <div class="about-profile pt-4 pb-2 ">
            <h1 class="m-0">{{$data->name}}</h1>
            <p class="m-0"><i>{{$data->curent_position}}</i></p>
            <hr class="w-25">
            <p class="" style="text-align:justify">{{$data->about}}</p>
          </div>
      </div>
      <!-- col end  -->
    </div>
    <!-- row end  -->
  </div>
</section>
@endforeach

@if(count($education) !== 0)
<section id="Education">
<div class="container pt-5 pb-5 " id="education">
  <h1 class="text-capitalize fw-bold p-4 text-center "> Education </h1>
  <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12 card " style="padding:10px 50px">
          <div class="main-timeline4 pt-2 pb-2">
          @foreach($education as $data)
              <div class="timeline">
                  <a href="#" class="timeline-content">
                      <span class="year wow  animate__animated animate__zoomIn animate__delay-0.5s">{{$data->ending_date}}</span>
                      <div class="inner-content">
                          <h3 class="title wow animate__animated animate__fadeInRight animate__delay-0.5s">{{$data->degree_name}}</h3>
                          <p class="description">
                            <address class="wow animate__animated animate__fadeInRight animate__delay-0.5s">
                              <span class="text-dark"> {{$data->starting_date}} to  {{$data->ending_date}}</span><br>
                              <span>Session: {{$data->session_date}}</span><br>
                              <span>{{$data->subject_name}} </span><br>
                              <span>{{$data->collage_name}} </span>
                             </address>
                          </p>
                      </div>
                  </a>
              </div>
              @endforeach
          </div>
      </div>
  </div>
</div>
</section>
@endif

@if(count($workplace) !== 0)
<section id="experience" class="section-padding" >
<div class="container">
  <h1 class="text-uppercase fw-bold text-center">experience</h1>
  <div class="row">
      <div class="col-md-12 card">
          <div class="main-timeline2">
            @foreach($workplace as $data)
              <div class="timeline wow  animate__animated animate__bounceInLeft animate__delay-0.5s aanimate__slow	2s">
                  <span class="icon fa fa-globe"></span>
                  <a href="#" class="timeline-content">
                      <h3 class="title fw-bold  text-capitalize display-4" style="color:#f7f7f7">{{$data->organization_name}}</h3>
                      <p class="description">
                         <address>
                            <span><h6 class="" style="color:#f7f7f7">{{$data->curent_position}}</h6></span>
                            <span class="" style="color:#f7f7f7"> Start at : {{$data->starting_date}} to  {{$data->ending_date}} </span>
                         </address>
                      </p>
                  </a>
              </div>
            @endforeach
          </div>
      </div>
      <!-- col end  -->
  </div>
  <!-- row end  -->
</div>
</section>
@endif

@if(count($service) !== 0)
<section>
  <div class="container card section-padding">
    <div class="row">
    <h1 class="text-uppercase fw-bold text-center ">All Services </h1>
    @foreach($service as $data)
      <div class="col-lg-3">
      <div class="card h-auto">
        <img class="card-img-top" src="{{asset('uploads/'.$data->service_image)}}" alt="Card image cap" class="img-fluid">
        <div class="card-body">
          <h5 class="card-title">{{$data->service_title}}</h5>
          <h6>{{$data->service_subtitle}}</h6>
          <p class="card-text">{{$data->service_info}}</p>
        </div>
      </div>
      </div>
    @endforeach
      <!-- col end  -->
    </div>
  </div>
</section>

@endif



@if(count($portfolio) !== 0)
<section  class="section-padding">
  <div class="container card section-padding">
    <div class="row">
      <div class="portfolio_content text-center ">
        <h1 class="text-uppercase text-center fw-bold display-1 pt-5 pb-5" >Portfolio </h1>
      </div>
      <div class="col-lg-12">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Service 01</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Service 02</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Service 03</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" >Service 04</button>
        </li>
      </ul>
      <hr>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
          <div class="row">
            @foreach($portfolio as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xx-4 wow animate__animated animate__fadeInUp ">
              <div class="box17">
                <img class="pic-1" src="{{asset('uploads/'.$data->image1)}}">
                <ul class="icon">
                    <li><a href="{{asset('uploads/'.$data->image1)}}"><i class="fa fa-link"></i></a></li>
                </ul>
                <div class="box-content">
                    <h3 class="title"> </h3>
                    <span class="post">{{$data->name1}} </span>
                </div>
            </div>
            <!-- box end here  -->
            </div>
            <!-- col end here  -->
            @endforeach
          </div>
          <!-- row end  -->
        </div>
        <!-- end  -->
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <div class="row">
            @foreach($portfolio as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xx-4 wow animate__animated animate__fadeInUp ">
              <div class="box17">
                <img class="pic-1" src="{{asset('uploads/'.$data->image2)}}">
                <ul class="icon">
                    <li><a href="{{asset('uploads/'.$data->image2)}}"><i class="fa fa-link"></i></a></li>
                </ul>
                <div class="box-content">
                    <h3 class="title"> </h3>
                    <span class="post">{{$data->name2}} </span>
                </div>
            </div>
            <!-- box end here  -->
            </div>
            <!-- col end here  -->
            @endforeach
          </div>
          <!-- row end  -->
      </div>
      <!-- end  -->
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        <div class="row">
            @foreach($portfolio as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xx-4 wow animate__animated animate__fadeInUp ">
              <div class="box17">
                <img class="pic-1" src="{{asset('uploads/'.$data->image3)}}">
                <ul class="icon">
                    <li><a href="{{asset('uploads/'.$data->image3)}}"><i class="fa fa-link"></i></a></li>
                </ul>
                <div class="box-content">
                    <h3 class="title"> </h3>
                    <span class="post">{{$data->name3}} </span>
                </div>
            </div>
            <!-- box end here  -->
            </div>
            <!-- col end here  -->
            @endforeach
          </div>
          <!-- row end  -->
        </div>
        <!-- end  -->
        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
        <div class="row">
            @foreach($portfolio as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xx-4 wow animate__animated animate__fadeInUp ">
              <div class="box17">
                <img class="pic-1" src="{{asset('uploads/'.$data->image4)}}">
                <ul class="icon">
                    <li><a href="{{asset('uploads/'.$data->image4)}}"><i class="fa fa-link"></i></a></li>
                </ul>
                <div class="box-content">
                    <h3 class="title"> </h3>
                    <span class="post">{{$data->name4}} </span>
                </div>
            </div>
            <!-- box end here  -->
            </div>
            <!-- col end here  -->
            @endforeach
          </div>
          <!-- row end  -->
      </div>
      <!-- end  -->
      </div>


    </div>
  </div>
</section>
@endif





    @endsection
