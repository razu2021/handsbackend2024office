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
                        <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="news image" class="img-fluid">
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
                            <a href="" data-bs-toggle="modal" data-bs-target="#mymodel{{$data->allpost_id}}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@foreach($blog as $data)
<div class="modal fade" id="mymodel{{$data->allpost_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal_image mt-4 mb-4">
            <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="HANDSBD {{$data->title}} image" style="height:auto ; width:100%;object-fit:cover">
            <p style="color:green;font-style:italic">{{$data->created_at->format('Y-m-d H:i:s A')}}</p>
        </div>
        <h5 class="pb-2"><strong>{{$data->title}}</strong></h5>
       <p>{!! $data->caption !!}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
  </main>
@endsection