@extends('layouts.adminmaster')
@section('admin_content')
<section class=" mt-5 mb-5" >
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                 <!-- Basic Bootstrap Table -->
                  <div class="card">
                    <div class="row">
                      <div class="col-lg-8 offset-lg-2">
                        <div class=" text-center pt-4 pb-0">
                          <h2 style="border-bottom: 5px solid red; display:inline-block;background:#011a41;padding:3px;border-radius:10px;color:white;text-transform:uppercase"> 
                            All Category Information 
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
                                  <button class="btn btn-outline-warning" type="submit"><a class="text-dark" href="{{url('admin/dashboard/manage-application/category')}}">Reset</a></button>
                                </div>
                              </div>
                              </form>
                          </div>
                      </div>
                      <div class="col-lg-3  d-flex justify-content-end">
                          <div class=" mb-2 ">
                          <a href="{{url('admin/dashboard/manage-application/category/add')}}"><button class="btn btn-success px-4">Add New Items</button></a>
                          </div>
                      </div>
                    </div>
                    <hr>
                  <table class="table table-striped" >
                    <thead>
                      <tr>
                        <th scope="col"> id</th>
                        <th scope="col">Category Title</th>
                        <th scope="col">Category Nname</th>
                        <th scope="col">URL / Link </th>
                        <th scope="col">status</th>
                        <th scope="col">Creator</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Mangae</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $data)
                      <tr>
                        <td> {{$data->category_id}}</td>
                        <td>{{$data->category_title}}</td>
                        <td>{{$data->category_name}}</td>
                        <td>{{$data->category_url}}</td>
                        <td>  
                        @if ($data->post_status == 1) 
                            <p class="text-success">Publish</p>
                        @else
                            <p class="text-danger">Unpublished</p>
                        @endif       
                        </td>
                        <td> {{$data->creatorInfo->name}} </td>
                        <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                        <td> 
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Action
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{url('admin/dashboard/manage-application/category/edit/'.$data->slug)}}">Edit</a></li>
                              <li><a class="dropdown-item" href="{{url('admin/dashboard/manage-application/category/view/'.$data->slug)}}">View</a></li>
                              <li><a class="dropdown-item" onclick="return confirm('Delete this Information')" href="{{url('admin/dashboard/manage-application/category/softdelete/'.$data->category_id)}}">Delete</a></li>
                              <li><hr class="dropdown-divider"></li>
                              @if ($data->post_status == 2) 
                              <li><a class="dropdown-item text-success fw-bold" href="{{url('admin/dashboard/manage-application/category/post_active/'.$data->category_id)}}">Publish</a></li>
                              @elseif($data->post_status == 1)
                              <li><a class="dropdown-item text-warning fw-bold " href="{{url('admin/dashboard/manage-application/category/post_deactive/'.$data->category_id)}}">Unpublished</a></li>
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
                          <div class="col-lg-8"><tr><td><p>Showing 1 to {{$category->count()}} of {{$totalpost }} Entair</p></td></tr></div>
                          <div class="col-lg-4 d-flex justify-content-end">
                            <div class="row">{{ $category->links() }}</div>
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