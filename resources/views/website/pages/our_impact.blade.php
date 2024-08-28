@extends('layouts.webmaster')
@section('web_content')  
  <main>
    <section class="team_banner">
        <div class="banner_3_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1> Our Social  <span style="color: red;"> Impact </span>  </h1>
                            <a href="index.html">Home /</a>
                            <a href="valueable_donner.html"> Our Donner </a>
                        </div>
                    </div>
                    <!-- col end  -->
                </div>
            </div>
        </div>
    </section>
    <!-- banner end  -->
 
   <section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                <div class="Our_impact_area">
                    <div class="impact_image">
                        <figure class="image_figure">
                            <img src="{{asset('contents/assets/website')}}/assets/img/street_children_1_0.jpg" alt="Trulli" class="img-fluid">
                            <figcaption class="p-2">Image caption </figcaption>
                        </figure>
                    </div>
                    <div class="impect_content pt-4">
                        <h1 class="pb-2">image title is here </h1>
                       <p class="pb-4"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae tenetur neque ratione reprehenderit! Voluptatem sequi tempore consectetur? Architecto fugiat at, distinctio ipsa hic eos quisquam eum minus itaque tempore nostrum sit beatae, consectetur molestias sapiente omnis odio nihil quia. Maxime sit ut assumenda consectetur voluptatum? Quis esse et expedita. In, quia totam, necessitatibus ratione obcaecati dicta ipsa unde culpa nisi dignissimos provident vero minus voluptatem delectus! Minima repellendus quaerat nostrum quis quo earum unde quia, consectetur dolorum .</p>
                       <div class="impect_slogan">
                        <p> * Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur placeat sequi voluptate voluptatibus perspiciatis minus nihil debitis at quo architecto, atque beatae ad vel pariatur ab iure, sunt, tenetur eius!  * </p>
                       </div>
                       <p class="pb-4"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae tenetur neque ratione reprehenderit! Voluptatem sequi tempore consectetur? Architecto fugiat at, distinctio ipsa hic eos quisquam eum minus itaque tempore nostrum sit beatae, consectetur molestias sapiente omnis odio nihil quia. Maxime sit ut assumenda consectetur voluptatum? Quis esse et expedita. In, quia totam, necessitatibus ratione obcaecati.</p>

                       
                       <section class="text-center border-top border-bottom py-4 mb-4">
                        <p><strong>Share with your friends:</strong></p>
            
                        <button type="button" class="btn btn-primary me-1" data-mdb-ripple-init style="background-color: #3b5998;">
                          <i class="fab fa-facebook-f"></i>
                        </button>
                        <button type="button" class="btn btn-primary me-1" data-mdb-ripple-init style="background-color: #55acee;">
                          <i class="fab fa-twitter"></i>
                        </button>
                        <button type="button" class="btn btn-primary me-1" data-mdb-ripple-init style="background-color: #0082ca;">
                          <i class="fab fa-linkedin"></i>
                        </button>
                        <button type="button" class="btn btn-primary me-1" data-mdb-ripple-init>
                          <i class="fas fa-comments me-2"></i>Add comment
                        </button>
                      </section>
                    </div>
                    <div class="impact_comment">
                        <h6>Comments : </h6>
                            <div class="row comsec">
                                <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                    <img src="{{asset('contents/assets/website')}}/assets/img/razu.jpg" alt="profile" class="img-fluid shadow-1-strong rounded">
                                </div>
                                <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 col-xxl-10">
                                    <h4> md razu hossain raj </h4>
                                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, culpa recusandae. Corrupti exercitationem porro dolorum amet? Nesciunt, repellat. Quia odio distinctio ipsum? Blanditiis at impedit esse repellat sint est. Minus atque culpa porro odio quia labore temporibus non placeat voluptate, dolorum delectus aliquid explicabo id dicta corrupti at doloremque corporis mollitia commodi est maiores eius totam ducimus? Dolor qui magni sequi enim ad blanditiis consectetur facilis </p>
                                </div>
                            </div>
                            <!-- row end here  -->
                            <div class="row comsec">
                                <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                    <img src="{{asset('contents/assets/website')}}/assets/img/it2.jpeg" alt="profile" class="img-fluid shadow-1-strong rounded">
                                </div>
                                <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 col-xxl-10">
                                    <h4> israt jahan trisha</h4>
                                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, culpa recusandae. Corrupti exercitationem porro dolorum amet? Nesciunt, repellat. Quia odio distinctio ipsum? Blanditiis at impedit esse repellat sint est. Minus atque culpa porro odio quia labore temporibus non placeat voluptate, dolorum delectus aliquid explicabo id dicta corrupti at doloremque corporis mollitia commodi est maiores eius totam ducimus? Dolor qui magni sequi enim ad blanditiis consectetur facilis </p>
                                </div>
                            </div>
                            <!-- row end here  -->
                    </div>
                    <div class="comment_impect_form">
                        <p class="text-center p-4"><strong>write your Comment </strong></p>

                        <form>
                          <!-- Name input -->
                          <div class="form-outline mb-4" data-mdb-input-init>
                            <input type="text" id="form4Example1" class="form-control" placeholder="write your name"/>
                          </div>
            
                          <!-- Email input -->
                          <div class="form-outline mb-4" data-mdb-input-init>
                            <input type="email" id="form4Example2" class="form-control" placeholder="write your Email"/>
                          </div>
            
                          <!-- Message input -->
                          <div class="form-outline mb-4" data-mdb-input-init>
                            <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                          </div>
                          <!-- Submit button -->
                          <button type="submit" class="btn btn-primary btn-block mb-4 text-center"  data-mdb-ripple-init> Submit you Comments </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- col end  -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="impact_sidebar mt-4">
                    <div class="impact_video">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/KN2LeNfKgpY?si=MlCrXa0GV_SZVXM7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="impact_sidebar mt-4">
                    <div class="impact_video">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/KN2LeNfKgpY?si=MlCrXa0GV_SZVXM7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
            <!-- col end  -->
        </div>
    </div>
   </section>





<!--  -->
    
    <!-- ========  main content end herre  -->
  </main>
@endsection
