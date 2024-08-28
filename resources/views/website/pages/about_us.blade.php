@extends('layouts.webmaster')
@section('web_content') 

@if(session('message'))
    <div class="alert alert-success" id="sessionMessage">
        {{ session('message') }}
    </div>
@endif
@foreach($banner as $data)
<section class=" aboutbannerbg" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}');">
<div class="aboutbgcolor section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-2 " id="banner_texts" > {{$data->banner_heading}} </h1>
            </div>
        </div>
    </div>
</div>
</section>
@endforeach
<main class="aboutpagebg">
      <section >
      @foreach($aboutus as $data)
            <section class="section-padding">
                <div class="container about_section">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about_us_content">
                                <h1> {{$data->title}} <span>{{$data->subtitle}}</span></h1>
                               <p>{!! $data->caption !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="about_image">
                            <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="hHuman and Nature Development Society (HANDS) Chairman & Founder Image" class="img-fluid">
                           </div>
                        </div>
                    </div>
                </div>
            </section>
    @endforeach
<!-- bout section end  -->

<section class="">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="rivew">
                    <h3>Our Happy Customers & Members</h3>
                    <span> Our Rating : <span> <i class="fa-solid fa-star"></i>  <i class="fa-solid fa-star"></i>  <i class="fa-solid fa-star"></i>  <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star-half-stroke"></i></span> <br><span class="text-white">4.5 (300 + Reviews)</span></span>
                </div>
                <div class="our_happy_customer">
                    <ul>
                        <li><img src="{{asset('contents/assets/website')}}/assets/img/11.jpeg" alt="customer image" class="img-fluid"></li>
                        <li><img src="{{asset('contents/assets/website')}}/assets/img/it2.jpeg" alt="customer image" class="img-fluid"></li>
                        <li><img src="{{asset('contents/assets/website')}}/assets/img/it.jpg" alt="customer image" class="img-fluid"></li>
                        <li><img src="{{asset('contents/assets/website')}}/assets/img/razu.jpg" alt="customer image" class="img-fluid"></li>
                        <li><img src="{{asset('contents/assets/website')}}/assets/img/doctor.jpg" alt="customer image" class="img-fluid"></li>
                    </ul>
                    <span>+ 2500 </span>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
</section>
<!-- section end here  -->
<section class="section-padding " >
    <div class="container ">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2 ">
               <div class="Membership_about row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                    <div class="membership">
                        <div class="members_icon">
                            <img src="{{asset('contents/assets/website')}}/assets/img/otherlogo1.jpg" alt="membership info" class="img-fluid">
                        </div>
                        <div class="members_info">
                            <h4>Technical Hotline Ltd</h4>
                        </div>
                    </div>
                    <!-- end  -->
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                    <div class="membership">
                        <div class="members_icon">
                            <img src="{{asset('contents/assets/website')}}/assets/img/icon/educationicon.jpg" alt="membership info" class="img-fluid">
                        </div>
                        <div class="members_info">
                            <h4>Education.owner</h4>
                        </div>
                    </div>
                    <!-- end  -->
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                    <div class="membership">
                        <div class="members_icon">
                            <img src="{{asset('contents/assets/website')}}/assets/img/otherlogo2.jpg" alt="membership info" class="img-fluid">
                        </div>
                        <div class="members_info">
                            <h4>Web Support IT</h4>
                        </div>
                    </div>
                    <!-- end  -->
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                    <div class="membership">
                        <div class="members_icon">
                            <img src="{{asset('contents/assets/website')}}/assets/img/mylogo.jpg" alt="membership info" class="img-fluid">
                        </div>
                        <div class="members_info">
                            <h4>Universitas Law Chambers</h4>
                        </div>
                    </div>
                    <!-- end  -->
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                    <div class="membership">
                        <div class="members_icon">
                            <img src="{{asset('contents/assets/website')}}/assets/img/icon/healthicon.jpg" alt="membership info" class="img-fluid">
                        </div>
                        <div class="members_info">
                            <h4>Manob Sheba </h4>
                        </div>
                    </div>
                    <!-- end  -->
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                    <div class="membership">
                        <div class="members_icon">
                            <img src="{{asset('contents/assets/website')}}/assets/img/icon/loanicon.png" alt="membership info" class="img-fluid">
                        </div>
                        <div class="members_info">
                            <h4>Logistic Dimand</h4>
                        </div>
                    </div>
                    <!-- end  -->
                </div>
                <!-- col end  -->
               </div>
            </div>
        </div>
    </div>
</section>
<!-- section end here  -->
<section class="section-padding storybg" >
    <div class="container ">
        <div class="row">
        @foreach($whatwedo_head as $data)
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                <div class="our_story_bord">
                    <h3> {{$data->heading}}</h3>
                    <iframe  src="{{$data->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>         
                </div>
            </div>
        @endforeach
        </div>
        <div class="row">
            @foreach($whatwedo as $data)
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 ">
                <div class="service_overview">
                    <div class="over_cont">
                        <h4>{{$data->title}}</h4>
                        <p>{!! $data->caption !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@foreach($security as $data)
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2" >
                <div class="row">
                    <div class="col-lg-4">
                        <div class="security_image">
                            <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="image" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="trust_content">
                            <button> <span> <i class="fa-solid fa-hands-holding-circle"></i></span> {{$data->heading}} </button>
                            <h2> {{$data->title}} </h2>
                            <p>{!! $data->caption !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- section end  -->

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                <div class="ready_to_apply" style="background-image:url('{{asset('contents/assets/website')}}/assets/img/background/Image.png');background-repeat: no-repeat;background-position: center;">
                    <div class="ready_con">
                        <h1>Are you ready to apply for get <span>easy loan</span>  </h1>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit dignissimos cupiditate, iste itaque quibusdam quis quos tenetur molestiae in provident doloribus sunt veritatis ab eligendi dolorem nemo, autem odio. Maiores eveniet, temporibus repudiandae nihil iusto eos at! Aliquid, totam excepturi eos id, quaerat magnam sunt, ullam ea pariatur voluptas incidunt!</p>
                    </div>
                </div>
            </div>
            <!-- col end -->
        </div>
    </div>
</section>
<!-- section end  -->
<!-- SME or Microfinance end here  -->

<section class="storybg section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="feed">
                    <h1>Happy Customer Feedback</h1>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="owl-carousel owl-theme about_reviws">
                    <div class="our_clients_reviews">
                        <div class="reviews">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa distinctio aliquid, veritatis amet accusamus eos. Architecto, reiciendis nobis! Commodi vel rem recusandae fugit accusamus officiis ut delectus ipsam aperiam voluptatum velit totam, quaerat ab debitis sunt. Aperiam natus delectus sequi dignissimos quisquam iusto libero qui, maxime voluptate ratione, cupiditate illo.</p>
                        </div>
                        <div class="clients_profile">
                            <div class="cl_pro">
                                <img src="{{asset('contents/assets/website')}}/assets/img/it2.jpeg" alt="our Clients Reviws" class="img-fluid">
                            </div>
                            <div class="cl_info">
                                <h2>Israt Jahan Trisha</h2>
                                <span> Technical Hotline Ltd </span>
                            </div>
                        </div>
                    </div>
                    <!-- slider end  -->
                    <div class="our_clients_reviews">
                        <div class="reviews">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa distinctio aliquid, veritatis amet accusamus eos. Architecto, reiciendis nobis! Commodi vel rem recusandae fugit accusamus officiis ut delectus ipsam aperiam voluptatum velit totam, quaerat ab debitis sunt. Aperiam natus delectus sequi dignissimos quisquam iusto libero qui, maxime voluptate ratione, cupiditate illo.</p>
                        </div>
                        <div class="clients_profile">
                            <div class="cl_pro">
                                <img src="{{asset('contents/assets/website')}}/assets/img/it.jpg" alt="our Clients Reviws" class="img-fluid">
                            </div>
                            <div class="cl_info">
                                <h2>Israt Jahan Trisha</h2>
                                <span> Technical Hotline Ltd </span>
                            </div>
                        </div>
                    </div>
                    <!-- slider end  -->
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container section-padding">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
        <div class="">
            <div class="ch_form mx-4" style="background:#fff;border-radius:3rem;box-shadow: rgba(240, 46, 170, 0.4) 5px 5px, rgba(240, 46, 170, 0.3) 10px 10px, rgba(240, 46, 170, 0.2) 15px 15px, rgba(240, 46, 170, 0.1) 20px 20px, rgba(240, 46, 170, 0.05) 25px 25px;">
                <h2 class="pb-2 text-dark">make <span> Reviews</span> now</h2>
                <p class="pb-4 text-dark"><span> Note : </span> please provide your information, we will contact you very soon </p>
                <form action="{{route('testimonial_insert')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4" >
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name"/>
                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                    </div>
                    <!-- name end  -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="organization_name" id="organization_name" class="form-control" placeholder="Optiional! Organization Name"/>
                        <span class="text-danger">@error('organization_name'){{$message}} @enderror</span>
                    </div>
                    <!-- name end -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <textarea name="caption" id="caption" cols="6" style="width: 100%;padding: 1rem;" class="form-control" placeholder="optional! Write your Reviews" ></textarea>
                        <span class="text-danger">@error('caption'){{$message}} @enderror</span>
                    </div>
                    <!-- image -->
                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="file" class="form-control" id="basic-default-fullname" placeholder="profile image" name="service_image"  value="{{old('service_image')}}"/>
                    <span class="text-danger">@error('service_image'){{$message}} @enderror</span>
                    </div>
                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Submit Now </button>
                    </form>
            </div>
        </div>
        </div>
        <!-- col end -->
        <!-- col end -->
    </div>
</div>
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10 offset-lg-1">
                <div class="ready_to_apply" style="background-image:url('{{asset('contents/assets/website')}}/assets/img/background/Image.png');background-repeat: no-repeat;background-position: center;">
                    <div class="ready_con">
                        <h1>HANDS  Always dedicated to the welfare of  <span>people and nature</span>  </h1>
                    </div>
                </div>
            </div>
            <!-- col end -->
        </div>
    </div>
</section>
<!-- section end  -->
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Set a timeout to hide the session message after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            var messageElement = document.getElementById('sessionMessage');
            if (messageElement) {
                messageElement.style.display = 'none';
            }
        }, 3000); // 5 seconds delay
    });
</script>
@endsection