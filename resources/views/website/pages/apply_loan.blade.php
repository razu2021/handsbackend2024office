@extends('layouts.webmaster')
@section('web_content') 
  <main>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4">
                <div class="appoinment_about">
                    <div class="app_about_content p-4">
                        <h1>Don't miss out!  <span>[ Book your appointment ]</span>  before it's too late.</h1>
                        <p class="pb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe nihil nulla, facilis placeat at quaerat exercitationem, reprehenderit itaque provident dolore molestias eius asperiores tempore minima a possimus nisi sunt quo.</p>
                    </div>
                </div>
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                    <div class="ch_donate_form">
                        <div class="ch_form">
                            <h2 class="pb-2">Apply  <span>for Loan </span> now</h2>
                            <p class="pb-4"><span> Note : </span> please provide your information, we will contact you very soon </p>
                            <p>     
                             @if(session('message'))
                                <div class="alert alert-success ">
                                    {{ session('message') }}
                                </div>
                            @endif
                            </p>
                    
                            <form action="{{route('loan_application')}}" method="post">
                                @csrf 
                                <!-- item strat  -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name " value="{{old('fname')}}"/>
                                            <span class="text-danger">@error('fname'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <!-- first name end -->
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name " value="{{old('lname')}}"/>
                                            <span class="text-danger">@error('lname'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <!-- last name end  -->
                                </div>
                                <!--------- row end ------->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email " value="{{old('email')}}"/>
                                            <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <!-- first name end -->
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone " value="{{old('phone')}}"/>
                                            <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <!-- last name end  -->
                                </div>
                                <!--------- row end ------->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="nid" id="nid" class="form-control" placeholder="NID Number " value="{{old('nid')}}"/>
                                            <span class="text-danger">@error('nid'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <!-- first name end -->
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder=" NID No" value="{{old('birth_date')}}"/>
                                            <span class="text-danger">@error('birth_date'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <!-- last name end  -->
                                </div>
                                <!--------- row end ------->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="occupation" id="occupation" class="form-control" placeholder="occupation!" value="{{old('occupation')}}"/>
                                            <span class="text-danger">@error('occupation'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <!-- first name end -->
                                    <div class="col-lg-4">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="number" name="monthly_income" id="monthly_income" class="form-control" placeholder="Monthly Income " value="{{old('monthly_income')}}"/>
                                            <span class="text-danger">@error('monthly_income'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <!-- last name end  -->
                                    <div class="col-lg-4">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="number" name="target_amount" id="target_amount" class="form-control" placeholder="Loan Amount" value="{{old('target_amount')}}"/>
                                            <span class="text-danger">@error('target_amount'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <!-- last name end  -->
                                </div>
                                <!--------- row end ------->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                           <select name="loan_category" id="loan_category" style="width: 100%; padding: .7rem ;">
                                            <option value="">Select your Loan Catagorys</option>
                                            @foreach($micro as $data)
                                            <option value="{{$data->title}}">{{$data->title}}</option>
                                            @endforeach
                                           </select>
                                           <span class="text-danger">@error('loan_category'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <!-- first name end -->
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                           <select name="branch_name" id="branch_name" style="width: 100%;padding: .7rem;">
                                                <option value="">Select Your Branch Name</option>
                                                @foreach($branch as $data)
                                                <option value="{{$data->name}}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('branch_name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <!-- last name end  -->
                                </div>
                                <!--------- row end ------->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Address !" value="{{old('address')}}">
                                            <span class="text-danger">@error('address'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <textarea name="caption" id="caption"  rows="4" placeholder="Write your Massages" style="width: 100%;padding: 1rem;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--------- row end ------->
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