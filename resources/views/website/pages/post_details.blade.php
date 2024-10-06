@extends('layouts.webmaster')
@section('web_content')  
@foreach($banner as $data)
<div class="details_main_section">
<section class="team_banner" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}');">
        <div class="banner_3_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1> {{$data->banner_heading}} </h1>
                            <a href="{{route('index')}}">Home /</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    <section class="section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2 ">
                    <div class="post_side_bar">
                        <div class="google_ads_global">
                            <div class="ads_global">
                            <p>No Data!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 mt-5">
                    <div class="project_details_area">
                        <div class="post_details">
                        <div class="pro_head">
                            <h4>HANDS</h4>
                            <h1>{{$post->heading}}</h1>
                            <p>Published: {{$post->created_at->format('Y-m-d H:i:s A')}}</p>
                            <p class="pt-5"><b>Sponser of : </b> Human and Nature Development Society (HANDS)</p>
                        </div>
                        <hr>
                        <div class="pro_image">
                            @if($post->service_image !="")
                            <img src="{{asset('uploads/website/'.$post->service_image)}}" alt="prjects image of HANDS" data-src="{{asset('uploads/website/'.$data->service_image)}}">
                            @else
                            <img src="{{asset('contents/assets/website')}}/assets/img/programimage.png" alt="hands program image ">
                            @endif
                            <p>{{$post->title}}</p>
                        </div>
                        <div class="pro_purpose">
                            <p>{!! $post->caption!!}</p>
                        </div>
                        <div class="goolge_ads d-flex justify-content-center mb-4 mt-4" >
                            <img src="{{asset('contents/assets/website')}}/assets/img/programimage.png" alt="" >
                        </div>
                
                        <hr>
                        @foreach($slogan as $slogans)
                        <div class="pro_dates">
                            <h1>{{$slogans->heading}}</h1>
                            <h4>{{$slogans->title}}</h4>
                        </div>
                        @endforeach
                </div>
                </div>
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2 ">
                    <div class="post_side_bar">
                    <div class="hands_product text-center mt-4">
                        <h2 class="pb-5">Our Products  </h2>
                        @foreach($product as $products)
                        <div class="sidebar_product mt-4">
                            <img src="{{asset('uploads/website/'.$products->service_image)}}" alt="hands product image">
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 </div>
 


  
@endsection