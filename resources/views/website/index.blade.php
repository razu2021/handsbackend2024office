@extends('layouts.webmaster')
@section('web_content')
  <main>
    <!-- index banner start here -->
    <section id="section_id" class="section_class">
    @foreach($bannerbg as $bannerbgs)
        <div class="index_banner" style="background-image:url('{{asset('uploads/website/'.$bannerbgs->banner_bg_image)}}')">
    @endforeach
            <div class="index_banner_bg">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="owl-carousel owl-thame index_banner_sliders">
                            @foreach($banner as $banners)
                                <div class="index_main_slider">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                            <div class="index_slider">
                                                <div class="index_slider_items">
                                                    <div class="index_slider_content">
                                                        <p>{{$banners->banner_title}}</p>
                                                        <h1>{{$banners->banner_heading}}</h1>
                                                        <p><span>{{$banners->banner_caption}}</span></p>
                                                        <div class="button3">
                                                            @if($banners-> banner_button1 !="")
                                                            <button> <a href="{{$banners->banner_button_url1}}">{{$banners->banner_button1}}</a></button>
                                                            @endif
                                                            @if($banners-> banner_button2 !="")
                                                            <button> <a href="{{$banners->banner_button_url2}}">{{$banners->banner_button2}}</a></button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- slider end -->
                                        </div>
                                        <!-- col end -->
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                            <div class="index_slider">
                                                <div class="index_slider_items">
                                                    <div class="index_slider_img">
                                                        <img src="{{asset('uploads/website/'.$banners->banner_image)}}" alt="banner image" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- slider end -->
                                        </div>
                                        <!-- col end -->
                                    </div>
                                    <!-- row end -->
                                </div>
                         
                                @endforeach
                            </div>
                            <!-- owl carousel end -->
                        </div>
                        <!-- col end -->
                    </div>
                    <!-- row end -->
                </div>
                <!-- index banner end -->
            </div>
        </div>
 
        <div class="index_banner_social">
            <div class="index_social"style="background:#13223F">
                <ul>
                    <li><a href="https://www.facebook.com/humanandnaturedevelopmentsociety" style="color: #3b5998;"><i class="fab fa-facebook-square"></i> </a></li>
                    <li><a href="https://twitter.com/hands_bd" style="color: #55acee;"><i class="fa-brands fa-x-twitter"></i> </a></li>
                    <li><a href="https://www.linkedin.com/company/human-and-nature-development-society-hands/?viewAsMember=true" style="color: #0077b5 ;"><i class="fa-brands fa-linkedin-in"></i> </a></li>
                    <li><a href="https://www.instagram.com/hands_bd/" style="color: #fccc63 ;"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </section>
<!-- index banner end here  -->
<section class="section-padding">
    <div class="section_bg">
        <div class="container">
            <div class="row">
                @foreach($whatsnew_heading as $heading)
                <div class="case_heading ">
                    <h1> HANDS <b> {{$heading->top_heading}} </b></h1>
                    <span> <i class="fas fa-business-time"></i> </span>
                </div>
                @endforeach
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="whats_new_banner">
                        <div class="owl-carousel owl-theme index_whats_new_services">
                            @foreach($whatsnew as $data)
                            <div class="whats_new_slider">
                                <div class="whats_new_image">
                                    <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="{{$data->title}}" class="img-fluid">
                                </div>
                                <div class="whats_new_content">
                                    <div class="whtas_new_button">
                                        <button><a href="{{$data->button_url}}">{{$data->button}}</a></button>
                                    </div>
                                </div>
                            </div>
                            <!-- whats new slider end -->
                            @endforeach
                        </div>
                        <!-- carousel end here  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Whats new end -->
<section class=" service_over_image" >
    <div class="sobg">
    <div class="container">
        <div class="row">
            <div class="case_heading ">
                @foreach($service_heading as $data)
                <h1> HANDS <b> {{$data->top_heading}} </b></h1>
                @endforeach
               <span> <i class="fas fa-business-time"></i> </span> 
            </div>
            @foreach($serviceoverview as $data)
            <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2 mt-4">
                <div class="index_service_loan">
                    <div class="index_service_icon">
                        <span> <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Human and Nature Development Society (HANDS) {{$data->title}} "></span> 
                    </div>
                    <div class="index_service_loan_con">
                        <p class="text-muted">{{$data->title}}</p>
                    </div>
                </div>
            </div>
            <!-- col end -->
             @endforeach
        </div>
    </div>
    </div>
</section>
<!-- hands service overview end  -->
 @foreach($smeads as $data)
<section class="section_index_banner" style="background-image:url('{{asset('uploads/website/'.$data->service_image)}}')">
    <div class="section_index_bannerbg">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                   <div class="secb_con">
                    <h1>{{$data->heading}} </h1>
                    <h3>{{$data->title}}</h3>
                    @if($data->button !="")
                    <button> <a href="{{$data->button_url}}">{{$data->button}}</a></button>
                    @else 
                    <button> <a href="{{route('sme-loans')}}">sme financing</a></button>
                    @endif
                   </div>
                </div>
                <!-- col -->
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- section banner end here  -->
<section class="section-padding ">
    <div class="">
        <div class="container loanstepbg">
            <div class="row">
                <div class="case_heading ">
                    <h1> Get Your<b>  Loan In 3 Easy Steps </b></h1>
                   <span> <i class="fas fa-business-time"></i> </span> 
                </div>
                @foreach($loanstep as $data)
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-4 ">
                    <div class="loan_steps">
                        <div class="loan_step_icon">
                            <span> {!! $data->heading !!}</span>
                        </div>
                        <br>
                        <div class="loan_step_cont">
                            <h3> {{$data->title}}</h3>
                            <p>{!! Str::words($data->caption, 40) !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- col end  -->
            </div>
        </div>
    </div>
</section>    
<!-- loan step end here  -->    
@foreach($dipositads as $data)
<section class="section_index_banner_saving">
    <div class="section_index_bannerbg">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                   <div class="secb_con">
                    <h1> {{$data->heading}} </h1>
                    <h3>{{$data->title}}</h3>
                    @if($data->button !="")
                    <button> <a href="{{$data->button_url}}">{{$data->button}}</a></button>
                    @else 
                    <button> <a href="{{route('savings')}}"> deposit </a></button>
                    @endif
                   </div>
                </div>
                <!-- col -->
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- section banner end here  -->
 <section class="section-padding">
<div class="container storybg mt-4 mb-4">
    <div class="storybogcolor">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
            <div class="client_faq">
                <div class="faq">
                    <div class="faq_head_about">
                        <h2 class="text-dark">Frequently Asked Questions</h2>
                        <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam perferendis, voluptates aperiam in animi odit excepturi ipsam. Quas, dolore magnam!</p>
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach($faqs as $faq)
                        <div class="accordion-item ">
                          <h2 class="accordion-header faq_qus">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$faq->faqs_id}}" aria-expanded="false" aria-controls="flush-collapse{{$faq->faqs_id}}">
                              {{$faq->qustion}}
                            </button>
                          </h2>
                          <div id="flush-collapse{{$faq->faqs_id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body faq_body">
                                <p>{!! $faq->answer !!}</p>
                            </div>
                          </div>
                        </div>
                        @endforeach


                       

                       



                      </div>
                </div>
            </div>
        </div>
        <!-- col end -->
    </div>
    </div>
</div>
</section>
    <!-- ========  main content end herre  -->
  </main>
  @endsection 