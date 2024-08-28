@extends('dashboard')
@section('content')
<section class="mb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
            <div class="card text-left">
                <div class="row">
                    <div class="col-lg-7 m-2"><h3 class="p-2 text-uppercase"><span><i class="fas fa-solid fa-trademark"></i></span> Information </h3></div>
                    <div class="col-lg-3 text-end m-2 p-2"><a class="p-2" href="{{url('dashboard/user/Add_work_places')}}"><button class="btn btn-success">All information</button></a></div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                    </thead>
                    <tbody class="table-border-bottom-0">
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
                          <strong>Starting Date</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->starting_date}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Ending Date</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->ending_date}}</td>
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>About Description </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->job_des}}</td>
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