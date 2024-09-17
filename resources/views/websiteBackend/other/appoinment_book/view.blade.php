@extends('layouts.adminmaster')
@section('admin_content')
<section class="mb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
            <div class="card text-left">
                <div class="row">
                    <div class="col-lg-7 m-2"><h3 class="p-2 text-uppercase"><span><i class="fas fa-solid fa-trademark"></i></span> Single Information </h3></div>
                    <div class="col-lg-3 text-end m-2 p-2"><a class="p-2" href="{{route('appoinment_book.all')}}"><button class="btn btn-success">All information</button></a></div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td class="text-end">
                          <strong> appoinment_book Id</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->appoinment_book_id}}</td>
                      </tr>
                     
                      <tr>
                        <td class="text-end">
                          <strong> Name </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>email</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->email}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>phone </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->phone}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>address</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->address}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Subject </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->subject}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>caption</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->caption}}
                        </td>
                      </tr>
                      <tr>
                        <!-- caption end  -->
                      <tr>
                        <td class="text-end">
                          <strong>Aproval Status : </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
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
                      </tr>
                      <tr>
                        <!-- application Status end  -->
                      <tr>
                        <td class="text-end">
                          <strong>Approval Date</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        @if($data->post_status == 1 && $data->app_date != "") 
                           <td><span class="badge bg-primary">{{\Carbon\Carbon::parse($data->app_date)->format('d-F-Y') }} <b>||</b> {{ \Carbon\Carbon::parse($data->app_time)->format('H:i A') }}</span></td>
                           @elseif($data->post_status == 2 && $data->app_date != "") 
                           <td><span class="badge bg-secondary">{{\Carbon\Carbon::parse($data->app_date)->format('d-F-Y') }} <b>||</b> {{ \Carbon\Carbon::parse($data->app_time)->format('H:i A') }}</span></td>
                           @elseif($data->post_status == 0)
                           <td><span class="badge bg-danger">Appointment Denied</span></td>
                           @else
                           <td> <span class="badge bg-warning">Under Review</span></td>
                           @endif
                      </tr>
                      <!-- aproval date end  -->

                      <tr>
                        <td class="text-end">
                          <strong>Status</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        @if($data->status == 1)
                        <td class="text-left text-success">Published</td>
                        @else
                        <td class="text-left text-danger">Unpublished</td>
                        @endif
                      </tr>
                      <!-- application Status  -->
                      <tr>
                        <td class="text-end">
                          <strong>Post Status</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        @if ($data->post_status == 1) 
                          <td> <span class="badge bg-primary">Approved</span></td>
                          @elseif($data->post_status == 0)
                          <td> <span class="badge bg-danger">Denied</span></td>
                          @elseif($data->post_status == 2 && $data->app_date && $data->app_time)
                          <td> <span class="badge bg-danger">Pause</span></td>
                          @else
                          <td> <span class="badge bg-warning">Pending</span></td>
                          @endif 
                      </tr>
                        <tr>
                          <td class="text-end"><strong>Approval Date & Time</strong></td>
                          <td class="text-center"><strong>: </strong></td>
                          <td><span class="badge bg-warning"> 
                            
                          @php
                            use Carbon\Carbon;

                            // Parse the appointment date and time
                            $appDate = Carbon::parse($data->app_date); // Replace with your actual appointment date field
                            $appTime = Carbon::parse($data->app_time); // Replace with your actual appointment time field

                            // Combine app_date and app_time if they are separate
                            $appointmentDateTime = Carbon::parse($data->app_date . ' ' . $data->app_time);

                            // Get the current date and time
                            $currentDateTime = Carbon::now();

                            // Check if the appointment is upcoming or expired
                            if ($appointmentDateTime->isFuture()) {
                                // If upcoming, calculate how many days/hours/minutes are left
                                $timeDifference = $currentDateTime->diff($appointmentDateTime);

                                if ($timeDifference->y > 0) {
                                    echo $timeDifference->y . " year" . ($timeDifference->y > 1 ? "s" : "") . " left";
                                } elseif ($timeDifference->m > 0) {
                                    echo $timeDifference->m . " month" . ($timeDifference->m > 1 ? "s" : "") . " left";
                                } elseif ($timeDifference->d > 0) {
                                    echo $timeDifference->d . " day" . ($timeDifference->d > 1 ? "s" : "") . " left";
                                } elseif ($timeDifference->h > 0) {
                                    echo $timeDifference->h . " hour" . ($timeDifference->h > 1 ? "s" : "") . " left";
                                } elseif ($timeDifference->i > 0) {
                                    echo $timeDifference->i . " minute" . ($timeDifference->i > 1 ? "s" : "") . " left";
                                } else {
                                    echo "The appointment is now";
                                }
                            } else {
                                // If expired, calculate how long ago it was
                                $timeDifference = $appointmentDateTime->diff($currentDateTime);

                                if ($timeDifference->y > 0) {
                                    echo $timeDifference->y . " year" . ($timeDifference->y > 1 ? "s" : "") . " ago";
                                } elseif ($timeDifference->m > 0) {
                                    echo $timeDifference->m . " month" . ($timeDifference->m > 1 ? "s" : "") . " ago";
                                } elseif ($timeDifference->d > 0) {
                                    echo $timeDifference->d . " day" . ($timeDifference->d > 1 ? "s" : "") . " ago";
                                } elseif ($timeDifference->h > 0) {
                                    echo $timeDifference->h . " hour" . ($timeDifference->h > 1 ? "s" : "") . " ago";
                                } elseif ($timeDifference->i > 0) {
                                    echo $timeDifference->i . " minute" . ($timeDifference->i > 1 ? "s" : "") . " ago";
                                } else {
                                    echo "Just now";
                                }
                            }
                          @endphp
                          </span>
                        </td>
                        </tr>


                      <tr>
                        <td class="text-end">
                          <strong>Ceated At</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Updated At</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        @if($data->updated_at != "" )
                          <td class="text-left">{{$data->updated_at->format('Y-m-d H:i:s A')}}</td>
                        @else
                         <td class="text-left">Not Updated</td>
                        @endif
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>Creator Info</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td>{{$data->creator}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Editor Info</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                         
                        @if($data->editor != "")
                          <td class="text-left text-success">{{$data->editorInfo->name}} </td>
                        @else
                          <td class="text-left">No Editor Found </td>
                        @endif
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection