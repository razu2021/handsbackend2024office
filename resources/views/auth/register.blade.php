
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{asset('contents/assets/admin')}}/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/css/demo.css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('contents/assets/admin')}}/assets/vendor/css/pages/page-auth.css"/>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/helpers.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/js/config.js"></script>
  </head>
  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <div class="card " style="width: 29rem;">
            <div class="card-body">
              <div class="app-brand justify-content-center">
                <a href="{{route('index')}}" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                      <img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="Organization Logo" style="height: 3rem ; width:auto">
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Sneat</span>
                </a>
              </div>
              <h4 class="mb-2">Adventure starts here 🚀</h4>
              <p class="mb-4">Make your app management easy and fun!</p>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="form-control"  placeholder="Enter your first name" />
                    <span class="text-danger"><x-input-error :messages="$errors->get('name')" class="mt-2" /><span>
                </div>

                <div class="mb-3">
                  <label for="username" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" autofocus :value="old('email')" required autocomplete="username"/>
                  <span class="text-danger"><x-input-error :messages="$errors->get('email')" class="mt-2"/><span>
                </div>
                    <!-- email end here -->

                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="password" aria-describedby="password" required autocomplete="new-password"/>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    <span class="text-danger"><x-input-error :messages="$errors->get('password')" class="mt-2" /><span>
                  </div>
                </div>
                <!-- Confirm Password -->
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password_confirmation"> Confirmation Password </label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password"/>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    <span class="text-danger"><x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /><span>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>
              <p class="text-center pt-2">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="buy-now">
      <a href="https://ulcbd.org/mdrazuhossainraj/fullstack_developer" target="_blank" class="btn btn-danger btn-buy-now">Support</a>
    </div>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/vendor/js/menu.js"></script>
    <script src="{{asset('contents/assets/admin')}}/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>







