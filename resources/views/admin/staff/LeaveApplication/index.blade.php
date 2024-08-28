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
                          <a href="{{url('admin/dashboard/manage/leave_application/recycle')}}"><button class="btn btn-danger text-white px-4">Recycle</button></a>
                          </div>
                      </div>
                    </div>
                    <hr>
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th scope="col">Applicant's Name </th>
                        <th scope="col">Application Subject </th>
                        <th scope="col">Request Days</th>
                        <th scope="col">aproved Days</th>
                        <th scope="col">Aproved Condition </th>
                        <th scope="col">status</th>
                        <th scope="col">Mangae</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    @foreach($all as $data)
                      <tr>
                        <td> {{$data->creator}}</td>
                        <td>{{$data->app_subject}}</td>
                        <td>{{$data->request_days + 1 }} <strong> Days</strong> </td>
                        
                        @if(!empty($data->aproved_days))
                          <td><span class="bg-success p-1 text-white rounded-2">{{$data->aproved_days + 1 }} <strong> Days</strong></span> </td>
                        @else
                        <td><span class="bg-secondary p-1 text-white rounded-2"> Pending</span></td>
                        @endif

                        @if($data->post_status == 2)
                        <td><span class="bg-secondary p-1 text-white rounded-2"> NO</span></td>
                        @elseif($data->post_status == 0)
                        <td><span class="bg-warning p-1 rounded-2 text-white"> Set your Condition </span></td>
                        @elseif($data->post_status == 1 and  $data->request_days == $data->aproved_days)
                        <td><span class="bg-success p-1 rounded-2 text-white">Unconditional approval</span></td>
                        @elseif($data->post_status == 3)
                        <td> <span class="bg-danger p-1 text-white rounded-2">Conditional Reject !</span> </td>
                        @else
                        <td> <span class="bg-danger p-1 text-white rounded-2">Conditional approval !</span> </td>
                        @endif
                     

                        <!-- status  -->
                        @php
                        $currentDateTime = date("Y-m-d");
                        @endphp
                        @if (!empty($data->ap_e_date) && strtotime($currentDateTime) > strtotime($data->ap_e_date))
                              <td><span class="bg-danger p-1 rounded-2 text-white">Expired</span></td>
                        @elseif (empty($data->ap_e_date) && $data->post_status == 2 && strtotime($currentDateTime) > strtotime($data->ap_e_date))
                            <td><span class="bg-danger p-1 rounded-2 text-white">New Add </span></td>
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
                              @if($data->post_status == 0)
                              <li><a class="dropdown-item text-success" href="{{url('admin/dashboard/manage/leave_application/edit/'.$data->slug)}}"> Set Authorization </a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item text-success" href="{{url('admin/dashboard/manage/leave_application/post_active/'.$data->application_id)}}"> Aproved </a></li>
                              <li><a class="dropdown-item text-danger" href="{{url('admin/dashboard/manage/leave_application/post_deactive/'.$data->application_id)}}"> Rejected </a></li>
                              @endif
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="{{url('admin/dashboard/manage/leave_application/view/'.$data->slug)}}">view</a></li>
                              <li><a class="dropdown-item" onclick="return confirm('Delete this Information ')" href="{{url('admin/dashboard/manage/leave_application/softdelete/'.$data->application_id)}}">Dlete</a></li>
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