@extends('layouts.adminmaster')
@section('admin_content')
<section class="section-padding mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <div class="app_content bg-white" >
        <div class="row" style="border-bottom:3px solid #000 ;margin:0px 10px ">
            <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2  d-flex justify-content-sm-center  justify-content-lg-end">
                <div class="app_logo">
                    <img src="https://i.ibb.co/nqGjLnZ/mylogo.jpg" alt="App logo" height="100px">
                </div>
            <!-- col end  -->
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 d-flex justify-content-center">
                <div class="app_title text-center pt-4">
                    <h1 class="m-0 text-capitalize">Universitas law chambers </h1>
                    <h6 class="m-0" > A House of Barristers & Advocates </h6>
                </div>
            <!-- col end  -->
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 d-flex  justify-content-sm-center">
                <div class="app_address">
                    <address>
                        <span> Room No. 1104 ( 10th Floor )</span><br>
                        <span> Sahera Tropicale Centre </span><br>
                        <span> 218, Elephant Road </span><br>
                        <span> (Bata Signal), Dhaka-1205</span><br>
                    </address>
                </div>
            <!-- col end  -->
            </div>

        <!-- row end  -->
        </div>
        <!-- ------------------------------------------head section end here  -------------------------------------------------->
        <section>
            <div class="container bg-white pt-2 ">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="ref">
                            <p><strong>Ref: </strong> 2565653gdsd55</p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center pt-4 ">
                        <h4> Leave Request Form</h4>
                    </div>
                    <div class="col-lg-4 d-flex  justify-content-sm-center">
                        <address>
                            <div class="time">
                                <p><strong>Date: </strong> 20 | 08 | 2023  17:24 pm</p>
                            </div>
                        </address>
                    </div>
                </div>
            </div>
        </section>
<!--    end ----------------------------------------- -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="body_con">
          <form action="{{url('admin/dashboard/manage/leave_application/update')}}" method="post">
            @csrf
          <div class="app_head_form">
              <span>Form</span> <br>  
              <span>Md razu hossain raj</span> <br>  
              <span>web designer & Developer </span> <br>  
              <span>Universitas law chambers </span> <br>  
              <span>Dhaka, Bangladesh  </span> <br>  
          </div>
          <!-- form head end -->
          <div class="app_date mt-4">
              <p><strong> Date: 21-08-2023 </strong> </p>
          </div>
          <!-- form current date  -->
          <div class="app_head_form mt-4">
              <span>To</span> <br>  
              <span>Head of chambers</span> <br>  
              <span>Universitas Law Chambers </span> <br>  
          </div>
          <!-- form to end  -->
          <div class="ror">
          <input type="text" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->application_id }}" />
          <input type="text" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::guard('admin')->user()->id; }}" />
          <input type="text" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
          </div>
          <div class="app_sub mt-4">
          <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> write the application subject!  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="Sub: Application for leave   " name="app_subject"  value="{{$alldata->app_subject}}" disabled/>
              <span class="text-danger">@error('app_subject'){{$message}} @enderror</span>
              </div>
            </div>
          </div>
          <!-- form subject end here  -->
          <div class="app_declaretion">
              <h6 class="">Dear Sir</h6>
              <div class="col-md-12">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Write the diclaration  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <textarea name="app_diclaration" id="" class="form-control" rows="4" placeholder="write your application diclaretion here........" value="{{$alldata->app_diclaration}}" disabled>{{$alldata->app_diclaration}}</textarea>
              <span class="text-danger">@error('app_diclaration'){{$message}} @enderror</span>
              </div>
            </div>
          <!-- end col  -->
          </div>
          <!-- form diclaration end here  -->
        <div class="row">
             <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Starting Date  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="date" class="form-control" id="basic-default-fullname" placeholder="Your Current Position  " name="starting_date"  value="{{$alldata->starting_date}}" disabled/>
              <span class="text-danger">@error('starting_date'){{$message}} @enderror</span>
              </div>
            </div>

              <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Starting Date  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="date" class="form-control" id="basic-default-fullname" placeholder="Your Current Position  " name="ending_date"  value="{{$alldata->ending_date}}" disabled/>
              <span class="text-danger">@error('ending_date'){{$message}} @enderror</span>
              </div>
            </div>
          <!-- end col  -->

              <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-type_name"> Application Type  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="text" name="" class="form-control" value="{{$alldata->leave_details}}" disabled>
              <span class="text-danger">@error('leave_details'){{$message}} @enderror</span>
              </div>
            </div>
          <!-- end col  -->
          <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-reason_name"> Application Type  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
                <input type="text" name="" class="form-control" value="{{$alldata->leave_reason}}" disabled>
              <span class="text-danger">@error('leave_reason'){{$message}} @enderror</span>
              </div>
            </div>
          <!-- end col  -->
              <div class="col-md-12">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Additional Comments <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="text" class="form-control" id="basic-default-fullname" placeholder="Additional Comments/Explanation (if needed)" name="additional_comment" value="{{$alldata->additional_comment}}" disabled/>
              <span class="text-danger">@error('additional_comment'){{$message}} @enderror</span>
              </div>
            </div>
          <!-- end col  -->

<hr>
  <div class="text-center">
    <h5>Apro Workflow</h5>
  </div>
<!-- start here  -->
            <div class="col-md-12">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Additional Comments <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <textarea name="dpt_comment" id="" class="form-control" rows="4" placeholder="write your application diclaretion here........" value="{{$alldata->dpt_comment}}" >{{$alldata->dpt_comment}}</textarea>
              <span class="text-danger">@error('dpt_comment'){{$message}} @enderror</span>
              </div>
            </div>
          <!-- end col  -->
          <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Aproverd Statr Date   <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="date" class="form-control" id="basic-default-fullname" placeholder="Your Current Position  " name="ap_s_date"  value="{{$alldata->ap_s_date}}" />
              <span class="text-danger">@error('starting_date'){{$message}} @enderror</span>
              </div>
            </div>

              <div class="col-md-6">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> Aproved End Date  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <input type="date" class="form-control" id="basic-default-fullname" placeholder="Your Current Position  " name="ap_e_date"  value="{{$alldata->ap_e_date}}" />
              <span class="text-danger">@error('ap_e_date'){{$message}} @enderror</span>
              </div>
            </div>
          <!-- end col  -->
          <div class="col-md-12">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> HR Note  <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <textarea name="note" id="editor" class="form-control" rows="4" placeholder="write your application diclaretion here........" value="{{$alldata->note}}" >{{$alldata->note}}</textarea>
              </div>
            </div>
          <!-- end col  -->
          <div class="col-md-12">
              <div class="mb-3">
              <label class="form-label" for="basic-default-fullname"> instraction for Employee <span class="text-danger"> <i class="fas fa-solid fa-star"></i></span></label>
              <textarea name= "instraction" id="editor2" class="form-control" rows="4" placeholder="write your application diclaretion here........" value="{{$alldata->instraction}}" >{{$alldata->instraction}}</textarea>
              
              </div>
            </div>
          <!-- end col  -->



<!-- end here  -->
        </div>
        <button type="submit" class="btn btn-success ">Submit your Applocation </button>
          </form>
          <!-- form end here  -->
          <div class="text-center mt-2 mb-2"> 
            <p><a href="mailto:mdrazuhossainraj@gmail.com"><strong> E-mail: </strong> mdrazuhossainraj@gmail.com</a> <span><a href="tal:+8801817078309"><strong>Phone: </strong> +880 1817078309</a></span></p>
          </div>
          <!-- contact end here  -->
          <footer class="bg-light">
            <p class="p-2 note note-light text-danger"><strong>Note: </strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nesciunt, maiores voluptatibus obcaecati </p>
          </footer>

        </div>
      </div>
    </div>
  </div>
</section>

</div>
</div>
</div>
</div>
</section>
@endsection 