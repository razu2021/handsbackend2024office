@extends('layouts.webmaster')
@section('web_content') 
@foreach($banner as $data)
<section class="section-padding" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}');background-repeat: no-repeat;background-position: center;background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-2 " id="banner_texts" > {{$data->banner_heading}}</h1>
            </div>
        </div>
    </div>
</section>
@endforeach
@foreach($about as $data)
<section class="section-padding">
<div class="container about_section">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
            <div class="about_us_content">
                <h1> About <span>{{$data->subtitle}}</span></h1>
                <p>{!! $data->caption !!}</p>
            </div>
        </div>
    </div>
</div>
</section>
@endforeach
@endsection