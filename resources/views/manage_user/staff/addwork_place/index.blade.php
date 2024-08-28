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
                          <h2 class="mt-4 mb-2 fw-bold px-4">Update profile information </h2>
                          </div>
                      </div>
                      <div class="col-lg-3 text-center ">
                          <div class="mt-4 mb-2 ">
                          <a href="{{url('dashboard/user/Add_work_places/add')}}"><button class="btn btn-success px-4">Add New</button></a>
                          </div>
                      </div>
                    </div>
                    <hr>
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Organization Nname</th>
                        <th scope="col">Curent Position</th>
                        <th scope="col">status</th>
                        <th scope="col">Mangae</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                      <tr>
                        <td> {{$data->Creator_id}}</td>
                        <td>{{$data->organization_name}}</td>
                        <td>{{$data->curent_position}}</td>
                        <td>  
                        @if ($data->post_status == 1) 
                            <p class="text-success">Active</p>
                        @elseif ($data->post_status == 0)
                            <p class="text-warning">panding</p>
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
                              <li><a class="dropdown-item" href="{{url('dashboard/user/Add_work_places/edit/'.$data->slug)}}">edit</a></li>
                              <li><a class="dropdown-item" href="{{url('dashboard/user/Add_work_places/view/'.$data->slug)}}">view</a></li>
                              <li><a class="dropdown-item" onclick="return confirm('Delete this Information ')" href="{{url('dashboard/user/Add_work_places/softdelete/'.$data->Creator_id)}}">Dlete</a></li>
                              <li><hr class="dropdown-divider"></li>
                              @if ($data->post_status == 2) 
                              <li><a class="dropdown-item text-success fw-bold" href="{{url('dashboard/user/Add_work_places/post_active/'.$data->Creator_id)}}">Request for publish</a></li>
                              @elseif($data->post_status == 0)
                              <li><a class="dropdown-item text-warning fw-bold disabled" href="#">Request pending</a></li>
                              @elseif($data->post_status == 1)
                              <li><a class="dropdown-item text-success fw-bold " href="{{url('dashboard/user/Add_work_places/post_deactive/'.$data->Creator_id)}}">Post Deactive </a></li>
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