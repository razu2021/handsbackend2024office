@extends('layouts.webmaster')
@section('web_content')   
  <main>
  @foreach($banner as $data)
    <section class="team_banner">
        <div class="banner_3_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1>{{$data->banner_title}}</h1>
                            @if($data->banner_button1 != "")
                            <a href="{{url('$data->banner_button1_url1')}}">{{$data->banner_button1}}</a>
                            @endif
                            @if($data->banner_button2 !="")
                            <a href="javascript:void(0)" class="text-danger"> {{$data->banner_button2}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach
@foreach($chairman as $data)
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="blog_profile">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                            <div class="blog_profile_image">
                                @if($data->service_image != "")
                                <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="{{$data->name}} {{$data->designation}} of Human and Nature Development Sociery (HANDS) " class="img-fluid" />
                                <div class="pin pt-4">
                                <h2>{{$data->name}}</h2>
                                <p>{{$data->designation}}<span> Of HAMDS </span></p>
                                </div>
                                @else
                                <img src="{{asset('contents/assets/website')}}/assets/img/avatar.png" alt="profile image" class="img-fluid">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="profilesinfo">
                            <p>About {{$data->designation}}<span> Of HAMDS </span></p>
                            <hr>
                            <p>{!! $data->caption !!}</p>
                            </div>
                        </div>
                    </div>
                    <!-- row end  -->
                </div>
            </div>
            <!-- col end here -->
        </div>
    </div>
</section>
@endforeach

    <!-- ========  main content end herre  -->
  </main>


@endsection