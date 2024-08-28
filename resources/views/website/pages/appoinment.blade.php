@extends('layouts.webmaster')
@section('web_content')   
  <main>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-7 col-xl-7 col-xxl-7">
                <div class="appoinment_about">
                    <div class="app_about_content p-4">
                        <h1>Don't miss out!  <span>[ Book your appointment ]</span>  before it's too late.</h1>
                        <p class="pb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe nihil nulla, facilis placeat at quaerat exercitationem, reprehenderit itaque provident dolore molestias eius asperiores tempore minima a possimus nisi sunt quo.</p>
                    </div>
                </div>
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-8 col-lg-5 col-xl-5 col-xxl-5">
                    <div class="ch_donate_form">
                        <div class="ch_form">
                            <h2 class="pb-2">make <span> your Appoinment</span> now</h2>
                            <p class="pb-4"><span> Note : </span> please provide your information, we will contact you very soon </p>
                            <form action="#">
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="name" id="name" class="form-control" placeholder="Name " required/>
                                </div>
                                <!-- name end -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="email" name="email" id="email" class="form-control" placeholder="Email" required/>
                                </div>
                                <!-- name end -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="phone" id="" class="form-control" placeholder="Phone" required/>
                                </div>
                                <!-- address -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <textarea name="" id="" cols="6" style="width: 100%;padding: 1rem;" placeholder="Write your address" required></textarea>
                                </div>
                                <!-- address -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <textarea name="" id="" cols="6" style="width: 100%;padding: 1rem;" placeholder=" Write your purpose" required></textarea>
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
                        <h1 class="pb-2">হিউম্যান এন্ড নেচার ডেভেলপমেন্ট সোসাইটি (হ্যান্ডস) </h1>
                        <h3 class="pb-2"> সর্বদা<span>  মানুষ ও প্রকৃতির কল্যানে   </span> নিবেদিত</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end  -->

<!-- ========  main content end herre  -->
  </main>

@endsection