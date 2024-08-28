@extends('layouts.webmaster')
@section('web_content') 
  <main>
  @foreach($banner as $data)
    <section class="legal_aid_banner" style="background-image:url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
        <div class="common_banner_bg">
            <div class="container section-padding">
                <div class="row justify-content-sm-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5">
                        <div class="common_banner_content">
                            <img src="{{asset('uploads/website/'.$data->banner_image)}}" alt="Human and Nature Development Society (HANDS) Banner Image for Legal Aid">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 ">
                        <div class="common_banner_contents">
                         <h1>{{$data->banner_title}}</h1>
                         <p>{{$data->banner_caption}}</p>
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
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-sm-4">
                    @foreach($allservice as $data)
                    <div class="service_card">
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
        <div class="bg_bottom"><img src="{{asset('contents/assets/website')}}/assets/img/vactor/shap1.png" alt=""></div>
    </section>
  </main>
@endsection