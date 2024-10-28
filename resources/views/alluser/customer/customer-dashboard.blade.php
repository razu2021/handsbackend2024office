@php
    $roletype = Auth::user()->role; // assuming role field is an integer
    $redirectURL = '';

    switch($roletype) {
        case 0:
            $redirectURL = 'user-dashboard';
            break;

        case 1:
            $redirectURL = 'dashboard';
            break;

        case 2:
            $redirectURL = 'customer-dashboard';
            break;

        case 3:
            $redirectURL = 'volunteer-dashboard';
            break;

        default:
            $redirectURL = 'user-dashboard';
            break;
    }
@endphp

<!DOCTYPE html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Customer Dashboard</title>
    <meta name="description" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('contents/assets/website')}}/assets/img/logo (2).png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet"/>
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/css/demo.css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/css/my.css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/css/hover.css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/css/responsive.css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/css/sweet_alert.min.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('contents/assets/admin')}}/assets/js/config.js"></script>
    <style>
      .layout-wrapper{
        position: scroll;
        top:0;
        left:0;
        overflow:scroll ;
      }
    </style>
  </head>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo" style="border-bottom:1px solid gray">
          <a href="{{url($redirectURL)}}" class="app-brand-link">
                <a href="{{url($redirectURL)}}" class="app-brand-link mb-2"><span class="app-brand-logo demo"><img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="" style="height: 4rem">  </span> </a>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>
          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Dashboard Management</span>
            </li>
            <li class="menu-item ">
              <a href="{{url($redirectURL)}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <!--  -->
            <li class="menu-item ">
              <a href="#" class="menu-link">
              <i class="menu-icon  tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Access Request</div>
              </a>
            </li>
            <!--  -->
          </ul>
        </aside>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input type="text"class="form-control border-0 shadow-none"placeholder="Search..."aria-label="Search..." />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a>{{ Auth::user()->name }}</a>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{asset('contents/assets/website')}}/assets/img/avatar.png" alt class="w-px-30 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{asset('contents/assets/website')}}/assets/img/avatar.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                            <small class="text-muted">User</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit()" >
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- / Navbar -->
          @yield('customer_contents')
            <!-- Footer -->
            <footer class="content-footer footer  bg-white mt-4">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://www.google.com/search?q=Md Razu Hossain Raj" target="_blank" class="footer-link fw-bolder">Md Razu Hossain Raj</a>
                </div>
                <div>
                
                  <a
                    href="https://www.google.com/search?q=Md Razu Hossain Raj"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <div class="content-backdrop fade"></div>
          </div>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <div class="buy-now">
      <a href="{{url('/chatify')}}" target="_blank" class="btn btn-danger btn-buy-now" >Massenger</a>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <!-- Vendors JS -->
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{asset('contents/assets/admin')}}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{asset('contents/assets/admin')}}/assets/js/dashboards-analytics.js"></script>
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/css/sweet_alert.min.js" />

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        function updateClock() {
            var currentTime = new Date();
            var options = {timeZone: 'Asia/Dhaka', hour12: true};
            var formattedTime = currentTime.toLocaleTimeString('en-US', options);
            document.getElementById('clock').textContent = formattedTime;
        }
        setInterval(updateClock, 1000);
</script>

<!-- limited date code  -->
<script>
        // JavaScript to set the max date dynamically based on the current month and year
        const today = new Date();
        const currentYear = today.getFullYear();
        const currentMonth = today.getMonth() + 1; // Months are 0-based, so add 1
        
        // Format current month with leading zero if needed
        const formattedMonth = currentMonth < 10 ? `0${currentMonth}` : currentMonth;

        // Set the maximum date to the 10th day of the current month
        const maxDate = `${currentYear}-${formattedMonth}-10`;
        document.getElementById('limitedDate').setAttribute('max', maxDate);
    </script>
<!--  -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Hide success alert after 3 seconds
        setTimeout(function() {
            let successAlert = document.getElementById('success-alert');
            if(successAlert) {
                successAlert.style.transition = "opacity 0.5s ease";
                successAlert.style.opacity = "0"; // fade out
                setTimeout(() => successAlert.remove(), 500); // then remove it after fade out
            }
        }, 3000); // 3000 milliseconds = 3 seconds

        // Hide error alert after 3 seconds
        setTimeout(function() {
            let errorAlert = document.getElementById('error-alert');
            if(errorAlert) {
                errorAlert.style.transition = "opacity 0.5s ease";
                errorAlert.style.opacity = "0"; // fade out
                setTimeout(() => errorAlert.remove(), 500); // then remove it after fade out
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    });
</script>
<!-- Auto hide masages  -->

  </body>
</html>
