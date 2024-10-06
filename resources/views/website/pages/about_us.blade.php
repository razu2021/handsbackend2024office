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
<main class="">
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
                        @foreach($customer as $data)
                        @if($data->service_image !="")
                        <li><img src="{{asset('uploads/website/customer/'.$data->service_image)}}" data-src="{{asset('uploads/website/customer/'.$data->service_image)}}" alt="Customer of HANDS {{$data->name}} profile image" class="img-fluid lazyload"></li>
                        @else
                        <li><img src="{{asset('contents/assets/website')}}/assets/img/profile-picture.png" alt="Customer of HANDS {{$data->name}} profile image" class="img-fluid"></li>
                        @endif
                        @endforeach
                    </ul>
                    <span>{{$customercount}} +</span>
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 ">
               <div class="Membership_about row">
               @foreach($member as $data)
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                    <div class="membership">
                        <div class="members_icon">
                        @if($data->service_image !="" && $data->or_logo !="")
                            <img src="{{asset('uploads/website/'.$data->or_logo)}}" alt="Donor Organization image">
                        @elseif($data->service_image != "")
                            <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Donor Image">
                        @elseif($data->or_logo !="")
                            <img src="{{asset('uploads/website/'.$data->or_logo)}}" alt="Donor Organization image">
                        @else
                            <img src="{{asset('contents/assets/website')}}/assets/img/profile-picture.png" alt="Hands logo">
                        @endif
                        </div>
                        <div class="members_info">
                            @if($data->name !="" && $data->or_name !="")
                            <h4>{{$data->or_name}}</h4>
                            @elseif($data->name !="")
                            <h4>{{$data->name}}</h4>
                            @else
                            <h4>Anonymous participant</h4>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
               </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding">
    <div class="container">
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
    </div>
</section>
<section class="section-padding storybg" >
    <div class="container">
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
                    @foreach($testi as $data)
                    <div class="our_clients_reviews">
                        <div class="reviews">
                            <p>{!! Str::words($data->caption,50) !!}</p>
                        </div>
                        <div class="clients_profile">
                            <div class="cl_pro">
                                @if($data->service_image !="")
                                <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="our Clients Reviws" class="img-fluid">
                                @else
                                <img src="{{asset('contents/assets/website')}}/assets/img/profile-picture.png" alt="our Clients Reviws" class="img-fluid">
                                @endif
                            </div>
                            <div class="cl_info">
                                <h2>{{$data->name}}</h2>
                                @if($data->organization_name !="")
                                <span> {{$data->organization_name}} </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                <p class="pb-4 text-dark"><span> Note : </span> please provide your Reviews, we will Reviews your Messages very soon than we Published !</p>
                <form action="{{route('testimonial_insert')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4" >
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}"/>
                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                    </div>
                    <!-- name end  -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="organization_name" id="organization_name" class="form-control" placeholder="Optiional! Organization Name" value="{{old('organization_name')}}"/>
                        <span class="text-danger">@error('organization_name'){{$message}} @enderror</span>
                    </div>
                    <!-- name end -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <textarea name="caption" id="caption" cols="6" style="width: 100%;padding: 1rem;" class="form-control" placeholder="optional! Write your Reviews" value="{{old('caption')}}"> {{old('caption')}}</textarea>
                        <span class="text-danger">@error('caption'){{$message}} @enderror</span>
                    </div>
                    <!-- image -->
                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="file" class="form-control" id="basic-default-fullname" placeholder="profile image" name="service_image"  value="{{old('service_image')}}"/>
                    <span class="text-danger">@error('service_image'){{$message}} @enderror</span>
                    </div>
                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Submit Review Now </button>
                    </form>
            </div>
        </div>
        </div>
    </div>
</div>
@foreach($slogan as $data)
<section class="make_D_image" style="background-image:url('{{asset('uploads/website/'.$data->service_image)}}')">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                    <div class="make_donation_quick">
                        <h1 class="pb-2">{{$data->heading}}</h1>
                        <h3 class="pb-2">{{$data->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
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