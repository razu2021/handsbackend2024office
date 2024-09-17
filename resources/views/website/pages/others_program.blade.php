@extends('layouts.webmaster')
@section('web_content')  
<main>
@foreach($bannerh as $data)
<section class="banner_slider" style="background-image:url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
@endforeach
    <div class="banner_slider3bg">
        <div class="owl-carousel owl-theme container_slider">
            @foreach($banner as $data)
            <div class="container slider_container_size container_slider_item">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="container_slider_content">
                            <div class="container_slider_text">
                                <h3> {{$data->banner_title}}</h3>
                                <h1>{{$data->banner_heading}}</span> </h1>
                                <p>{{banner_caption}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="container_slider_images">
                            <div class="container_slider_images">
                                <img src="{{asset('uploads/website/'.$data->banner_image)}}" alt="Human and Nature Development Society (HANDS) Website Banner image " class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="section-padding section_images" >
    <div class="container" >
        <div class="row">
        @foreach($post as $data)
        <div class="r_section">
        <div class="row mt-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="relif_section">
                    <div class="relif_image">
                        @if($data->service_image !="")
                        <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Human and Nature Development Society (HANDS) {{$data->title}} Image" class="img-fluid">
                        @else
                        <img src="{{asset('contents/assets/website')}}/assets/img/programimage.png" alt="Human and Nature Development Society (HANDS) {{$data->title}} Image" class="img-fluid" style="object-fit:cover">
                        @endif
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
    </div>
</section>
</main>
@endsection