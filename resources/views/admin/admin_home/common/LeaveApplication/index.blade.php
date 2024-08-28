@extends('layouts.adminmaster')
@section('admin_content')
<section class=" mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                    <div class="row">
                      <div class="col-lg-4">
                          <div class="mt-2 mb-2 ">
                          <h2 class="mt-4 mb-2 fw-bold px-4"> Application  information </h2>
                          </div>
                      </div>

                      <div class="col-lg-4 text-center mt-3">
                          <div class="mt-2 ">
                            <form action="" method="get">
                            <div class="input-group">
                              <input type="search" name="search" id="" value="{{$search}}" class="form-control" placeholder="Search " aria-describedby="button-addon2">
                              <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
                            </div>
                            </form>
                          </div>
                      </div>
                      <!-- end form  -->

                      <div class="col-lg-4 text-center ">
                          <div class="mt-4 mb-2 ">
                          <a href="{{url('admin/dashboard/manage/application_types/recycle')}}"><button class="btn btn-danger px-4">Recycle </button></a>
                          <a href="{{url('admin/dashboard/manage/application_types/add')}}"><button class="btn btn-success px-4">Add  New Types </button></a>
                          </div>
                      </div>
                    </div>
                    <hr>
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Application Type </th>
                        <th scope="col">Creator</th>
                        <th scope="col">Created at </th>
                        <th scope="col">Status</th>

                        <th scope="col">Mangae</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                      <tr>
                        <td>{{$data->types_id}}</td>
                        <td>{{$data->types_name}}</td>
                        <td>{{$data->Creator->name}}</td>
                        <td>{{$data->created_at}}</td>
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
                              <li><a class="dropdown-item" href="{{url('admin/dashboard/manage/application_types/edit/'.$data->slug)}}">edit</a></li>
                              <li><a class="dropdown-item" href="{{url('admin/dashboard/manage/application_types/view/'.$data->slug)}}">view</a></li>
                              <li><a class="dropdown-item" onclick="return confirm('Delete this Information ')" href="{{url('admin/dashboard/manage/application_types/softdelete/'.$data->types_id)}}">Dlete</a></li>
                              <li><hr class="dropdown-divider"></li>

                              @if ($data->post_status == 2) 
                              <li><a class="dropdown-item text-success fw-bold" href="{{url('admin/dashboard/manage/application_types/post_active/'.$data->types_id)}}">Post Active</a></li>
                              @elseif($data->post_status == 1)
                              <li><a class="dropdown-item text-success fw-bold" href="{{url('admin/dashboard/manage/application_types/post_deactive/'.$data->types_id)}}">Post Deactive </a></li>
                              @endif
                            </ul>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="row m-2">
                      @if (!$search)
                          <div class="pagination">
                              {{ $all->links() }}
                          </div>
                      @endif
                    </div>
                  </div>
                <!-- table  -->
              <!--/ Basic Bootstrap Table -->
            </div>
        </div>
    </div>
</section>




@endsection