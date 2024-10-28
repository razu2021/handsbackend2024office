@extends('layouts.webmaster')
@section('web_content') 
  <main>
  <section>
    <div class="other_slider">
    <div class="owl-carousel owl-theme container_slider">
    @foreach($banner as $data)
        <div class="other_slider_items other_slider" style="background-image:url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
        <section class="section-padding bannerbg">
            <div class="container other_slider_area">
                <div class="row" style="border-bottom:1px solid #000">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7">
                        <div class="banner4">
                            <div class="banner4_content ">
                                <h3>{{$data->banner_title}}</h3>
                                <h1> {{$data->banner_heading}} </h1>
                                <p> {{$data->banner_caption}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5">
                        <div class="banner4">
                            <div class="banner4_images">
                                <img src="{{asset('uploads/website/'.$data->banner_image)}}" alt="{{$data->banner_title}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
        @endforeach
    </div>
    </div>
</section>
@foreach($desc as $data)
<section class="about_heath_sec " style="padding:5rem 0rem ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10 offset-lg-1">
                <div class="health_content pt-4 ">
                    <h1> {{$data->title}}</span></h1>
                    <p class="first_child pt-4">{!! $data->caption !!}</p>
                </div>
        </div>
    </div>
</section>
@endforeach
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
 @foreach($aboutproduct as $data)
<section class="about_heath_sec" style="padding-top:5rem">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 ">
                <div class="health_content pt-4">
                    <h1> {{$data->title}} <span>{{$data->subtitle}}</span></h1>
                    <p class="first_child pt-4">{!! $data->caption !!}</p>
                </div>
             </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 ">
                <div class="about_product_image">
                    @if($data->service_image !="")
                    <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Human and Nature Development Society (HANDS) Product Image" class="img-fluid" style="padding: 4rem;">
                    @else
                    <img src="{{asset('contents/assets/website')}}/assets/img/programimage.png" alt="Human and Nature Development Society (HANDS) Image" class="img-fluid rounded-5" style="padding: 4rem;">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<section class="pb-5 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="comon_heading2">
                    <h1> All <span> Products </span></h1>
                </div>
            </div>
            @foreach($product as $data)
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-sm-4">
                <div class="service_two">
                    <div class="service_tow_profile">
                        <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="HANDS Product image {{$data->title}}" class="img-fluid"/>
                    </div>
                    <div class="service_two_cotent">
                        <h2>{{$data->title}} </h2>
                        <p>{!! Str::words($data->caption,20) !!}</p>
                       <div class="stwo_link">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#mymodel{{$data->product_id}}"><span><i class="fas fa-angle-double-right"></i> </span> {{$data->button}} </a>
                       </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 justify-content-end d-flex mt-4">
                <div class="custom_pagination">
                    <div class="row">
                        {{$product->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@foreach($product as $data)
<div class="modal fade" id="mymodel{{$data->product_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal_image mt-4 mb-4">
        <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="" style="width:100%;height:auto;">
        <p style="color:green;font-style:italic"><strong>Upload Date & Time:</strong> {{$data->created_at->format('Y-m-d H:i:s A')}}</p>
        </div>
        <h5 class="pb-2"><strong>{{$data->title}}</strong></h5>
       <p>{!! $data->caption !!}</p>
       <div class="loc mt-2">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection