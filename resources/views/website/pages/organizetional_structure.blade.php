@extends('layouts.webmaster')
@section('web_content')  
  <main>
  @foreach($banner as $data)
    <section class="team_banner">
        <div class="banner_3_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1>{{$data->banner_title}}</h1>
                            @if($data->banner_button1 != "")
                            <a href="{{url('$data->banner_button1_url1')}}">{{$data->banner_button1}}</a>
                            @endif
                            @if($data->banner_button2 !="")
                            <a href="javascript:void(0)" class="text-danger"> {{$data->banner_button2}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach
    <section class="section_position section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="comon_heading">
                        <h1> Governing Body </h1>
                    </div>
                </div>
                @foreach($ececutive as $data)
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-sm-4 mt-4">
                    <div class="or_team_area">
                        <div class="or_team">
                            <div class="or_team_profile">
                                @if($data->service_image != "")
                                <img src="{{asset('uploads/website/'.$data->service_image)}}"  alt="profile picture " class="img-fluid">
                                @else
                                <img src="{{asset('contents/assets/website')}}/assets/img/profile-picture.png"  alt="profile picture " class="img-fluid">
                                @endif
                            </div>
                            <div class="or_team_content">
                                <h2>{{$data->name}}</h2>
                                <h4>{{$data->designation}}</h4>
                                @if($data->email != "")
                                <p><span> <i class="fas fa-envelope"></i></span><a href="mailto:{{$data->email}}">{{$data->email}}</a></p>
                                @endif
                                @if($data->phone != "")
                                <p> <span> <i class="fas fa-phone-square-alt"></i></span><a href="tel:{{$data->phone}}">{{$data->phone}}</a></p>
                                @endif
                                <a class="mt-2" href="{{route('staff_details',$data->slug)}}"><span><i class="fas fa-arrow-circle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>
        </div>
        <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="comon_heading" style="border-bottom:1px solid green">
                        <h1> General body </h1>
                        <p class="pt-2 pb-2">The General Body provides a platform for open discussion and collaborative decision-making. Members have the opportunity to contribute their ideas and perspectives, shaping the strategic direction and future of our NGO .</p>
                    </div>
                </div>
                @foreach($ganarelbody as $data)
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-sm-4 mt-4">
                    <div class="or_team_area">
                        <div class="or_team">
                            <div class="or_team_profile">
                                @if($data->service_image != "")
                                <img src="{{asset('uploads/website/'.$data->service_image)}}"  alt="{{$data->name}} Profile image of Human and Nature Development Society (HANDS) " class="img-fluid">
                                @else
                                <img src="{{asset('contents/assets/website')}}/assets/img/profile-picture.png"  alt="{{$data->name}} Profile image " class="img-fluid">
                                @endif
                            </div>
                            <div class="or_team_content">
                                <h2>{{$data->name}}</h2>
                                <h4>{{$data->designation}}</h4>
                                @if($data->email != "")
                                <p><span> <i class="fas fa-envelope"></i></span><a href="mailto:{{$data->email}}">{{$data->email}}</a></p>
                                @endif
                                @if($data->phone != "")
                                <p> <span> <i class="fas fa-phone-square-alt"></i></span><a href="tel:{{$data->phone}}">{{$data->phone}}</a></p>
                                @endif
                                <a class="mt-2" href="{{route('staff_details',$data->slug)}}"><span><i class="fas fa-arrow-circle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>
        </div>
        <div class="bg_bottom"><img src="{{asset('contents/assets/website')}}/assets/img/vactor/shap1.png" alt=""></div>
    </section>
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="comon_heading pb-4">
                    <h1> Senior Officials </h1>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="sinior_officials p-4">
                    <table class="table table-hover table-striped border-1">
                        <thead>
                          <tr>
                            <th scope="col">Md Habibur Rahman </th>
                            <th scope="col">Chairman </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($serial as $data)
                            @if($data->senior_official !="")
                          <tr>
                            <td>{{$data->name}} </td>
                            <td>{{$data->designation}}</td>
                          </tr>
                          @endif
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</section>
  </main>
@endsection