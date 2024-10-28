@extends('layouts.webmaster')
@section('web_content')  
@foreach($banner as $data)
    <section class="microfinace_banner" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
        <div class="bannerbg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1 style="font-size: 5rem; color: #000;">{{$data->banner_heading}}</h1>
                            <h3>{{$data->banner_title}}</h3>
                            <p>{{$data->caption}}</p>
                            @if($data->banner_button1 != "")
                            <a href="{{$data->banner_button_url1}}">{{$data->banner_button1}} ||</a>
                            @endif
                            @if($data->banner_button2 !="")
                            <a href="javascript:void(0)" class="text-dark"> {{$data->banner_button2}}</a>
                            @endif
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
            <h1> our <b> All Projects  </b></h1>
            <span> <i class="fas fa-hand-holding-heart"></i> </span>
        </div>
        <div class="row">
            @foreach($allprojects as $data)
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                <div class="child_cause_area">
                    <div class="ch_image">
                        @if($data->service_image !="")
                        <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Program image of HANDS" class="img-fluid" data-src="{{asset('uploads/website/'.$data->service_image)}}">
                        @else
                        <img src="{{asset('contents/assets/website')}}/assets/img/programimage.png" alt="cause image" class="img-fluid">
                        @endif
                        <div class="ch_over_button">
                            <button><a href="{{route('make_donation')}}">Donate Now</a></button>
                        </div>
                    </div>
                    <div class="ch_cause_content">
                        <h2 class="text-muted">{{$data->pro_name}}</h2>
                        <p>{!! Str::words($data->pro_des,20) !!}</p>
                        <a class="pt-4" href="{{route('all_projects_details',$data->slug)}}"><span><i class="fa-solid fa-angles-right"></i>  </span>see more</a>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
    </div>
    </div>
</section>
@endsection