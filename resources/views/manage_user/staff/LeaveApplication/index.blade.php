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
                          <a href="{{url('dashboard/user/leave_application/recycle')}}"><button class="btn btn-danger px-4">recycle</button></a>
                          <a href="{{url('dashboard/user/leave_application/add')}}"><button class="btn btn-success px-4">Add New Application </button></a>
                          </div>
                      </div>
                    </div>
                    <hr>
                  @if(count($all) !== 0)
                  <table class="table table-striped" >
                    
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Application Subject </th>
                        <th scope="col">Total Days</th>
                        <th scope="col">Aproved Condition </th>
                        <th scope="col">status</th>
                        <th scope="col">Mangae</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    @foreach($all as $data)
                      <tr>
                        <td> {{$data->application_id}}</td>
                        <td>{{$data->app_subject}}</td>
                        <td>{{$data->request_days + 1 }} <strong> Days</strong> </td>
                        <!-- condition  -->
                        @if($data->post_status == 2)
                        <td><span class="bg-secondary p-1 text-white rounded-2"> Send to Aprove </span></td>
                        @elseif($data->post_status == 0)
                        <td><span class="bg-warning p-1 rounded-2 text-white"> Under Process </span></td>
                        @elseif($data->post_status == 1 and  $data->request_days == $data->aproved_days)
                        <td><span class="bg-success p-1 rounded-2 text-white">Unconditional approval</span></td>
                        @elseif($data->post_status == 3)
                        <td> <span class="bg-danger p-1 text-white rounded-2">Conditional Reject !</span> </td>
                        @else
                        <td> <span class="bg-danger p-1 text-white rounded-2">Conditional approval !</span> </td>
                        @endif
                        <!-- status -->

                        @php
                        $currentDateTime = date("Y-m-d");
                        @endphp
                        @if (!empty($data->ap_e_date) && strtotime($currentDateTime) > strtotime($data->ap_e_date))
                              <td><span class="bg-danger p-1 rounded-2 text-white">Expired</span></td>
                        @elseif (empty($data->ap_e_date) && $data->post_status == 2 && strtotime($currentDateTime) > strtotime($data->ap_e_date))
                            <td><span class="bg-danger p-1 rounded-2 text-white">Send to Approve</span></td>
                        @elseif ($data->post_status == 0)
                            <td><span class="bg-warning p-1 rounded-2 text-white">Approval Pending</span></td>
                        @elseif ($data->post_status == 1)
                            <td><span class="bg-success p-1 rounded-2 text-white">Approved</span></td>
                        @elseif ($data->post_status == 3)
                            <td><span class="bg-danger p-1 rounded-2 text-white">Rejected</span></td>
                        @endif


                        <!-- status -->
                        <td> 
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              @if($data->post_status == 2)
                              <li><a class="dropdown-item" href="{{url('dashboard/user/leave_application/edit/'.$data->slug)}}">edit</a></li>
                              @elseif($data->post_status == 0)
                              <li><a class="dropdown-item text-danger" href="#">Under Process</a></li>
                              @endif
                              <li><a class="dropdown-item" href="{{url('dashboard/user/leave_application/view/'.$data->slug)}}">view</a></li>
                              <li><a class="dropdown-item" onclick="return confirm('Delete this Information ')" href="{{url('dashboard/user/leave_application/softdelete/'.$data->application_id)}}">Dlete</a></li>
                              <li><hr class="dropdown-divider"></li>
                              @if ($data->post_status == 2) 
                              <li><a class="dropdown-item text-success fw-bold" href="{{url('dashboard/user/leave_application/post_active/'.$data->application_id)}}">Submit </a></li>
                              @elseif($data->post_status == 0)
                              <li><a class="dropdown-item text-success fw-bold " href="{{url('dashboard/user/leave_application/post_deactive/'.$data->application_id)}}">Withdraw </a></li>
                              @endif
                            </ul>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @endif
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