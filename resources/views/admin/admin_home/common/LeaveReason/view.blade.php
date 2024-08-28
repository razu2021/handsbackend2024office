@extends('layouts.adminmaster')
@section('admin_content')
<section class="mb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
            <div class="card text-left">
                <div class="row">
                    <div class="col-lg-7 m-2"><h3 class="p-2 text-uppercase"><span><i class="fas fa-solid fa-trademark"></i></span> Information </h3></div>
                    <div class="col-lg-3 text-end m-2 p-2"><a class="p-2" href="{{url('admin/dashboard/manage/reason_types')}}"><button class="btn btn-success">All information</button></a></div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                    </thead>
                    <tbody class="table-border-bottom-0">

                      <tr>
                        <td class="text-end">
                          <strong>Application types  id</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->reason_id}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Application Reason Type </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->reason_name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Creator</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->Creator->name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Editore</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        @if($data->editor !="")
                        <td class="text-left">{{$data->editorinfo->name}}</td>
                        @endif
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>button ulr</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->created_at}}</td>
                      </tr>
                        <td class="text-end">
                          <strong>updated </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->updated_at}}</td>
                      </tr>
                      <!--  -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection