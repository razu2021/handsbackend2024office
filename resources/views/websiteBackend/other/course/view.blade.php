@extends('layouts.adminmaster')
@section('admin_content')
<section class="mb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
            <div class="card text-left">
                <div class="row">
                    <div class="col-lg-7 m-2"><h3 class="p-2 text-uppercase"><span><i class="fas fa-solid fa-trademark"></i></span> Single Information </h3></div>
                    <div class="col-lg-3 text-end m-2 p-2"><a class="p-2" href="{{route('course.all')}}"><button class="btn btn-success">All information</button></a></div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td class="text-end">
                          <strong> Course Id</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->course_id}}</td>
                      </tr>
                     
                      <tr>
                        <td class="text-end">
                          <strong>Organization Name </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->provider_name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Course Title </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->course_title}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Course Location </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->course_location}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Course Type </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->course_type}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Course Price</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->course_price}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Application Instruction </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->app_instruction}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Application Target </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->app_target}}</td>
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>Application Deadline </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->app_deadline}}</td>
                      </tr>
                      <tr>
                      <tr>
                        <td class="text-end">
                          <strong>Application Reased </strong>
                        </td>
                          <td class="text-center"><strong>: </strong></td>
                          <td class="text-left">{{$data->app_reased}}</td>
                        </tr>
                        <tr>
                        <td class="text-end">
                          <strong>Education </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->app_education}}</td>
                      </tr>
                      <tr>
                      <tr>
                        <td class="text-end">
                          <strong>Gender</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->app_gender}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Course Duration</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->course_duration}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Course Start at</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->course_start}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Course end at</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->course_end}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Class Duration</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->class_duration}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Class start </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->class_start}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Class end </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->class_end}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Total Class </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->total_class}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Certificate Issues</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->certificate}}</td>
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>Application Note </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->note}}</td>
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>Name of the Caption </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{!! $data->caption !!}</td>
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>Name of the Service Image</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">
                          @if($data->service_image != "")
                          <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Image " width="auto" height="200px" style="border-radius:10%">
                          @else
                            <img src="{{asset('uploads')}}/avatar.jpg" alt="banner Image " width="auto" height="200px" style="border-radius:10%">
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Service Image</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">
                          @if($data->service_bg_image != "")
                          <img src="{{asset('uploads/website/'.$data->service_bg_image)}}" alt="Image " width="auto" height="200px" style="border-radius:10%">
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