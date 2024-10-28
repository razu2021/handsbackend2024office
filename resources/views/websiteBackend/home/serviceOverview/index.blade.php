@extends('layouts.adminmaster')
@section('admin_content')
<section class=" mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                    <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class=" text-center pt-4 pb-0">
                          <h2 style="border-bottom: 5px solid red; display:inline-block;background:#011a41;padding:3px;border-radius:10px;color:white;text-transform:uppercase"> 
                            Service Overview Entair Website
                          </h2>
                        </div>
                      </div>
                      <div class="col-lg-8 mx-4  pt-2">
                          <div class=" mb-2 ">
                            <form action="" method="GET">
                              <div class="input-group">
                                <input type="text" name="search" value="{{$search}}" class="form-control" placeholder="Search Entair Table">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-success" type="submit">Submit</button>
                                  <button class="btn btn-outline-warning" type="submit"><a class="text-dark" href="{{ route('serviceOverview.all') }}">Reset</a></button>
                                </div>
                              </div>
                              </form>
                          </div>
                      </div>
                      <div class="col-lg-3 text-center ">
                          <div class="mb-2 ">
                          <a href="{{ route('serviceOverview.add') }}"><button class="btn btn-success px-4">Add New Items</button></a>
                          <a href="{{route('serviceOverview.recycle')}}"> <button type="button" class="btn btn-warning position-relative">Recycle<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> {{$deletecount}}+ </span></button></a>
                          </div> 
                      </div>
                    </div>
                    <hr>
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th scope="col">ID: </th>
                        <th scope="col">Service Heading </th>
                        <th scope="col">Service Title</th>
                        <th scope="col">Service Button</th>
                        <th scope="col">Service Button URL</th>
                        <th scope="col">Service Image</th>
                        <th scope="col">status</th>
                        <th scope="col">Mangae</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                      <tr>
                        <td>{{$data->soverview_id}}</td>
                        <td>{{$data->top_heading}}</td>
                        <td> {{$data->title}}</td>
                        <td>{{$data->button}}</td>
                        <td>{{$data->button_url}}</td>
                        @if($data->service_image !="")
                        <!-- image  -->
                        <td> 
                          <img src="{{asset('uploads/website/'.$data->service_image)}}" alt="banner image" height="80px" width="auto">
                        </td>
                        @else
                        <td> <img src="{{asset('uploads')}}/avatar.jpg" alt="Avater image" height="80px" width="auto"></td>
                        @endif

                      
                          <!-- image end  -->
                        <td>  
                        @if ($data->post_status == 1) 
                            <p class="text-success">Publish</p>
                        @else
                            <p class="text-danger">Unpublished</p>
                        @endif       
                        </td>
                        <td> 
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('serviceOverview.edit',$data->slug)}}">Edit</a></li>
                              <li><a class="dropdown-item" href="{{route('serviceOverview.view',$data->slug)}}">View</a></li>
                              <li><a class="dropdown-item" onclick="return confirm('Delete this Information')" href="{{route('serviceOverview.softdelete',$data->soverview_id)}}">Delete</a></li>
                              <li><hr class="dropdown-divider"></li>
                              @if ($data->post_status == 2) 
                              <li><a class="dropdown-item text-success fw-bold" href="{{route('serviceOverview.post_active',$data->soverview_id)}}">Publish</a></li>
                              @elseif($data->post_status == 1)
                              <li><a class="dropdown-item text-warning fw-bold " href="{{route('serviceOverview.post_deactive',$data->soverview_id)}}">Unpublished</a></li>
                              @endif
                            </ul>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  
                     
                   
                  </table>
                  <div class="container">
                        <div class="row pt-4 ">
                          <div class="col-lg-8"><tr><td><p>Showing 1 to {{$all->count()}} of {{$totalpost }} Entair</p></td></tr></div>
                          <div class="col-lg-4 d-flex justify-content-end">
                          <div class="row">{{ $all->links() }}</div>
                          </div>
                        </div>
                  </div>
                  </div>
                <!-- table  -->
              <!--/ Basic Bootstrap Table -->
            </div>
        </div>
    </div>
</section>


@endsection