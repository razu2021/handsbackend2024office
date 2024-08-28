@extends('layouts.webmaster')
@section('web_content')
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="faqs_body">
                    <div class="search">
                        <form action="" method="GET">
                         @csrf
                        <div class="input-group">
                        <input type="text"  name="search" id="search" value="{{$search}}" class="form-control" placeholder="Search Your Quastions !" aria-label="Recipient's username with two button addons">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                        <button class="btn btn-outline-danger" type="button"><a href="{{route('faq')}}">Reset</a></button>
                        </div>
                        </form>
                    </div>
                    <div class="quastions">
                        <ul>
                            @foreach($faqs as $data)
                            <li> <span><i class="fa-regular fa-circle-question"></i> </span> <a href="" data-bs-toggle="modal" data-bs-target="#mymodel{{$data->faqs_id}}">{{$data->qustion}} </a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row">
                    <div class="show">
                    <p style="color:green">Showing 1 to {{$faqs->count()}} of {{$totalpost }} Entair</p>
                    </div>
                        <div class="d-flex justify-content-end">
                            {{ $faqs->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            @if(session('message'))
            <div class="alert alert-success ">
                {{ session('message') }}
            </div>
            @endif
            <div class="pending pb-4">
            <p><strong> Status: </strong><span><button data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"   style="background: #f6a100;padding:2px;border-radius:5px;border:none"> {{$review}} Questions</button></span> Under the Review .find your Question</p>
            </div>
            <div class="ch_donate_form">
                <div class="ch_form">
                    <h2 class="pb-2">make <span> Donation</span> now</h2>
                    <p class="pb-4">
                        @foreach($insertcurrent as $data)
                        <span> Note : if you have any queries? Please Fill out the form and our specialist will Answer your Question within the next 24 hours.</span> 
                        @endforeach
                    </p>
                    <form action="{{route('submit')}}" method="post">
                        @csrf
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" name="name" id="" class="form-control" placeholder="name" value="{{old('name')}}"/>
                            <span class="text-danger">@error('name'){{$message}} @enderror</span>
                        </div>
                        <!-- name end -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" name="phone" id="" class="form-control" placeholder="phone" value="{{old('phone')}}"/>
                            <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                        </div>
                        <!-- name end -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" name="email" id="" class="form-control" placeholder="email" value="{{old('email')}}"/>
                            <span class="text-danger">@error('email'){{$message}} @enderror</span>
                        </div>
                        <!-- name end -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" name="district" id="" class="form-control" placeholder="Where are you From ?" value="{{old('district')}}"/>
                            <span class="text-danger">@error('district'){{$message}} @enderror</span>
                        </div>
                        <!-- name end -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <textarea name="qustion" id="" cols="6" style="width: 100%;padding: 1rem;" placeholder=" Write's your Quastons ?" value="{{old('qustion')}}">{{old('qustion')}}</textarea>
                            <span class="text-danger">@error('qustion'){{$message}} @enderror</span>
                        </div>
                        <!-- Submit button -->
                        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block">Submit Now </button>
                    </form>
                </div>
            </div>
            </div>
        </div>
<!-- modal start here  -->
 @foreach($faqs as $data)
<div class="modal fade" id="mymodel{{$data->faqs_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$data->name}}</h5>
        ||
        <p style="color:green;font-style:italic">{{$data->district}}</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="pb-2"><strong> Quastion:</strong>{{$data->qustion}}</h5>
       <p>{!! $data->answer !!}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modal end here  -->
@endforeach
<!-- pending questions  -->

<div class="offcanvas offcanvas-end" data-bs-backdrop="false" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">All Under The Review Questions </h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    @foreach($pending as $data)
    <div class="pending_post mt-4">
        <h4>{{$data->qustion}} </h4>
        <h6>{{$data->name}}</h6>
        <p><strong>Status:</strong> <span style="color:#f6a100">Under The Review </span></p>
        <p ><strong>Date:</strong> <span style="color:red">{{$data->created_at->format('Y-m-d H:i:s A')}}</span></p>
    </div>
    @endforeach
    <div class="d-flex justify-content-center mt-4">
        {{ $pending->links() }}
    </div>
  </div>
</div>
    </div>
</section>



@endsection 

