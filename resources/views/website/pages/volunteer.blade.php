@extends('layouts.webmaster')
@section('web_content')  
  <main>
    <section class="contact_banner">
        <div class="bannerbg">
            <div class="container ">
                <div class="row justify-content-sm-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_contents">
                         <h1>Our Volunteer</h1>
                        </div>
                    </div>
                    <!-- col end  -->
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end here  -->
<section class=" volunteerbody">
<div class="vbg">
    <div class="container section-padding">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 ">
                <div class="common_about_image">
                    <img src="{{asset('contents/assets/website')}}/assets/img/volunteers_about2.jpg" alt=""  class="img-fluid" style="border-top-left-radius:30px ;">
                    <div class="other_imge">
                        <img src="{{asset('contents/assets/website')}}/assets/img/volunteer_about3.jpg" alt="">
                    </div>
                </div>
                <!-- end  -->
            </div>
            <!-- col end  -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 mt-sm-4 mt-md-4 ">
                <div class="common_about_content">
                   <p> <i class="fas fa-angle-double-left"></i><strong> about volunteer  </strong> <i class="fas fa-angle-double-right"></i></p>
                   <h1>We Help Our Clients To Achieve Their Desire Goals</h1>
                   <p class="about_1">Human and Nature Development Society (HANDS) is micro-credit lending
                    organisation. HANDS is also working as charitable organization and it needs skilled
                    manpower to perform its activities in the rural area of the country.</p>
                    <p class="about_1">HANDS always encourages youngsters who are honest, enthusiastic and hard
                        working to work with HANDS by using their valuable time to work as a volunteer
                        and team HANDS is happy to call for help from those people to work as a
                        volunteer to develop their talents as well as utilize their time and skills to work as
                        a dedicated soul to achieve the objectives and goals of the organization. \these
                        includes:</p>

                <div class="comon_overview">
                    <div class="overview">
                        <div class="icon"><span> <i class="fas fa-hand-holding-heart"></i></span></div>
                        <div class="common_count">
                            <strong> 45 </strong>
                            <p> success projects</p>
                        </div>
                    </div>
                    <!-- end  -->
                    <div class="overview">
                        <div class="icon"><span> <i class="fas fa-users"></i></span></div>
                        <div class="common_count">
                            <strong> 03 </strong>
                            <p> Upcoming projects</p>
                        </div>
                    </div>
                    <!-- end  -->
                    <div class="overview">
                        <div class="icon"><span> <i class="fas fa-users"></i></span></div>
                        <div class="common_count">
                            <strong> 02 </strong>
                            <p> Runing projects</p>
                        </div>
                    </div>
                    <!-- end  -->
                </div>
                </div>
                <!-- end  -->
            </div>
            <!-- col end  -->
        </div>
    </div>
</div>
</section>
<!-- volunter about end here  -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box14 profile">
                    <img class="pic-1" src="{{asset('contents/assets/website')}}/assets/img/11.jpeg">
                    <div class="box-content">
                        <h3 class="title">Sadia Afrin Lupa</h3>
                        <span class="post">Volunteer</span>
                        <ul class="icon">
                            <li><a href="volunteer_detail.html"><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- col end  -->
            <div class="col-lg-4">
                <div class="box14 profile">
                    <img class="pic-1" src="{{asset('contents/assets/website')}}/assets/img/it.jpg">
                    <div class="box-content">
                        <h3 class="title">Israt Jahan Trisha</h3>
                        <span class="post">Volunteer</span>
                        <ul class="icon">
                            <li><a href="volunteer_detail.html"><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- col end  -->
            <div class="col-lg-4">
                <div class="box14 profile">
                    <img class="pic-1" src="{{asset('contents/assets/website')}}/assets/img/it2.jpeg">
                    <div class="box-content">
                        <h3 class="title">Israt jahan Trisha</h3>
                        <span class="post"> Volunteer</span>
                        <ul class="icon">
                            <li><a href="volunteer_detail.html"><i class="fa fa-link"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- col end  -->


        </div>
        <!-- row en  -->
        <nav aria-label="...">
            <ul class="pagination mt-4">
              <li class="page-item disabled">
                <span class="page-link">Previous</span>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active" aria-current="page">
                <span class="page-link">2</span>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
    </div>
</section>

    <!-- ========  main content end herre  -->
  </main>

@endsection