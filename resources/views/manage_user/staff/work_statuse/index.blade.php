@extends('dashboard')
@section('content')
<section class=" mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                    <div class="row">
                      <div class="col-lg-4">
                          <div class="mt-2 mb-2 ">
                          <h2 class="mt-4 mb-2 fw-bold px-4"> All Work Status  </h2>
                          </div>
                      </div>
                      <div class="col-lg-4 text-center mt-3">
                          <div class="mt-2 ">
                            <form action="" method="get">
                            <div class="input-group">
                              <input type="search" name="search" id="" value="{{$search}}" class="form-control" placeholder="Search " aria-describedby="button-addon2">
                              <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
                              <button class="btn btn-outline-warning" type="submit" id="button-addon2"><a href="{{route('work_status.all')}}">Reset</a></button>
                            </div>
                            </form>
                          </div>
                      </div>
                      <!-- search end  -->
                      <div class="col-lg-4 text-center ">
                          <div class="mt-4 mb-2 ">
                          <a href="{{route('work_status.add')}}"><button class="btn btn-success px-4">Add New work</button></a>
                          <a href="{{route('work_status.recycle')}}"> <button type="button" class="btn btn-warning position-relative">Recycle<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> {{$deletecount}}+ </span></button></a>
                          </div>
                      </div>
                    </div>
                    <hr>
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Start Time </th>
                        <th scope="col">End Time </th>
                        <th scope="col">Description </th>
                        <th scope="col">created at </th>
                        <th scope="col">status</th>
                        <th scope="col">Mangae</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                      <tr>
                        <td> {{$data->worker_id}}</td>
                        <td>{{$data->task_name}}</td>
                        <td>{{$data->start_time}}</td>
                        <td>{{$data->ending_time}}</td>
                        <td>{!! Str::words($data->description, 10) !!}</td>
                        <td>{{$data->created_at->format('d-m-y | h:i:s A')}}</td>
                        <td>  
                        @if ($data->post_status == 0) 
                            <p><span class="bg-danger rounded-2 p-1 text-white">Unpublished</span></p>
                        @elseif ($data->post_status == 1)
                            <p class="text-success"><span class="bg-success rounded-2 p-1 text-white"> Friends of Friend</span> </p>
                        @endif       
                        </td>
                        <td> 
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('work_status.edit',$data->slug)}}">Edit</a></li>
                              <li><a class="dropdown-item" href="{{route('work_status.view',$data->slug)}}">View</a></li>
                              <li><a class="dropdown-item" onclick="return confirm('Delete this Information ')" href="{{route('work_status.softdelete',$data->worker_id)}}">Delete</a></li>
                              <li><hr class="dropdown-divider"></li>
                              @if ($data->post_status == 0) 
                              <li><a class="dropdown-item text-success fw-bold" href="{{route('work_status.post_active',$data->worker_id)}}">Published</a></li>
                              @elseif($data->post_status == 1)
                              <li><a class="dropdown-item text-danger fw-bold " href="{{route('work_status.post_deactive',$data->worker_id)}}"> Private</a></li>
                              @endif
                            </ul>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="row p-3">
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