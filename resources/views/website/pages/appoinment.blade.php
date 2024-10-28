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
                        <p class="pb-5">Time is running out, so don’t delay in taking advantage of this opportunity to advance your mission and secure the support you need. Our streamlined process ensures you get the assistance you need quickly and efficiently.</p>
                    </div>
                </div>
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-8 col-lg-5 col-xl-5 col-xxl-5">
                @if(session('message'))
                    <div class="alert alert-success ">
                        {{ session('message') }}
                    </div>
                @endif
                    <div class="jobbanner">
                        <div class="p-4 ch_form" style="background:rgba(19, 34, 63, 1)">
                            <h2 class="pb-2 ">make <span> your Appoinment</span> now</h2>
                            <p class="pb-4"><span> Note : </span> please provide your information, we will contact you very soon </p>
                            <form action="{{route('appoinment_book')}}" method="POST">
                                @csrf
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}"/>
                                 <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                </div>
                                <!-- name end -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}"/>
                                 <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                </div>
                                <!-- name end -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <input type="text" name="phone" id="" class="form-control" placeholder="Phone" value="{{old('phone')}}"/>
                                 <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                                </div>
                                <!-- address -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <textarea name="address" id="address" cols="6" style="width: 100%;padding: 1rem;" placeholder="Write your address" >{{old('address')}}</textarea>
                                 <span class="text-danger">@error('address'){{$message}} @enderror</span>
                                </div>
                                <!-- address -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                 <textarea name="subject" id="subject" cols="6" style="width: 100%;padding: 1rem;" placeholder=" Write your purpose" >{{old('subject')}}</textarea>
                                 <span class="text-danger">@error('subject'){{$message}} @enderror</span>
                                </div>
                                <!-- Submit button -->
                                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Submit Now </button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>
@endsection