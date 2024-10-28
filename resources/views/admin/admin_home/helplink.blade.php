@extends('layouts.adminmaster')
@section('admin_content')
<section class="mt-5 ">
    <div class="container">
        <div class="row">
            <!-- usefull page link  -->
            <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">

                        <div class="card-body">
                          <h5 class="card-title text-primary">Home Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('whatsnew.all')}}" class="btn btn-sm btn-outline-primary mt-2">Whats New Service </a>
                          <a href="{{route('serviceOverview.all')}}" class="btn btn-sm btn-outline-primary mt-2">Service Overview</a>
                          <a href="{{route('smeads.all')}}" class="btn btn-sm btn-outline-primary mt-2">SME ADS </a>
                          <a href="{{route('dipositads.all')}}" class="btn btn-sm btn-outline-primary mt-2">Deposite Ads</a>
                          <a href="{{route('loansteps.all')}}" class="btn btn-sm btn-outline-primary mt-2">Loan Step Manage</a>
                          <a href="{{route('faqs.all')}}" class="btn btn-sm btn-outline-primary mt-2">FAQ</a>
                          <!-- Home Page end   -->
                        </div>
                        <hr>
                        <div class="card-body">
                          <h5 class="card-title text-primary">About Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('aboutus.all')}}" class="btn btn-sm btn-outline-primary mt-2"> About Us</a>
                          <a href="{{route('customer.all')}}" class="btn btn-sm btn-outline-primary mt-2"> All Customer </a>
                          <a href="{{route('member_donner.all')}}" class="btn btn-sm btn-outline-primary mt-2"> All Member </a>
                          <a href="{{route('whatwedo.all')}}" class="btn btn-sm btn-outline-primary mt-2">What We Do</a>
                          <a href="{{route('security_trust.all')}}" class="btn btn-sm btn-outline-primary mt-2">Security and Trust </a>
                          <a href="{{route('easyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Get Easy Loan  </a>
                          <a href="{{route('testimonial.all')}}" class="btn btn-sm btn-outline-primary mt-2">Testimonials </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan</a>
                        </div>  <hr>
                         <!-- About Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Organization Structure Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allstaff.all')}}" class="btn btn-sm btn-outline-primary mt-2"> Executive Leadership</a>
                          <a href="{{route('allstaff.all')}}" class="btn btn-sm btn-outline-primary mt-2"> Management and Program Leadership </a>
                          <a href="{{route('allstaff.all')}}" class="btn btn-sm btn-outline-primary mt-2">Senior Official</a>
                        </div>  <hr>
                         <!-- Organization Structure Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Chairman Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allstaff.all')}}" class="btn btn-sm btn-outline-primary mt-2"> Chairman Informaion </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Managing Director Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allstaff.all')}}" class="btn btn-sm btn-outline-primary mt-2"> Maneging Director Informaion </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Finance Director Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allstaff.all')}}" class="btn btn-sm btn-outline-primary mt-2"> Finance Director Informaion </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Financial Statement Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('fstatement.all')}}" class="btn btn-sm btn-outline-primary mt-2"> Annual Repor </a>
                          <a href="{{route('fstatement.all')}}" class="btn btn-sm btn-outline-primary mt-2"> Half Year Repor </a>
                          <a href="{{route('fstatement.all')}}" class="btn btn-sm btn-outline-primary mt-2"> Short Repor </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Where We Work Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allprojects.all')}}" class="btn btn-sm btn-outline-primary mt-2"> Successfull Projects </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">  Slogan For Donation </a>
                          <a href="{{route('branch.all')}}" class="btn btn-sm btn-outline-primary mt-2"> All Branch </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2"> Organization Slogan </a>
                          <a href="{{route('branch.all')}}" class="btn btn-sm btn-outline-primary mt-2">  Branch Details / All Branch </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Our Stratigey Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('strategy.all')}}" class="btn btn-sm btn-outline-primary mt-2"> All Stratigey </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Mission Vission Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allabout.all')}}" class="btn btn-sm btn-outline-primary mt-2">About Mission & Vission </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Our Faith Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allabout.all')}}" class="btn btn-sm btn-outline-primary mt-2">About Our Faith </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">What We Do Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Microfinance Service </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Legal Aid Service </a>
                          <a href="{{route('allprojects.all')}}" class="btn btn-sm btn-outline-primary mt-2">Successfull Projects</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">What We Do Description</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Microfinance Service 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Microfinance Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Microfinance Service </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Basice Loan 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Microenterprise Loan 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Crop Loan 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Live Stock Loan 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Special  Loan 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">House Loan 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Agriculture Loan 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Higher Education Loan 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                        <div class="card-body">
                          <h5 class="card-title text-primary">Woman Empowerment Loan 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Seving Service 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Sevins Service </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Serving Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Hands Pension Scheme 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Fixed Diposit Page🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">DOUBLE AND 8YEARS DEPOSIT🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Family Welfare Seving🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">2Year Seving🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Seving Service Sidebar</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Micro Service Sidebar</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">emergency Relief PAge🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan</a>
                          <a href="{{route('allpost.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Post</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Economic Development Page🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan</a>
                          <a href="{{route('allpost.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Post</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                        </div> <hr>
                         <!-- Chairman Page end here   -->
                         
                  
                        <div class="card-body">
                          <h5 class="card-title text-primary">Child Protection Page🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan</a>
                          <a href="{{route('allpost.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Post</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                         <!-- Chairman Page end here   -->
                        </div>  <hr>
                        <div class="card-body">
                          <h5 class="card-title text-primary">Education Page🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan</a>
                          <a href="{{route('allpost.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Post</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                         <!-- Chairman Page end here   -->
                        </div>  <hr>
                        <div class="card-body">
                          <h5 class="card-title text-primary">Health & Nutrition Page🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan</a>
                          <a href="{{route('allpost.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Post</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                         <!-- Chairman Page end here   -->
                        </div>  <hr>
                        <div class="card-body">
                          <h5 class="card-title text-primary">Water & Hygine Page🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Description </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan</a>
                          <a href="{{route('allpost.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Post</a>
                          <a href="{{route('applyloan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Apply Loan</a>
                         <!-- Chairman Page end here   -->
                        </div>  <hr>
                        
                         <div class="card-body">
                          <h5 class="card-title text-primary"> Legal Aid Page   🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Legal Aid All Service </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary"> Awareness and Training Page   🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Awareness and Training Details </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary"> Midiation Page   🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Midiation Details </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary"> Publie Interest Litigation Page   🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Publie Interest Litigation Details </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary"> Litigation Page   🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('micro_service.all')}}" class="btn btn-sm btn-outline-primary mt-2">Litigation Details </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary"> Gellary 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Photo Gellary 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('photo_gallery.all')}}" class="btn btn-sm btn-outline-primary mt-2">Photo Gellary</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Photo Gellary 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('video_gallery.all')}}" class="btn btn-sm btn-outline-primary mt-2">Video Gellary</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Feild Storise Page  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('field_storise.all')}}" class="btn btn-sm btn-outline-primary mt-2">Feild Storise </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">News / Feeds  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allpost.all')}}" class="btn btn-sm btn-outline-primary mt-2">all News  </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">All Blogs  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allpost.all')}}" class="btn btn-sm btn-outline-primary mt-2">all Blogs  </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">All Events  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allpost.all')}}" class="btn btn-sm btn-outline-primary mt-2">all Events  </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">All Projects  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allprojects.all')}}" class="btn btn-sm btn-outline-primary mt-2">all Projects  </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Volunteer Page  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allabout.all')}}" class="btn btn-sm btn-outline-primary mt-2">About Volunteer</a>
                          <a href="{{route('allprojects.all')}}" class="btn btn-sm btn-outline-primary mt-2">Projects Overview Count</a>
                          <a href="{{route('allstaff.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Volunteer </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Become Volunteer Page  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('becomevolunteer.all')}}" class="btn btn-sm btn-outline-primary mt-2">Become Volunteer Form</a>
                          <a href="{{route('allstaff.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Volunteer </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Other Program and Activitis  Page  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allpost.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Program </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">OUR VALUEABLE DONOR Page  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('member_donner.all')}}" class="btn btn-sm btn-outline-primary mt-2">  All Valueable Donor </a>
                          <a href="{{route('allprojects.all')}}" class="btn btn-sm btn-outline-primary mt-2">  Project Overview </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Product For Human Being Page  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Product Page Desction </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan </a>
                          <a href="{{route('allabout.all')}}" class="btn btn-sm btn-outline-primary mt-2">About Product Cration </a>
                          <a href="{{route('product.all')}}" class="btn btn-sm btn-outline-primary mt-2"> All Product </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Free Health Campaign Page  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allabout.all')}}" class="btn btn-sm btn-outline-primary mt-2">about Free Health Campaign </a>
                          <a href="{{route('allprojects.all')}}" class="btn btn-sm btn-outline-primary mt-2">Successfull Campaign </a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Campaign Description </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Our Impact Page  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allprojects.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Projects </a>
                          <a href="{{route('ourimpact.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Impact </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Our Team Page  🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('allstaff.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Team for all Team Page  </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Contact Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{url('admin/dashboard/manage-application/phone')}}" class="btn btn-sm btn-outline-primary mt-2">Contact Numer </a>
                          <a href="{{url('admin/dashboard/manage-application/email')}}" class="btn btn-sm btn-outline-primary mt-2">Contact Email </a>
                          <a href="{{url('admin/dashboard/manage-application/address')}}" class="btn btn-sm btn-outline-primary mt-2">Address </a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Make Donation Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('whaydonate.all')}}" class="btn btn-sm btn-outline-primary mt-2">Whay Donate </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan for Donation </a>
                          <a href="{{route('allprojects.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Projects</a>
                        </div>  <hr>
                         <!-- Chairman Page end here   -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Make Donation Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('whaydonate.all')}}" class="btn btn-sm btn-outline-primary mt-2">Whay Donate </a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan for Donation </a>
                          <a href="{{route('allprojects.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Projects</a>
                        </div><hr>
                         <!-- Chairman Page end here -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Internship & Course Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Page Description</a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan</a>
                          <a href="{{route('course.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Course</a>
                          <a href="{{route('bannerbottom.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner Bottom</a>
                        </div><hr>
                         <!-- Chairman Page end here -->
                         <div class="card-body">
                          <h5 class="card-title text-primary">Career And Job Page 🎉</h5>
                          <p class="mb-4">We Will Provide all Usefull Links <span class="fw-bold">for</span> Manage Entair Website Specifice Page  Content and images .</p>
                          <!-- all link is start here  -->
                          <a href="{{route('allbanner.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner</a>
                          <a href="{{route('page_desc.all')}}" class="btn btn-sm btn-outline-primary mt-2">Page Description</a>
                          <a href="{{route('slogan.all')}}" class="btn btn-sm btn-outline-primary mt-2">Slogan</a>
                          <a href="{{route('jobpost.all')}}" class="btn btn-sm btn-outline-primary mt-2">All Jobs</a>
                          <a href="{{route('bannerbottom.all')}}" class="btn btn-sm btn-outline-primary mt-2">Banner Bottom</a>
                        </div><hr>
                         <!-- Chairman Page end here -->












                      </div>
                    </div>
                  </div>
                </div>
            <!-- usefull page link end  -->
        </div>
    </div>
</section>








@endsection 