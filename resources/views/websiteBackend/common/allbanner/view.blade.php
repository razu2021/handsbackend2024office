@extends('layouts.adminmaster')
@section('admin_content')
<section class="mb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
            <div class="card text-left">
                <div class="row">
                    <div class="col-lg-7 m-2"><h3 class="p-2 text-uppercase"><span><i class="fas fa-solid fa-trademark"></i></span>Banner Information </h3></div>
                    <div class="col-lg-3 text-end m-2 p-2"><a class="p-2" href="{{url('admin/dashboard/website-manage/home-banner')}}"><button class="btn btn-success">All Banner information</button></a></div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td class="text-end">
                          <strong>Name of ther Banner Id</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->banner_id}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Banner Title</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->banner_title}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Banner Heading</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->banner_heading}}</td>
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>Name of the Banner Caption </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->banner_caption}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Banner Button </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->banner_button1}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Banner Button url1 </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->banner_button_url1}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Banner Button2 </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->banner_button2}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Banner Button url1 </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->banner_button_url2}}</td>
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>Name of the Banner BG Image</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">
                          @if($data->banner_bg_image != "")
                          <img src="{{asset('uploads/website/'.$data->banner_bg_image)}}" alt="banner Image " width="auto" height="200px" style="border-radius:10%">
                          @else
                              <img src="{{asset('uploads')}}/avatar.jpg" alt="banner Image " width="auto" height="200px" style="border-radius:10%">
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Banner BG Image</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">
                          @if($data->banner_image != "")
                          <img src="{{asset('uploads/website/'.$data->banner_image)}}" alt="banner Image " width="auto" height="200px" style="border-radius:10%">
                          @else
                              <img src="{{asset('uploads')}}/avatar.jpg" alt="banner Image " width="auto" height="200px" style="border-radius:10%">
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Status</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        @if($data->status == 1)
                        <td class="text-left text-success">Published</td>
                        @else
                        <td class="text-left text-danger">Unpublished</td>
                        @endif
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Post Status</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->post_status}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Ceated At</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Updated At</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        @if($data->updated_at != "" )
                          <td class="text-left">{{$data->updated_at->format('Y-m-d H:i:s A')}}</td>
                        @else
                         <td class="text-left">Not Updated</td>
                        @endif
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>Creator Info</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left text-success">{{$data->creatorInfo->name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Editor Info</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                         
                        @if($data->editor != "")
                          <td class="text-left text-success">{{$data->editorInfo->name}} </td>
                        @else
                          <td class="text-left">No Editor Found </td>
                        @endif
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection