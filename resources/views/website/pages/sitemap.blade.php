@extends('layouts.webmaster')
@section('web_content')  
    <!-- =================== ======== main header area end  here========= ============ -->
    <main>
      @foreach($banner as $data)
      <section class="contact_banner" style="background-image:url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
        <div class="bannerbg">
          <div class="container">
            <div class="row justify-content-sm-center">
              <div
                class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12"
              >
                <div class="banner_contents">
                  <!-- <h1> Let's  <span id="auto_type1"> </span> </h1> -->
                  <h1>{{$data->banner_heading}}</h1>
                </div>
              </div>
              <!-- col end  -->
            </div>
          </div>
        </div>
      </section>
      @endforeach

      <!-- site map area start here  -->

      <section class="section-padding">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <div class="sitemap">
                <h4 class="pb-2">Main Menu</h4>
                <ul>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('index')}}">Home</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('about_us')}}">About US</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('what_we_do')}}">What We Do</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('legal_aid')}}">Legal Aid</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('gallery')}}">Gallery</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('all_news')}}">News/Feed</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="javascript:void(0)">Get Involved</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="javascript:void(0)">Our Team</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('contact')}}">Contact</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('appoinment')}}">Get Appointment</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('internship')}}">Internship</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('career')}}">Career</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('notice')}}">Notice</a>
                  </li>
                </ul>
                <!-- main menu end  -->
                <h4 class="pb-2 pt-2">Organization Structure</h4>
                  <ul>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('organizetion_structure')}}">Organaization Structure</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('chairman')}}">Chairman</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('finance_directore')}}">Director of Fainance</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('managing_director')}}">Managing Director</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('financial_statement')}}">Financial Statement</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('where_we_work')}}">Where We Work</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('our_stratiegy')}}">Our Strategy</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('mission_vision')}}"> Our Vision & Values</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('our_faith')}}">Our Faith</a>
                  </li>
                  </ul>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="sitemap">
                <h4 class="pb-2">Loan Service </h4>
                <ul>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('micro_finance')}}">Micro Finance</a>
                  </li>
                  
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('basic_loan')}}">Basic Loan</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('microenterpris_loan')}}">Microenterprise Loan</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('crop_loan')}}">Crop Loan</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('livestock_loan')}}">Livestock Loan</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('special_loan')}}">Special Loan</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('house_loan')}}">Housing Loan</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('agriculture_loan')}}">Agriculture Loan</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('higher_education')}}">Higher Education Loan</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('woman_empowerment')}}">Woman Empowerment Loan</a>
                  </li>
                </ul>
                <h4 class="pt-2 pb-2">Fixed Diposit & Sevings</h4>
                <ul>
                <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('sevings')}}">Saving Account</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('pension')}}">Hands Pension Scheme</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('fixed_diposit')}}">Fixed Deposit</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('diposit_limit')}}">Dobble in 8 Years Deposit</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('family_saving')}}">Family Welfare Savings</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('two_years_saving')}}">Two Year Saving</a>
                  </li>
                </ul>
                <h4 class="pt-2 pb-2">Legal Aid Service </h4>
                <ul>
                <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('awareness')}}">Awareness/Training</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('mediation')}}">Mediation</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('pil')}}">Public Interset Litigation</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('liigation')}}">Litigation</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="sitemap">
                <h4 class="pb-2">Our Stories and Media</h4>
                <ul>
                <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('all_projects')}}">All Projects</a>
                  </li>
                <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('photo_gallery')}}">Photo Gallery</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('vide_gallery')}}">Video Gallery</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('field_storis')}}">Our Field Stories</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('all_news')}}">News</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('hands_blogs')}}">Blog/Events</a>
                  </li>
                </ul>
                <h4 class="pt-2 pb-2">Our Social Media</h4>
                <ul>
                <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="https://www.facebook.com/humanandnaturedevelopmentsociety">Facebook</a>
                </li>
                <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="https://x.com/hands_bd">Twitter / X</a>
                </li>
                <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="https://www.linkedin.com/company/human-and-nature-development-society-hands/?viewAsMember=true">Linkedin</a>
                </li>
                <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="https://www.instagram.com/hands_bd/">Instagram</a>
                </li>
                <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="https://www.youtube.com/@hands_bd">Youtube</a>
                </li>
                </ul>

              </div>
            </div>
            <div class="col-lg-3">
              <div class="sitemap">
                <h4 class="pb-2">Other's Charitable work and Activitis </h4>
                <ul>
                <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('emergency_relif')}}">Emergency Relief</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('economic_development')}}">Economic Development</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('child_protection')}}">Child Protection</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('education_program')}}">Education</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('health_nutrition')}}">Health & Nutrition</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('water_hygiene')}}">Water Sanitation/Hygine</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('other_program')}}">Our Other Program</a>
                  </li>
                </ul>
                <h4 class="pb-2 pt-2">Involved with HANDS </h4>
                <ul>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('volunteer')}}">Volunteer</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('become_volunteer')}}">Become A Volunteer</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('valueable_donner')}}">Valueable Donor</a>
                  </li>
                  
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('product')}}">Product For Human Being</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('free_health')}}">Free Health Campaign</a>
                  </li>
                  <li>
                    <span><i class="fa-solid fa-angles-right"></i> </span>
                    <a href="{{route('our_impact')}}">Our Impact</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
@endsection