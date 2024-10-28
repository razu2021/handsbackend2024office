@extends('layouts.webmaster')
@section('web_content') 
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
<section class="section-padding ">
    <div class="container">
        <div class="row section-padding">
            <h1 class="pb-2  pt-4 fw-bold">Charitable Work & other Activities</h1>
            @foreach($lastproject as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                <div class="wedo_service">
                    <div class="wedo_over_cont">
                        <h4><a href="{{route('all_projects_details',$data->slug)}}">{{$data->pro_name}}</a></h4>
                        <p>{{$data->pro_title}}</p>                            
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@foreach($makedonation as $data)
<section class="make_D_image" style="background-image:url('{{asset('uploads/website/'.$data->service_image)}}')">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                    <div class="make_donation_quick">
                        <h1 class="pb-2">{{$data->heading}}</h1>
                        <h3 class="pb-2">{{$data->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<section class="section-padding">
    <div class="container">
    <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2 mt-4">
                @foreach($branchh as $data)
                <div class="service_overview">
                    <div class="over_cont">
                        <h4>{{$data->name}}</h4>
                        <p> {{$data->location}}</p>
                    </div>
                </div>
                @endforeach
            </div>
                @foreach($branch as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 ">
                <div class="service_overview">
                    <div class="over_cont">
                        <h4>{{$data->name}}</h4>
                        <p>{{$data->location}}</p>                            
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@foreach($slogan as $data)
<section class="make_D_image" style="background-image:url('{{asset('uploads/website/'.$data->service_image)}}')">
    <div class="make_donation_quickbg">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                    <div class="make_donation_quick">
                        <h1 class="pb-2">{{$data->heading}}</h1>
                        <h3 class="pb-2">{{$data->title}} </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<div class="container section-padding">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
            <div class="client_faq">
                <div class="faq">
                    <div class="faq_head_about">
                        <h2 >Branch Details </h2>
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach($branch as $data)
                        <div class="accordion-item ">
                          <h2 class="accordion-header faq_qus">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$data->branch_id}}" aria-expanded="false" aria-controls="flush-collapse{{$data->branch_id}}">
                              {{$data->name}}
                            </button>
                          </h2>
                          <div id="flush-collapse{{$data->branch_id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body faq_body">
                                <div class="branchnote">
                                    <p><a href="{{route('contact')}}">{{$data->location}}</a></p>
                                    <p><a href="tel:{{$data->contact}}">{{$data->contact}}</a></p>
                                </div>
                                <p class="mt-5">{!! $data->caption !!}</p>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection