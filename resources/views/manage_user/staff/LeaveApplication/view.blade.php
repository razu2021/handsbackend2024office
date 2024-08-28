@extends('dashboard')
@section('content')
<section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="app_area bg-white" >
                    <!-- head section  -->
                    <div class="row pt-2" style="border-bottom:3px solid #000 ;margin:0px 10px ">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2  d-flex justify-content-sm-center  justify-content-lg-end">
                            <div class="app_logo">
                                <img src="https://i.ibb.co/nqGjLnZ/mylogo.jpg" alt="App logo">
                            </div>
                        <!-- col end  -->
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-center">
                            <div class="app_title text-center pt-4">
                                <h1 class="m-0 text-capitalize">Universitas law chambers </h1>
                                <h6 class="m-0" > A House of Barristers & Advocates </h6>
                            </div>
                        <!-- col end  -->
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 d-flex  justify-content-sm-center">
                            <div class="app_address">
                                <address>
                                    <span> Room No. 1104 ( 10th Floor )</span><br>
                                    <span> Sahera Tropicale Centre </span><br>
                                    <span> 218, Elephant Road </span><br>
                                    <span> (Bata Signal), Dhaka-1205</span><br>
                                </address>
                            </div>
                        <!-- col end  -->
                        </div>

                    <!-- row end  -->
                    </div>
  <!----------------- head section end here --------------------------- ------------------------>
<section>
    <div class="container bg-white pt-2 ">
        <div class="row">
            <div class="col-lg-3">
                <div class="ref">
                    <p><strong>Ref: </strong> {{$alldata->ref_id}}</p>
                </div>
            </div>
            <div class="col-lg-5 text-center pt-4 ">
                <h4> Leave Request Form</h4>
            </div>
            <div class="col-lg-4 d-flex  justify-content-sm-center">
                <address>
                    <div class="time">
                        <p><strong>Date: </strong> {{$alldata->created_at->format('d-m-y | h:i:s A')}}  </p>
                    </div>
                </address>
            </div>
        </div>
    </div>
</section>
<!--  section end here  -->
{{-- --}}

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="app_head_form">
                <span>Form</span> <br>  
                <span>{{ Auth::user()->name }}</span> <br> 
                @foreach($prodata as $data) 
                <span>{{$data->curent_position}}</span><br>
                <span>{{$data->organization_name}} </span> <br> 
                
                @endforeach
                </div>
                <!-- form head end -->
                <div class="app_date mt-4">
                         @php
                            $appdate = new DateTime($alldata->starting_date);
                        @endphp
                    <p><strong> Date: {{ $appdate->format('d-m-Y') }} </strong> </p>
                </div>
                <!-- from current date  -->
                <div class="app_head_form mt-4">
                    <span>To</span> <br>  
                    <span>Head of chambers</span> <br>  
                    <span>Universitas Law Chambers </span> <br>  
                </div>
                <!-- from to end  -->
                <div class="app_subject mt-4">
                    <h6><strong>Subject: {{$alldata->app_subject}} </strong> </p>
                </div>
                {{--end her  --}}
                <div class="app_dic pb-4">
                    <h6 class="m-0 pb-1"><strong> Dear Sir </strong></h5>
                    <p>{{$alldata->app_diclaration}}</p>
                </div>
                {{-- end hre  --}}
                <div class="main" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;padding:30px ">
                <div class="app_leave_details mt-4" >
                    <h4 class="fw-bold m-0 pb-1"> <ins>Leave Details</ins></h4>
                    <span><strong>Application Type :</strong>
                    {{$alldata->leave_details}}
                    </span><br>
                    <span><strong>Started at   :</strong>
                        @php
                            $dateformat = new DateTime($alldata->starting_date);
                        @endphp
                        {{ $dateformat->format('d-m-Y') }} to
                    </span><br>
                    <span><strong>Endeed  at :</strong>
                    @php
                        $dateformat = new DateTime($alldata->ending_date);
                    @endphp
                    {{ $dateformat->format('d-m-Y') }}
                    </span><br>
                    <span class="text-success">
                        <b style="font-size:25px "> <strong>Total Days :</strong> {{$alldata->request_days + 1}} Days</b>
                    </span><br>
                </div>
                {{-- edn  --}}
                <div class="app_leave_reason mt-4">
                    <h4 class="fw-bold m-0 pb-1"><ins> Leave Reason </ins></h4>
                    <h6 class="fw-bold m-0 pb-1"><strong>Application Reason : {{$alldata->leave_reason}}</strong> </h6>
                    <h6 class="mt-5"><strong>Additional Comments/Explanation (if needed):</strong></h6>
                    @if($alldata->additional_comment !="")
                    <p>{{$alldata->additional_comment}}</p>
                    @else
                        <p>No Additional Comment !</p>
                    @endif
                </div>
                </div>
                {{-- edn  --}}
                <div class="sign mt-4" style="padding:30px ">
                    <h6><strong> Signature : </strong><ins>
                    {{ Auth::user()->name }}
                    </ins></h6>
                </div>
                {{-- end here  --}}
                <div class="contact text-center mt-4">
                    <p><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a> || @foreach($prodata as $data)<a href="tel:+88{{$data->phone}}">phone:+88{{$data->phone}}</a>@endforeach</p>
                </div>
                <div class="note">
                    @if($alldata->post_status ==2)
                    <p class="note note_light bg-light" style="border:1px solid red ;padding:10px;border-radius:8px;">Your application is <b class="text-success">successfully Created</b>, if you want to take leave through to this application, please go to the  <b class="text-warning"><i>home page and submit  this application to the  HR department for your  approval.</i></b><a href="{{url('dashboard/user/leave_application')}}">click here</a></p>
                    @elseif($alldata->post_status == 0)
                    <p class="note note_light " style="border:1px solid green;padding:10px;border-radius:8px;">
                    We wanted to let you know that we have received your <b class="text-warning">leave application</b>.Your application is <b class="text-success">important</b> to us. <b class="text-danger"><i>Please note that</i></b> the review process may take a <strong class="text-warning">One working days</strong>. We appreciate your patience during this time. We understand the significance of your leave request and will inform you promptly once a decision has been reached regarding the status of your application.
                    </p>
                    @endif
                </div>
                <!-- col end here  -->

            </div>
        </div>
    </div>
</section>
<hr>
@if($alldata->post_status == 0)
<section>
    <div class="container pb-4">
        <div class="row">
            <div class="col-lg-12">
            <div class="ap_head text-center fw-bold">
                    <h4><ins>Approval Workflow</ins></h4>
                </div>
                {{-- end here --}}
                <div class="app_head_form mt-4">
                    <span>From</span> <br>  
                    <span>Head of chambers</span> <br>  
                    <span>Universitas Law Chambers </span> <br>  
                </div>
                {{-- end here  --}}
                <div class="app_head_form mt-4">
                    <span>To</span> <br>  
                    <span>{{ Auth::user()->name }}</span> <br> 
                    @foreach($prodata as $data) 
                    <span>{{$data->curent_position}} </span> <br>  
                    <span>{{$data->organization_name}}</span> <br>  
                    @endforeach
                </div>
                {{-- end here  --}}
                <div class="ap_status text-center">
                    <h4 class="text-white d-inline bg-warning" style="padding: 4px;border:1px solid #000;border-radius:5px ">Approval Pending </h4>
                </div>
                <!-- col end  -->
            </div>
        </div>
    </div>
</section>
@elseif($alldata->post_status == 1)
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               
                <div class="ap_head text-center fw-bold">
                    <h4><ins>Approval Workflow</ins></h4>
                </div>
                {{-- end here --}}
                <div class="app_head_form mt-4">
                    <span>From</span> <br>  
                    <span>Head of chambers</span> <br>  
                    <span>Universitas Law Chambers </span> <br>  
                </div>
                {{-- end here  --}}
                <div class="app_head_form mt-4">
                    <span>To</span> <br>  
                    <span>{{ Auth::user()->name }}</span> <br> 
                    @foreach($prodata as $data) 
                    <span>{{$data->curent_position}} </span> <br>  
                    <span>{{$data->organization_name}}</span> <br>  
                    @endforeach 
                </div>
                {{-- end here  --}}
                <div class="ap_status text-center">
                    <h4 class="text-white d-inline bg-success" style="padding: 4px;border:1px solid #000;border-radius:5px ">Approved </h4>
                </div>

                <div class="admin_comment mt-4">
                    <h6> HR Depertment Comments :</h6>
                    <p>{{$alldata->dpt_comment}}</p>
                </div>
                {{-- end  --}}
                <div class="approve_details mt-4">
                    <h6>Aproval Details : </h6>
                    <span><strong>Started at   :</strong>
                        @php
                            $startdateformat = new DateTime($alldata->ap_s_date);
                        @endphp
                        {{ $startdateformat->format('d-m-Y') }} to
                    </span><br>
                    <span><strong>Endeed  at :</strong>
                    @php
                        $enddateformat = new DateTime($alldata->ap_e_date);
                    @endphp
                    {{ $enddateformat->format('d-m-Y') }}
                    </span><br>
                    <span class="text-success">
                        <b style="font-size:25px "> <strong>Approved Days :</strong> {{$alldata->aproved_days + 1}} Days</b>
                    </span><br>
                </div>
                {{-- end here --}}
                <div class="note bg-light  mt-4">
                    <p><strong>Note: </strong> {!! $alldata->note !!}</p>
                </div>
                {{-- end here  --}}
                <div class="instraction mt-4">
                    <h6> Instraction for Employee </h6>
                    <ol>
                        <li>{!! $alldata->instraction !!}</li>
                    </ol>
                </div>
                {{-- end hre  --}}
                <div class="company_info fw-bold pt-4" style="padding-bottom:70px">
                    <span> Universitas law chambers </span><br>
                    <span> website: <a href="www.ulcbd.org">www.ulcbd.org</a></span><br>
                    <span> Phone : <a href="tel:01817078309"> 01817078309</a> </span><br>
                    <span> E-mail : <a href="maito:mdrazuhossarinraj@gmail.com">mdrazuhossainraj@gmail.com</a></span><br>
                    <span> Address: Room No.1104 (10th Floor),
                        Sahera Tropical Center.
                        218 Elephant Road (Bata Signal),
                        Dhaka 1205,Bangladesh 
                    </span>
                </div>
                {{--  aproved sign  --}}
                <div class="row d-flex justify-content-center pb-5">
                    <h6>Approved by Authority </h6>
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="sign_two">
                            <img src="https://i.ibb.co/nqGjLnZ/mylogo.jpg" alt="" style="height:100px;width:auto">
                            <div class="sig">
                                <span>Md Habibur Rahman  </span><br>
                                <span>Head of Chambers  </span><br>
                                <span>Universitas Law Chambers </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- col end  --}}
            </div>
            {{-- row end  --}}
        </div>
    </div>
</section>
@elseif($alldata->post_status == 3)
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               
                <div class="ap_head text-center fw-bold">
                    <h4><ins>Approval Workflow</ins></h4>
                </div>
                {{-- end here --}}
                <div class="app_head_form mt-4">
                    <span>From</span> <br>  
                    <span>Head of chambers</span> <br>  
                    <span>Universitas Law Chambers </span> <br>  
                </div>
                {{-- end here  --}}
                <div class="app_head_form mt-4">
                    <span>To</span> <br>  
                    <span>{Auth:user()->name}</span> <br>  
                    <span>web designer & Developer </span> <br>  
                    <span>Universitas law chambers </span> <br>  
                    <span>Dhaka, Bangladesh  </span> <br>  
                </div>
                {{-- end here  --}}
                <div class="ap_status text-center">
                    <h4 class="text-white d-inline bg-danger" style="padding: 4px;border:1px solid #000;border-radius:5px ">Aproval  Reject </h4>
                </div>

                <div class="admin_comment mt-4">
                    <h6> HR Depertment Comments :</h6>
                    <p class="note note_light " style="border:1px solid green;padding:10px;border-radius:8px;">A "Rejected" status indicates that your leave application has not been approved. Your request to take leave during the specified dates has been evaluated, and it has been determined that the company's operational requirements cannot accommodate your absence at this time. While we understand that this can be disappointing, the decision is made to maintain the smooth functioning of the team and the business. If possible, consider discussing alternative dates for your leave with your supervisor or manager.</p>
                </div>
                <!-- end here  -->
            </div>
            {{-- row end  --}}
        </div>
    </div>
</section>
@endif
                <!-- app area end here  -->
                </div>
            <!-- main col end here  -->
            </div>
            <!-- row col end  -->
        </div>
    </div>
</section>



@endsection