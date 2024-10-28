<!DOCTYPE html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('contents/assets/admin')}}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('contents/assets/admin')}}/assets/js/config.js"></script>
  </head>

  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="{{route('index')}}" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="Organization Logo" style="height: 3rem ; width:auto">
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">HANDS</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2"><strong class="text-success"> Welcome to,</strong><br> Human and Nautre Development Society (HANDS)  👋</h4>
              <p class="mb-4">Please sign-in to your account and start the adventure</p>

              <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email or Username</label>
                  <input class="form-control"  placeholder="Enter your email or username" 
                  id="email"  type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
                  <span class="text-danger"><x-input-error :messages="$errors->get('email')" class="mt-2" /></span>
                </div>

                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                    <small>Forgot Password?</small>
                    </a>
                    @endif
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password"  type="password"  class="form-control"  name="password" placeholder="passwprd" aria-describedby="password"  required autocomplete="current-password"/>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input"  id="remember_me" type="checkbox"  name="remember" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>


                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

              <p class="text-center">
                <span>New on our platform?</span>
                <a href="{{ route('register') }}">
                  <span>Create an account</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <div class="buy-now">
      <a
        href="https://ulcbd.org/mdrazuhossainraj/fullstack_developer"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Support</a
      >
    </div>






   <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset('contents/assets/admin')}}/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
