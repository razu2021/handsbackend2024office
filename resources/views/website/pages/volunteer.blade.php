@extends('layouts.webmaster')
@section('web_content')  
  <main>
@foreach($banner as $data)
    <section class="contact_banner" style="background-image:url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
        <div class="bannerbg">
            <div class="container ">
                <div class="row justify-content-sm-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_contents">
                         <h1>{{$data->banner_heading}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach



    <!-- banner section end here  -->
@foreach($aboutvolunteer as $about)
<section class=" ">
<div class="vbg">
    <div class="container section-padding">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 ">
                <div class="common_about_image">
                    <img src=" {{asset('contents/assets/website')}}/assets/img/avatar.jpg" data-src="{{asset('uploads/website/'.$about->service_image)}}" alt="voluneteer about image of hands"  class="img-fluid lazyload" style="border-top-left-radius:30px ;" >
                </div>
                <!-- end  -->
            </div>
            <!-- col end  -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mt-sm-4 mt-md-4 ">
                <div class="common_about_content">
                   <p> <i class="fas fa-angle-double-left"></i><strong> {{$about->title}} </strong> <i class="fas fa-angle-double-right"></i></p>
                   <h1>{{$about->heading}}</h1>
                   <p>{!! $about->caption !!}</p>
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
            <div class="col-lg-8 offset-lg-2">         
            <div class=" row allprojects">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                    <div class="overview">
                    <div class="common_count">
                        @if($successful != 0)
                        <strong> {{$successful}} </strong>
                        @else
                        <strong> N/A</strong>
                        @endif
                        <p> success projects</p>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                    <div class="overview">
                    <div class="common_count">
                    @if($running != 0)
                        <strong> {{$running}} </strong>
                        @else
                        <strong> N/A</strong>
                        @endif
                        <p> Running projects</p>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                    <div class="overview">
                    <div class="common_count">
                        @if($upcoming != 0)
                        <strong> {{$upcoming}} </strong>
                        @else
                        <strong> N/A</strong>
                        @endif
                        <p> Upcoming projects</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- volunter about end here  -->

<section class="section-padding">
    <div class="container">
        <div class="row">
            @foreach($staff as $data)
            <div class="col-12 colsm-12 col-md-4 col-lg-4 mt-4">
                <div class="box14 profile">
                    <img class="pic-1" src="{{asset('uploads/website/'.$data->service_image)}}" data-src="{{asset('uploads/website/'.$data->service_image)}}" class="lazyload img-fluid"/>
                    <div class="box-content">
                        <h3 class="title">{{$data->name}}</h3>
                        <span class="post">{{$data->designation}}</span>
                        <ul class="icon">
                            <li><a href="volunteer_detail.html"><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

            

        </div>
        <!-- row en  -->
        <nav class="mt-5">
            <div class="row">
                {{$staff->links()}}
            </div>
          </nav>
    </div>
</section>

    <!-- ========  main content end herre  -->
  </main>

@endsection