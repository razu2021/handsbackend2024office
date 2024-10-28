@extends('layouts.webmaster')
@section('web_content')
<main>
@foreach($banner as $data)
<section>
    <div class="row" style="border-bottom:1px solid #000">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            <div class="banner4">
                <div class="banner4_content">
                    <h1> {{$data->banner_heading}} </h1>
                    <p> {{$data->banner_caption}}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            <div class="banner4">
                <div class="banner4_images">
                    <img src="{{asset('uploads/website/'.$data->banner_bg_image)}}" alt="{{$data->banner_title}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
    <section class="section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="case_heading pb-5">
                    <h1> HANDS <b> Photo Gallery </b></h1>
                    <span> <i class="fas fa-hand-holding-heart"></i> </span>
                </div>
                @foreach($photo as $data)
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 g-0">
                    <div class="hands_photo_gallery">
                        <div class="hands_photo">
                            <a href="" data-bs-toggle="modal" data-bs-target="#mymodel{{$data->photo_gallery_id}}"> 
                            <img src="{{asset('uploads/website/gallery/'.$data->service_image)}}" alt="Human and Nature Development Society (HANDS) {{$data->title}} photo" class="img-fluid" loading="lazy" /></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @foreach($photo as $data)
    <div class="modal fade" id="mymodel{{$data->photo_gallery_id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal_image mt-4 mb-4">
                        <a href="{{asset('uploads/website/gallery/'.$data->service_image)}}" target="_blank">
                            <img src="{{asset('uploads/website/gallery/'.$data->service_image)}}"
                                alt="{{$data->title}} image" style="height:auto;width:100%">
                        </a>
                        <p style="color:green;font-style:italic"><strong>Upload Date & Time: </strong>
                            {{$data->created_at->format('Y-m-d H:i:s A')}}</p>
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
</main>
@endsection