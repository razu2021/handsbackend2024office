@extends('layouts.adminmaster')
@section('admin_content')
<section class="mb-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
            <div class="card text-left">
                <div class="row">
                    <div class="col-lg-7 m-2"><h3 class="p-2 text-uppercase"><span><i class="fas fa-solid fa-trademark"></i></span>Banner Information </h3></div>
                    <div class="col-lg-3 text-end m-2 p-2"><a class="p-2" href="{{route('applyloan.all')}}"><button class="btn btn-success">All Banner information</button></a></div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td class="text-end">
                          <strong> Post Id</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->applyloan_id}}</td>
                      </tr>
                     
                      <tr>
                        <td class="text-end">
                          <strong>Name of the  Branch Name </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->branch_name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the First Name </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->fname}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Last Name </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->lname}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Full Name </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->name}}</td>
                      </tr>
                     
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Email </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->email}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Phone </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->phone}}</td>
                      </tr>
                      <tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the NID </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->nid}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Date of Birth </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->birth_date}}</td>
                      </tr>
                      <tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Occupation</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->occupation}}</td>
                      </tr>
                      <tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Monthly Income</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->monty_income}}</td>
                      </tr>
                      <tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Target Amount</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->target_amount}}</td>
                      </tr>
                      <tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Loan Category</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->loan_category}}</td>
                      </tr>
                      <tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Loan Category</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->loan_category}}</td>
                      </tr>
                      <tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Branch Name</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->branch_name}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the address </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{{$data->address}}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Name of the Caption </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        <td class="text-left">{!! $data->caption !!}</td>
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Profile image </strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        @if($data->service_image != "")
                          <td><img src="{{asset('uploads/website/applyloan/'.$data->service_image)}}" alt="{{$data->name}}" height="80px" width="auto"></td>
                        @else
                        <td> <img src="{{asset('uploads')}}/avatar.jpg" alt="Avater image" height="70px" width="auto"></td>
                        @endif
                      </tr>
                      <tr>
                        <td class="text-end">
                          <strong>Status</strong>
                        </td>
                        <td class="text-center"><strong>: </strong></td>
                        @if($data->status == 1)
                        <td class="text-left text-success">Published</td>
                        @else
                        <td class="text-left text-danger">Unpublished</td>
                        @endif
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