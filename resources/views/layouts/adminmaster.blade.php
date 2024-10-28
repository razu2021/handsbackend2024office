<!DOCTYPE html >
<html   lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> Human and Nature Development Society (HANDS) || Md Razu Hossain Raj</title>
  <meta name="description" content="Human and Nature Development Society (HANDS) is a Non-Governmental Organization (NGO)" />
    <!-- Favicon -->
    <link rel="icon" href="{{asset('contents/assets/website')}}/assets/img/logo (2).png" type="image/x-icon" style="border-radius:20%">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/libs/apex-charts/apex-charts.css" />
    
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('contents/assets/admin')}}/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{url('/admin/dashboard')}}" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="" style="height: 4rem"> 
            </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="{{url('/admin/dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item active">
              <a href="{{route('all_link')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">AllPage Usefull link</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Manage User </div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('alluser.all')}}" class="menu-link">
                    <div data-i18n="Without menu">All Users </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">All Admin </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-container.html" class="menu-link">
                    <div data-i18n="Container">Admin Role</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-fluid.html" class="menu-link">
                    <div data-i18n="Fluid">Subscriber</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                    <div data-i18n="Blank">visitor</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- end  -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">User Applications</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('apply_course.all')}}" class="menu-link">
                    <div data-i18n="Without menu">Applications of Course</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('appoinment_book.all')}}" class="menu-link">
                    <div data-i18n="Without navbar">Book Appoinment</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('contactform.all')}}" class="menu-link">
                    <div data-i18n="Without navbar">Contact Messagea</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('becomevolunteer.all')}}" class="menu-link">
                    <div data-i18n="Without navbar">Become Volunteer </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('makeDonation.all')}}" class="menu-link">
                    <div data-i18n="Without navbar"> Donation </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('applyloan.all')}}" class="menu-link">
                    <div data-i18n="Without navbar"> Loan Application </div>
                  </a>
                </li>
                
              
               
              </ul>
            </li>
            <!-- end  -->



            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Manage Application </div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('admin/dashboard/manage-application/main-menu')}}" class="menu-link">
                    <div data-i18n="Without menu">Menu Items</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('admin/dashboard/manage-application/category')}}" class="menu-link">
                    <div data-i18n="Without navbar">Categorys</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('admin/dashboard/manage-application/subcategory')}}" class="menu-link">
                    <div data-i18n="Container">Sub Category </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('admin/dashboard/manage-application/socialmedia')}}" class="menu-link">
                    <div data-i18n="Fluid">Social Media </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('admin/dashboard/manage-application/socialmediaurl')}}" class="menu-link">
                    <div data-i18n="Blank">Social Media URL  </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('admin/dashboard/manage-application/phone')}}" class="menu-link">
                    <div data-i18n="Blank"> Manage Phone</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('admin/dashboard/manage-application/email')}}" class="menu-link">
                    <div data-i18n="Blank"> Manage Email </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('admin/dashboard/manage-application/address')}}" class="menu-link">
                    <div data-i18n="Blank"> Manage Address </div>
                  </a>
                </li>


              </ul>
            </li>





            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Front-end Management </span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings"> Common File</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('allbanner.all')}}" class="menu-link">
                    <div data-i18n="Account"> All Banner </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('bannerbottom.all')}}" class="menu-link">
                    <div data-i18n="Account"> Banner Bottom </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('micro_service.all')}}" class="menu-link">
                    <div data-i18n="Account"> All Services </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('allabout.all')}}" class="menu-link">
                    <div data-i18n="Account"> All Page About </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('page_desc.all')}}" class="menu-link">
                    <div data-i18n="Account"> All Page Description </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('allpost.all')}}" class="menu-link">
                    <div data-i18n="Account"> All Post  </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('product.all')}}" class="menu-link">
                    <div data-i18n="Account"> All Products  </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('blade.all')}}" class="menu-link">
                    <div data-i18n="Account"> Blade Manage </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('faqs.all')}}" class="menu-link">
                    <div data-i18n="Account"> Faq Manage </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('testimonial.all')}}" class="menu-link">
                    <div data-i18n="Account"> Testimonial </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('slogan.all')}}" class="menu-link">
                    <div data-i18n="Account"> Slogan Management  </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('fstatement.all')}}" class="menu-link">
                    <div data-i18n="Account"> Financial Statement</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('strategy.all')}}" class="menu-link">
                    <div data-i18n="Account"> Our Strategy  </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('allprojects.all')}}" class="menu-link">
                    <div data-i18n="Account">All Projects</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('whaydonate.all')}}" class="menu-link">
                    <div data-i18n="Account">Make Donation</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('branch.all')}}" class="menu-link">
                    <div data-i18n="Account">our Branch</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Home Page</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('allbanner.all')}}" class="menu-link">
                    <div data-i18n="Account">Index Banner </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('whatsnew.all')}}" class="menu-link">
                    <div data-i18n="Notifications">Whats New Service </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('smeads.all')}}" class="menu-link">
                    <div data-i18n="Notifications">SME Ads</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('serviceOverview.all')}}" class="menu-link">
                    <div data-i18n="Connections">Service Over Views</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('dipositads.all')}}" class="menu-link">
                    <div data-i18n="Connections">Diposit Ads </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('loansteps.all')}}" class="menu-link">
                    <div data-i18n="Connections">Loan Steps </div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">About Page</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('aboutus.all')}}" class="menu-link">
                    <div data-i18n="Basic">About us </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('whatwedo.all')}}" class="menu-link">
                    <div data-i18n="Basic">What we do</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('security_trust.all')}}" class="menu-link">
                    <div data-i18n="Basic">Security Trust</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('easyloan.all')}}" class="menu-link">
                    <div data-i18n="Basic">Easy Loan</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="auth-register-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">sdsd</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Forgot Password</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Get Involved </div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('ourimpact.all')}}" class="menu-link">
                    <div data-i18n="Error">Our Impact</div>
                  </a>
                </li>

                
                

              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Manage Gallery</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('photo_gallery.all')}}" class="menu-link">
                    <div data-i18n="Error">Photo Gallery </div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="{{route('video_gallery.all')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Video Gallery </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('field_storise.all')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Field Storis </div>
                  </a>
                </li>

              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Notice & Others</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('notice.all')}}" class="menu-link">
                    <div data-i18n="Error">Notice Board</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="{{route('jobpost.all')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Job Post</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('course.all')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Course </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('apply_course.all')}}" class="menu-link">
                    <div data-i18n="Under Maintenance">Course Application</div>
                  </a>
                </li>

              </ul>
            </li>
            <!-- other end  -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Staff & Other</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('designation.all')}}" class="menu-link">
                    <div data-i18n="Error">Designation Manage</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('allstaff.all')}}" class="menu-link">
                    <div data-i18n="Error">All Staff</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('customer.all')}}" class="menu-link">
                    <div data-i18n="Error">All Customer</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('doctors.all')}}" class="menu-link">
                    <div data-i18n="Error">Doctors</div>
                  </a>
                </li>
              </ul>
            </li>


            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Member & Customer</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('member_donner.all')}}" class="menu-link">
                    <div data-i18n="Error">Member & Donner </div>
                  </a>
                </li>
               

              </ul>
            </li>






            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
            <!-- Cards -->
            <li class="menu-item">
              <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Cards</div>
              </a>
            </li>
            <!-- User interface -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">User interface</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="ui-accordion.html" class="menu-link">
                    <div data-i18n="Accordion">Accordion</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-alerts.html" class="menu-link">
                    <div data-i18n="Alerts">Alerts</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-badges.html" class="menu-link">
                    <div data-i18n="Badges">Badges</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-buttons.html" class="menu-link">
                    <div data-i18n="Buttons">Buttons</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-carousel.html" class="menu-link">
                    <div data-i18n="Carousel">Carousel</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-collapse.html" class="menu-link">
                    <div data-i18n="Collapse">Collapse</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-dropdowns.html" class="menu-link">
                    <div data-i18n="Dropdowns">Dropdowns</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-footer.html" class="menu-link">
                    <div data-i18n="Footer">Footer</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-list-groups.html" class="menu-link">
                    <div data-i18n="List Groups">List groups</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-modals.html" class="menu-link">
                    <div data-i18n="Modals">Modals</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-navbar.html" class="menu-link">
                    <div data-i18n="Navbar">Navbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-offcanvas.html" class="menu-link">
                    <div data-i18n="Offcanvas">Offcanvas</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-pagination-breadcrumbs.html" class="menu-link">
                    <div data-i18n="Pagination &amp; Breadcrumbs">Pagination &amp; Breadcrumbs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-progress.html" class="menu-link">
                    <div data-i18n="Progress">Progress</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-spinners.html" class="menu-link">
                    <div data-i18n="Spinners">Spinners</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-tabs-pills.html" class="menu-link">
                    <div data-i18n="Tabs &amp; Pills">Tabs &amp; Pills</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-toasts.html" class="menu-link">
                    <div data-i18n="Toasts">Toasts</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-tooltips-popovers.html" class="menu-link">
                    <div data-i18n="Tooltips & Popovers">Tooltips &amp; popovers</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-typography.html" class="menu-link">
                    <div data-i18n="Typography">Typography</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Extended components -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Extended UI">Extended UI</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Perfect scrollbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="extended-ui-text-divider.html" class="menu-link">
                    <div data-i18n="Text Divider">Text Divider</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="icons-boxicons.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Boxicons">Boxicons</div>
              </a>
            </li>

            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
            <!-- Forms -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Form Elements</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="forms-basic-inputs.html" class="menu-link">
                    <div data-i18n="Basic Inputs">Basic Inputs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="forms-input-groups.html" class="menu-link">
                    <div data-i18n="Input groups">Input groups</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">Form Layouts</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="form-layouts-vertical.html" class="menu-link">
                    <div data-i18n="Vertical Form">Vertical Form</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="form-layouts-horizontal.html" class="menu-link">
                    <div data-i18n="Horizontal Form">Horizontal Form</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Tables -->
            <li class="menu-item">
              <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Tables</div>
              </a>
            </li>
            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <li class="menu-item">
              <a
                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
              </a>
            </li>
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
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="https://i.ibb.co/wh0vRYr/92-D12-F8-E-9-D64-4-B11-896-E-0162-A74-CFF48.jpg" alt class="w-px-30 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="https://i.ibb.co/wh0vRYr/92-D12-F8-E-9-D64-4-B11-896-E-0162-A74-CFF48.jpg" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ Auth::guard('admin')->user()->name }}</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
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
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                    <li>
                      <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();this.closest('form').submit()" >
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </form>

                    
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

            @yield('admin_content')

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
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{asset('contents/assets/admin')}}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{asset('contents/assets/admin')}}/assets/js/dashboards-analytics.js"></script>
    <!-- ck editor  -->
    <script src="{{asset('contents/assets/admin')}}/assets/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
    <script>
        CKEDITOR.replace( 'editor2' );
    </script>

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
  </body>
</html>
