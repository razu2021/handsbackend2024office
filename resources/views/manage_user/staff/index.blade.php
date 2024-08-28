@extends('dashboard')
@section('content')
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
                            You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                            your profile.
                          </p>

                          <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
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
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="{{asset('contents/assets/admin')}}/assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Profit</span>
                          <h3 class="card-title mb-2">$12,628</h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="{{asset('contents/assets/admin')}}/assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span>Sales</span>
                          <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-4">
                        <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                        <div id="" class="px-2">
                          <!-- calendar  -->
                          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum vero molestiae, exercitationem fugiat ratione quod illo excepturi repellat nobis quia?</p>
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
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 ">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="{{asset('contents/assets/admin')}}/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                            </div>
                         
                          </div>
                          <span class="d-block mb-1">Payments</span>
                          <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                          <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                        </div>
                      </div>
                    </div>
                    <!-- col end  -->

                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="{{asset('contents/assets/admin')}}/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Transactions</span>
                          <h3 class="card-title mb-2">$14,857</h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                        </div>
                      </div>
                    </div>
                    <!-- </div>
    <div class="row"> -->
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Profile Report</h5>
                                <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-semibold"
                                  ><i class="bx bx-chevron-up"></i> 68.2%</small
                                >
                                <h3 class="mb-0">$84,686k</h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Order Statistics</h5>
                        <small class="text-muted">42.82k Total Sales</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="orederStatistics"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                          <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                          <h2 class="mb-2">8,258</h2>
                          <span>Total Orders</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                      </div>
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"
                              ><i class="bx bx-mobile-alt"></i
                            ></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Electronic</h6>
                              <small class="text-muted">Mobile, Earbuds, TV</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">82.5k</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Fashion</h6>
                              <small class="text-muted">T-shirt, Jeans, Shoes</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">23.8k</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Decor</h6>
                              <small class="text-muted">Fine Art, Dining</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">849k</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"
                              ><i class="bx bx-football"></i
                            ></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Sports</h6>
                              <small class="text-muted">Football, Cricket Kit</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">99</small>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Order Statistics -->

                <!-- Expense Overview -->

                <!--/ Expense Overview -->

                <!-- Transactions -->
                <div class="col-md-6 col-lg-6 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
              <!-- Bootstrap Dark Table -->
                        <div class="card">
                          <div class="table-responsive text-nowrap">
                            <table class="table table-dark">
                              <thead>
                                <?php
                                  $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                                  $firstDayOfWeek = date('N', strtotime($year . '-' . $month . '-01'));
                                  echo "<h2>Calendar - " . date('F Y') . "</h2>";
                                  echo "<table-responsive text-nowrap>";
                                  echo "<tr><th>Mon</th> <th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr>";
                                  $blankCells = $firstDayOfWeek - 1;
                                  $dayCounter = 1;
                                  for ($row = 0; $row < 6; $row++) {
                                      echo "<tr>";
                                      for ($col = 0; $col < 7; $col++) {
                                          if ($blankCells > 0) {
                                              echo "<td></td>";
                                              $blankCells--;
                                          }elseif ($dayCounter <= $daysInMonth) {
                                              $isActiveDay = ($dayCounter == $day) ? 'active-day' : '';
                                              echo "<td class='$isActiveDay'>$dayCounter</td>";
                                              $dayCounter++;
                                          }else {
                                              echo "<td></td>";
                                          }
                                      }
                                      echo "</tr>";
                                  }
                                  echo "</table>";
                                  ?>      
                              </thead>
                            </table>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
              </div>
            </div>
            <!-- / Content -->



@endsection