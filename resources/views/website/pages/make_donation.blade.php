@extends('layouts.webmaster')
@section('web_content') 
  <main>
  <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                <div class="ch_about">
                    <div class="ch_about_content p-4">
                        @foreach($whydonateh as $data)
                        <h1>{{$data->heading}} <span>{{$data->subtitle}}</span></h1>
                        <p class="pb-5">{!! $data->caption !!}</p>
                        @endforeach
                        <div class="row ">
                            @foreach($whydonate as $data)
                            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6 mt-4">
                                <div class="ch_box_content">
                                    <h4> <span> <i class="far fa-heart"></i> </span> {{$data->title}} </h4>
                                    <p>{!! $data->des !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="ch_donate_form">
                        <div class="ch_form">
                            <h2 class="pb-2">make <span> Donation</span> now</h2>
                            <p class="pb-4"><span> Note : </span> please provide your information, we will contact you very soon </p>
                            @if(session('message'))
                                <div class="alert alert-success ">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <form action="{{route('donation_submit')}}" method="post">
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
                <!-- col end  -->
            </div>
        </div>
    </section>
@foreach($slogan as $data)
<section class="make_D_image" style="background-image:url('{{asset('uploads/website/'.$data->service_image)}}')">
    <div class="make_donation_quickbg">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                    <div class="make_donation_quick">
                        <h1 class="pb-2">{{$data->heading}}</h1>
                        <h3 class="pb-2">{{$data->title}} </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- ========  main content end herre  -->
 <section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="ch_about_content">
                <h2 class="pb-2 pt-2">Our <span> Valueable</span> Donor </h2>
                </div>
        
                <div class="row">
                    @foreach($alldoner as $data)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mt-4 ">
                        <div class="ch_box_content">
                            @if($data->name !="" && $data->or_name != "")
                            <h4> <span> <i class="far fa-heart"></i> </span>{{$data->or_name}} </h4>
                            @elseif($data->name !="")
                            <h4> <span> <i class="far fa-heart"></i> </span>{{$data->name}} </h4>
                            @else
                            <h4> <span> <i class="far fa-heart"></i> </span>Anonymous participant </h4>
                            @endif
                            <p><span><i class="fa-solid fa-location-dot"></i> </span>{{$data->address}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            <!--  -->
            </div>
            <!-- cole end  -->
        </div>
    </div>
 </section>
  </main>
@endsection