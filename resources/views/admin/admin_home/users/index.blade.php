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
                          <h2 class="mt-4 mb-2 fw-bold px-4">Update profile information </h2>
                          </div>
                      </div>
                      <div class="col-lg-3 text-center ">
                          <div class="mt-4 mb-2 ">
                          <a href="#"><button class="btn btn-success px-4">Add New</button></a>
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
                        <th scope="col">Email verified </th>
                        <th scope="col">Mangae</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($alldata as $data)
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->email_veriified_at}}</td>
                        <td> 
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">edit</a></li>
                              <li><a class="dropdown-item" href="{{url('admin/dashboard/admin_allusers/view/'.$data->id)}}">view</a></li>
                              <li><a href="#"></a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item text-success fw-bold" href="#">Request for publish</a></li>
                              <li><a class="dropdown-item text-warning fw-bold disabled" href="#">Request pending</a></li>
                              <li><a class="dropdown-item text-success fw-bold" href="#">admin submit </a></li>
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