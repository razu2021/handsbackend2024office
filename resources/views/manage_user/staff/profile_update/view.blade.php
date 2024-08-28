@extends('dashboard')
@section('content')
<section class="mb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
            <div class="card text-left">
                <div class="row">
                    <div class="col-lg-7 m-2"><h3 class="p-2 text-uppercase"><span><i class="fas fa-solid fa-trademark"></i></span> Information </h3></div>
                    <div class="col-lg-3 text-end m-2 p-2"><a class="p-2" href="{{url('dashboard/user/profile')}}"><button class="btn btn-success">All information</button></a></div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                    </thead>
                    <tbody class="table-border-bottom-0">

                      <tr>
                        <td class="text-end">
                          <strong>Name</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Email</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->email}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Another Email</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->another_email}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Phone</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->phone}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Organization Name</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->organization_name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Current Position</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->curent_position}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>About your BIO </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->about}}</td>
                      </tr>
                        <td class="text-end">
                          <strong>Profile Picture </strong>
                        </td>
                        <td class="text-center"><strong>:</strong></td>
                        <td class="text-left">
                        @if($data->profile_image!='')
                        <img height="200px" width="auto" src="{{asset('uploads/'.$data->profile_image)}}"/>
                        @else
                        <img height="80px" width="auto"  src="{{asset('uploads/avatar.jpg')}}"/>
                        @endif
                        </td>
                      </tr>
                      <!--  -->
                      </tr>
                        <td class="text-end">
                          <strong>Profile Picture </strong>
                        </td>
                        <td class="text-center"><strong>:</strong></td>
                        <td class="text-left">
                        @if($data->ban_image!='')
                        <img height="300px" width="auto" src="{{asset('uploads/'.$data->ban_image)}}"/>
                        @else
                        <img height="80px" width="auto"  src="{{asset('uploads/avatar.jpg')}}"/>
                        @endif
                        </td>
                      </tr>


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection