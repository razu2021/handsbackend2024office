@extends('layouts.webmaster')
@section('web_content')  
  <main>
    @foreach($banner as $data)
    <section class="team_banner" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
        <div class="banner_3_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="banner_3">
                            <h1 style="font-size: 5rem; color: red;">{{$data->banner_heading}}</h1>
                            @if($data->banner_button1 !="")
                            <a href="{{$data->banner_button_url1}}">{{$data->banner_button1}} ||</a>
                            @endif
                            @if($data->banner_button2 !="")
                            <a href="{{$data->banner_button_url2}}">{{$data->banner_button2}} </a>
                            @endif
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
                <div class="case_heading">
                    <h1> HANDS <b>  Feild Storis  </b></h1>
                    <span> <i class="fas fa-hand-holding-heart"></i> </span>
                </div>
                @foreach($story as $data)
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                    <div class="hands_video_galllery">
                        <a href=""  data-bs-toggle="modal" data-bs-target="#mymodel{{$data->field_storise_id}}">
                        <div class="hands_video">
                            <iframe width="100%" height="350px" src="{{$data->service_image}}" title="{{$data->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            <h4>{{$data->title}}</h4>
                            <p>{!! Str::words($data->caption,20) !!}</p>
                        </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@foreach($story as $data)
<div class="modal fade" id="mymodel{{$data->field_storise_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal_image mt-4 mb-4">
        <iframe width="100%" height="350px" src="{{$data->service_image}}" title="{{$data->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <p style="color:green;font-style:italic"><strong>Upload Date & Time: </strong> {{$data->created_at->format('Y-m-d H:i:s A')}}</p>
        <a target="_blank" href="https://www.youtube.com/@hands_bd" class="text-success" >Visit our Youtube Chanel</a>
        </div>
        <h5 class="pb-2"><strong>{{$data->title}}</strong></h5>
       <p>{!! $data->caption !!}</p>
       <div class="loc mt-2">
        <p style="font-style: italic;background:#f1f1f1;padding:.5rem">{{$data->location}}</p>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
    <!-- ========  main content end herre  -->
  </main>

@endsection