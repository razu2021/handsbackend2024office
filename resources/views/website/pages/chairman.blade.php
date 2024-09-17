@extends('layouts.webmaster')
@section('web_content')   
  <main>
    <section class="team_banner">
        <div class="banner_3_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1>Chairman  </h1>
                            <a href="index.html">Home /</a>
                            <a href="our_team.html" class="text-danger"> Our Chairman </a>
                        </div>
                    </div>
                    <!-- col end  -->
                </div>
            </div>
        </div>
    </section>
    <!-- banner end  -->

@foreach($chairman as $data)
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="blog_profile">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="blog_profile_image">
                                @if($data->service_image != "")
                                <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="{{$data->name}} {{$data->designation}} of Human and Nature Development Sociery (HANDS) " class="img-fluid" />
                                <div class="p_info">
                                    <div class="pcontact">
                                        <ul>
                                            <li><a href=""><span><i class="fas fa-envelope"></i></span> mdrazuhossairan@gmail.com</a></li>
                                            <li><a href=""><span><i class="fas fa-phone-square-alt"></i></span> +8801817078309</a></li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="peducation">
                                        <h3>Education </h3>
                                       <div class="pedu">
                                            <p>2020-2024</p>
                                            <h3>Dhaka University </h3>
                                            <h6>Immigration Law</h6>
                                       </div>
                                       <div class="pedu">
                                            <p>2020-2024</p>
                                            <h3>Dhaka University </h3>
                                            <h6>Immigration Law</h6>
                                       </div>
                                       <div class="pedu">
                                            <p>2020-2024</p>
                                            <h3>Dhaka University </h3>
                                            <h6>Immigration Law</h6>
                                       </div>
                                       <div class="pedu">
                                            <p>2020-2024</p>
                                            <h3>Dhaka University </h3>
                                            <h6>Immigration Law</h6>
                                       </div>
                                       <div class="pedu">
                                            <p>2020-2024</p>
                                            <h3>Dhaka University </h3>
                                            <h6>Immigration Law</h6>
                                       </div>
                                    </div>
                                    <!-- education end here  -->
                                     <hr>
                                    <div class="peducation">
                                       <div class="pedu">
                                            <p>2020-2024</p>
                                            <h3>Dhaka University </h3>
                                            <h6>Immigration Law</h6>
                                       </div>
                                       <div class="pedu">
                                            <p>2020-2024</p>
                                            <h3>Dhaka University </h3>
                                            <h6>Immigration Law</h6>
                                       </div>
                                       <div class="pedu">
                                            <p>2020-2024</p>
                                            <h3>Dhaka University </h3>
                                            <h6>Immigration Law</h6>
                                       </div>
                                       <div class="pedu">
                                            <p>2020-2024</p>
                                            <h3>Dhaka University </h3>
                                            <h6>Immigration Law</h6>
                                       </div>
                                       <div class="pedu">
                                            <p>2020-2024</p>
                                            <h3>Dhaka University </h3>
                                            <h6>Immigration Law</h6>
                                       </div>
                                    </div>
                                    <!-- education end here  -->

                                </div>
                                @else
                                <img src="{{asset('contents/assets/website')}}/assets/img/avatar.png" alt="profile image" class="img-fluid">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="profilesinfo">
                            <h2>{{$data->name}}</h2>
                            <p>{{$data->designation}}<span> Of HAMDS </span></p>
                            <hr>
                            <p>{!! $data->caption !!}</p>
                            </div>
                        </div>
                    </div>
                    <!-- row end  -->
                </div>
            </div>
            <!-- col end here -->
        </div>
    </div>
</section>
@endforeach

    <!-- ========  main content end herre  -->
  </main>


@endsection