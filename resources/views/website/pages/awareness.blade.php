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
                            <h1 style="font-size: 5rem; color: #000;">{{$data->banner_heading}}</h1>
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
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 mt-4 offset-lg-2">
                    @foreach($allservice as $data)
                    <div class="service_card">
                        <div class="services_images">
                            <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="{{$data->title}} Service images" width="100%" height="auto" >
                        </div>
                        <div class="service_content">
                           <div class="service_icon">
                                <span><i class="fa-solid fa-scale-balanced"></i></span>
                           </div>
                           <div class="services_contents">
                                <h3>{{$data->title}}</h3>
                                <p class="pb-4">{!! $data->caption !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
       
    </section>
  </main>
@endsection