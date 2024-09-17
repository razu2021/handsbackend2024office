@extends('layouts.webmaster')
@section('web_content')    
  <main>

    <section class="section-padding snotice_board " >
        <div class="container ">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7  ">
                <div class="about_notice ">
                    <div class="notice_content " >
                       <div class="notice_page">
                        <div class="notice_header">
                            <img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="logo" class="img-fluid">
                            <h3>Human and Nature Development Society <strong>(HANDS) </strong></h3>
                           <a href=""> <span> Village :</span> Goraki, <span> Post:</span> Takia Kodma <span> Dis:</span>  Mirzapur, Tangle, Dhaka-Bangladesh</a>
                        </div>
                        @foreach($notice as $data)
                        <div class="notice_body" >
                            <h1>notice </h1>
                            <strong> Date: {{$data->created_at->format('Y-m-d H:i:s A')}} </strong>
                            <div class="notice_content">
                                <h4><u>{{$data->title}}</u></h4>
                                <p>{!! $data->caption !!}</p>
                            </div>
                            </div>
                        @endforeach
                        <div class="notice_fotter">
                           <div class="row">
                            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                                <p>Sinserely </p>
                                <img src="{{asset('contents/assets/website')}}/assets/img/vactor/signature.png" alt="image" class="img-fluid">
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
                                <div class="notice_verify">
                                    <img src="{{asset('contents/assets/website')}}/assets/img/vactor/sil.png" alt="image" class="img-fluid">
                                </div>
                            </div>
                           </div>
                            
                        </div>
                       </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-5">
                  <div class="all_notice">
                  <ul>
                    @foreach($allnotice as $data)
                    <li class="position-relative"><span> <i class="fas fa-stream"></i> </span><a href="" data-bs-toggle="modal" data-bs-target="#mymodel{{$data->notice_id}}">{{$data->title}}</a>  <span class="position-absolute top-50 end-0 translate-middle badge rounded-pill bg-danger text-white">
                    {{$data->created_at->format('Y-m-d')}}
                    </span></li>
                    @endforeach
                    </ul>
                  </div>
                </div>
            </div>
        </div>
    </section>
@foreach($allnotice as $data)
<div class="modal fade" id="mymodel{{$data->notice_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$data->title}}</h5>
        ||
        <p style="color:green;font-style:italic">{{$data->created_at->format('Y-m-d H:i:s A')}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="notice_body" >
        <h1>notice </h1>
        <strong> Date: {{$data->created_at->format('Y-m-d H:i:s A')}} </strong>
        <div class="notice_content">
            <h4><u>{{$data->title}}</u></h4>
            <p>{!! $data->caption !!}</p>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@foreach($slogan as $data)
<section class="make_D_image" style="background-image:url('{{asset('uploads/website/'.$data->service_image)}}')">
    <div class="make_donation_quickbg">
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
















<!-- ========  main content end herre  -->
  </main>

@endsection
