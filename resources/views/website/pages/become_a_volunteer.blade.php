@extends('layouts.webmaster')
@section('web_content')  
<main>
@foreach($banner as $data)
<section class="bcome_volunteer" style="background-image:url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
    <div class="volunteerbg">
        <div class="container section-padding">
            <div class="row justify-content-sm-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 ">
                    <div class="banner_contents">
                     <h1>  {{$data->banner_heading}}</h1>
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
            @if(session('message'))
                <div class="alert alert-success ">
                    {{ session('message') }}
                </div>
            @endif
                <div class="volunteer_application">
                    <div class="application_image">
                        <img src="{{asset('contents/assets/website')}}/assets/img/volunteer.jpg" alt="Volunteer image" class="img-fluid">
                        <div class="application_form">
                           <h1 class="pb-5"> Become A Volunteer  </h1>
                            <div class="application_form_area">
                                <form action="{{route('volunteer_application')}}" method="post">
                                    @csrf
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}"/>
                                 <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}"/>
                                 <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="phone" id="" class="form-control" placeholder="Phone" value="{{old('phone')}}"/>
                                 <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <textarea name="address" id="address" cols="6" style="width: 100%;padding: 1rem;" placeholder="Write your address" >{{old('address')}}</textarea>
                                 <span class="text-danger">@error('address'){{$message}} @enderror</span>
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <textarea name="subject" id="subject" cols="6" style="width: 100%;padding: 1rem;" placeholder=" Write your purpose" >{{old('subject')}}</textarea>
                                 <span class="text-danger">@error('subject'){{$message}} @enderror</span>
                                </div>
                                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Submit Now </button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding meet_v_bg">
    <div class="container-fluid section-padding">
        <div class="row">
            <div class="common_heading text-center pb-5 ">
                <h1>Meet Our Volunteer Team</h1>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="owl-carousel owl-theme meet_volunteers">
                    @foreach($staff as $data)
                    <div class="meet_our_volunteer">
                        <div class="volunteer_image">
                            <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="volunteer image" class="img-fluid">
                        </div>
                        <div class="volunteer_info pt-2">
                            <h3><a href="{{route('volunteer_details',$data->slug)}}">{{$data->name}}</a></h3>
                            <strong>{{$data->designation}}</strong>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection

