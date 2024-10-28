@extends('dashboard')
@section('content')
<section class="mb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
            <div class="card text-left">
                <div class="row">
                    <div class="col-lg-7 m-2"><h3 class="p-2 text-uppercase"><span class="text-success"><i class="fas fa-solid fa-trademark"></i></span > Work Status </h3></div>
                    <div class="col-lg-3 text-end m-2 p-2"><a class="p-2" href="{{url('dashboard/user/WorkStatus')}}"><button class="btn btn-success">All information</button></a></div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td class="text-end">
                          <strong>Task Name</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->task_name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Starting Time </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{ \Carbon\Carbon::parse($data->starting_time)->format('h:i:s A') }}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Ending Date</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{ \Carbon\Carbon::parse($data->ending_time)->format('h:i:s A') }}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Task Description </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->description}}</td>
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>Created at  </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->created_at->format('d-m-y | h:i:s A')}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Creator </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->creator}}</td>
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