@extends('layouts.webmaster')
@section('web_content')  
@foreach($banner as $data)
    <section class="microfinace_banner" style="background-image: url('{{asset('uploads/website/'.$data->banner_bg_image)}}')">
        <div class="bannerbg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="banner_3">
                            <h1 style="font-size: 5rem; color: #000;">{{$data->banner_heading}}</h1>
                            <h3>{{$data->banner_title}}</h3>
                            <p>{{$data->caption}}</p>
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
    <section class="section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2">
                    <div class="post_side_bar">
                        <div class="google_ads_global">
                            <div class="ads_global">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam sunt temporibus ullam quasi minima possimus, numquam in, amet obcaecati vitae dolorum est. Ipsa voluptatum quod nesciunt, sequi dolores quibusdam culpa velit aperiam tenetur maxime alias dignissimos totam enim ipsum quas corporis accusantium similique commodi dolor deleniti. Voluptas ratione sequi beatae qui eius? Unde reiciendis suscipit ab soluta blanditiis, esse eligendi itaque sit dolorem! Perferendis natus cupiditate sit architecto velit aspernatur iusto, quasi accusantium autem, quae animi officia nostrum aut explicabo similique quos consectetur illum culpa ratione placeat illo. Nihil quia minus, blanditiis odit consectetur eveniet voluptatum voluptas cumque at molestias obcaecati odio voluptatem accusamus quis eligendi tempora? Rerum natus adipisci tempora amet earum quia! Ea tempore dolorem enim, quas nobis voluptate, temporibus unde sit error quisquam cupiditate aliquam culpa quod animi obcaecati fuga incidunt repellat, dignissimos totam quis! Consequatur, atque excepturi. Repellat possimus magnam ratione itaque voluptates alias debitis fugit ea quae, tenetur, nobis unde, blanditiis reiciendis suscipit labore dolores nam officia! Officia adipisci maxime ad, officiis dolorem iure reiciendis. Debitis dolorem officiis consequatur. Sequi voluptatum nesciunt suscipit, voluptates libero corporis esse optio ea quos atque necessitatibus tenetur, enim provident saepe fugiat at aliquam id! Nemo veniam distinctio sint iusto neque! Modi nihil reiciendis obcaecati ab sint omnis, cupiditate, optio fuga facere cumque temporibus eaque in quae consectetur soluta iste quia quas sapiente vel sequi. Natus vero ab architecto a temporibus expedita magnam nam et, illum corporis veniam voluptates cum reiciendis laudantium, asperiores ullam. Soluta architecto repellendus hic, vel, facere explicabo aperiam sunt minus sequi totam non, temporibus doloribus iure assumenda culpa modi quisquam harum. Illo, harum officia, voluptatem praesentium ipsam iure odio alias enim eum saepe deserunt, suscipit esse sunt eveniet nulla voluptatum modi placeat numquam ducimus inventore vel! Obcaecati ullam veritatis suscipit quos aliquid maxime facere. Deserunt similique perferendis sequi, maiores, repudiandae cum non tempora cumque a repellat dolores optio amet dignissimos reiciendis deleniti sed. Officia accusantium quaerat cum amet dolor, recusandae facilis mollitia odio vitae molestias quod! Nihil praesentium ut veniam sit soluta dolore tenetur, dolorem id amet repellat ab aut beatae, harum, cum alias cumque vitae?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 di-flex justify-content-center">
                    <div class="project_details_area">
                        <div class="post_details">
                        <div class="pro_head">
                            <h4>HANDS</h4>
                            <h1>{{$data->pro_heading}}</h1>
                            <p>Published: {{$data->created_at->format('Y-m-d H:i:s A')}}</p>
                            <p class="pt-5"><b>Sponser of : </b> Human and Nature Development Society (HANDS)</p>
                        </div>
                        <hr>
                        <div class="pro_image">
                            @if($data->service_image !="")
                            <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="prjects image of HANDS" data-src="{{asset('uploads/website/'.$data->service_image)}}">
                            @else
                            <img src="{{asset('contents/assets/website')}}/assets/img/programimage.png" alt="hands program image ">
                            @endif
                            <p>{{$data->pro_name}}</p>
                        </div>
                        <div class="pro_purpose">
                            <p>{!! $data->pro_purpose!!}</p>
                        </div>
                        <div class="goolge_ads d-flex justify-content-center mb-4 mt-4" >
                            <img src="{{asset('contents/assets/website')}}/assets/img/programimage.png" alt="" >
                        </div>
                        <div class="pro_des">
                            <p>{!! $data->pro_des !!}</p>
                        </div>
                        <hr>
                        <div class="pro_dates">
                            <h4>{{$data->pro_title}}</h4>
                            <p>Project Location : {{$data->pro_location}}</p>
                            <p>Start Date : {{ \Carbon\Carbon::parse($data->pro_start)->format('Y-m-d ') }}</p>
                            <p>End Date : {{ \Carbon\Carbon::parse($data->pro_start)->format('Y-m-d ') }} </p>
                            <p>participation of people : {{$data->people}}</p>
                        </div>
                
                </div>
                </div>
                </div>
                <!-- col end  -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2 ">
                    <div class="post_side_bar">
                    <div class="hands_product text-center mt-4">
                        <h2 class="pb-5">Our Products  </h2>
                        @foreach($product as $products)
                        <div class="sidebar_product mt-4">
                            <img src="{{asset('uploads/website/'.$products->service_image)}}" alt="hands product image">
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 </div>
 


  
@endsection