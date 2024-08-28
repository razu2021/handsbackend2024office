@extends('layouts.adminmaster')
@section('admin_content')
<section class="mb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
            <div class="card text-left">
                <div class="row">
                    <div class="col-lg-7 m-2"><h3 class="p-2 text-uppercase"><span><i class="fas fa-solid fa-trademark"></i></span> Information </h3></div>
                    <div class="col-lg-3 text-end m-2 p-2"><a class="p-2" href="{{url('admin/dashboard/manage-application/category')}}"><button class="btn btn-success">All information</button></a></div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td class="text-end">
                          <strong>Category Set as</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->mainMenu->menu_name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Category ID</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->category_id}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Title</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->category_title}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Item</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->category_name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the URL</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->category_url}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Status</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->status}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Post Status</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->post_status}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Ceated At</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Updated At</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        @if($data->updated_at != "" )
                          <td class="text-left">{{$data->updated_at->format('Y-m-d H:i:s A')}}</td>
                        @else
                         <td class="text-left">Not Updated</td>
                        @endif
                      </tr>

                      <tr>
                        <td class="text-end">
                          <strong>Creator Info</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left text-success">{{$data->creatorInfo->name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Editor Info</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                         
                        @if($data->editor != "")
                          <td class="text-left text-success">{{$data->editorInfo->name}} </td>
                        @else
                          <td class="text-left">No Editor Found </td>
                        @endif
                          
                          
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