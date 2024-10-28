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
                            <h1 style="font-size: 5rem; color: #000;">{{$data->banner_heading}}</h1>
                            <h3>{{$data->banner_title}}</h3>
                            @if($data->banner_button1 != "")
                            <a href="{{$data->banner_button_url1}}">{{$data->banner_button1}} ||</a>
                            @endif
                            @if($data->banner_button2 !="")
                            <a href="javascript:void(0)" class="text-dark"> {{$data->banner_button2}}</a>
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 col-xxl-10 offset-lg-1">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                        @foreach($desc as $data)
                        <div class="common_heading pt-4 pb-4 text-center">
                            <h1> || <span class="text-success fw-bold text-uppercase">{{$data->title}} </span> ||</h1>
                        </div>
                        <div class="microfinacne_content">
                            <p>{!! $data->caption !!}</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="service_loan mb-4">
                        <div class="sidebar_list">
                            <h4>savings Services </h4>
                            <ul>
                                @foreach($sevinglist as $data)
                                <li><a href="{{$data->button_url}}">{{$data->title}}</a></li>
                                @endforeach
                            </ul>
                            </div>
                        </div>
                       <div class="service_loan mb-4">
                        <div class="sidebar_list">
                            <h4>Microfinance Service </h4>
                            <ul>
                                @foreach($servicelist as $data)
                                <li><a href="{{$data->button_url}}">{{$data->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="comon_heading2">
                    <h1> Savings <span> Services </span></h1>
                </div>
            </div>
            @foreach($allservice as $data)
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-sm-4">
                <div class="service_two">
                    <div class="service_tow_profile">
                        <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="{{$data->title}}" class="img-fluid">
                    </div>
                    <div class="service_two_cotent">
                        <h2>{{$data->title}} </h2>
                        <p>{!! Str::words($data->caption,20) !!}</p>
                       <div class="stwo_link">
                        <a href="{{$data->button_url}}"><span><i class="fas fa-angle-double-right"></i> </span> {{$data->button}} </a>
                       </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 justify-content-end d-flex mt-4">
                <div class="custom_pagination">
                    <div class="row">{{ $allservice->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- ========  main content end herre  -->
  </main>
@endsection