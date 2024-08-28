@extends('layouts.webmaster')
@section('web_content')  
  <main>
    <section class="team_banner">
        <div class="banner_3_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1> Hands Programe<span style="color: red;"> Storis </span>  </h1>
                            <a href="index.html">Home /</a>
                            <a href="gallery.html"> Gallery </a>
                        </div>
                    </div>
                    <!-- col end  -->
                </div>
            </div>
        </div>
    </section>
    <!-- banner end  -->
<section class="section_position section-padding">
    <div class="bg_top"><img src="{{asset('contents/assets/website')}}/assets/img/vactor/shap1.png" alt=""></div>
    <div class="container">
        <div class="row">
            <div class="case_heading">
                <h1> HANDS <b> Programes </b></h1>
                <span> <i class="fas fa-hand-holding-heart"></i> </span>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-sm-4">
                <div class="service_card">
                    <div class="service_content">
                       <div class="service_icon">
                            <span><i class="fa-solid fa-scale-balanced"></i></span>
                       </div>
                       <div class="services_contents">
                            <h3>Photo Gallery</h3>
                            <p class="pb-4"> Human and Nature Development Society (HANDS) all programe and photo Gallery is here . </p>
                            <a href="photo.html"><span> <i class="fa-solid fa-arrow-right"></i> </span> Read more </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end  -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-sm-4">
                <div class="service_card">
                    <div class="service_content">
                       <div class="service_icon">
                            <span><i class="fa-solid fa-scale-balanced"></i></span>
                       </div>
                       <div class="services_contents">
                            <h3>Video Gallery </h3>
                            <p class="pb-4">Human and Nature Development Society (HANDS) all programe and Video Gallery is here ..</p>
                            <a href="video.html"><span> <i class="fa-solid fa-arrow-right"></i> </span> Read more </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end  -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-sm-4">
                <div class="service_card">
                    <div class="service_content">
                       <div class="service_icon">
                            <span><i class="fa-solid fa-scale-balanced"></i></span>
                       </div>
                       <div class="services_contents">
                            <h3> Our Feild Storis</h3>
                            <p class="pb-4">Human and Nature Development Society (HANDS) all programe and Feild storis is here .</p>
                            <a href="feild_strois.html"><span> <i class="fa-solid fa-arrow-right"></i> </span> Read more </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end  -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-sm-4">
                <div class="service_card">
                    <div class="service_content">
                       <div class="service_icon">
                            <span><i class="fa-solid fa-scale-balanced"></i></span>
                       </div>
                       <div class="services_contents">
                            <h3>Other's</h3>
                            <p class="pb-4">Human and Nature Development Society (HANDS) all programe and others is heres, </p>
                            <a href="others.html"><span> <i class="fa-solid fa-arrow-right"></i> </span> Read more </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end  -->


        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-sm-4">
            <div class="padgnation d-flex justify-content-center">
                <nav aria-label="Page navigation mt-4">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
            </div>
             
        </div>
        <!-- row end  -->
    </div>
    <div class="bg_bottom"><img src="{{asset('contents/assets/website')}}/assets/img/vactor/shap1.png" alt=""></div>
</section>
    
    <!-- ========  main content end herre  -->
  </main>
@endsection