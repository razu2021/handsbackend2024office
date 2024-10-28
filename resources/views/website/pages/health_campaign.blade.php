@extends('layouts.webmaster')
@section('web_content')   
  <main>
<section>
    <div class="health_banner">
    <div class="owl-carousel owl-thame index_banner_sliders">
    @foreach($banner as $data)
        <div class="index_banner" style="background-image:url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
            <div class="index_banner_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                    <!-- index slider  -->
                    <div class="index_slider">
                        <div class="index_slider_items">
                            <div class="index_slider_content">
                                <p>{{$data->banner_title}}</p>
                                <h1>{{$data->banner_heading}}</h1>
                                <p><span>{{$data->banner_caption}}</span></p>
                                <div class="button3">
                                    @if($data-> banner_button1 !="")
                                    <button> <a href="{{$data->banner_button_url1}}">{{$data->banner_button1}}</a></button>
                                    @endif
                                    @if($data-> banner_button2 !="")
                                    <button> <a href="{{$data->banner_button_url2}}">{{$banners->banner_button2}}</a></button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- index slider  -->
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="index_slider">
                            <div class="index_slider_items ">
                                <div class="index_slider_img ">
                                    @if($data->banner_image !="")
                                    <img src="{{asset('uploads/website/'.$data->banner_image)}}" alt="banner image" class="img-fluid ">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- slider end -->
                    </div>
                    <!-- cole end  -->
                </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <!-- banner slidter end here  -->
    </div>
</section>
<!-- banner 3 end herer  -->
 @foreach($about as $data)   
<section class="about_heath_sec section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 col-xxl-10 offset-lg-1">
                <div class="health_content pt-4 ">
                    <h1> {{$data->heading}} <span> {{$data->title}}</span> {{$data->subtitle}}</h1>
                   <p class="pt-2">{!! $data->caption !!}</p>
                </div>
            <!-- col end  -->
        </div>
    </div>
</section>
@endforeach


<!-- section end here -->
<section class="section-padding doctorebgimage ">
    <div class="doctor_bannerbg">
        <div class="container">
            <div class="row">
                <div class="cam_heading">
                    <h1 class="pt-4 pb-4 mx-2 "> Meet our <span> Doctor's </span> </h1>
                </div>
                @foreach($doctor as $data)
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                    <div class="card3">
                        <div class="card3_profile">
                            <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="doctor image" class="img-fluid">
                        </div>
                        <div class="card3_social">
                            <ul>
                                <li><a href="#" > <i class="fa-brands fa-square-whatsapp"></i></a></li>
                                <li><a href="#" > <i class="fa-brands fa-facebook"></i></a></li>
                                <li><a href="#" > <i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#" > <i class="fa-brands fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="card3_info">
                            <h1>{{$data->name}}</h1>
                            <b>{{$data->designation}}</b>
                            <p>{!! $data->caption !!}</p>
                            <br>
                            <ul class="pt-4">
                                <li><span> <i class="fa-solid fa-phone"></i> </span><a href="#">{{$data->phone}}</a></li>
                                <li><span><i class="fa-regular fa-envelope"></i></span><a href="#">{{$data->email}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>  
                @endforeach
            </div>
        </div>
    </div>
</section>


<!-- doctor's list end  -->
<section class="section-padding ">
    <div class="">
        <div class="container" id="achivments">
            <div class="row ">
                <div class="col-lg-8 offset-lg-2 achivbgimage">
                    <div class="row acigvbg">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="our_achivement">
                                <span> <i class="fa-solid fa-people-roof"></i> </span>
                                <h1> {{$allprojects}} </h1>
                                <h3> Total Campaign</h3>
                            </div>
                        </div>
                        <!-- col end  -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="our_achivement">
                                <span> <i class="fa-solid fa-people-roof"></i> </span>
                                <h1> {{$upcoming}} </h1>
                                <h3> Upcoming Campaign</h3>
                            </div>
                        </div>
                        <!-- col end  -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="our_achivement">
                                <span> <i class="fa-solid fa-people-roof"></i> </span>
                                <h1> {{$people}} + </h1>
                                <h3> Total Patient</h3>
                            </div>
                        </div>
                        <!-- col end  -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="our_achivement">
                                <span> <i class="fa-solid fa-people-roof"></i> </span>
                                <h1> {{$doctorcount}}</h1>
                                <h3> Total Doctor's  </h3>
                            </div>
                        </div>
                        <!-- col end  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end  -->

@foreach($desc as $data)
<section class="upcoming_cam_image">
    <div class="upcoming_bg">
        <div class="container section-padding" id="upcoming_campaign">
            <div class="row">
                <div class="cam_heading">
                    <h1 class="pt-4 pb-4 mx-4 "> Our  Campaign <span> Date </span> & Location </h1>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                    <div class="date_location">
                        <div class="date mt-4">
                             <h1 id="countdown"> </h1>
                             <h4> {{$data->title}}</h4>
                             <p class="pt-2">Upcoming Capmaign </p>
                        </div>
                        <div class="location mt-4">
                            <h1><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d69286.92281659931!2d90.0588514489569!3d24.120994568920114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755fd002ad4cc97%3A0xd43910b8d07b6698!2sHuman%20and%20Nature%20Development%20Society%20(HANDS)!5e0!3m2!1sen!2sbd!4v1715764909604!5m2!1sen!2sbd" width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> </h1>
                        </div>
                    </div>
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                    <div class="upcoming_campain">
                        <p>{!! $data->caption !!}</p>
                    </div>
                </div>
                <!-- col end  -->
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- section end  -->


    <!-- ========  main content end herre  -->
  </main>
@endsection