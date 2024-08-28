@extends('layouts.adminmaster')
@section('admin_content')
<section class=" mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                    <div class="row">
                      <div class="col-lg-9  ">
                          <div class="mt-2 mb-2 ">
                          <h2 class="mt-4 mb-2 fw-bold px-4"> Application Types  </h2>
                          </div>
                      </div>
                      <div class="col-lg-3 text-center ">
                          <div class="mt-4 mb-2 ">
                          <a href="{{url('admin/dashboard/manage/reason_types')}}"><button class="btn btn-success px-4">All Information</button></a>
                          </div>
                      </div>
                    </div>
                    <hr>
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Application Reason Type </th>
                        <th scope="col">Creator</th>
                        <th scope="col">Created at </th>
                        <th scope="col">Mangae</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                      <tr>
                      <td>{{$data->reason_id}}</td>
                        <td>{{$data->reason_name}}</td>
                        <td>{{$data->Creator->name}}</td>
                        <td>{{$data->created_at}}</td>
                        <td> 
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{url('admin/dashboard/manage/reason_types/restore/'.$data->reason_id)}}">Restor Data </a></li>
                              <li><a class="dropdown-item"  href="{{url('admin/dashboard/manage/reason_types/delete/'.$data->reason_id)}}">Delete Data</a></li>
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