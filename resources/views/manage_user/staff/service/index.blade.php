@extends('dashboard')
@section('content')
<section class=" mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                    <div class="row">
                      <div class="col-lg-9  ">
                          <div class="mt-2 mb-2 ">
                          <h2 class="mt-4 mb-2 fw-bold px-4">Update services information </h2>
                          </div>
                      </div>
                      <div class="col-lg-3 text-center ">
                          <div class="mt-4 mb-2 ">
                          <a href="{{url('dashboard/user/services/add')}}"><button class="btn btn-success px-4">Add New</button></a>
                          </div>
                      </div>
                    </div>
                    <hr>
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Service Title </th>
                        <th scope="col">Service Subtitle</th>
                        <th scope="col">Service info</th>
                        <th scope="col">status</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                      <tr>
                        <td>{{$data->Service_id}}</td>
                        <td>{{$data->service_title}}</td>
                        <td>{{$data->service_subtitle}}</td>
                        <td>{{$data->service_info}} </td>
                        <td>  
                        @if ($data->post_status == 1) 
                            <p class="text-success">Active</p>
                        @elseif ($data->post_status == 0)
                            <p class="text-warning">Pending</p>
                        @else
                            <p class="text-danger">Unpublished</p>
                        @endif       
                        </td>
                        <td> 
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{url('dashboard/user/services/edit/'.$data->slug)}}">edit</a></li>
                              <li><a class="dropdown-item" href="{{url('dashboard/user/services/view/'.$data->slug)}}">view</a></li>
                              <li><a class="dropdown-item" onclick="return confirm('Delete this Information ')" href="{{url('dashboard/user/services/softdelete/'.$data->Service_id)}}">Dlete</a></li>
                              <li><hr class="dropdown-divider"></li>
                              @if ($data->post_status == 2) 
                              <li><a class="dropdown-item text-success fw-bold" href="{{url('dashboard/user/services/post_active/'.$data->Service_id)}}">Request for publish</a></li>
                              @elseif($data->post_status == 0)
                              <li><a class="dropdown-item text-warning fw-bold disabled" href="#">Request Pending</a></li>
                              @elseif($data->post_status == 1)
                              <li><a class="dropdown-item text-success fw-bold " href="{{url('dashboard/user/services/post_deactive/'.$data->Service_id)}}">Post Deactive </a></li>
                              @endif
                            </ul>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>
                <!-- table  -->
              <!--/ Basic Bootstrap Table -->
            </div>
        </div>
    </div>
</section>


@endsection