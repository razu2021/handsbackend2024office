@extends('layouts.webmaster')
@section('web_content')  
  <main>
<div class="main-section">
@foreach($banner as $data)
    <section class="microfinace_banner" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
        <div class="bannerbg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1 style="font-size: 5rem; color: #000;">{{$data->banner_heading}}</h1>
                            <h3>{{$data->banner_title}}</h3>
                            <p>{{$data->banner_caption}}</p>
                            @if($data->banner_button1 != "")
                            <a href="{{$data->banner_button_url1}}">{{$data->banner_button1}} ||</a>
                            @endif
                            @if($data->banner_button2 !="")
                            <a href="javascript:void(0)" class="text-dark"> {{$data->banner_button2}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    <section class="pt-5 pb-5 post_page">
        <div class="container-fluid ">
            <div class="row">
               <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-5 alldonnerarea ">
                <div class="program_overview">
                    <h2 style="color:#97989C"> Program Overviews </h2>
                    <hr>
                    <div class="programs">
                        <p><span> <i class="fa-solid fa-user-group"></i> </span>  Our Total Valueable Donor : {{$totaldonner}} (Plus)</p>
                    </div>
                    <!-- program end  -->
                    <div class="programs">
                        <p><span> <i class="fa-solid fa-user-group"></i> </span>  Total Benefited people :  {{$people}} (Nos Plus)</p>
                    </div>
                    <!-- program end  -->
                    <div class="programs">
                        <p><span> <i class="fa-brands fa-product-hunt"></i> </span>  Total Successful  Projects :  {{$totalsuccess}} (Plus)</p>
                    </div>
                    <div class="programs">
                        <p><span> <i class="fa-brands fa-product-hunt"></i> </span>  Total Runing  Projects :  {{$totalrunning}} </p>
                    </div>
                    <div class="programs">
                        <p><span> <i class="fa-brands fa-product-hunt"></i> </span>  Total Upcoming  Projects :  {{$totalupcoming}} </p>
                    </div>
                    <!-- program end  -->
                    <div class="programs">
                        <p><span> <i class="fa-solid fa-comments-dollar"></i></span>  Total Reased Ammount : {{$raised}} (Taka)</p>
                    </div>
                    <div class="programs">
                        <p><span> <i class="fa-solid fa-comments-dollar"></i></span>  Total Estimated Cost Ammount : {{$cost}} (Taka)</p>
                    </div>
                    <!-- program end  -->
                </div>
                <div class="program_overview mt-5">
                    <h2 style="color:#97989C">Last 5 Projects </h2>
                    <hr>
                @foreach($lastproject as $last)
                    <div class="alldoner">
                        <div class="alldonner_pro mt-4">
                            <a href="{{route('all_projects')}}"> 
                                @if($last->service_image !="")
                                    <img src="{{asset('uploads/website/'.$last->service_image)}}" alt="" >
                                @else
                                    <img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="" >
                                @endif
                            <span>{{$last->pro_name}}</span>
                        </a>
                        </div>
                    </div>
                @endforeach
                </div>
               </div>
               <!-- col end  -->

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 areas ">
                <div class="  donor_canvas d-flex justify-content-end  mb-5">
                <button class="" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Overviews <i class="fa-solid fa-bars-staggered"></i></button>
  
                </div>
                    <div class="donner_card_area pt-2 pb-2">
                        <form action="" method="GET">
                        <div class="input-group pt-4 pb-4 donner_search">
                            <input type="text" name="search"  class="form-control" placeholder="Search participant !" aria-label="Recipient's username" aria-describedby="button-addon2">
                             <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                             <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><a href="{{route('valueable_donner')}}">Reset</a></button>
                            </div>
                        </form>
                    </div>
                @foreach($donner as $data)
                    <div class="donner_card_area mt-5">
                       <div class="donner_top">
                            <div class="or_log">
                                @if($data->service_image !="" && $data->or_logo !="")
                                    <img src="{{asset('uploads/website/'.$data->or_logo)}}" alt="Donor Organization image">
                                @elseif($data->service_image != "")
                                    <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Donor Image">
                                @elseif($data->or_logo !="")
                                    <img src="{{asset('uploads/website/'.$data->or_logo)}}" alt="Donor Organization image">
                                @else
                                    <img src="{{asset('contents/assets/website')}}/assets/img/profile-picture.png" alt="Hands logo">
                                @endif
                            </div>
                            <div class="or_name">
                                @if($data->or_name !="" || $data->name !="")
                                <h3>{{$data->or_name}}</h3>
                                <h6>{{$data->name}}  <span>  </span></h6>
                                @else
                                <h3>Anonymous participant</h3>
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
                            <p id="short-content-{{ $data->member_donner_id }}" class="short-content">
                                <span>{!! Str::words(strip_tags($data->caption), 30) !!}</span>
                            </p>
                            <!-- Full content (hidden by default) -->
                            <p id="full-content-{{ $data->member_donner_id }}" class="full-content" style="display: none;">
                            <span>{!! strip_tags($data->caption) !!}</span>
                            </p>
                            <!-- Toggle button -->
                            <button class="toggle-button mb-2" id="toggle-btn-{{ $data->member_donner_id }}" onclick="toggleContent('{{ $data->member_donner_id }}')" 
                                    style="background-color: transparent; border: none; color: blue; cursor: pointer; font-weight: bold;">
                                See More
                            </button>
                        </div>
                        <!-- end  -->
                       <div class="donner_profile">
                            @if($data->service_image !="")
                            <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="Donor {{$data->name}} Profile Picture from HANDS">
                            @endif
                       </div>
                       <hr>
                        <div class="donner_bottom ">
                            <div class="d_social">
                                <ul>
                                    <li><span><i class="fa-solid fa-envelope"></i> </span> <a  href="mailto:{{$data->email}}">  E-mail</a> </li>
                                </ul>
                            </div>
                            <div class="d_social">
                                <ul>
                                <li><span> <i class="fa-solid fa-square-phone"></i> </span><a href="tel:{{$data->phone}}">Phone</a></li>
                                </ul>
                            </div>
                            <div class="d_social">
                                <ul>
                                @if($data->name !="" && $data->or_name !="")
                                <li><span> <i class="fa-solid fa-globe"></i></span><a target="_blank" href="https://www.google.com/search?q={{$data->or_name}}">Website</a></li>
                                @elseif($data->name !="" && $data->or_name == "")
                                <li><span> <i class="fa-solid fa-globe"></i></span><a target="_blank" href="https://www.google.com/search?q={{$data->name}}">Website</a></li>
                                @else
                                <li><span> <i class="fa-solid fa-globe"></i></span><a target="_blank" href="{{route('index')}}">Website</a></li>
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="donner_card_area mt-5">
                    <div class="row">
                        {{$donner->links()}}
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 mt-5 alldonnerarea ">
                    <h2 style="color:#97989C"> Valueable Donor Name </h2>
               @foreach($donner as $data)
                    <div class="alldoner">
                        <div class="alldonner_pro mt-4">
                            @if($data->service_image != "" && $data->name !="")
                            <a target="_blank" href="https://www.google.com/search?q={{$data->name}}"> <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="" > <span>{{$data->name}}</span></a>
                            @elseif($data->name =="" && $data->or_name == "")
                            <a target="_blank" href=""> <img src="{{asset('contents/assets/website')}}/assets/img/profile-picture.png" alt="HANDS Logo" > <span>Anonymous participant</span></a>
    	                    @endif
                        </div>
                    </div>
                @endforeach
                <hr>
                <h2 style="color:#97989C"> Donor Organization Name </h2>
               @foreach($donner as $data)
                    <div class="alldoner">
                        <div class="alldonner_pro mt-4">
                        @if($data->or_logo != "" && $data->or_name !="")
                            <a target="_blank" href="https://www.google.com/search?q={{$data->or_name}}"> <img src="{{asset('uploads/website/'.$data->or_logo)}}" alt="" ><span>{{$data->or_name}}</span></a>
                        @elseif($data->or_name !="")
                        <a target="_blank" href="https://www.google.com/search?q={{$data->or_name}}"> <img src="{{asset('contents/assets/website')}}/assets/img/profile-picture.png" alt="HANDS Logo" > <span>{{$data->or_name}}</span></a>
                        @endif
                        </div>
                    </div>
                @endforeach
               </div>
            </div>
        </div>
    </section>
    </div>



    <!-- offcanvas donor  -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Our Valueable Donor & Information </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    <div class="program_overview">
                    <h2 style="color:#97989C"> Program Overviews </h2>
                    <hr>
                    <div class="programs">
                        <p><span> <i class="fa-solid fa-user-group"></i> </span>  Our Total Valueable Donor : {{$totaldonner}} (Plus)</p>
                    </div>
                    <div class="programs">
                        <p><span> <i class="fa-solid fa-user-group"></i> </span>  Total Benefited people :  {{$people}} (Nos Plus)</p>
                    </div>
                    <div class="programs">
                        <p><span> <i class="fa-brands fa-product-hunt"></i> </span>  Total Successful  Projects :  {{$totalsuccess}} (Plus)</p>
                    </div>
                    <div class="programs">
                        <p><span> <i class="fa-brands fa-product-hunt"></i> </span>  Total Runing  Projects :  {{$totalrunning}} </p>
                    </div>
                    <div class="programs">
                        <p><span> <i class="fa-brands fa-product-hunt"></i> </span>  Total Upcoming  Projects :  {{$totalupcoming}} </p>
                    </div>
                    <div class="programs">
                        <p><span> <i class="fa-solid fa-comments-dollar"></i></span>  Total Reased Ammount : {{$raised}} (Taka)</p>
                    </div>
                    <div class="programs">
                        <p><span> <i class="fa-solid fa-comments-dollar"></i></span>  Total Estimated Cost Ammount : {{$cost}} (Taka)</p>
                    </div>
                </div>
                <div class="program_overview mt-5">
                    <h2 style="color:#97989C">Last 5 Projects </h2>
                    <hr>
                @foreach($lastproject as $last)
                    <div class="alldoner">
                        <div class="alldonner_pro mt-4">
                            <a href="{{route('all_projects')}}"> 
                                @if($last->service_image !="")
                                    <img src="{{asset('uploads/website/'.$last->service_image)}}" alt="" >
                                @else
                                    <img src="{{asset('contents/assets/website')}}/assets/img/logo (2).png" alt="" >
                                @endif
                            <span>{{$last->pro_name}}</span>
                        </a>
                        </div>
                    </div>
                @endforeach
                </div>
                <h2 style="color:#97989C"> Valueable Donor Name </h2>
               @foreach($donner as $data)
                    <div class="alldoner">
                        <div class="alldonner_pro mt-4">
                            @if($data->service_image != "" && $data->name !="")
                            <a target="_blank" href="https://www.google.com/search?q={{$data->name}}"> <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="" > <span>{{$data->name}}</span></a>
                            @elseif($data->name =="" && $data->or_name == "")
                            <a target="_blank" href=""> <img src="{{asset('contents/assets/website')}}/assets/img/profile-picture.png" alt="HANDS Logo" > <span>Anonymous participant</span></a>
    	                    @endif
                        </div>
                    </div>
                @endforeach
                <hr>
                <h2 style="color:#97989C"> Donor Organization Name </h2>
               @foreach($donner as $data)
                    <div class="alldoner">
                        <div class="alldonner_pro mt-4">
                        @if($data->or_logo != "" && $data->or_name !="")
                            <a target="_blank" href="https://www.google.com/search?q={{$data->or_name}}"> <img src="{{asset('uploads/website/'.$data->or_logo)}}" alt="" ><span>{{$data->or_name}}</span></a>
                        @elseif($data->or_name !="")
                        <a target="_blank" href="https://www.google.com/search?q={{$data->or_name}}"> <img src="{{asset('contents/assets/website')}}/assets/img/profile-picture.png" alt="HANDS Logo" > <span>{{$data->or_name}}</span></a>
                        @endif
                        </div>
                    </div>
                @endforeach
    </div>
    </div>
    <!-- offcanvas donor end  -->
  </main>
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
@endsection