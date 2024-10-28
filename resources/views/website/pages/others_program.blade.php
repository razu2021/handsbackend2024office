@extends('layouts.webmaster')
@section('web_content')  
<main>
<section>
    <div class="other_slider">
    <div class="owl-carousel owl-theme container_slider">
    @foreach($banner as $data)
        <div class="other_slider_items other_slider" style="background-image:url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
        <section class="section-padding bannerbg">
            <div class="container other_slider_area">
                <div class="row" style="border-bottom:1px solid #000">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7">
                        <div class="banner4">
                            <div class="banner4_content ">
                                <h3>{{$data->banner_title}}</h3>
                                <h1> {{$data->banner_heading}} </h1>
                                <p> {{$data->banner_caption}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5">
                        <div class="banner4">
                            <div class="banner4_images">
                                <img src="{{asset('uploads/website/'.$data->banner_image)}}" alt="{{$data->banner_title}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
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
                    <div class="relif_content wow animate_animated animate__fadeInRight">
                        <h3>{{$data->heading}}</h3>
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