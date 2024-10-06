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
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                <div class="contact_details">
                    <div class="detais_icon">
                        <span><i class="fa-solid fa-phone"></i></span>
                    </div>
                    <div class="details_info">
                        <p> Have Any Question?</p>
                        @foreach($phone as $phones)
                        <a href="tel:+88{{$phones->phone_number}}">{{$phones->phone_number}} ,</a> 
                        @endforeach
                    </div>
                </div>
                <!-- contact details end here  -->
            </div>
            <!-- col end  -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                <div class="contact_details">
                    <div class="detais_icon">
                        <span><i class="fa-solid fa-envelope"></i></span>
                    </div>
                    <div class="details_info">
                        <p> Have Any Question?</p>
                        @foreach($email as $emails)
                        <a href="mailto:{{$emails->email_name}}">{{$emails->email_name}} ,</a>
                        @endforeach
                    </div>
                </div>
                <!-- contact details end here  -->
            </div>
            <!-- col end  -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                <div class="contact_details">
                    <div class="detais_icon">
                        <span><i class="fa-solid fa-location-dot"></i></span>
                    </div>
                    <div class="details_info">
                        <p> our Location</p>
                        <a href="#location">our location</a>
                    </div>
                </div>
                <!-- contact details end here  -->
            </div>
            <!-- col end  -->

        </div>
        <!-- row end -->
    </div>
</section>
<!-- contact details section end here -->
<section class="form_banner">
    <div class="form_bg">
        <div class="container section-padding" id="contact_us">
            <div class="col-lg-10 offset-lg-1">
                <div class="row ">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="form_content">
                            <strong class="text-danger">Contact us ||</strong>
                            <h3>Feel free to get in touch</h3>
                            <p>We are always here to help and listen to your thoughts and concerns. You easily contact us through email, phone, or even social media. We value your input and strive to provide the best service possible.</p>
                            
                            <div class="social_icon pt-4">
                                
                                <a target="_blank" href="#"><i class="fa-brands fa-square-facebook"></i></a>
                                
                                <a target="_blank" href="https://twitter.com/hands_bd"><i class="fa-brands fa-square-x-twitter"></i></a>
                                <a target="_blank" href="https://www.linkedin.com/in/human-and-nature-development-society-hands-8133862b8/"><i class="fa-brands fa-linkedin"></i></a>
                                <a target="_blank" href="https://www.instagram.com/hands_bd/"><i class="fa-brands fa-square-instagram"></i></a>
                            </div>
                           
                        </div>
                    </div>
                    <!-- col end  -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                        @if(session('message'))
                            <div class="alert alert-primary ">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="contact_form" style="border:1px solid gray">
                            <p class="pb-4 text-success fw-bold">Fill out the form and our agent will contact you within the next 24 hours.</p>
                            <form action="{{route('contact_form')}}" method="post">
                                @csrf
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}"/>
                                 <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                </div>
                                <!-- name end -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}"/>
                                 <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                </div>
                                <!-- name end -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="phone" id="" class="form-control" placeholder="Phone" value="{{old('phone')}}"/>
                                 <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                                </div>
                                <!-- address -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <textarea name="caption" id="caption" cols="6" style="width: 100%;padding: 1rem;" placeholder="Write your Message" >{{old('caption')}}</textarea>
                                 <span class="text-danger">@error('caption'){{$message}} @enderror</span>
                                </div>
                                <!-- Submit button -->
                                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Submit Now </button>
                                
                              </form>
                        </div>
                    </div>
                    <!-- col end  -->
        
                </div>
                <!-- row end -->
            </div>

        </div>
    </div>
</section>
<!-- form end here -->
<section id="location">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="google_map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3641.2951104958297!2d90.1211558759358!3d24.126272174241493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755fd002ad4cc97%3A0xd43910b8d07b6698!2sHuman%20and%20Nature%20Development%20Society%20(HANDS)!5e0!3m2!1sen!2sbd!4v1716017278828!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!-- col end  -->
        </div>
        <!-- row end -->
    </div>
</section>
    <!-- ========  main content end herre  -->
  </main>
@endsection
