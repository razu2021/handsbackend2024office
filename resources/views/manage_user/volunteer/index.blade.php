@extends('alluser.volunteer.volunteer-dashboard')
@section('volunteer_contents')


<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Congratulations 🎉</h5>
                          <h1 class="fw-bold text-italic">{{ Auth::user()->name }}</h1>
                          <p class="mb-4">
                          Welcome to Human and Nature Development Society (HANDS) Dashboards
                          </p>

                            @if(Auth::user()->role !== Auth::user()->role_request)
                            @if(Auth::user()->role_request == 0)
                            <h3 class="card-title text-danger">Request __Normal User </h3>
                            @elseif(Auth::user()->role_request == 1)
                            <h3 class="card-title text-danger"> Request__Employee </h3>
                            @elseif(Auth::user()->role_request == 2)
                            <h3 class="card-title text-danger"> Request__Customer </h3>
                            @elseif(Auth::user()->role_request == 3)
                            <h3 class="card-title text-danger">Request__Volunteer </h3>
                            @endif
                            <button class="btn btn-outline-warning text-danger">Role Request has been Pandign !</button>
                            @else
                            <button class="btn btn-outline-success text-dark">Welcome ! your  Dashboard</button>
                            @endif
                          

                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="{{asset('contents/assets/admin')}}/assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <p>kindly Request to ! Update your user Role and Access your own Dashboard__ Current User </p>
                          </div>
                          <span class="fw-semibold d-block mb-1">Current User Role : </span>
                          @if(Auth::user()->role == 0)
                            <h3 class="card-title text-primary"> Normal User </h3>
                            @elseif(Auth::user()->role == 1)
                            <h3 class="card-title text-primary"> Employee </h3>
                            @elseif(Auth::user()->role == 2)
                            <h3 class="card-title text-primary"> Customer </h3>
                            @elseif(Auth::user()->role == 3)
                            <h3 class="card-title text-primary">Volunteer </h3>
                            @endif
                          
                        <p>Requset for Update your Role</p>
                          <div class=" mb-2 ">
                            <!-- session messages  -->
                          @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <!-- End session messages -->
                            <form action="{{route('volunteer_role_update')}}" method="post">
                                @csrf
                            <span class="text-danger">@error('role_request'){{$message}} @enderror</span>
                              <div class="input-group">
                              <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ Auth::user()->id}}" />
                                <select class="form-control"  name="role_request" id="role_request">
                                    <option value="">Update your Role Type</option>
                                    <option value="0">Normal User</option>
                                    <option value="1">Staff/Employee</option>
                                    <option value="2">Customer/Member</option>
                                    <option value="3">Volunteer</option>
                                </select>
                            
                                <div class="input-group-append">
                                  <button class="btn btn-outline-success" type="submit">Submit</button>
                                </div>
                               
                              </div>
                              </form>
                          </div>


                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-4">
                        <h5 class="card-header m-0 me-2 pb-3">Human and Nature Devlopment Society (HANDS)</h5>
                        <div id="" class="px-2">
                          <!-- calendar  -->
                          <p>Human and Nature Development Society(HANDS) is a micro-credit lending organization and besides it also works towards environmental protection and sustainable development. HANDS is also working as charitable organization.Hands is always dedicated to the welfare of people and nature</p>
                        </div>
                      </div>
                      <div class="col-md-8 text-center">
                        <h1 class="pt-5 display-1 fw-bold text-danger"> <div id="clock"></div></h1><hr>
                        <!-- date -->
                        <?php
                          $day = date('d');
                          $month = date('m');
                          $year = date('Y');

                          // Get the day name
                          $dayName = date('l', strtotime($year . '-' . $month . '-' . $day));

                          // Get the month name
                          $monthName = date('F', strtotime($year . '-' . $month . '-' . $day));
                          // Output the date with names
                          ?>
                          <h1><?php echo $dayName ?></h1>
                          <h5><?php echo  $monthName . " " . $day . ", " . $year; ?></h5>

                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                            </div>
                            
                          </div>
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                
              </div>
             
            </div>
          




@endsection