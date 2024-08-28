@extends('layouts.webmaster')
@section('web_content') 
  <main>
    
  @foreach($banner as $data)
    <section class="microfinace_banner" style="background-image: url({{asset('uploads/website/'.$data->banner_bg_image)}})">
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 col-xxl-10 offset-lg-1">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                    @foreach($servicedetails as $data)
                        <div class="common_heading pt-4 pb-4 text-center">
                            <h1> || <span class="text-success fw-bold text-uppercase"> {{$data->title}} </span> ||</h1>
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
                        <!-- servings service  -->
                       <div class="service_loan mb-4">
                        <div class="sidebar_list">
                            <h4>service list</h4>
                            <ul>
                            @foreach($servicelist as $data)
                                <li><a href="{{$data->button_url}}">{{$data->title}}</a></li>
                            @endforeach
                            </ul>
                        </div>
                        </div>

                        <div class="service_loan mb-4">
                        <div class="sidebar_list">
                            <h4>Apply For Loan</h4>
                            <ul>
                                <li><a href="{{route('apply-loan')}}">Apply for Loan</a></li>
                            </ul>
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