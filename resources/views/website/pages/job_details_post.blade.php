@extends('layouts.webmaster')
@section('web_content')   
  <main>
<section class="jobbanner">
    <div class="jobbannerbg">
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8 offset-lg-2">
                    <div class="job_details_area">
                        <div class="details_header_image">
                            <div class="details_header_bg">
                                <div class="header_content">
                                    @if($data->service_image != "")
                                    <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Job and Career opertunity Image " class="img-fluid">
                                    @else
                                    <img src="{{asset('contents/assets/website')}}/assets/img/avatar.jpg" alt="logo" class="img-fluid" style="border-radius:.8rem">
                                    @endif
                                    <h1>{{$data->name}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="job_details_content">
                            <h4> {{$data->title}}</h4>
                            <p>{!! $data->caption !!}</p>
                            <div class="job_des_footer">
                            <h5>Application Instruction </h5>
                            <button class="btn btn-success"> <a href="{{$data->app_instruction}}">Apply Now</a></button>
                            <h6> or </h6>
                            <h6> <a href="mailto:ulcbd786@gmail.com">Send your resume at: {{$data->app_mail}}</a> </h6>
                            <h4>Application Deadline: {{$data->app_deadline}} </h4>
                        </div>
                            <div class="job_details_address">
                                <h3>{{$data->name}}</h3>
                                <p><a href="#"><strong>Address: </strong> {{$data->location}}</a> </p>
                                <p><a href="#"><strong>NOTE-:</strong> {{$data->note}}</a></p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection