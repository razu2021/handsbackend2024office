@extends('layouts.webmaster')
@section('web_content') 
@foreach($banner as $data)
<section class="team_banner" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}');">
    <div class="banner_3_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="banner_3">
                        <h1> {{$data->banner_heading}} </h1>
                        <a href="{{route('index')}}">Home /</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<section class="section-padding ">
    <div class="container">
        <div class="row">
            <h1 class="pb-2 pt-4 fw-bold">Microfinance Service</h1>
            @foreach($micro as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                <div class="wedo_service">
                    <div class="wedo_over_cont">
                        <h4><a href="{{$data->button_url}}">{{$data->heading}}</a></h4>
                        <p>{{$data->title}}</p>                            
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row section-padding">
            <h1 class="pb-2 pt-4 fw-bold">Fixed Deposit & Sevings Service</h1>
            @foreach($seving as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                <div class="wedo_service">
                    <div class="wedo_over_cont">
                        <h4><a href="{{$data->button_url}}">{{$data->heading}}</a></h4>
                        <p>{{$data->title}}</p>                            
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <h1 class="pb-2  pt-4 fw-bold">Legal Aid Service</h1>
            @foreach($legal as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                <div class="wedo_service">
                    <div class="wedo_over_cont">
                        <h4><a href="{{$data->button_url}}">{{$data->heading}}</a></h4>
                        <p>{{$data->title}}</p>                            
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row section-padding">
            <h1 class="pb-2  pt-4 fw-bold">Charitable Work & other Activities</h1>
            @foreach($lastproject as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                <div class="wedo_service">
                    <div class="wedo_over_cont">
                        <h4><a href="{{route('all_projects_details',$data->slug)}}">{{$data->pro_name}}</a></h4>
                        <p>{{$data->pro_title}}</p>                            
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@foreach($slogan as $data)
<section class="make_D_image" style="background-image:url('{{asset('uploads/website/'.$data->service_image)}}')">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                    <div class="make_donation_quick">
                        <h1 class="pb-2">{{$data->heading}}</h1>
                        <h3 class="pb-2">{{$data->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
     @foreach($desc as $data)
        <section class="section-padding" style="background-image: url('{{asset('contents/assets/website')}}/assets/img/background/vector-stroke.svg');background-repeat: no-repeat;background-position:left;background-size: 50rem;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10 offset-lg-1">
                        <div class="what_we_do" >
                            <div class="we_do_content">
                                <h3 id="banner_texts">{{$data->title}} </h3>
                                <p>{!! $data->caption !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
@endsection