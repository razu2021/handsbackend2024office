@extends('layouts.webmaster')
@section('web_content') 
<main>
@foreach($banner as $data)
<section>
    <div class="row" style="border-bottom:1px solid #000">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            <div class="banner4">
                <div class="banner4_content">
                    <h1> {{$data->banner_heading}} </h1>
                    <p> {{$data->banner_caption}}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            <div class="banner4">
                <div class="banner4_images">
                    <img src="{{asset('uploads/website/'.$data->banner_bg_image)}}" alt="{{$data->banner_title}}" class="img-fluid">
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
<!-- section end  -->
<section class="section-padding">
    <div class="container">
        <div class="case_heading pb-5">
            <h1> our <b> Approaches </b></h1>
            <span> <i class="fas fa-hand-holding-heart"></i> </span>
        </div>
        @foreach($post as $data)
        <div class="r_section">
        <div class="row mt-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="relif_section">
                    <div class="relif_image">
                        <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Human and Nature Development Society (HANDS) {{$data->title}} Image" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="relif_section">
                    <div class="relif_content">
                        <h3>{{$data->title}}</h3>
                        <p>{!! $data->caption !!}</p>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach 
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