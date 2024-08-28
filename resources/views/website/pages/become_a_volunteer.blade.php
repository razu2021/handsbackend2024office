@extends('layouts.webmaster')
@section('web_content')  
  <main>
<section class="bcome_volunteer">
    <div class="volunteerbg">
        <div class="container section-padding">
            <div class="row justify-content-sm-center">
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 ">
                    <div class="banner_contents">
                     <h1>  Become <span>  a volunteer</span> </h1>
                    </div>
                </div>
                <!-- col end  -->
            </div>
        </div>
    </div>
</section>
<!-- banner end herre  -->

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                <div class="volunteer_application">
                    <div class="application_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/volunteer.jpg" alt="Volunteer image" class="img-fluid">
                        <div class="application_form">
                           <h1 class="pb-5"> Become A Volunteer  </h1>
                            <div class="application_form_area">
                                <form>
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row mb-4">
                                      <div class="col">
                                        <div data-mdb-input-init class="form-outline">
                                          <input type="text" id="form3Example1" class="form-control" placeholder="Write your full Name " />
                                         
                                        </div>
                                      </div>
                                      <div class="col">
                                        <div data-mdb-input-init class="form-outline">
                                          <input type="text" id="form3Example2" class="form-control" placeholder="Write your Phone"/>
                                         
                                        </div>
                                      </div>
                                    </div>
                                  
                                    <!-- Email input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                      <textarea name="" id="" cols="10" rows="5" class="form-control" placeholder="Write your Massages" id="form3Example3" class="form-control"></textarea>
                                    </div>
                                  
                                    <!-- Password input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                      <input type="file" id="form3Example4" class="form-control" placeholder="upload your CV"/>
                                    </div>
                                    <!-- Submit button -->
                                    <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4 p-2" style="font-size: 1.6rem;">Submit your massages</button>
                                  </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- form end here  -->
<section class="section-padding meet_v_bg">
    <div class="container-fluid section-padding">
        <div class="row">
            <div class="common_heading text-center pb-5 ">
                <h1>Meet Our Volunteer Team</h1>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="owl-carousel owl-theme meet_volunteers">
                    <div class="meet_our_volunteer">
                        <div class="volunteer_image">
                            <img src="{{asset('contents/assets/website')}}/assets/img/razu.jpg" alt="volunteer image" class="img-fluid">
                        </div>
                        <div class="volunteer_info pt-2">
                            <h3><a href="#">md razu hossain raj</a></h3>
                            <strong>volunteer</strong>
                        </div>
                    </div>
                    <!-- slider end here  -->
                    <div class="meet_our_volunteer">
                        <div class="volunteer_image">
                            <img src="{{asset('contents/assets/website')}}/assets/img/it.jpg" alt="volunteer image" class="img-fluid">
                        </div>
                        <div class="volunteer_info pt-2">
                            <h3><a href="#">israt jahan trisha</a></h3>
                            <strong>volunteer</strong>
                        </div>
                    </div>
                    <!-- slider end here  -->
                    <div class="meet_our_volunteer">
                        <div class="volunteer_image">
                            <img src="{{asset('contents/assets/website')}}/assets/img/it2.jpeg" alt="volunteer image" class="img-fluid">
                        </div>
                        <div class="volunteer_info pt-2">
                            <h3><a href="#">israt jahan trisha</a></h3>
                            <strong>volunteer</strong>
                        </div>
                    </div>
                    <!-- slider end here  -->

                </div>
            </div>
        </div>
    </div>
</section>
    <!-- ========  main content end herre  -->
  </main>
@endsection

