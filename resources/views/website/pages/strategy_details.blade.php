@extends('layouts.webmaster')
@section('web_content') 
@foreach($banner as $data)
<section class="section-padding" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}');background-repeat: no-repeat;background-position: center;background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-2 " id="banner_texts" > {{$data->banner_heading}} </h1>
            </div>
        </div>
    </div>
</section>
@endforeach


<section class="section-padding">
    <div class="container">
    <div class="row">
    <div class="col-12 col-lg-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
            <div class="our_strategy">
                <h2>{{$data->title}}</h2>
                <p>{!! $data->caption !!}</p>
            </div>
            <!-- our strategy end -->
        </div>
        <!-- col end  -->
         <div class="col-12 col-lg-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 ">
            <div class="google_ads_section mt-4">
                <img src="https://cdn.prod.website-files.com/5fd17cc025c11b7655a81112/5ff8a9a49ec7fe2acdf1e76f_cd02f7f6393676420be1f04e6ca4b191344ee313.jpeg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, perspiciatis.</p>
            </div>
            <div class="google_ads_section mt-4">
                <img src="https://cdn.prod.website-files.com/5fd17cc025c11b7655a81112/5ff8a9a49ec7fe2acdf1e76f_cd02f7f6393676420be1f04e6ca4b191344ee313.jpeg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, perspiciatis.</p>
            </div>
            <div class="google_ads_section mt-4">
                <img src="https://cdn.prod.website-files.com/5fd17cc025c11b7655a81112/5ff8a9a49ec7fe2acdf1e76f_cd02f7f6393676420be1f04e6ca4b191344ee313.jpeg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, perspiciatis.</p>
            </div>


         </div>
         <!-- col end  -->
    </div>
    </div>
</section>








@endsection