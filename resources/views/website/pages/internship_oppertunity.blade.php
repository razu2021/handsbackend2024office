@extends('layouts.webmaster')
@section('web_content')   
  <main>
  @foreach($banner as $data)
    <section class="microfinace_banner" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
        <div class="bannerbg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1 style="font-size: 5rem; color: red;">{{$data->banner_heading}}</h1>
                            @if($data->banner_button1 !="")
                            <a href="{{$data->banner_button_url1}}">{{$data->banner_button1}} ||</a>
                            @endif
                            @if($data->banner_button2 !="")
                            <a href="{{$data->banner_button_url2}}">{{$data->banner_button2}} </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
@foreach($desc as $data)
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                <div class="about_e_crisis">
                    <div class="crisis_content">
                        <p>{!! $data->caption !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
@foreach($slogan as $data)
<section class="make_D_image" style="background-image:url('{{asset('uploads/website/'.$data->service_image)}}')">
    <div class="make_donation_quickbg">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                    <div class="make_donation_quick">
                        <h1 class="pb-2">{{$data->heading}}</h1>
                        <h3 class="pb-2">{{$data->title}} </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 col-xxl-10 offset-lg-1">
                <div class="case_heading pb-5 pt-5">
                    <h1> Internship & <b> Course </b></h1>
                    <span> <i class="fas fa-hand-holding-heart"></i> </span>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 ">
                        <p>
                            @if(session('message'))
                            <div class="alert alert-success ">
                                {{ session('message') }}
                            </div>
                            @endif
                        </p>
                        @foreach($course as $data)
                        <div class="job_post mt-4">
                            <div class="job_post_image">
                                @if($data->service_image !="")
                                <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="job and Career opertunity image" class="img-fluid">
                                @else
                                <img src="{{asset('contents/assets/website')}}/assets/img/avatar.jpg" alt="logo" class="img-fluid" style="border-radius:.8rem">
                                @endif
                            </div>
                            <div class="job_post_title">
                                <h4> {{$data->course_title}} ||<span> 
                                @php
                                    $postedAt =  \Carbon\Carbon::parse($data->created_at); // The date and time the post was created
                                    $currentDateTime = new DateTime(); // Current date and time
                                    // Create DateTime objects for the post's creation time and the current time
                                    $postedTime = new DateTime($postedAt);
                                    // Calculate the time difference
                                    $timeDifference = $postedTime->diff($currentDateTime);
                                    // Display the posting time in a user-friendly format
                                    if ($timeDifference->y > 0) {
                                        echo $timeDifference->y . " year" . ($timeDifference->y > 1 ? "s" : "") . " ago";
                                    } elseif ($timeDifference->m > 0) {
                                        echo $timeDifference->m . " month" . ($timeDifference->m > 1 ? "s" : "") . " ago";
                                    } elseif ($timeDifference->d > 0) {
                                        echo $timeDifference->d . " day" . ($timeDifference->d > 1 ? "s" : "") . " ago";
                                    } elseif ($timeDifference->h > 0) {
                                        echo $timeDifference->h . " hour" . ($timeDifference->h > 1 ? "s" : "") . " ago";
                                    } elseif ($timeDifference->i > 0) {
                                        echo $timeDifference->i . " minute" . ($timeDifference->i > 1 ? "s" : "") . " ago";
                                    } else {
                                        echo "Just now";
                                    }
                                @endphp 
                                </span></h4>
                                <p>{{$data->course_location}}</p>
                                <br>
                                <a href="{{$data->app_instruction}}">{{$data->app_instruction}}</a>
                            </div>
                            <div class="job_post_view">
                                <p>{{$data->course_type}}</p>
                                <h5>{{$data->course_price}}<span> / per month </span></h5>
                                <a href="{{route('course',$data->slug)}}"> Details </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-3">
                        <div class="service_loan mb-4">
                            <div class="sidebar_list">
                                <h4>savings Services </h4>
                                    <img src="{{asset('contents/assets/website')}}/assets/img/training.png" alt="image" class="img-fluid" style="width: 100%; height: auto;">
                            </div>
                        </div>
                        <div class="service_loan mb-4">
                            <div class="sidebar_list">
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/umnwlwJMOtc?si=ZoHgYcEO77M6Tn2w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@foreach($bannerbt as $data)
<section>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 g-0">
            <div class="footer_banner">
                <div class="footer_banner_image">
                    <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Human and Nautre Development Society (HANDS) Banner Image" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 g-0">
            <div class="footer_banner">
                <div class="footer_banner_content">
                    <h1>{{$data->title}}</h1>
                    <p>{!!$data->caption !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
  </main>
@endsection

