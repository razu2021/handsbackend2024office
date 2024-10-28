@extends('layouts.webmaster')
@section('web_content')  
  <main>
  @foreach($banner as $data)
    <section class="microfinace_banner" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
        <div class="bannerbg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1 style="font-size: 5rem; color: #000;">{{$data->banner_heading}}</h1>
                            <h3>{{$data->banner_title}}</h3>
                            @if($data->banner_button1 != "")
                            <a href="{{$data->banner_button_url1}}">{{$data->banner_button1}} ||</a>
                            @endif
                            @if($data->banner_button2 !="")
                            <a href="javascript:void(0)" class="text-dark"> {{$data->banner_button2}}</a>
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
                    <div class="comon_heading pb-4">
                        <h1> Annual Report </h1>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="sinior_officials p-4">
                    <div class="accordion" id="accordionExample">
                      @foreach($annualreport as $data)
                          <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$data->slug}}" aria-expanded="true" aria-controls="collapse{{$data->slug}}">
                                {{$data->title}}
                              </button>
                            </h2>
                            <div id="collapse{{$data->slug}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <p>{!! $data->caption !!}</p>
                              </div>
                            </div>
                          </div>
                      @endforeach
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="container section-padding">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="comon_heading pb-4">
                        <h1> Half Year Report </h1>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="sinior_officials p-4">
                    <div class="accordion" id="accordionExample">
                      @foreach($half as $data)
                          <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$data->slug}}" aria-expanded="true" aria-controls="collapse{{$data->slug}}">
                                {{$data->title}}
                              </button>
                            </h2>
                            <div id="collapse{{$data->slug}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <p>{!! $data->caption !!}</p>
                              </div>
                            </div>
                          </div>
                      @endforeach
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="container ">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="comon_heading pb-4">
                        <h1> Short Report </h1>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="sinior_officials p-4">
                    <div class="accordion" id="accordionExample">
                      @foreach($short as $data)
                          <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$data->slug}}" aria-expanded="true" aria-controls="collapse{{$data->slug}}">
                                {{$data->title}}
                              </button>
                            </h2>
                            <div id="collapse{{$data->slug}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <p>{!! $data->caption !!}</p>
                              </div>
                            </div>
                          </div>
                      @endforeach
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection