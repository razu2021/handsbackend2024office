@extends('dashboard')
@section('content')
<section class=" mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                    <div class="row">
                      <div class="col-lg-9  ">
                          <div class="mt-2 mb-2 ">
                          <h2 class="mt-4 mb-2 fw-bold px-4"> Application Types  </h2>
                          </div>
                      </div>
                      <div class="col-lg-3 text-center ">
                          <div class="mt-4 mb-2 ">
                          <a href="{{url('dashboard/user/leave_application')}}"><button class="btn btn-success px-4">All Information</button></a>
                          </div>
                      </div>
                    </div>
                    <hr>
                 
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Application Subject </th>
                        <th scope="col">request Days</th>
                        <th scope="col">Aprove Days</th>
                        <th scope="col">Created at </th>
                        <th scope="col">Mangae</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all as $data)
                      <tr>
                        <td>{{$data->application_id}}</td>
                        <td>{{$data->app_subject}}</td>
                        <td>{{$data->request_days + 1 }} <strong> Days</strong> </td>
                        <td>{{$data->aproved_days + 1 }} <strong> Days</strong> </td>
                        <td>{{$data->created_at}}</td>
                        <td> 
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{url('dashboard/user/leave_application/restore/'.$data->application_id)}}">Restor Data </a></li>
                              <li><a class="dropdown-item"  href="{{url('dashboard/user/leave_application/delete/'.$data->application_id)}}">Delete Data</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                
                  </div>
                <!-- table  -->
              <!--/ Basic Bootstrap Table -->
            </div>
        </div>
    </div>
</section>




@endsection