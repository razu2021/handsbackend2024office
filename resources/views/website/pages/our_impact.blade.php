@extends('layouts.webmaster')
@section('web_content')  
  <main>

    <!-- banner end  -->

<div class="main_impact_section">
@foreach($banner as $data)
<section class="team_banner" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}');">
        <div class="banner_3_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1> {{$data->banner_heading}} </h1>
                            <a href="{{route('index')}}">Home /</a>
                            <a href="{{route('our_impact')}}"> Our Impact </a>
                        </div>
                    </div>
                    <!-- col end  -->
                </div>
            </div>
        </div>
    </section>
    @endforeach
    <div class="section section-padding main_area">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-3">
                <div class="impact-side-bar">
                   <h3 style="color:#939497;font-weight:700;padding:1rem"> Our All Projects </h3>
                    <hr>
                @foreach($allprojects as $pro)
                <div class="alldonner_pro mt-4">
                    <h4>
                    <a href="{{route('all_projects')}}"> 
                        @if($pro->service_image !="")
                            <img src="{{asset('uploads/website/'.$pro->service_image)}}" alt="" >
                        @else
                            <img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="" >
                        @endif
                    <span>{{$pro->pro_name}}</span>
                    </a>
                    </h4>
                </div>
                @endforeach
               
                </div>
            </div>
           
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                @foreach($allimpact as $data)
                <div class="impact_area">
                    <div class="impact_card mt-4">
                    <div class="donner_top">
                            <div class="or_log">
                              <img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="Hands logo">
                            </div>
                            <div class="or_name">
                                @if($data->heading !="" || $data->title !="")
                                <h3>{{$data->heading}}</h3>
                                <h6>{{$data->title}}  <span>  </span></h6>
                                @else
                                <h3>Anonymous post</h3>
                                @endif
                                <p> 
                                @php
                                    $postedAt =  \Carbon\Carbon::parse($data->created_at); // The date and time the post was created
                                    $currentDateTime = new DateTime(); // Current date and time
                                    // Create DateTime objects for the post's creation time and the current time
                                    $postedTime = new DateTime($postedAt);
                                    // Calculate the time difference
                                    $timeDifference = $postedTime->diff($currentDateTime);
                                    // Display the posting time in a user-friendly format
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
                                @endphp
                                <i class="fa-solid fa-earth-europe"></i>
                                 </p>
                            </div>
                       </div>
                        <div class="donner_cap mt-4"> 
                            <!-- Short content (truncated to 30 words) -->
                           <h3 class="pb-2">{{$data->subtitle}}</h3>
                            <p id="short-content-{{ $data->ourimpact_id }}" class="short-content">
                                <span>{!! Str::words(strip_tags($data->caption), 30) !!}</span>
                            </p>
                            <!-- Full content (hidden by default) -->
                            <p id="full-content-{{ $data->ourimpact_id }}" class="full-content" style="display: none;">
                            <span>{!! strip_tags($data->caption) !!}</span>
                            </p>
                            <!-- Toggle button -->
                            <button class="toggle-button mb-2" id="toggle-btn-{{ $data->ourimpact_id }}" onclick="toggleContent('{{ $data->ourimpact_id }}')" 
                                    style="background-color: transparent; border: none; color: #287CD8; cursor: pointer; font-weight: bold;">
                                See More
                            </button>
                        </div>
                        <!-- end  -->
                       <div class="donner_profile">
                            @if($data->service_image !="")
                            <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Donor {{$data->heading}}  from HANDS">
                            @endif
                       </div>
                       
                    </div>
                    </div>
                    @endforeach
                </div>
                <!-- col end -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-4">
                    <div class="impact-side-bar">
                        <div class="impact_card px-2">
                            <h2 style="color:#939497;font-weight:700;padding:1rem">Share our Impact From Facebook </h2>
                            <div class="facebookpost_timeline d-flex justify-content-center">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhumanandnaturedevelopmentsociety&tabs=timeline&width=400&height=1000&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="400" height="1000" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col end -->
            </div>
        </div>
    </div>
</div>




<!--  -->
<script>
    // see more and see less script is here 
function toggleContent(postId) {
    // Get the short content, full content, and the toggle button based on the postId
    var shortContent = document.getElementById('short-content-' + postId);
    var fullContent = document.getElementById('full-content-' + postId);
    var toggleButton = document.getElementById('toggle-btn-' + postId);

    // Toggle visibility of the content
    if (fullContent.style.display === "none") {
        // Hide the short content and show the full content
        shortContent.style.display = "none";
        fullContent.style.display = "block";
        toggleButton.innerText = "See Less";
    } else {
        // Show the short content and hide the full content
        shortContent.style.display = "block";
        fullContent.style.display = "none";
        toggleButton.innerText = "See More";
    }
}
</script>
    <!-- ========  main content end herre  -->
  </main>
@endsection
