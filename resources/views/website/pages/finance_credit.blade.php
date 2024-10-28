@extends('layouts.webmaster')
@section('web_content')   
<main>
@foreach($banner as $data)
<section class="" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}');background-repeat: no-repeat;background-position: center;background-size: cover;">
<div class="comonbannerbg">
<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-2 " id="banner_texts" > {{$data->banner_heading}}</h1>
            </div>
        </div>
    </div>
    </div>
</section>
@endforeach
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2 text-center pb-4">
                    <h2 class="pb-2 ">Finance and Credit Team </h2>
                    <p>We have expert and experienced Team. In addition to their academic skills, each Team has experience working in a local job or marketplace. </p>
                </div>
                @foreach($staff as $data)
                <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                    <div class="mentors_profile">
                        <div class="mprofile">
                            <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="{{$data->name}} Profile Image of Human and Nature Development Society (HANDS)" class="img-fluid">
                        </div>
                        <div class="profile_social">
                            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="profile_content">
                         <h3><a href="{{route('team_details',$data->slug)}}">{{$data->name}}</a></h3>
                            <p><strong>{{$data->designation}}</strong></p>
                            <hr>
                            <p>{!! Str::words($data->caption ,15)!!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>   
  </main>
@endsection