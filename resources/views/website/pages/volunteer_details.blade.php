@extends('layouts.webmaster')
@section('web_content')  
  <main>
  @foreach($banner as $data)
<section class="bcome_volunteer" style="background-image:url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
    <div class="volunteerbg">
        <div class="container section-padding">
            <div class="row justify-content-sm-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 ">
                    <div class="banner_contents">
                     <h1>  {{$data->banner_heading}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
  <section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="blog_profile">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                            <div class="blog_profile_image">
                                @if($data->service_image != "")
                                <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="{{$data->name}} {{$data->designation}} of Human and Nature Development Sociery (HANDS) " data-src="{{asset('uploads/website/'.$data->service_image)}}" class="img-fluid lazyload" />
                                <div class="pin pt-4">
                                <h2>{{$data->name}}</h2>
                                <p>{{$data->designation}}<span> Of HAMDS </span></p>
                                <hr>
                                <div class="pinfo pt-2">
                                    @if($data->email != "")
                                    <p><span> <i class="fas fa-envelope"></i></span><a href="mailto:{{$data->email}}">{{$data->email}}</a></p>
                                    @endif
                                    @if($data->phone != "")
                                    <p> <span> <i class="fas fa-phone-square-alt"></i></span><a href="tel:{{$data->phone}}">{{$data->phone}}</a></p>
                                    @endif
                                </div>
                                </div>
                                @else
                                <img src="{{asset('contents/assets/website')}}/assets/img/profile-picture.png" alt="profile image" class="img-fluid">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="profilesinfo">
                            <p>About {{$data->designation}}<span> Of HAMDS </span></p>
                            <hr>
                            <p>{!! $data->caption !!}</p>
                            <button><a href="{{route('become_volunteer')}}">Back to Previous </a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection