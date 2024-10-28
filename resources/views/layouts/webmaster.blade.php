<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{asset('contents/assets/website')}}/assets/img/logo (2).png" type="image/x-icon" style="border-radius:20%">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/font.all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/menu_responsive.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('contents/assets/website')}}/assets/sass/main.css">
</head>
<body>
    <div id="desktop_header_bg">
        <div class="container">
            <div class="desktop__header ">
                <div class="desktop__header__logo">
                    <a href="{{route('index')}}"><img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="image" class="img-fluid"></a>
                </div>
                <div class="desktop__social">
                    <ul>
                    @if($emailall->first() && $emailall->first()->email_name != "")
                        <li><a href="mailto:{{ $emailall->first()->email_name }}">
                            <span><i class="fa-solid fa-envelope"></i> </span>{{ $emailall->first()->email_name }}
                        </a></li>
                    @endif

                    @if($phoneall->first() && $phoneall->first()->phone_number != "")
                        <li><a href="tel:{{ $phoneall->first()->phone_number }}">
                            <span><i class="fa-solid fa-phone"></i> </span> {{ $phoneall->first()->phone_number }}
                        </a></li>
                    @endif
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
    <header>
        <div class="container">
            <div class="mobile__header ">
                <div class="mobile__header__logo">
                    <a href="{{url('/')}}"><img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="image" class="img-fluid"></a>
                </div>
                <div class="mobile__social">
                    <ul>
                        <li><a href="https://www.facebook.com/humanandnaturedevelopmentsociety"> <span> <i class="fa-brands fa-square-facebook"></i> </span></a></li>
                        <li><a href="https://www.linkedin.com/company/human-and-nature-development-society-hands/?viewAsMember=true"><span> <i class="fa-brands fa-linkedin"></i> </span></a></li>
                        <li><a href="https://twitter.com/hands_bd"> <span> <i class="fa-brands fa-square-x-twitter"></i></span></a></li>
                        <li><a href="https://www.youtube.com/channel/UCTAqN_DX4Hsjuk4MPGrHsiQ"> <span> <i class="fa-brands fa-youtube"></i> </span></a></li>
                    </ul>
                </div>
                <div class="mobile__header__toggler " id="show" onclick="toggleMenushow()">
                    <span><i class="fa-solid fa-bars"></i></span>
                </div>
            </div>
        </div>
        <div id="myheader">
            <div class="container">
                <div class="row myheader">
                    <div class="mobile__menu " id="mobile__menu">
                        <div class="mobile__logo">
                            <a href="{{url('index')}}">HANDS </a>
                        </div>
                        <div class="mobile__toggler" onclick="toggleMenuclose()">
                            <span>&times;</span>
                        </div>
                    </div>
                    <div class="main__menu__area">
                        <div class="main__menu ">
                            <ul>
                                <li class="list-item"><a href="{{url('/')}}" class="list-link"> Home </a></li>
                                <li class="list-item main__dropdown"><a href="{{route('about_us')}}" class="list-link"> About Us <span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{route('organizetion_structure')}}" class="list-link"> Organizational Structure <span> + </span></a>
                                                <div class="submenu">
                                                    <ul>
                                                        <li><a href="{{route('chairman')}}">Chairman</a></li>
                                                        <li><a href="{{route('managing_director')}}">Executive Director</a></li>
                                                        <li><a href="{{route('finance_directore')}}"> Finance Director</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-item"><a href="{{route('financial_statement')}}" class="list-link"> Financial Statement</a></li>
                                            <li class="list-item"><a href="{{route('where_we_work')}}" class="list-link">Where We Work</a></li>
                                            <li class="list-item"><a href="{{route('our_stratiegy')}}" class="list-link"> Our Strategy</a></li>
                                            <li class="list-item"><a href="{{route('mission_vision')}}" class="list-link"> Mission & Vision </a></li>
                                            <li class="list-item"><a href="{{route('our_faith')}}" class="list-link">Our Faith </a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-item main__dropdown"><a href="{{route('what_we_do')}}" class="list-link">
                                        What We Do <span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item main__dropdown"><a href="{{route('micro_finance')}}" class="list-link"> Micro Finance <span> + </span></a>
                                                <div class="submenu">
                                                    <ul>
                                                        <li><a href="{{route('basic_loan')}}">Basic Loan </a></li>
                                                        <li><a href="{{route('microenterpris_loan')}}">Microenterprise Loan</a></li>
                                                        <li><a href="{{route('crop_loan')}}">Crop Loan</a></li>
                                                        <li><a href="{{route('livestock_loan')}}">Livestock Loan</a></li>
                                                        <li><a href="{{route('special_loan')}}">Special Loan</a></li>
                                                        <li><a href="{{route('house_loan')}}">Housing Loan</a></li>
                                                        <li><a href="{{route('agriculture_loan')}}">Agriculter Loan</a></li>
                                                        <li><a href="{{route('higher_education')}}">Higher EducationLoan</a></li>
                                                        <li><a href="{{route('woman_empowerment')}}">Woman Empowerment Loan</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-item main__dropdown"><a href="{{route('sevings')}}" class="list-link">
                                                    Saving Account <span> + </span></a>
                                                <div class="submenu">
                                                    <ul>
                                                        <li><a href="{{route('pension')}}">Hands Pension scheme</a></li>
                                                        <li><a href="{{route('fixed_diposit')}}">Fixed Deposit</a></li>
                                                        <li><a href="{{route('diposit_limit')}}">Dubble in 8 Years Deposit</a></li>
                                                        <li><a href="{{route('family_saving')}}">Family Welfair Savings</a></li>
                                                        <li><a href="{{route('two_years_saving')}}">Two Year Saving</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-item"><a href="{{route('emergency_relif')}}" class="list-link">Emergency Relief</a></li>
                                            <li class="list-item"><a href="{{route('economic_development')}}" class="list-link">Economic Development</a></li>
                                            <li class="list-item"><a href="{{route('child_protection')}}" class="list-link">Child Protection</a></li>
                                            <li class="list-item"><a href="{{route('education_program')}}" class="list-link">Education</a></li>
                                            <li class="list-item"><a href="{{route('health_nutrition')}}" class="list-link">Health & Nutrition</a></li>
                                            <li class="list-item"><a href="{{route('water_hygiene')}}" class="list-link">Disability And Other</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-item main__dropdown"><a href="{{route('legal_aid')}}" class="list-link">
                                        Legal Aid <span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{route('awareness')}}" class="list-link">Awareness \ Training </a></li>
                                            <li class="list-item"><a href="{{route('mediation')}}" class="list-link">Mediation</a></li>
                                            <li class="list-item"><a href="{{route('pil')}}" class="list-link">Public Interest Litigation(PIL)</a></li>
                                            <li class="list-item"><a href="{{route('liigation')}}" class="list-link">Litigation</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-item main__dropdown"><a href="{{route('gallery')}}" class="list-link">
                                        Gallery <span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{route('photo_gallery')}}" class="list-link">Photo Gallery</a></li>
                                            <li class="list-item"><a href="{{route('vide_gallery')}}" class="list-link">Video Gallery</a></li>
                                            <li class="list-item"><a href="{{route('field_storis')}}" class="list-link">Our Field Storis</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-item main__dropdown"><a href="{{route('all_news')}}" class="list-link"> News/Feeds<span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{route('all_projects')}}" class="list-link">All Projects</a></li>
                                            <li class="list-item"><a href="{{route('hands_blogs')}}" class="list-link">blog</a></li>
                                            <li class="list-item"><a href="{{route('hands_events')}}" class="list-link">Events</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-item main__dropdown"><a href="javascript:void(0);" class="list-link">get involved<span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{route('volunteer')}}" class="list-link">volunteer</a></li>
                                            <li class="list-item"><a href="{{route('become_volunteer')}}" class="list-link">Become a volunteer</a></li>
                                            <li class="list-item"><a href="{{route('other_program')}}" class="list-link">Other's Program & Activitis </a></li>
                                            <li class="list-item"><a href="{{route('valueable_donner')}}" class="list-link"> Our Valueable donner</a></li>
                                            <li class="list-item"><a href="{{route('product')}}" class="list-link">product for Human Being</a></li>
                                            <li class="list-item"><a href="{{route('free_health')}}" class="list-link">free Health Campaign</a></li>
                                            <li class="list-item"><a href="{{route('our_impact')}}" class="list-link">Our Impact</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-item main__dropdown"><a href="javascript:void(0);" class="list-link">
                                        Our Team <span> + </span> </a>
                                    <div class="main__submenu">
                                        <ul>
                                            <li class="list-item"><a href="{{route('administrative_support')}}" class="list-link">Administrative and Support</a></li>
                                            <li class="list-item"><a href="{{route('management_program')}}" class="list-link">Management and Program </a></li>
                                            <li class="list-item"><a href="{{route('finance_credit')}}" class="list-link">Finance and Credit Roles </a></li>
                                            <li class="list-item"><a href="{{route('research_development')}}" class="list-link">Research and Development </a></li>
                                            <li class="list-item"><a href="{{route('legal_comliance')}}" class="list-link">Legal and Compliance </a></li>
                                            <li class="list-item"><a href="{{route('monitoring_evaluation')}}" class="list-link">Monitoring & Evaluation</a></li>
                                            <li class="list-item"><a href="{{route('marketing_outreach')}}" class="list-link">Marketing and Outreach </a></li>
                                            <li class="list-item"><a href="{{route('field_staff')}}" class="list-link">Field-Level Staff </a></li>
                                            <li class="list-item"><a href="{{route('technology_innovation')}}" class="list-link">Technology and Innovation </a></li>
                                            <li class="list-item"><a href="{{route('trainig_capacity')}}" class="list-link">Training and Capacity Building</a></li>
                                            <li class="list-item"><a href="{{route('intern_position')}}" class="list-link">Intern Positions</a></li>
                                            <li class="list-item"><a href="{{route('consultant_other')}}" class="list-link">Consultant & Other</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-item"><a href="{{ route('contact') }}" class="list-link"> Contact </a>
                                </li>
                            </ul>
                        </div>
                        <div class="user__menu">
                            <div class="mobile_career_menu">
                                <ul>
                                <li class="list-item "> <a href="{{route('appoinment')}}">Get Appoinment </a></li>
                                <li class="list-item "> <a href="{{route('internship')}}"> Internship </a></li>
                                <li class="list-item "> <a href="{{route('career')}}"> Career</a></li>
                                <li class="list-item "> <a href="{{route('notice')}}"> Notice</a></li>
                                </ul>
                            </div>
                            <ul>
                                <li class="list-item"><a href="{{route('make_donation')}}" class="lisct-link"><i class="fa-solid fa-hand-holding-dollar"></i> <span> Donate </span></a></li>
                                <li class="list-item">
                                    <a href="{{route('site_map')}}" class="lisct-link"><i class="fa-solid fa-sitemap"></i><span> Sitemap</span></a></li>
                                <li class="list-item"><a href="#" class="lisct-link" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-bars-staggered"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-fullscreen-xxl-down">
            <div class="modal-content ">
               
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-8 col-xxl-8 ">
                                <div class="user_faq row">
                                    <h1> Without Login you can't Access Dashboard !</h1>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 mt-4">
                                <div class="profile_section">
                                <div class="close  d-flex justify-content-end">
                                <button type="" class="btn btn-danger " data-bs-dismiss="modal" aria-label="Close" width="100%">X</button>
                                </div>
                                    <div class="user_profile">
                                        <div class="user_profile_image p-2">
                                            <img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="Profile image" class="img-fluid">
                                        </div>
                                        <div class="user_profile_info">
                                            <h3>Human and Nature Development Society (HANDS)</h3>
                                            <strong> HANDS Always Dedicated to the Welfare of
                                            People and Nature</strong>
                                            <div class="case_heading pb-5 ">
                                                <span> <i class="fas fa-hand-holding-heart"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user_log">
                                        <button> <a href="{{route('login')}}">Staff Login</a></button>
                                        <button><a href="{{route('register')}}">Registration</a></button>
                                    </div>
                                    <div class="flow_us_social text-center">
                                        <div class="flow_us ">
                                            <p class="pb-2"><strong>Fllow us : </strong> </p>
                                            <a target="_blank" class="btn text-white" data-mdb-ripple-init style="background-color: #0866FF;" href="https://www.facebook.com/humanandnaturedevelopmentsociety" role="button">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a target="_blank" class="btn text-white" data-mdb-ripple-init style="background-color: #1D9BF0;" href="https://x.com/hands_bd" role="button">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a target="_blank" class="btn text-white" data-mdb-ripple-init style="background-color: #0A66C2;" href="https://www.linkedin.com/company/human-and-nature-development-society-hands/?viewAsMember=true" role="button">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <a target="_blank" class="btn text-white" data-mdb-ripple-init style="background-color: #ac2bac;" href="https://www.instagram.com/hands_bd/" role="button">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                            <a target="_blank"class="btn text-white" data-mdb-ripple-init style="background-color: #FF0033;" href="https://www.youtube.com/@hands_bd" role="button">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="app_download">
                                        <p class="pb-2"> <strong> Mobile Apps Download : </strong> </p>
                                        <button><a href=""><img src="{{asset('contents/assets/website')}}/assets/img/vactor/playstor.png" alt="app" class="img-fluid"></a></button>
                                        <button><a href=""><img src="{{asset('contents/assets/website')}}/assets/img/vactor/apple.png" alt="app" class="img-fluid"></a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('web_content')
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
                    </div>
                    <div class="brb"></div>
                </div>
            </section>
            <section class="footer_content_area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                            <div class="footer_content">
                                <h1 class="footer_title"> about company </h1>
                                <div class="footer_logo">
                                    <a href="{{route('index')}}"><img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="Footer Logo" class="img-fluid"></a>
                                    <hr>
                                    @foreach($address as $addressdata)
                                    <p>{!! $addressdata-> address_name!!}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                            <div class="footer_content">
                                <h1 class="footer_title"> Get in Touch </h1>
                                <ul class="hands_footer_contact">
                                    @foreach($phoneall as $phonedata)
                                    <li><span style="padding-right: 1rem;"> <i class="fa-solid fa-phone"></i> </span> <a href="tel:{{$phonedata->phone_number}}"> <strong> Phone : </strong>{{$phonedata->phone_number}}</a> </li>
                                    @endforeach
                                    @foreach($emailall as $emaildata)
                                    <li><span style="padding-right: 1rem;"> <i class="fa-regular fa-envelope"></i></span> <a href="mailto:{{$emaildata->email_name}}"> <strong> Email : </strong>{{$emaildata->email_name}}</a> </li>
                                    @endforeach
                                </ul>
                                <div class="footer_socials mt-2">
                                    @foreach($facebook as $facebookdata)
                                        @if($facebookdata->social_mediaid !="")
                                        <a target="_blank" href="{{$facebookdata->social_media_url}}"><i class="fa-brands fa-square-facebook"></i> </a>
                                        @endif
                                    @endforeach
                                    @foreach($twitter as $twitterdata)
                                        @if($twitterdata->social_mediaid !="")
                                        <a target="_blank" href="{{$twitterdata->social_media_url}}"><i class="fa-brands fa-square-twitter"></i> </a>
                                        @endif
                                    @endforeach
                                    @foreach($linkedin as $linkedindata)
                                        @if($linkedindata->social_mediaid !="")
                                        <a target="_blank" href="{{$linkedindata->social_media_url}}"><i class="fab fa-linkedin"></i> </a>
                                        @endif
                                    @endforeach
                                    @foreach($instagram as $instagramdata)
                                        @if($instagramdata->social_mediaid !="")
                                        <a target="_blank" href="{{$instagramdata->social_media_url}}"><i class="fa-brands fa-square-instagram"></i> </a>
                                        @endif
                                    @endforeach
                                    @foreach($youtube as $youtubedata)
                                        @if($youtubedata->social_mediaid !="")
                                        <a target="_blank" href="{{$youtubedata->social_media_url}}"><i class="fab fa-youtube"></i> </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <script src="{{asset('contents/assets/website')}}/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/owl.carousel.min.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/owl.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script src="{{asset('contents/assets/website')}}/assets/js/costom.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/script.js"></script>
    <script src="{{asset('contents/assets/website')}}/assets/js/fontall.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script>
  document.addEventListener("DOMContentLoaded", function () {
    let lazyImages = document.querySelectorAll('.lazyload');
    let imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          let img = entry.target;
          img.src = img.dataset.src;
          img.classList.remove('lazyload');
          observer.unobserve(img);
        }
      });
    });
    lazyImages.forEach(img => {
      imageObserver.observe(img);
    });
  });
</script>

</body>
</html>