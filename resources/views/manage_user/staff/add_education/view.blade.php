@extends('dashboard')
@section('content')
<section class="mb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
            <div class="card text-left">
                <div class="row">
                    <div class="col-lg-7 m-2"><h3 class="p-2 text-uppercase"><span><i class="fas fa-solid fa-trademark"></i></span> Information </h3></div>
                    <div class="col-lg-3 text-end m-2 p-2"><a class="p-2" href="{{url('dashboard/user/Add_education')}}"><button class="btn btn-success">All information</button></a></div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Collage or University</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->collage_name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Subject or Depertment</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->subject_name}}</td>
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
                          <strong>Session Date</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->session_date}}</td>
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>Name of the degree</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->degree_name}}</td>
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