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
<section class="section_position section-padding">
<div class="bg_top"><img src="{{asset('contents/assets/website')}}/assets/img/vactor/shap1.png" alt=""></div>
<div class="container">
    <div class="row">
        @foreach($allstrategy as $data)
        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-sm-4">
            <div class="service_card">
                <div class="service_content">
                    <div class="service_icon">
                        <span><i class="fa-solid fa-scale-balanced"></i></span>
                    </div>
                    <div class="services_contents">
                        <h5>{{$data->title}}</h5>
                        <p class="pb-4">{!!  Str::words($data->caption,15) !!}</p>
                        <a class="mt-2" href="{{route('strategy_details',$data->slug)}}"><span> <i class="fa-solid fa-arrow-right"></i> </span>Read More </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-sm-4">
    <div class="custom_pagination">
            <div class="row">{{ $allstrategy->links() }}</div>
        </div>
    </div>
</div>
<div class="bg_bottom"><img src="{{asset('contents/assets/website')}}/assets/img/vactor/shap1.png" alt=""></div>
</section>
@endsection