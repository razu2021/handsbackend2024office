@extends('layouts.webmaster')
@section('web_content')  
  <main>
    <section class="slider_section_bg mb-0" id="slider">
        <div class="sliderbg">
            <div class="owl-carousel owl-theme index_banner_slider">
                <div class="slider_item">
                    <div class="slider_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/child0.jpg" alt="child protection image" class="img-fluid">
                    </div>
                    <div class="slider_text">
                        <h2>DONATE</h2>
                        <h1>for the <span>  poor  </span> children </h1>
                    </div>
                    <div class="overlay_index"></div>
                </div>
                <!-- slider item end  -->
                <div class="slider_item">
                    <div class="slider_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/child1.jpg" alt="child protection image" class="img-fluid">
                    </div>
                    <div class="slider_text">
                        <h2>Help the poor </h2>
                        <h1>For theire <span>  bretter  </span> Future </h1>
                    </div>
                    <div class="overlay_index"></div>
                </div>
                <!-- slider item end  -->
                <div class="slider_item">
                    <div class="slider_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/child2.jpg" alt="child protection image" class="img-fluid">
                    </div>
                    <div class="slider_text">
                        <h2>for the poor children</h2>
                        <h1>Raise your <span>  Halping   </span> Hand </h1>
                    </div>
                    <div class="overlay_index"></div>
                </div>
                <!-- slider item end  -->
                <div class="slider_item">
                    <div class="slider_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/child3.jpg" alt="child protection image" class="img-fluid">
                    </div>
                    <div class="slider_text">
                        <h2>Save <span>  the  </span> children </h2>
                    </div>
                    <div class="overlay_index"></div>
                </div>
                <!-- slider item end  -->
            </div>
            <!-- carousel end  -->
        </div>
    </section>
    <!-- index banner end  -->

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                <div class="ch_about">
                    <div class="ch_about_content p-4">
                        <h1>Help The Poor <span> Children </span>  with Our Charity Organization (HANDS)</h1>
                        <p class="pb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe nihil nulla, facilis placeat at quaerat exercitationem, reprehenderit itaque provident dolore molestias eius asperiores tempore minima a possimus nisi sunt quo.</p>
                        <div class="row ">
                            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                                <div class="ch_box_content">
                                    <h4> <span> <i class="far fa-heart"></i> </span> Shelter for Poor </h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, facilis.</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                                <div class="ch_box_content">
                                    <h4> <span> <i class="far fa-heart"></i> </span> Help Poor Childreen </h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, facilis.</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                                <div class="ch_box_content">
                                    <h4> <span> <i class="far fa-heart"></i> </span> Funding for Poor </h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, facilis.</p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                                <div class="ch_box_content">
                                    <h4> <span> <i class="far fa-heart"></i> </span> Reduce World Poverty</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, facilis.</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="ch_donate_form">
                        <div class="ch_form">
                            <h2 class="pb-2">make <span> Donation</span> now</h2>
                            <p class="pb-4"><span> Note : </span> please provide your information, we will contact you very soon </p>
                            <form>
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="" id="" class="form-control" placeholder="Name " required/>
                                </div>
                                <!-- name end -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="email" name="" id="" class="form-control" placeholder="Email" required/>
                                </div>
                                <!-- name end -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="" id="" class="form-control" placeholder="Phone" required/>
                                </div>
                                <!-- name end -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <textarea name="" id="" cols="6" style="width: 100%;padding: 1rem;" placeholder="optional! Write your Massages"></textarea>
                                </div>
                                <!-- Submit button -->
                                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Submit Now </button>
                              </form>
                        </div>
                    </div>
                </div>
                <!-- col end  -->
            </div>
        </div>
    </section>
<!-- section end herre  -->
<section class="make_D_image">
    <div class="make_donation_quickbg">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                    <div class="make_donation_quick">
                        <h1 class="pb-2">How you can help us </h1>
                        <h3 class="pb-2">Just call at <span>  +880 1918148000 </span> to make a donation </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end  -->
<section class="section-padding">
    <div class="container">
    <div class="col-12 col-sm-12 col-md-8 col-lg-10 col-xl-10 col-xxl-10 offset-lg-1">
        <div class="case_heading">
            <h1> our <b> Causes </b></h1>
            <span> <i class="fas fa-hand-holding-heart"></i> </span>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                <div class="child_cause_area">
                    <div class="ch_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/child2.jpg" alt="cause image" class="img-fluid">
                        <div class="ch_over_button">
                            <button><a href="#">Donate Now</a></button>
                        </div>
                    </div>
                    <div class="ch_cause_content">
                        <h2 class="text-muted">Donate for orphan child</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio nisi debitis, autem amet incidunt hic.</p>
                    </div>
                    <div class="cause_dontate_graph">
                        <div class="ch_dontate">
                            <p> $ 658 </p>
                            <span> Tergate</span>
                        </div>
                        <div class="ch_dontate">
                            <span style="font-size: 4rem; border-top: 1px solid #fff;border-bottom: 1px solid #fff;"> <i class="far fa-heart"></i></span>
                        </div>
                        <div class="ch_dontate">
                            <p> 358 +$ </p>
                            <span> Raised</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                <div class="child_cause_area">
                    <div class="ch_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/child2.jpg" alt="cause image" class="img-fluid">
                        <div class="ch_over_button">
                            <button><a href="#">Donate Now</a></button>
                        </div>
                    </div>
                    <div class="ch_cause_content">
                        <h2 class="text-muted">Donate for orphan child</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio nisi debitis, autem amet incidunt hic.</p>
                    </div>
                    <div class="cause_dontate_graph">
                        <div class="ch_dontate">
                            <p> $ 1358 </p>
                            <span> Tergate</span>
                        </div>
                        <div class="ch_dontate">
                            <span style="font-size: 4rem; border-top: 1px solid #fff;border-bottom: 1px solid #fff;"> <i class="far fa-heart"></i></span>
                        </div>
                        <div class="ch_dontate">
                            <p> 358 +$ </p>
                            <span> Raised</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                <div class="child_cause_area">
                    <div class="ch_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/child2.jpg" alt="cause image" class="img-fluid">
                        <div class="ch_over_button">
                            <button><a href="#">Donate Now</a></button>
                        </div>
                    </div>
                    <div class="ch_cause_content">
                        <h2 class="text-muted">Donate for orphan child</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio nisi debitis, autem amet incidunt hic.</p>
                    </div>
                    <div class="cause_dontate_graph">
                        <div class="ch_dontate">
                            <p> $ 1358 </p>
                            <span> Tergate</span>
                        </div>
                        <div class="ch_dontate">
                            <span style="font-size: 4rem; border-top: 1px solid #fff;border-bottom: 1px solid #fff;"> <i class="far fa-heart"></i></span>
                        </div>
                        <div class="ch_dontate">
                            <p> 358 +$ </p>
                            <span> Raised</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                <div class="child_cause_area">
                    <div class="ch_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/child2.jpg" alt="cause image" class="img-fluid">
                        <div class="ch_over_button">
                            <button><a href="#">Donate Now</a></button>
                        </div>
                    </div>
                    <div class="ch_cause_content">
                        <h2 class="text-muted">Donate for orphan child</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio nisi debitis, autem amet incidunt hic.</p>
                    </div>
                    <div class="cause_dontate_graph">
                        <div class="ch_dontate">
                            <p> $ 1358 </p>
                            <span> Tergate</span>
                        </div>
                        <div class="ch_dontate">
                            <span style="font-size: 4rem; border-top: 1px solid #fff;border-bottom: 1px solid #fff;"> <i class="far fa-heart"></i></span>
                        </div>
                        <div class="ch_dontate">
                            <p> 358 +$ </p>
                            <span> Raised</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                <div class="child_cause_area">
                    <div class="ch_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/child2.jpg" alt="cause image" class="img-fluid">
                        <div class="ch_over_button">
                            <button><a href="#">Donate Now</a></button>
                        </div>
                    </div>
                    <div class="ch_cause_content">
                        <h2 class="text-muted">Donate for orphan child</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio nisi debitis, autem amet incidunt hic.</p>
                    </div>
                    <div class="cause_dontate_graph">
                        <div class="ch_dontate">
                            <p> $ 1358 </p>
                            <span> Tergate</span>
                        </div>
                        <div class="ch_dontate">
                            <span style="font-size: 4rem; border-top: 1px solid #fff;border-bottom: 1px solid #fff;"> <i class="far fa-heart"></i></span>
                        </div>
                        <div class="ch_dontate">
                            <p> 358 +$ </p>
                            <span> Raised</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                <div class="child_cause_area">
                    <div class="ch_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/child2.jpg" alt="cause image" class="img-fluid">
                        <div class="ch_over_button">
                            <button><a href="#">Donate Now</a></button>
                        </div>
                    </div>
                    <div class="ch_cause_content">
                        <h2 class="text-muted">Donate for orphan child</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio nisi debitis, autem amet incidunt hic.</p>
                    </div>
                    <div class="cause_dontate_graph">
                        <div class="ch_dontate">
                            <p> $ 1358 </p>
                            <span> Tergate</span>
                        </div>
                        <div class="ch_dontate">
                            <span style="font-size: 4rem; border-top: 1px solid #fff;border-bottom: 1px solid #fff;"> <i class="far fa-heart"></i></span>
                        </div>
                        <div class="ch_dontate">
                            <p> 358 +$ </p>
                            <span> Raised</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->
        </div>
    </div>
    </div>
</section>
<!-- section end here  -->
<section class="make_D_image">
    <div class="make_donation_quickbg">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="ch_dontate_count">
                                <span><i class="far fa-frown"></i></span>
                                <h1> +578 </h1>
                                <p> Happy Donators </p>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-12 col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="ch_dontate_count">
                                <span><i class="far fa-frown"></i></span>
                                <h1> +578 </h1>
                                <p> Happy Donators </p>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-12 col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="ch_dontate_count">
                                <span><i class="far fa-frown"></i></span>
                                <h1> +578 </h1>
                                <p> Happy Donators</p>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-12 col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                            <div class="ch_dontate_count">
                                <span><i class="far fa-frown"></i></span>
                                <h1> +578 </h1>
                                <p> Happy Donators</p>
                            </div>
                        </div>
                        <!-- col end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end  -->

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 ">
                <div class="case_heading pb-4 text-start">
                    <h1> our <b> Mission </b></h1>
                    <span> <i class="fas fa-hand-holding-heart"></i></span>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                        <div class="ch_mission">
                            <div class="mission_icon">
                                <span> <i class="fas fa-hand-holding-heart"></i></span>
                            </div>
                            <div class="mission_content">
                                <h4 class="text-muted">SAVE THE <span>CHILDREN</span></h4>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium odit, obcaecati in assumenda molestiae eligendi.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col end  -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                        <div class="ch_mission">
                            <div class="mission_icon">
                                <span> <i class="fas fa-hand-holding-heart"></i></span>
                            </div>
                            <div class="mission_content">
                                <h4 class="text-muted">HELP THE <span> HELPLESS</span></h4>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium odit, obcaecati in assumenda molestiae eligendi.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col end  -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                        <div class="ch_mission">
                            <div class="mission_icon">
                                <span><i class="fas fa-hand-holding-heart"></i></span>
                            </div>
                            <div class="mission_content">
                                <h4 class="text-muted">DONATION FOR <span>POOR</span></h4>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium odit, obcaecati in assumenda molestiae eligendi.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col end  -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                        <div class="ch_mission">
                            <div class="mission_icon">
                                <span><i class="fas fa-hand-holding-heart"></i></span>
                            </div>
                            <div class="mission_content">
                                <h4 class="text-muted">PURE WATER FOR <span>POOR </span></h4>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium odit, obcaecati in assumenda molestiae eligendi.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col end  -->

                </div>
            </div>
            <!-- col end  -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 ch_event_area">
                <div class="case_heading">
                    <h1> Upcoming  <b> Events </b></h1>
                </div>
                <div class="ch_upcoming_events mt-4">
                    <div class="ch_event_date">
                        <h3>28</h3>
                        <p>FEB</p>
                    </div>
                    <div class="ch_event_location">
                        <h6> Event: Foods For Poor</h6>
                        <p> <a href="notice.html"> <span> <i class="far fa-clock"></i> </span> 10:30 am </a> <a href="notice.html"><span> <i class="fas fa-search-location"></i> </span> Tangle</a></p>

                    </div>
                </div>
                <!-- events end here  -->
                <div class="ch_upcoming_events mt-4">
                    <div class="ch_event_date">
                        <h3>28</h3>
                        <p>FEB</p>
                    </div>
                    <div class="ch_event_location">
                        <h6> Event: Foods For Poor</h6>
                        <p> <a href="notice.html"> <span> <i class="far fa-clock"></i> </span> 10:30 am </a> <a href="notice.html"><span> <i class="fas fa-search-location"></i> </span> Tangle</a></p>

                    </div>
                </div>
                <!-- events end here  -->
                <div class="ch_upcoming_events mt-4">
                    <div class="ch_event_date">
                        <h3>28</h3>
                        <p>FEB</p>
                    </div>
                    <div class="ch_event_location">
                        <h6> Event: Foods For Poor</h6>
                        <p> <a href="notice.html"> <span> <i class="far fa-clock"></i> </span> 10:30 am </a> <a href="notice.html"><span> <i class="fas fa-search-location"></i> </span> Tangle</a></p>

                    </div>
                </div>
                <!-- events end here  -->

            </div>
            <!-- col end  -->
        </div>
    </div>
</section>

  </main>
@endsection

