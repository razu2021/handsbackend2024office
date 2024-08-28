@extends('layouts.adminmaster')
@section('admin_content')

<section>
    <div class="container">
        <div class="row">
            <!-- content  -->
            <div class="col-lg-12 col-md-12 col-12 mb-4 mt-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="">
                             <h1>{{Auth::User()->name}}</h1>
                             <p>{{Auth::User()->created_at}}</p>
                             <div> <h1 id="clock"></h1></div>
                
                             
                            </div>
                            <div class="dropdown">
                              <button class="btn p-0" type="button"id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true"aria-expanded="false"> <i class="bx bx-dots-vertical-rounded"></i></button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
            <!-- content end  -->
        </div>
    </div>
</section>


@endsection