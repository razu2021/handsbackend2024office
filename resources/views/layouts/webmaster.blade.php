<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{asset('contents/assets/website')}}/assets/img/logo (2).png" type="image/x-icon" style="border-radius:20%">
    <!-- external css  -->
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/font.all.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/hover.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/menu_responsive.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/sass/main.css">
    <!-- external css end here  -->
 
</head>

<body>
<!-- <div id="preloader" class="preloaders">
<img src="https://handsbd.org/public/contents/assets/website/assets/img/logo%20(2).png" alt="" >
  <div class="loading">
    <div class="loading__letter">H</div><div class="loading__letter">A</div><div class="loading__letter">N</div><div class="loading__letter">D</div><div class="loading__letter">S</div> <div class="loading__letter">.</div> <div class="loading__letter">.</div><div class="loading__letter">.</div>
  </div>
</div> -->
    <!-- ===================  main header area start here ============ -->
    <!-- <ul>
        @foreach($mainmenu as $main_menu)
        <li class="text-dark"> {{$main_menu->menu_name}} 
            @foreach($category as $cat)
                @if($cat->main_menu_id == $main_menu->menu_id)
                <li class="text-warning">{{$cat->category_name}}
                    @foreach($subcategory as $subcat)
                        @if($subcat->category_menu_id == $cat->category_id)
                        <li class="text-danger"> {{$subcat->subcategory_name}} </li>
                        @endif
                    @endforeach
                </li>
                @endif
            @endforeach
        </li>
        @endforeach
    </ul>
 -->


    <div id="desktop_header_bg">
        <div class="container">
            <div class="desktop__header ">
                <div class="desktop__header__logo">
                    <a href="index.html"><img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="image" class="img-fluid"></a>
                </div>
                <div class="desktop__social">
                    <ul>
                        <li><a href="contact.html"> <span> <i class="fa-solid fa-location-dot"></i> </span> Our Corporate Office </a></li>
                        <li><a href="mailto:hands7@yahoo.com"> <span> <i class="fa-solid fa-envelope"></i> </span>hands7@yahoo.com</a></li>
                        <li><a href="tel:+8801602-351089"> <span> <i class="fa-solid fa-phone"></i> </span> +880 1602-351089</a></li>
                    </ul>
                </div>
                <div class="desktop__header__toggler ">
                    <a href="{{url('get-appoinment')}}">Get Appoinment </a>
                    <a href="{{url('interenship-program')}}"> Internship </a>
                    <a href="{{url('job-and-career-program')}}"> Career</a>
                    <a href="{{url('hands-notice-board')}}"> Notice</a>
                </div>
            </div>
        </div>
    </div>
    <!-- header top  -->
    <header>
        <div class="container">
            <div class="mobile__header ">
                <div class="mobile__header__logo">
                    <a href="{{url('/')}}"><img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="image" class="img-fluid"></a>
                </div>
                <div class="mobile__social">
                    <ul>
                        <li><a href="https://www.facebook.com/humanandnaturedevelopmentsociety"> <span> <i class="fa-brands fa-square-facebook"></i> </span></a></li>
                        <li><a href="https://www.linkedin.com/company/human-and-nature-development-society-hands/?viewAsMember=true">
                                <span> <i class="fa-brands fa-linkedin"></i> </span></a></li>
                        <li><a href="https://twitter.com/hands_bd"> <span> <i class="fa-brands fa-square-x-twitter"></i></span></a></li>
                        <li><a href="https://www.youtube.com/channel/UCTAqN_DX4Hsjuk4MPGrHsiQ"> <span> <i class="fa-brands fa-youtube"></i> </span></a></li>
                    </ul>
                </div>
                <div class="mobile__header__toggler " id="show" onclick="toggleMenushow()">
                    <span><i class="fa-solid fa-bars"></i></span>
                </div>
            </div>
        </div>
        <!-- header top  -->
        <div id="myheader">
            <div class="container">
                <div class="row myheader">
                    <!-- mobile__menu start here  -->
                    <div class="mobile__menu " id="mobile__menu">
                        <div class="mobile__logo">
                            <a href="{{url('.')}}">HANDS </a>
                        </div>
                        <div class="mobile__toggler" onclick="toggleMenuclose()">
                            <span>&times;</span>
                        </div>
                    </div>
                    <div class="main__menu__area">
                        <!-- mobile menu end here  -->
                        <div class="main__menu ">
                            <ul>
                                <li class="list-item"><a href="{{url('/')}}" class="list-link"> Home </a></li>
                                <li class="list-item main__dropdown"><a href="{{url('about-human-and-nature-developmetn-society-(hands)')}}" class="list-link"> About Us <span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{url('organizetional-structure')}}" class="list-link"> Organizational Structure <span> + </span></a>
                                                <div class="submenu">
                                                    <ul>
                                                        <li><a href="{{route('chairman')}}">Chairman</a></li>
                                                        <li><a href="{{url('managing-director-of-hands')}}">Managing
                                                                Director</a></li>
                                                        <li><a href="{{url('finance-director-of-hands')}}"> Finance
                                                            Director</a></li>
                                                    </ul>
                                                </div>
                                                <!-- submenu  -->
                                            </li>
                                            <li class="list-item"><a href="{{url('financial-statement')}}" class="list-link"> Financial Statement</a></li>
                                            <li class="list-item"><a href="{{url('where-we-work')}}" class="list-link">
                                                    Where We Work</a></li>
                                            <li class="list-item"><a href="{{url('our-stratiegy')}}" class="list-link">
                                                    Our Strategy</a></li>
                                            <li class="list-item"><a href="{{url('our-mission-and-our-vision')}}" class="list-link"> Mission & Vision </a></li>
                                            <li class="list-item"><a href="{{url('our-faith')}}" class="list-link">Our
                                                    Faith </a></li>
                                        </ul>
                                    </div>
                                    <!-- main__dropdown end  -->
                                </li>
                                <!-- main li end here  -->
                                <li class="list-item main__dropdown"><a href="{{url('what-we-do')}}" class="list-link">
                                        What We Do <span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item main__dropdown"><a href="{{url('micro-finance-loan')}}" class="list-link"> Micro Finance <span> + </span></a>
                                                <div class="submenu">
                                                    <ul>
                                                        <li><a href="{{url('basic-loan')}}">Basic Loan </a></li>
                                                        <li><a href="{{url('microenterprice-loan')}}">Microenterprise
                                                                Loan</a></li>
                                                        <li><a href="{{url('crop-loan')}}">Crop Loan</a></li>
                                                        <li><a href="{{url('livestock-loan')}}">Livestock Loan</a></li>
                                                        <li><a href="{{url('special-loan')}}">Special Loan</a></li>
                                                        <li><a href="{{url('house-loan')}}">Housing Loan</a></li>
                                                        <li><a href="{{url('agriculture-loan')}}">Agriculter Loan</a>
                                                        </li>
                                                        <li><a href="{{url('higher-education-loan')}}">Higher Education
                                                                Loan</a></li>
                                                        <li><a href="{{url('woman-empowerment-loan')}}">Woman
                                                                Empowerment Loan</a></li>
                                                    </ul>
                                                </div>
                                                <!-- submenu  -->
                                            </li>
                                            <li class="list-item main__dropdown"><a href="{{url('hands-saving-accounts-plan')}}" class="list-link">
                                                    Saving Account <span> + </span></a>
                                                <div class="submenu">
                                                    <ul>
                                                        <li><a href="{{url('hands-pension-scheme')}}">Hands Pension
                                                                scheme</a></li>
                                                        <li><a href="{{url('fixed-dipsit-plan')}}">Fixed Deposit</a>
                                                        </li>
                                                        <li><a href="{{url('dubble-and-8years-diposit')}}">Dubble in 8
                                                                Years Deposit</a></li>
                                                        <li><a href="{{url('family-welfair-saving-plan')}}">Family
                                                                Welfair Savings</a></li>
                                                        <li><a href="{{url('two-years-saving')}}">Two Year Saving</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- submenu  -->
                                            </li>
                                            <!-- main submenu end  -->
                                            <li class="list-item"><a href="{{url('emergency relief for emergency crisis')}}" class="list-link">Emergency Relief</a></li>
                                            <li class="list-item"><a href="{{url('what-we-do-for-economic-development-for-underprivileged-area')}}" class="list-link">Economic Development</a></li>
                                            <li class="list-item"><a href="{{url('what-we-do-for-child-protection')}}" class="list-link">Child Protection</a></li>
                                            <li class="list-item"><a href="{{url('support-for-education')}}" class="list-link">Education</a></li>
                                            <li class="list-item"><a href="{{url('health-and-nutrition')}}" class="list-link">Health & Nutrition</a></li>
                                            <li class="list-item"><a href="{{url('water-sanitation-and-hygiene')}}" class="list-link">Water Sanitation / Hygiene</a></li>
                                        </ul>
                                    </div>
                                    <!-- main__dropdown end  -->
                                </li>
                                <!-- main li end here  -->
                                <li class="list-item main__dropdown"><a href="{{url('legal-aid')}}" class="list-link">
                                        Legal Aid <span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{url('legal-aid-awareness-and-training')}}" class="list-link">Awareness \ Training </a></li>
                                            <li class="list-item"><a href="{{url('mediation')}}" class="list-link">
                                                    Mediation</a></li>
                                            <li class="list-item"><a href="{{url('public-interest-litigation')}}" class="list-link">Public Interest Litigation(PIL)</a></li>
                                            <li class="list-item"><a href="{{url('litigation')}}" class="list-link">Litigation</a></li>
                                        </ul>
                                    </div>
                                    <!-- main__dropdown end  -->
                                </li>
                                <!-- main li end here  -->
                                <li class="list-item main__dropdown"><a href="{{url('our-gallery')}}" class="list-link">
                                        Gallery <span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{url('photo-gallery')}}" class="list-link">Photo Gallery</a></li>
                                            <li class="list-item"><a href="{{url('video-gallery')}}" class="list-link">Video Gallery</a></li>
                                            <li class="list-item"><a href="{{url('our-field-stories')}}" class="list-link">Our Field Storis</a></li>
                                        </ul>
                                    </div>
                                    <!-- main__dropdown end  -->
                                </li>
                                <!-- main li end here  -->
                                <li class="list-item main__dropdown"><a href="{{url('hands-news-and-blogs-events')}}" class="list-link"> News/Feeds<span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{url('our-all-news')}}" class="list-link">news</a></li>
                                            <li class="list-item"><a href="{{url('our-blogs-and-events')}}" class="list-link">blog/events</a></li>
                                        </ul>
                                    </div>
                                    <!-- main__dropdown end  -->
                                </li>
                                <!-- main li end here  -->
                                <li class="list-item main__dropdown"><a href="javascript:void(0);" class="list-link">get involved<span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{url('volunteer')}}" class="list-link">volunteer</a></li>
                                            <li class="list-item"><a href="{{url('become-volunteer')}}" class="list-link">Become a volunteer</a></li>
                                            <li class="list-item"><a href="{{url('other-programs-and-activitis-of-hands')}}" class="list-link">Other's Program & Activitis </a></li>
                                            <li class="list-item"><a href="{{url('our-valueable-donners-and-members')}}" class="list-link"> Our Valueable donner</a></li>
                                            <li class="list-item"><a href="{{url('product-for-human-being')}}" class="list-link">product for Human Being</a></li>
                                            <li class="list-item"><a href="{{url('free-medical-and-health-campaign')}}" class="list-link">free Health Campaign</a></li>
                                            <li class="list-item"><a href="{{url('our-impact')}}" class="list-link">Our
                                                    Impact</a></li>
                                        </ul>
                                    </div>
                                    <!-- main__dropdown end  -->
                                </li>
                                <!-- main li end here  -->
                                <li class="list-item main__dropdown"><a href="{{url('our-team')}}" class="list-link">
                                        Our Team <span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{url('our-genrel-team')}}" class="list-link">Genarel Team</a></li>
                                            <li class="list-item"><a href="{{url('our-legal-team')}}" class="list-link">Leagal Team</a></li>
                                        </ul>
                                    </div>
                                    <!-- main__dropdown end  -->
                                </li>
                                <!-- main li end here  -->
                                <li class="list-item"><a href="{{ url('contact-us') }}" class="list-link"> Contact </a>
                                </li>
                            </ul>
                        </div>
                       
                    
                    
                        <!-- main menu end  -->
                        <div class="user__menu">
                            <div class="mobile_career_menu">
                                <ul>
                                <li class="list-item "> <a href="{{url('get-appoinment')}}">Get Appoinment </a></li>
                                <li class="list-item "> <a href="{{url('interenship-program')}}"> Internship </a></li>
                                <li class="list-item "> <a href="{{url('job-and-career-program')}}"> Career</a></li>
                                <li class="list-item "> <a href="{{url('hands-notice-board')}}"> Notice</a></li>
                                </ul>
                            </div>
                            <ul>
                                <li class="list-item"><a href="{{url('make-your-donation')}}" class="lisct-link"><i class="fa-solid fa-hand-holding-dollar"></i> <span> Donate </span></a></li>
                                <li class="list-item">
                                    <a href="{{url('#')}}" class="lisct-link"><i class="fa-solid fa-user"></i> <span>
                                Razu</span></a>
                                </li>
                                <li class="list-item"><a href="#" class="lisct-link" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-bars-staggered"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- user menu end  -->
                        <!-- main menu area  -->
                    </div>
                </div>
                <!-- row end  -->
            </div>
            <!-- row end  -->
        </div>
    </header>
    <!-- Button trigger modal -->

    <!-- Button trigger modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-fullscreen-xxl-down">
            <div class="modal-content ">
                <div class="modal-header">
                    <div class="container">
                        <div class="row">
                            <div class="model_header">
                                <span> <img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" class="img-fluid" alt="image" /> </span>
                                <h1 class="" id="exampleModalLabel">Human and Nature Development Sociecty (HANDS)</h1>
                                <button type="" class=" " data-bs-dismiss="modal" aria-label="Close"> x </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-8 col-xxl-8 ">
                                <div class="user_faq row">
                                    <!--  -->
                                    <h1> Without Login you can't Access Dashboard !</h1>

                                    <!--  -->
                                </div>
                            </div>
                            <!-- col end  -->
                            <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                                <div class="profile_section">
                                    <div class="user_profile">
                                        <div class="user_profile_image">
                                            <img src="{{asset('contents/assets/website')}}/assets/img/razu.jpg" alt="Profile image" class="img-fluid">
                                        </div>
                                        <div class="user_profile_info">
                                            <h3>Md Razu Hossain Raj</h3>
                                            <strong> Full-Stack Developer</strong>
                                            <div class="case_heading pb-5 ">
                                                <span> <i class="fas fa-hand-holding-heart"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- profile end -->
                                    <div class="user_log">
                                        <button> <a href="#">Login</a></button>
                                        <button><a href="#">Registration</a></button>
                                    </div>
                                    <div class="flow_us_social text-center">
                                        <div class="flow_us ">
                                            <p class="pb-2"><strong>Fllow us : </strong> </p>
                                            <!-- Facebook -->
                                            <a class="btn text-white" data-mdb-ripple-init style="background-color: #3b5998;" href="#!" role="button">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <!-- Twitter -->
                                            <a class="btn text-white" data-mdb-ripple-init style="background-color: #55acee;" href="#!" role="button">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <!-- Linkedin -->
                                            <a class="btn text-white" data-mdb-ripple-init style="background-color: #0082ca;" href="#!" role="button">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <!-- Instagram -->
                                            <a class="btn text-white" data-mdb-ripple-init style="background-color: #ac2bac;" href="#!" role="button">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- fllow us end -->
                                    <div class="app_download">
                                        <p class="pb-2"> <strong> Mobile Apps Download : </strong> </p>
                                        <button><a href=""><img src="{{asset('contents/assets/website')}}/assets/img/vactor/playstor.png" alt="app" class="img-fluid"></a></button>
                                        <button><a href=""><img src="{{asset('contents/assets/website')}}/assets/img/vactor/apple.png" alt="app" class="img-fluid"></a></button>
                                    </div>
                                </div>
                            </div>
                            <!-- col end  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal  -->

    <!-- modal  -->
    <!-- =================== ======== main header area end  here========= ============ -->

    @yield('web_content')

    <!-- ===========   footer area start here  -->
    <footer class="footer_bg_image">
        <div class="footer_bg_image_overlay">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="header_top_content">
                                <h1>Human and Nature Development Society <span> (HANDS)</span></h1>
                                <P>Human and Nature Development Society(HANDS) is a micro-credit lending organization
                                    and besides it also works towards environmental protection and sustainable
                                    development. HANDS is also working as charitable organization.Hands is always
                                    dedicated to the welfare of people and nature</P>
                            </div>
                        </div>
                        <!-- col end -->
                    </div>
                    <div class="brb"></div>
                </div>
            </section>
            <!-- footer top end  -->
            <section class="footer_content_area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                            <div class="footer_content">
                                <h1 class="footer_title"> about company </h1>
                                <div class="footer_logo">
                                    <a href="index.html"><img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="Footer Logo" class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                        <!-- col end  -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2">
                            <div class="footer_content">
                                <h1 class="footer_title"> Finance </h1>
                                <ul>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('basic-loan')}}"> Basice Loan</a></li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('agriculture-loan')}}"> Agriculture Loan</a></li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('house-loan')}}"> House Loan</a></li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('woman-empowerment-loan')}}"> Woman Empowerment</a></li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('hands-saving-accounts-plan')}}"> Saving Account</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- col end  -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2">
                            <div class="footer_content">
                                <h1 class="footer_title"> Whats New </h1>
                                <ul>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('free-medical-and-health-campaign')}}"> Free Health Campaign</a>
                                    </li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('product-for-human-being')}}"> Product for Human Being </a></li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('emergency relief for emergency crisis')}}"> Emergency Relif</a>
                                    </li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('what-we-do-for-child-protection')}}"> chaild Protection</a>
                                    </li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('other-programs-and-activitis-of-hands')}}"> other Activitis</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- col end  -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2">
                            <div class="footer_content">
                                <h1 class="footer_title"> Quick Link </h1>
                                <ul>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('apply-for-loan')}}"> Apply for Loan</a></li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('get-appoinment')}}"> Get Appoinment</a></li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('interenship-program')}}"> Internship & Caree</a></li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('privacy-and-policy')}}"> Our Privecy & Policy </a></li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{url('get-support')}}"> Get Support</a></li>
                                    <li><span> <i class="fas fa-angle-double-right"></i> </span> <a href="{{route('faq')}}"> Faq</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- col end  -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                            <div class="footer_content">
                                <h1 class="footer_title"> Get in Touch </h1>
                                <ul class="hands_footer_contact">
                                    <li><span style="padding-right: 1rem;"> <i class="fa-solid fa-phone"></i> </span> <a href="tel:+880 1918148000"> <strong> Phone : </strong>+880 1918148000</a>
                                    </li>
                                    <li><span style="padding-right: 1rem;"> <i class="fa-solid fa-phone"></i></span> <a href="tel:+880 1918148000"> <strong> Phone : </strong>+880 1918148000</a>
                                    </li>
                                    <li><span style="padding-right: 1rem;"> <i class="fa-regular fa-envelope"></i>
                                        </span> <a href="mailto:hands7@yahoo.com"> <strong> Phone :
                                            </strong>hands7@yahoo.com</a> </li>
                                    <li><span style="padding-right: 1rem;"> <i class="fa-regular fa-envelope"></i>
                                        </span> <a href="mailto:info.handsbd.org"> <strong> Phone :
                                            </strong>info.handsbd.org</a> </li>
                                </ul>
                                <div class="footer_socials mt-2">
                                    <a target="_blank" href="https://www.facebook.com/humanandnaturedevelopmentsociety">
                                        <i class="fa-brands fa-square-facebook"></i> </a>
                                    <a target="_blank" href="https://twitter.com/hands_bd"> <i class="fa-brands fa-square-x-twitter"></i> </a>
                                    <a target="_blank" href="https://www.linkedin.com/company/human-and-nature-development-society-hands/?viewAsMember=true">
                                        <i class="fa-brands fa-linkedin"></i> </a>
                                    <a target="_blank" href="https://www.instagram.com/hands_bd/"> <i class="fa-brands fa-square-instagram"></i> </a>
                                    <a target="_blank" href="https://www.youtube.com/channel/UCTAqN_DX4Hsjuk4MPGrHsiQ">
                                        <i class="fa-brands fa-youtube"></i> </a>
                                </div>
                            </div>
                        </div>
                        <!-- col end  -->

                    </div>
                </div>
            </section>
            <!-- footer content end -->
        </div>
    </footer>
    <section class="copyright_bg">
        <div class="container">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="copyright_content">
                    <p>Copyright ©2021 HANDS. Designed By <span> Technical Hotline Ltd </span> </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== footer area end here ====== -->

    <!-- socroll top button  -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <script src="{{asset('contents/assets/website')}}/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/owl.carousel.min.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/owl.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/wow.min.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/typed.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/costom.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/script.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/fontall.min.js"></script>
</body>

</html>