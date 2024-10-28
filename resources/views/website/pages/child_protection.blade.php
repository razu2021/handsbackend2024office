@extends('layouts.webmaster')
@section('web_content')  
  <main>
    <section class="slider_section_bg mb-0" id="slider">
        <div class="sliderbg">
            <div class="owl-carousel owl-theme index_banner_slider">
                @foreach($banner as $data)
                <div class="slider_item">
                    <div class="slider_image">
                        <img src="{{asset('uploads/website/'.$data->banner_bg_image)}}" alt="child protection Banner Image" class="img-fluid">
                    </div>
                    <div class="slider_text container">
                        <h2>{{$data->banner_heading}}</h2>
                        <h1>{{$data->banner_title}} </h1>
                    </div>
                    <div class="overlay_index"></div>
                </div>
                @endforeach 
            </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                <div class="ch_about">
                    <div class="ch_about_content p-4">
                        @foreach($whydonateh as $data)
                        <h1>{{$data->heading}} <span>{{$data->subtitle}}</span></h1>
                        <p class="pb-5">{!! $data->caption !!}</p>
                        @endforeach
                        <div class="row ">
                            @foreach($whydonate as $data)
                            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                                <div class="ch_box_content">
                                    <h4> <span> <i class="far fa-heart"></i> </span> {{$data->title}} </h4>
                                    <p>{!! $data->des !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="ch_donate_form">
                        <div class="ch_form">
                            <h2 class="pb-2">make <span> Donation</span> now</h2>
                            <p class="pb-4"><span> Note : </span> please provide your information, we will contact you very soon </p>
                            @if(session('message'))
                                <div class="alert alert-success ">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <form action="{{route('donation_submit')}}" method="post">
                                    @csrf
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}"/>
                                 <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}"/>
                                 <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="phone" id="" class="form-control" placeholder="Phone" value="{{old('phone')}}"/>
                                 <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <textarea name="address" id="address" cols="6" style="width: 100%;padding: 1rem;" placeholder="Write your address" >{{old('address')}}</textarea>
                                 <span class="text-danger">@error('address'){{$message}} @enderror</span>
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <textarea name="subject" id="subject" cols="6" style="width: 100%;padding: 1rem;" placeholder=" Write your purpose" >{{old('subject')}}</textarea>
                                 <span class="text-danger">@error('subject'){{$message}} @enderror</span>
                                </div>
                                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Submit Now </button>
                                  </form>
                        </div>
                    </div>
                </div>
                <!-- col end  -->
            </div>
        </div>
    </section>
<!-- section end herre  -->
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
    <div class="col-12 col-sm-12 col-md-8 col-lg-10 col-xl-10 col-xxl-10 offset-lg-1">
        <div class="case_heading">
            <h1> our <b> Causes </b></h1>
            <span> <i class="fas fa-hand-holding-heart"></i> </span>
        </div>
        <div class="row">
            @foreach($post as $data)
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                <div class="child_cause_area">
                    <div class="ch_image">
                        @if($data->service_image !="")
                        <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="cause image" class="img-fluid">
                        @else
                        <img src="{{asset('contents/assets/website')}}/assets/img/child2.jpg" alt="cause image" class="img-fluid">
                        @endif
                        <div class="ch_over_button">
                            <button><a href="{{route('make_donation')}}">Donate Now</a></button>
                        </div>
                    </div>
                    <div class="ch_cause_content">
                        <h2 class="text-muted">{{$data->heading}}</h2>
                        <p>{!! Str::words($data->caption,20) !!}</p>
                        <a class="pt-4" href="{{route('post_details',$data->slug)}}"><span><i class="fa-solid fa-angles-right"></i>  </span>see more</a>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
    </div>
    </div>
</section>
<section class="make_D_image2">
    <div class="make_donation_quickbg">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="ch_dontate_count text-center">
                                <span><i class="fa-solid fa-heart-circle-plus"></i></span>
                                <h1> {{$totaldonner}} + </h1>
                                <p> Happy Donators </p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="ch_dontate_count text-center">
                                <span><i class="fa-regular fa-circle-check"></i></span>
                                <h1> {{$totalprojects}} +</h1>
                                <p> Successfull Projects</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="ch_dontate_count text-center">
                                <span><i class="fa-solid fa-users"></i></span>
                                <h1> {{$people}} +</h1>
                                <p> Happy People</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="ch_dontate_count">
                                <span><i class="fa-solid fa-hand-holding-dollar"></i></span>
                                <h1> {{$cost}} +</h1>
                                <p> Projects Cost</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 ">
                <div class="case_heading pb-4 text-start">
                    <h1> our <b> Last Four Projects </b></h1>
                    <span> <i class="fas fa-hand-holding-heart"></i></span>
                </div>
                <div class="row">
                    @foreach($lastproject as $data)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                        <div class="ch_mission">
                            <div class="mission_icon">
                                <span> <i class="fas fa-hand-holding-heart"></i></span>
                            </div>
                            <div class="mission_content">
                                <h4 class="text-muted">{{$data->pro_name}}</h4>
                                <p class="text-muted">{!! Str::words($data->pro_des,15) !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 ch_event_area">
                <div class="case_heading">
                    <h1> Upcoming  <b> Projects </b></h1>
                </div>
                @foreach($upcoming as $data)
                <div class="ch_upcoming_events mt-4">
                    <div class="ch_event_date">
                        <h3>{{ \Carbon\Carbon::parse($data->pro_start)->format('Y') }}
                        </h3>
                        <p>{{ \Carbon\Carbon::parse($data->pro_start)->format('m-d') }}</p>
                    </div>
                    <div class="ch_event_location">
                        <h6> {{$data->pro_name}}</h6>
                        <p> <a href="{{route('all_projects')}}"> <span> <i class="far fa-clock"></i> </span> Details </a> <a href="{{route('all_projects')}}"><span> <i class="fas fa-search-location"></i> </span> Location</a></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
  </main>
@endsection

