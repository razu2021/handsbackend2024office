@extends('layouts.adminmaster')
@section('admin_content')
<section class=" mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                    <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class=" text-center pt-4 pb-0">
                          <h2 style="border-bottom: 5px solid red; display:inline-block;background:#011a41;padding:3px;border-radius:10px;color:white;text-transform:uppercase"> 
                              ALL Information 
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
                                  <button class="btn btn-outline-warning" type="submit"><a class="text-dark" href="{{ route('appoinment_book.all') }}">Reset</a></button>
                                </div>
                              </div>
                              </form>
                          </div>
                      </div>
                      <div class="col-lg-3 text-center ">
                          <div class="mb-2 ">
                          <a href="{{ route('appoinment_book.add') }}"><button class="btn btn-success px-4">Add New Items</button></a>
                         <a href="{{route('appoinment_book.recycle')}}"> <button type="button" class="btn btn-warning position-relative">Recycle<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> {{$deletecount}}+ </span></button></a>
                          </div> 
                      </div>
                    </div>
                    <hr>
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">subject</th>
                        <th scope="col">Appointment Status</th>
                        <th scope="col">Approval Date-Time</th>
                        <th scope="col">status</th>
                        <th scope="col">Mangae</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                      <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->subject}}</td>
                          @if($data->app_date == "" && $data->post_status == 2)
                          <td><span class="badge bg-danger"> New Appoinment</span></td>
                          @elseif(\Carbon\Carbon::parse($data->app_date)->format('Y-m-d') <= \Carbon\Carbon::now()->format('Y-m-d')  && \Carbon\Carbon::parse($data->app_time)->format('H:i:s A') <= \Carbon\Carbon::now()->format('H:i:s A') )
                          <td> <span class="badge bg-danger">Date Expired</span></td>
                          @elseif($data->post_status == 1 && $data->app_date != "" && $data->app_time != "")
                          <td> <span class="badge bg-primary"> Booked Appointment</span></td>
                          @elseif($data->post_status == 0)
                          <td> <span class="badge bg-danger">Appointment Denied </span></td>
                          @elseif($data->post_status == 2 && $data->app_date != ""  && $data->app_time != "")
                          <td> <span class="badge bg-secondary">Pause</span></td>
                          @else
                          <td>  <span class="badge bg-warning"> Under Review</span></td>
                          @endif
                          <!-- appointment status end  -->
                           @if($data->post_status == 1 && $data->app_date != "") 
                           <td><span class="badge bg-primary">{{\Carbon\Carbon::parse($data->app_date)->format('d-F-Y') }} <b>||</b> {{ \Carbon\Carbon::parse($data->app_time)->format('H:i A') }}</span></td>
                           @elseif($data->post_status == 2 && $data->app_date != "") 
                           <td><span class="badge bg-secondary">{{\Carbon\Carbon::parse($data->app_date)->format('d-F-Y') }} <b>||</b> {{ \Carbon\Carbon::parse($data->app_time)->format('H:i A') }}</span></td>
                           @elseif($data->post_status == 0)
                           <td><span class="badge bg-danger">Appointment Denied</span></td>
                           @else
                           <td> <span class="badge bg-warning">Under Review</span></td>
                           @endif
                          
                          <!-- appoinment date time  -->
                          @if ($data->post_status == 1) 
                          <td> <span class="badge bg-primary">Approved</span></td>
                          @elseif($data->post_status == 0)
                          <td> <span class="badge bg-danger">Denied</span></td>
                          @elseif($data->post_status == 2 && $data->app_date && $data->app_time)
                          <td> <span class="badge bg-danger">Pause</span></td>
                          
                          @else
                          <td> <span class="badge bg-warning">Pending</span></td>
                          @endif       
                          <td> 
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('appoinment_book.edit',$data->slug)}}">Set Aproval</a></li>
                              <li><a class="dropdown-item" href="{{route('appoinment_book.view',$data->slug)}}">View</a></li>
                              <li><a class="dropdown-item" onclick="return confirm('Delete this Information')" href="{{route('appoinment_book.softdelete',$data->appoinment_book_id)}}">Delete</a></li>
                              <li><hr class="dropdown-divider"></li>
                              @if ($data->post_status == 2 && $data->app_date != ""  && $data->app_time != "" ) 
                              <li><a class="dropdown-item text-success fw-bold" href="{{route('appoinment_book.post_active',$data->appoinment_book_id)}}">Approved</a></li>
                              <li><a class="dropdown-item text-warning fw-bold " href="{{route('appoinment_book.denied',$data->appoinment_book_id)}}">Denied</a></li>
                              @elseif($data->post_status == 2)
                              <li><a class="dropdown-item text-warning fw-bold " href="{{route('appoinment_book.denied',$data->appoinment_book_id)}}">Denied</a></li>
                              @elseif($data->post_status == 1)
                              <li><a class="dropdown-item text-warning fw-bold " href="{{route('appoinment_book.post_deactive',$data->appoinment_book_id)}}">Pause</a></li>
                              @elseif($data->post_status == 0)
                              <li><a class="dropdown-item text-warning fw-bold " href="{{route('appoinment_book.resume',$data->appoinment_book_id)}}">Resume</a></li>
                              @endif
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
                <!-- table  -->
              <!--/ Basic Bootstrap Table -->
            </div>
        </div>
    </div>
</section>


@endsection