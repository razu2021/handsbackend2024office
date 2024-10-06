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
                            <h1 style="font-size: 5rem; color: red;">{{$data->banner_heading}}</h1>
                            @if($data->banner_button1 !="")
                            <a href="{{$data->banner_button_url1}}">{{$data->banner_button1}} ||</a>
                            @endif
                            @if($data->banner_button2 !="")
                            <a href="{{$data->banner_button_url2}}">{{$data->banner_button2}} </a>
                            @endif
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
            <div class="case_heading pb-5 pt-5">
                <h1> HANDS <b>All News </b></h1>
                <span> <i class="fas fa-hand-holding-heart"></i> </span>
            </div>
            @foreach($blog as $data)
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-sm-4 mt-4">
                <div class="hands_newses">
                    <div class="hands_news_image">
                        <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Post Details image of HANDS" class="img-fluid">
                    </div>
                    <div class="hands_news_content">
                        <div class="post_info">
                            <div class="news_creator_info">
                                <p><span> <i class="fa-regular fa-user"></i></span> admin </p>
                            </div>
                            <div class="news_create_date">
                                <p> <span> <i class="fa-regular fa-calendar"></i> </span> {{$data->created_at->format('Y-m-d')}} <span><i class="fa-regular fa-clock"></i> </span> {{$data->created_at->format('H:i:s A')}} </p>
                            </div>
                        </div>
                        <div class="news_content">
                            <h2>{{$data->title}} </h2>
                            <p>{!! Str::words($data->caption,30) !!}</p>
                            <a href="{{route('post_details',$data->slug)}}">Read More</a>
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