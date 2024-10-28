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
                    <div class="col-lg-8 offset-lg-2">
                        <div class=" text-center pt-4 pb-0">
                          <h2 style="border-bottom: 5px solid red; display:inline-block;background:#011a41;padding:3px;border-radius:10px;color:white;text-transform:uppercase"> 
                              Deletes Information 
                          </h2>
                        </div>
                      </div>
                      <div class="col-lg-8 mx-4  pt-2">
                          <div class=" mb-2 ">
                            <form action="" method="GET">
                              <div class="input-group">
                                <input type="text" name="search" value="{{$search}}" class="form-control" placeholder="Search Entair Table">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-success" type="submit">Submit</button>
                                  <button class="btn btn-outline-warning" type="submit"><a class="text-dark" href="{{ route('alluser.recycle') }}">Reset</a></button>
                                </div>
                              </div>
                              </form>
                          </div>
                      </div>
                      <div class="col-lg-3 text-center ">
                          <div class="mb-2 ">
                          <a href="{{ route('alluser.all') }}"><button class="btn btn-success px-4">All User Infromation</button></a>
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
                    @foreach($all as $data)
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->email_veriified_at}}</td>
                        <!-- role  -->
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
                          <td><span class="bg-success p-1 text-white rounded-3"> Employee</span></td>
                        @elseif($data->role_request == 2)
                          <td><span class="bg-success p-1 text-white rounded-3">Customer </span></td>
                        @elseif($data->role_request == 3)
                          <td><span class="bg-success p-1 text-white rounded-3">Volunteer </span></td>
                        @endif


                       @if($data->role == 0)
                          <td><span class="bg-danger p-1 text-white rounded-3">New User</span></td>
                       @else
                          <td><span class="bg-success p-1 text-white rounded-3">Employee</span></td>
                       @endif
                        <td> 
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" onclick="return confirm('Do you Want to Restore this Account ?')" href="{{route('alluser.restore',$data->id)}}">Restore</a></li>
                              <li><a class="dropdown-item" onclick="return confirm('Do you Want to Permanent Delete this Account ?')" href="{{route('alluser.delete',$data->id)}}">Delete Account</a></li>
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
                          <div class="col-lg-8"><tr><td><p>Showing 1 to {{$all->count()}} of {{$totalpost }} Entair</p></td></tr></div>
                          <div class="col-lg-4 d-flex justify-content-end">
                          <div class="row">{{ $all->links() }}</div>
                          </div>
                        </div>
                  </div>
                  </div>
    
            </div>
        </div>
    </div>
</section>


@endsection