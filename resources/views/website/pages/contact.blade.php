@extends('layouts.webmaster')
@section('web_content') 
  <main>
  @foreach($banner as $banners)
    @foreach($pageIds as $pageid)
    @if($pageid->menu_id == $banners->main_page_id)
        <h1> {{$banners->banner_title}}</h1>
    @endif


  @endforeach
  @endforeach

<section class="contact_banner">
    <div class="bannerbg">
        <div class="container ">
            <div class="row justify-content-sm-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="banner_contents">
                     <!-- <h1> Let's  <span id="auto_type1"> </span> </h1> -->
                     <h1>Contact Us</h1>
                    </div>
                </div>
                <!-- col end  -->
            </div>
        </div>
    </div>
</section>
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
                        <a href="tel:+8801602-351089">++880 1602-351089</a>
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
                        <a href="mailto:hands7@yahoo.com">hands7@yahoo.com</a>
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
                                <a target="_blank" href="https://www.facebook.com/humanandnaturedevelopmentsociety"><i class="fa-brands fa-square-facebook"></i></a>
                                <a target="_blank" href="https://twitter.com/hands_bd"><i class="fa-brands fa-square-x-twitter"></i></a>
                                <a target="_blank" href="https://www.linkedin.com/in/human-and-nature-development-society-hands-8133862b8/"><i class="fa-brands fa-linkedin"></i></a>
                                <a target="_blank" href="https://www.instagram.com/hands_bd/"><i class="fa-brands fa-square-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- col end  -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                        <div class="contact_form" style="border:1px solid gray">
                            <p class="pb-4 text-success fw-bold">Fill out the form and our agent will contact you within the next 24 hours.</p>
                            <form>
                                <!-- Name input -->
                                <div data-mdb-input-init class="form-outline ">
                                  <input type="text" id="form4Example1" class="form-control mb-4" placeholder="Name" />
                                 
                                </div>
                              
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline ">
                                  <input type="email" id="form4Example2" class="form-control mb-4" placeholder="Email"/>
                                </div>
                                <!-- Message input -->
                                <div data-mdb-input-init class="form-outline ">
                                  <input type="email" id="form4Example2" class="form-control mb-4" placeholder="Phone"/>
                                </div>
                                <!-- Message input -->
                                <div data-mdb-input-init class="form-outline ">
                                  <textarea class="form-control" id="form4Example3" rows="4" placeholder="Write your Messages"></textarea>
                              
                                </div>
                                <!-- Submit button -->
                                <div class="d-flex justify-content-center text-center">
                                    <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block  submit_button mt-4 p-2 ">Send Your Massages</button>
                                </div>
                                
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
