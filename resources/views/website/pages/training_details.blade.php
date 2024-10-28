@extends('layouts.webmaster')
@section('web_content') 
<main>
<!-- section end herre  -->
@foreach($banner as $data)
<section class="section-padding" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}');background-repeat: no-repeat;background-position: center;background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-2 " id="banner_texts" > {{$data->banner_heading}}</h1>
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- section end  -->
<section class="section-padding">
    <div class="container">
        <div class="col-lg-10 offset-lg-1">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                    <div class="training_details_area">
                        <div class="tr_details_image">
                            <img src="{{asset('uploads/website/'.$data->service_bg_image)}}" alt="{{$data->course_title}} image" class="img-fluid">
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="training_details_content">
                                    <h4>{{$data->course_title}}<span> /    @php
                                    $postedAt =  \Carbon\Carbon::parse($data->created_at); // The date and time the post was created
                                    $currentDateTime = new DateTime(); // Current date and time
                                    // Create DateTime objects for the post's creation time and the current time
                                    $postedTime = new DateTime($postedAt);
                                    // Calculate the time difference
                                    $timeDifference = $postedTime->diff($currentDateTime);
                                    // Display the posting time in a user-friendly format
                                    if ($timeDifference->y > 0) {
                                        echo $timeDifference->y . " year" . ($timeDifference->y > 1 ? "s" : "") . " ago";
                                    } elseif ($timeDifference->m > 0) {
                                        echo $timeDifference->m . " month" . ($timeDifference->m > 1 ? "s" : "") . " ago";
                                    } elseif ($timeDifference->d > 0) {
                                        echo $timeDifference->d . " day" . ($timeDifference->d > 1 ? "s" : "") . " ago";
                                    } elseif ($timeDifference->h > 0) {
                                        echo $timeDifference->h . " hour" . ($timeDifference->h > 1 ? "s" : "") . " ago";
                                    } elseif ($timeDifference->i > 0) {
                                        echo $timeDifference->i . " minute" . ($timeDifference->i > 1 ? "s" : "") . " ago";
                                    } else {
                                        echo "Just now";
                                    }
                                @endphp  </span></h4>
                                    <p> <span> <i class="fa-solid fa-location-dot"></i> </span> {{$data->course_location}}</p>
                                    <p> <span> <i class="fa-solid fa-link"></i></span>apply With : <span> <a href="{{$data->app_instruction}}"> {{$data->app_instruction}}</a></span></p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="tr_apply_button">
                                    <button class="btn btn-success"><a href="#apply_form">Apply Now</a></button>
                                    <p> Dadeline : <span> {{$data->app_deadline}}</span> </p>
                                </div>
                            </div>
                        </div>
                        <div class="training_des">
                            <h4>About <span>{{$data->course_title}}</span> Course Curriculum</h4>
                            <p>{!! $data->caption !!}</p>
                        </div>
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-4">
                    <div class="course_siderbar_overvew">
                        <h4>Course Information </h4>
                        <div class="course_overview mt-4 ">
                            <div class="overview_content">
                                <ul>
                                    <li><span> <i class="fa-solid fa-calendar-days"></i></span> Course Duration: {{$data->course_duration}}</li>
                                    <li><span> <i class="fa-solid fa-calendar-days"></i></span> Class Duration : {{ $data->class_duration}}</li>
                                    <li><span> <i class="fa-solid fa-calendar-days"></i></span>Total Class : {{ $data->total_class}}</li>
                                    <li><span><i class="fa-regular fa-circle-dot"></i></span> Target Application : {{$data->app_target}}</li>
                                    <li><span> <i class="fa-regular fa-circle-dot"></i></span> Raised Application : {{$apply_count}}</li>
                                </ul>
                            </div>
                        </div>
                        <!-- course overview end  -->
                        <div class="course_overview mt-4 ">
                            <div class="overview_content over_contents">
                                <div class="ov_icon">
                                    <span><i class="fa-solid fa-calendar-days"></i></span>
                                </div>
                                <div class="ov_content">
                                    <small class="text-muted">Date Posted </small>
                                    <p>{{$data->created_at->format('d-F-Y')}}</p>
                                </div>
                            </div>
                            <div class="overview_content over_contents">
                                <div class="ov_icon">
                                    <span><i class="fa-solid fa-calendar-days"></i></span>
                                </div>
                                <div class="ov_content">
                                    <small class="text-muted">Course Start </small>
                                    <p>{{ \Carbon\Carbon::parse($data->course_start)->format('d-F-Y') }}</p>
                                </div>
                            </div>
                            <div class="overview_content over_contents">
                                <div class="ov_icon">
                                    <span><i class="fa-solid fa-calendar-days"></i></span>
                                </div>
                                <div class="ov_content">
                                    <small class="text-muted">Course End </small>
                                    <p>{{ \Carbon\Carbon::parse($data->course_end)->format('d-F-Y') }}</p>
                                </div>
                            </div>

                            <div class="overview_content over_contents">
                                <div class="ov_icon">
                                    <span><i class="fa-regular fa-clock"></i></span>
                                </div>
                                <div class="ov_content">
                                    <small class="text-muted">Class Start</small>
                                    <p>{{ \Carbon\Carbon::parse($data->class_start)->format('H:i A') }}</p>
                                </div>
                            </div>
                            <div class="overview_content over_contents">
                                <div class="ov_icon">
                                    <span><i class="fa-regular fa-clock"></i></span>
                                </div>
                                <div class="ov_content">
                                    <small class="text-muted">Class End</small>
                                    <p>{{ \Carbon\Carbon::parse($data->class_end)->format('H:i A') }}</p>
                                </div>
                            </div>
                            <!-- - -->
                            <div class="overview_content over_contents">
                                <div class="ov_icon">
                                    <span><i class="fa-solid fa-user-graduate"></i></span>
                                </div>
                                <div class="ov_content">
                                    <small class="text-muted">Education Background </small>
                                    <p> {{$data->app_education}} </p>
                                </div>
                            </div>
                            <!-- - -->
                            <div class="overview_content over_contents">
                                <div class="ov_icon">
                                    <span><i class="fa-solid fa-person-half-dress"></i></span>
                                </div>
                                <div class="ov_content">
                                    <small class="text-muted">Gender</small>
                                    <p>{{$data->app_gender}}</p>
                                </div>
                            </div>
                            <!-- - -->
                            <div class="overview_content over_contents">
                                <div class="ov_icon">
                                    <span><i class="fa-solid fa-certificate"></i></span>
                                </div>
                                <div class="ov_content">
                                    <small class="text-muted">Certificate Note:  </small>
                                    <p>{{$data->certificate}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-padding jobbanner" id="apply_form">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                    <div class="">
                        <div class="">
                            <h2 class="pb-2">Apply  <span>for </span> Training & Internship </h2>
                            <p class="pb-4"><span> Note : </span> please provide your information, we will contact you very soon </p>
                            <form action="{{route('apply_course')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <select class="form-control" name="course_name" id="course_name">
                                                <option value="">Select your Course</option>
                                                @foreach($course as $data)
                                                <option value="{{$data->course_title}}">{{$data->course_title}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('course_name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="First Name " value="{{old('name')}}"/>
                                            <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Current Occupation" value="{{old('occupation')}}"/>
                                            <span class="text-danger">@error('occupation'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" name="email" id="name" class="form-control" placeholder="Email " value="{{old('email')}}"/>
                                            <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone " value="{{old('phone')}}"/>
                                            <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="age" id="age" class="form-control" placeholder="age " value="{{old('age')}}"/>
                                            <span class="text-danger">@error('age'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                           <select class="form-control" name="gender" id="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">other</option>
                                           </select>
                                           <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="education" id="education" class="form-control" placeholder="Last Education Background" value="{{old('education')}}"/>
                                            <span class="text-danger">@error('education'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{old('address')}}"/>
                                            <span class="text-danger">@error('address'){{$message}} @enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <textarea name="caption" id="caption"  rows="4" placeholder="Write your Massages Optional!" style="width: 100%;padding: 1rem;">{{old('caption')}}</textarea>
                                        </div>
                                    </div>
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





    <!-- ========  main content end herre  -->
  </main>

@endsection