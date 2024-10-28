@extends('layouts.adminmaster')
@section('admin_content')
<section class=" mt-5 mb-5">
    <div class="container">
    @if(session('message'))
        <div class="alert alert-success ">
            {{ session('message') }}
        </div>
      @endif
        <div class="row">
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                    <div class="row">
                      <div class="col-lg-9  ">
                          <div class="mt-2 mb-2 ">
                          <h2 class="mt-4 mb-2 fw-bold px-4">All User information </h2>
                          </div>
                      </div>
                      <div class="col-lg-8 mx-4   mt-4">
                          <div class=" mb-2 ">
                            <form action="" method="GET">
                              <div class="input-group">
                                <input type="text" name="search" value="{{$search}}" class="form-control" placeholder="Search Entair Table">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-success" type="submit">Submit</button>
                                  <button class="btn btn-outline-warning" type="submit"><a class="text-dark" href="{{ route('alluser.all') }}">Reset</a></button>
                                </div>
                              </div>
                              </form>
                          </div>
                      </div>
                      <div class="col-lg-3 text-center ">
                          <div class="mt-4 mb-2 ">
                          <a target="_blank" href="{{route('login')}}"><button class="btn btn-success px-4">Add New</button></a>
                          <a href="{{route('alluser.recycle')}}"> <button type="button" class="btn btn-warning position-relative">Recycle<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> {{$deletecount}}+ </span></button></a>
                          </div>
                      </div>
                    </div>
                    <hr>
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col"> Name</th>
                        <th scope="col">Email </th>
                        <th scope="col"> verified </th>
                        <th scope="col">Role</th>
                        <th scope="col">Request Role</th>
                        <th scope="col">Status</th>
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
                        <!--  user role  -->
                        @if($data->role == 0)
                          <td><span class="bg-success p-1 text-white rounded-3">Normal User </span></td>
                        @elseif($data->role == 1)
                          <td><span class="bg-success p-1 text-white rounded-3"> Employee</span></td>
                        @elseif($data->role == 2)
                          <td><span class="bg-success p-1 text-white rounded-3">Customer </span></td>
                        @elseif($data->role == 3)
                          <td><span class="bg-success p-1 text-white rounded-3">Volunteer </span></td>
                        @endif
                          <!-- request role  -->
                          @if($data->role_request == 0)
                          <td><span class="bg-danger p-1 text-white rounded-3">Deafult User </span></td>
                        @elseif($data->role_request == 1)
                          <td><span class="bg-primary p-1 text-white rounded-3"> Employee</span></td>
                        @elseif($data->role_request == 2)
                          <td><span class="bg-primary p-1 text-white rounded-3">Customer </span></td>
                        @elseif($data->role_request == 3)
                          <td><span class="bg-primary p-1 text-white rounded-3">Volunteer </span></td>
                        @endif
                        <!-- status start -->
                       @if($data->role == 0)
                          <td><span class="bg-danger p-1 text-white rounded-3">New User</span></td>
                       @elseif($data->role == 1)
                          <td><span class="bg-success p-1 text-white rounded-3">Employee</span></td>
                        @elseif($data->role == 2)
                          <td><span class="bg-success p-1 text-white rounded-3">Customer</span></td>
                        @elseif($data->role == 3)
                          <td><span class="bg-success p-1 text-white rounded-3">Volunteer</span></td>
                       @endif
                        <td> 
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('alluser.edit',$data->id)}}">Permission Setup</a></li>
                              <li><a class="dropdown-item" href="{{route('alluser.view',$data->id)}}">View Details</a></li>
                              <li><a class="dropdown-item" onclick="return confirm('Do you Want to Destroy this Account ?')" href="{{route('alluser.softdelete',$data->id)}}">Account Destroy</a></li>
                              <li><a href="#"></a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                  <div class="container">
                        <div class="row pt-4 ">
                          <div class="col-lg-8"><tr><td><p>Showing 1 to {{$alldata->count()}} of {{$totalpost }} Entair</p></td></tr></div>
                          <div class="col-lg-4 d-flex justify-content-end">
                          <div class="row">{{ $alldata->links() }}</div>
                          </div>
                        </div>
                  </div>
                  </div>
                <!-- table  -->
              <!--/ Basic Bootstrap Table -->
            </div>
        </div>
    </div>
</section>


@endsection