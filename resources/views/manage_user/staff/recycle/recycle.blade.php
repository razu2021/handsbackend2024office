@extends('dashboard')
@section('content')
<section class="mt-5">
    <div class="container">
        <div class="row">
            @foreach($all as $data)
            <div class="col-12 col-lg-12 ">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                      <div class="card-body">
                      <table class="table " >
                          <tbody >
                            <tr>
                              <td class="text-end " style="border-bottom:none" >{{$data->Portfolio_id}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->name1, 5)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->name2, 5)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->name3, 5)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->name4, 5)}}</td>
                              <td class="text-end" style="border-bottom:none"> 
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{url('dashboard/user/portfolio_image/restore/'.$data->Portfolio_id)}}">Restor Data </a></li>
                                    <li><a class="dropdown-item"  href="{{url('dashboard/user/portfolio_image/delete/'.$data->Portfolio_id)}}">Delete Data</a></li>
                                  </ul>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>
                <!-- table  -->
            </div>
            @endforeach
          <!-- col end here  -->
          <!-- ------------------------------------------------------------------------------------------------ -->
          @foreach($education as $data)
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                      <div class="card-body">
                      <table class="table">
                          <tbody>
                            <tr>
                              <td class="text-end" style="border-bottom:none">{{$data->Creator_id}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->organization_name, 3)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->curent_position, 3)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->starting_date, 3)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->ending_date, 3)}}</td>
                              <td class="text-end" style="border-bottom:none"> 
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{url('dashboard/user/Add_education/restore/'.$data->Creator_id)}}">Restor Data </a></li>
                                    <li><a class="dropdown-item"  href="{{url('dashboard/user/Add_education/delete/'.$data->Creator_id)}}">Delete Data</a></li>
                                  </ul>
                                </div>
                              </td>
                            </tr>
                          
                          </tbody>
                        </table>
                      </div>
                  </div>
                <!-- table  -->
            </div>
            @endforeach
<!-- ----------------------------------------------------------------------------------------------------- -->
          @foreach($profileupdate as $data)
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                      <div class="card-body">
                      <table class="table">
                          <tbody>
                            <tr>
                              <td class="text-end" style="border-bottom:none">{{$data->Creator_id}}</td>
                              <td class="text-end" style="border-bottom:none">{{$data->another_email}}</td>
                              <td class="text-end" style="border-bottom:none">{{$data->phone}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->organization_name, 3)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->curent_position, 3)}}</td>
                              <td class="text-end" style="border-bottom:none"> 
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{url('dashboard/user/profile/restore/'.$data->Creator_id)}}">Restor Data </a></li>
                                    <li><a class="dropdown-item"  href="{{url('dashboard/user/profile/delete/'.$data->Creator_id)}}">Delete Data</a></li>
                                  </ul>
                                </div>
                              </td>
                            </tr>
                          
                          </tbody>
                        </table>
                      </div>
                  </div>
                <!-- table  -->
            </div>
            @endforeach
<!-- ----------------------------------------------------------------------------------------------------- -->
          @foreach($workplace as $data)
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                      <div class="card-body">
                      <table class="table">
                          <tbody>
                            <tr>
                              <td class="text-end" style="border-bottom:none">{{$data->Creator_id}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->organization_name, 3)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->curent_position, 3)}}</td>
                              <td class="text-end" style="border-bottom:none"> 
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{url('dashboard/user/Add_work_places/restore/'.$data->Creator_id)}}">Restor Data </a></li>
                                    <li><a class="dropdown-item"  href="{{url('dashboard/user/Add_work_places/delete/'.$data->Creator_id)}}">Delete Data</a></li>
                                  </ul>
                                </div>
                              </td>
                            </tr>
                          
                          </tbody>
                        </table>
                      </div>
                  </div>
                <!-- table  -->
            </div>
            @endforeach
<!-- ----------------------------------------------------------------------------------------------------- -->
          @foreach($services as $data)
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                      <div class="card-body">
                      <table class="table">
                          <tbody>
                            <tr>
                              <td class="text-end" style="border-bottom:none">{{$data->Service_id}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->service_title, 3)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->service_subtitle, 3)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->service_info, 3)}}</td>
                              <td class="text-end" style="border-bottom:none"> 
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{url('dashboard/user/services/restore/'.$data->Service_id)}}">Restor Data </a></li>
                                    <li><a class="dropdown-item"  href="{{url('dashboard/user/services/delete/'.$data->Service_id)}}">Delete Data</a></li>
                                  </ul>
                                </div>
                              </td>
                            </tr>
                          
                          </tbody>
                        </table>
                      </div>
                  </div>
                <!-- table  -->
            </div>
            @endforeach

          @foreach($basicinfo as $data)
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                      <div class="card-body">
                      <table class="table">
                          <tbody>
                            <tr>
                              <td class="text-end" style="border-bottom:none">{{$data->Creator_id}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->user_name, 3)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->website, 3)}}</td>
                              <td class="text-end" style="border-bottom:none">{{ Str::words($data->facebook, 3)}}</td>
                              <td class="text-end" style="border-bottom:none"> 
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{url('dashboard/user/BasicInfo/restore/'.$data->Creator_id)}}">Restor Data </a></li>
                                    <li><a class="dropdown-item"  href="{{url('dashboard/user/BasicInfo/delete/'.$data->Creator_id)}}">Delete Data</a></li>
                                  </ul>
                                </div>
                              </td>
                            </tr>
                          
                          </tbody>
                        </table>
                      </div>
                  </div>
                <!-- table  -->
            </div>
            @endforeach
<!-- ----------------------------------------------------------------------------------------------------- -->














          <!-- row end  -->
        </div>
    </div>
</section>


<br>
<br>
<br>
@endsection