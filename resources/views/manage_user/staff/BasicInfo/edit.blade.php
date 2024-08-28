@extends('dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Congratulations 🎉</h5>
                          <h1 class="fw-bold text-italic">{{ Auth::user()->name }}</h1>
                          <p class="mb-4">
                            You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                            your profile.
                          </p>

                          <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="{{asset('contents/assets/admin')}}/assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
  <section class="">
    <div class="container mb-2">
      <div class="row ">
        <div class="col-lg-12 card">
          <div class="title">
            <h3 class="p-4">Update your Basic Information </h3>
            <hr clas="w-25">
          </div>
        <div class="row">
          <div class="col-lg-4" style="border-right:1px solid #000;">
            <aside>
              <ul>
                  <li class="mt-2">
                  @if(empty($alldata->website))
                  <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapsewebsite" role="button" aria-expanded="false" aria-controls="collapsewebsite"><span><i class="bi bi-plus-circle"></i> </span> Add your Website</a>
                  @else
                  <a style="font-size:16px " class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapsewebsite" role="button" aria-expanded="false" aria-controls="collapsewebsite"><span><i class="bi bi-pencil-square"></i> </span> Update your website link/ URL </a>
                  @endif
                </li> 
                <!--  -->
                <li class="mt-2">
                @if(empty($alldata->facebook))
                <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapsefacebook" role="button" aria-expanded="false" aria-controls="collapsefacebook"><span><i class="bi bi-plus-circle"></i></span> Add your facebook URL</a>
                @else
                <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapsefacebook" role="button" aria-expanded="false" aria-controls="collapsefacebook"><span><i class="bi bi-pencil-square"></i> </span>Update your facebook link</a>
                @endif
              </li> 
              <!--  -->
              <li class="mt-2">
              @if(empty($alldata->twitter))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapsetwitter" role="button" aria-expanded="false" aria-controls="collapsetwitter"><span><i class="bi bi-plus-circle"></i></span> Add your Twitter URL</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapsetwitter" role="button" aria-expanded="false" aria-controls="collapsetwitter"><span><i class="bi bi-pencil-square"></i> </span>Update your Twitter link</a>
              @endif
            </li> 
            <!--  -->
            <li class="mt-2">
              @if(empty($alldata->linkedin))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapselinkedin" role="button" aria-expanded="false" aria-controls="collapselinkedin"><span><i class="bi bi-plus-circle"></i></span> Add your linkedin Account</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapselinkedin" role="button" aria-expanded="false" aria-controls="collapselinkedin"><span><i class="bi bi-pencil-square"></i> </span>Update your linkedin Account</a>
              @endif
            </li> 
            <!--  -->
            <li class="mt-2">
              @if(empty($alldata->instagram))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapseinstagram" role="button" aria-expanded="false" aria-controls="collapseinstagram"><span><i class="bi bi-plus-circle"></i></span> Add your instagram Account</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapseinstagram" role="button" aria-expanded="false" aria-controls="collapseinstagram"><span><i class="bi bi-pencil-square"></i> </span>Update your instagram Account</a>
              @endif
            </li> 
            <!--  -->
            <li class="mt-2">
              @if(empty($alldata->family_member))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapsefamilymember" role="button" aria-expanded="false" aria-controls="collapsefamilymember"><span><i class="bi bi-plus-circle"></i></span> Add your Family member</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapsefamilymember" role="button" aria-expanded="false" aria-controls="collapsefamilymember"><span><i class="bi bi-pencil-square"></i> </span>Update your family member</a>
              @endif
            </li> 
            <!--  -->
            <li class="mt-2">
              @if(empty($alldata->father_name))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapsefatherinfo" role="button" aria-expanded="false" aria-controls="collapsefatherinfo"><span><i class="bi bi-plus-circle"></i></span> Add legal guardian information</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapsefatherinfo" role="button" aria-expanded="false" aria-controls="collapsefatherinfo"><span><i class="bi bi-pencil-square"></i> </span>update legal guardian information</a>
              @endif
            </li> 
            <!--  -->
            <li class="mt-2">
              @if(empty($alldata->mother_name))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapsemotherinfo" role="button" aria-expanded="false" aria-controls="collapsemotherinfo"><span><i class="bi bi-plus-circle"></i></span>Add legal guardian information<</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapsemotherinfo" role="button" aria-expanded="false" aria-controls="collapsemotherinfo"><span><i class="bi bi-pencil-square"></i> </span>Update  legal guardian information<</a>
              @endif
            </li> 
            <!--  -->
          <li class="mt-2">
              @if(empty($alldata->present_address))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapsepresenaddress" role="button" aria-expanded="false" aria-controls="collapsepresenaddress"><span><i class="bi bi-plus-circle"></i></span> Add your present address</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapsepresenaddress" role="button" aria-expanded="false" aria-controls="collapsepresenaddress"><span><i class="bi bi-pencil-square"></i> </span>Update your  present address </a>
              @endif
            </li>
            <!--  -->
            <li class="mt-2">
              @if(empty($alldata->permanet_address))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapsepermanentaddress" role="button" aria-expanded="false" aria-controls="collapsepermanentaddress"><span><i class="bi bi-plus-circle"></i></span> Add your permanent  address</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapsepermanentaddress" role="button" aria-expanded="false" aria-controls="collapsepermanentaddress"><span><i class="bi bi-pencil-square"></i> </span>Update your  permanent address </a>
              @endif
            </li> 
            <li class="mt-2">
              @if(empty($alldata->birth_date))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapsebirth_date" role="button" aria-expanded="false" aria-controls="collapsebirth_date"><span><i class="bi bi-plus-circle"></i></span> Add your Birth Date</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapsebirth_date" role="button" aria-expanded="false" aria-controls="collapsebirth_date"><span><i class="bi bi-pencil-square"></i> </span>Update your  Birth Date</a>
              @endif
            </li> 
            <li class="mt-2">
              @if(empty($alldata->birth_place))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapsebirth_place" role="button" aria-expanded="false" aria-controls="collapsebirth_place"><span><i class="bi bi-plus-circle"></i></span> Add your Birth Place</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapsebirth_place" role="button" aria-expanded="false" aria-controls="collapsebirth_place"><span><i class="bi bi-pencil-square"></i> </span>Update your  Birth Place</a>
              @endif
            </li>
            <!--  -->
            <li class="mt-2">
              @if(empty($alldata->relationship))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapserelationship" role="button" aria-expanded="false" aria-controls="collapserelationship"><span><i class="bi bi-plus-circle"></i></span> Add your relationship</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapserelationship" role="button" aria-expanded="false" aria-controls="collapserelationship"><span><i class="bi bi-pencil-square"></i> </span>Update your  relationship</a>
              @endif
            </li> 
            <!--  -->
            <li class="mt-2">
              @if(empty($alldata->blood))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapseblood" role="button" aria-expanded="false" aria-controls="collapseblood"><span><i class="bi bi-plus-circle"></i></span> Add your Blood group</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapseblood" role="button" aria-expanded="false" aria-controls="collapseblood"><span><i class="bi bi-pencil-square"></i> </span>Update your Blood group </a>
              @endif
            </li> 
            <!--  -->
            <li class="mt-2">
              @if(empty($alldata->language))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapselanguage" role="button" aria-expanded="false" aria-controls="collapselanguage"><span><i class="bi bi-plus-circle"></i></span> Add Language</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapselanguage" role="button" aria-expanded="false" aria-controls="collapselanguage"><span><i class="bi bi-pencil-square"></i> </span>Update Language </a>
              @endif
            </li> 
            <!--  -->
            <li class="mt-2">
              @if(empty($alldata->hobies))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapsehobies" role="button" aria-expanded="false" aria-controls="collapsehobies"><span><i class="bi bi-plus-circle"></i></span> Add your Hobbies</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapsehobies" role="button" aria-expanded="false" aria-controls="collapsehobies"><span><i class="bi bi-pencil-square"></i> </span>Update your Hobbies </a>
              @endif
            </li> 
            <!--  -->
          <li class="mt-2">
              @if(empty($alldata->other_activitis))
              <a style="font-size:16px"  class="mt-2" data-bs-toggle="collapse" href="#collapseother_activitis" role="button" aria-expanded="false" aria-controls="collapseother_activitis"><span><i class="bi bi-plus-circle"></i></span> Add your other activitis</a>
              @else
              <a style="font-size:16px" class="mt-2 text-dark" data-bs-toggle="collapse" href="#collapseother_activitis" role="button" aria-expanded="false" aria-controls="collapseother_activitis"><span><i class="bi bi-pencil-square"></i> </span>Update your other activitis </a>
              @endif
            </li> 

              </ul>
              
            </aside>
            
          </div>
          
          <!-- col end  -->
          <div class="col-lg-8">
            <!-- list is start here -->
            <section id="website">
            <div class="collapse" id="collapsewebsite">
              <div class="section-content">
                <h3>Add Website </h3>
              </div>
              <p><i class=" text-danger">do you have personal website or portfolio website, please add your web url otherwise this field is not mandatory</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_website')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="website" value="{{$alldata->website}}" class="form-control" placeholder="https://www.example.com" aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>
          <!-- conten end here  ----------------------------------------------->
            <section id="website">
            <div class="collapse" id="collapsefacebook">
            <div class="section-content">
                <h3>Add Facebook </h3>
              </div>
              <p><i class=" text-danger">do you have Facebook Account   please add your facebook url otherwise this field is not mandatory</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_facebook')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="facebook" value="{{$alldata->facebook}}" class="form-control" placeholder="Add your facebook url " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>
          <!-- conten end here  ----------------------------------------------->

            <section id="website">
            <div class="collapse" id="collapsetwitter">
            <div class="section-content">
                <h3>Add Twitter </h3>
              </div>
              <p><i class=" text-danger">do you have Twitter Account   please add your Twitter url otherwise this field is not mandatory</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_twitter')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="twitter" value="{{$alldata->twitter}}" class="form-control" placeholder="Add your facebook url " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>
          <!-- conten end here  ----------------------------------------------->

            <section id="website">
            <div class="collapse" id="collapselinkedin">
            <div class="section-content">
                <h3>Add Linkedin </h3>
              </div>
              <p><i class=" text-danger">do you have linkedin Account   please add your linkedin url otherwise this field is not mandatory</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_linkedin')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="linkedin" value="{{$alldata->linkedin}}" class="form-control" placeholder="Add your facebook url " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>
          <!-- conten end here  ----------------------------------------------->

            <section id="website">
            <div class="collapse" id="collapseinstagram">
            <div class="section-content">
                <h3>Add Instagram </h3>
              </div>
              <p><i class=" text-danger">do you have instagram Account   please add your instagram url otherwise this field is not mandatory</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_instagram')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="instagram" value="{{$alldata->instagram}}" class="form-control" placeholder="Add your facebook url " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>
          <!-- conten end here  ----------------------------------------------->

            <section id="website">
            <div class="collapse" id="collapsefamilymember">
            <div class="section-content">
                <h3>Add Family Members </h3>
              </div>
              <p><i class=" text-danger">this field is not mandatory</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_family_member')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="number" min="1" max="15" name="family_member" value="{{$alldata->family_member}}" class="form-control" placeholder="Add your facebook url " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>
          <!-- conten end here  ----------------------------------------------->

            <section id="website">
            <div class="collapse" id="collapsefatherinfo">
            <div class="section-content">
                <h3>Add Legal Guardian </h3>
              </div>
              <p><i class=" text-danger">do you have any legal guardian? please added his informa, otherwise this field is not mandatory!</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_father_info')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="father_name" value="{{$alldata->father_name}}" class="form-control" placeholder="name" aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    </div>
                    </div>

                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="father_ocupation" value="{{$alldata->father_ocupation}}" class="form-control" placeholder="What is your relationship with him?" aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    </div>
                    </div>

                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="father_phone" value="{{$alldata->father_phone}}" class="form-control" placeholder="Add his phone number " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    </div>
                    </div>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>
          <!-- conten end here  ----------------------------------------------->

            <section id="website">
            <div class="collapse" id="collapsemotherinfo">
            <div class="section-content">
                <h3>Add other Legal Guardian </h3>
              </div>
              <p><i class=" text-danger">do you have any legal guardian? please added his informa, otherwise this field is not mandatory!</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_mother_info')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="mother_name" value="{{$alldata->mother_name}}" class="form-control" placeholder=" Name" aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    </div>
                    </div>

                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="mother_ocupation" value="{{$alldata->mother_ocupation}}" class="form-control" placeholder="What is your relationship with him? " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    </div>
                    </div>

                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="mother_phone" value="{{$alldata->mother_phone}}" class="form-control" placeholder="add his phone number? " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    </div>
                    </div>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>
          <!-- conten end here  -----------------------------------------------> 
            <section id="website">
            <div class="collapse" id="collapsepresenaddress">
            <div class="section-content">
                <h3>Add Present Address </h3>
              </div>
              <p><i class=" text-danger">Add your present Address!</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_present_address')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="present_address" value="{{$alldata->present_address}}" class="form-control" placeholder="Add your facebook url " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>


            <section id="website">
            <div class="collapse" id="collapsepermanentaddress">
            <div class="section-content">
                <h3>Add Permanent Address </h3>
              </div>
              <p><i class=" text-danger">Add your permanent Address!</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_permanet_address')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="permanet_address" value="{{$alldata->permanet_address}}" class="form-control" placeholder="Add your facebook url " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>
            <section id="website">
            <div class="collapse" id="collapsebirth_date">
            <div class="section-content">
                <h3>Add Date of Birth </h3>
              </div>
              <p><i class=" text-danger">Add your Birth Date !</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_birth_date')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="date" name="birth_date" value="{{$alldata->birth_date}}" class="form-control" placeholder="Add your facebook url " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section> 
            <section id="website">
            <div class="collapse" id="collapsebirth_place">
            <div class="section-content">
                <h3>Add your Birth Place </h3>
              </div>
              <p><i class=" text-danger">Add your Birth Place !</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_birth_place')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <input type="text" name="birth_place" value="{{$alldata->birth_place}}" class="form-control" placeholder="Add your facebook url " aria-label="Recipient's username" aria-describedby="button-addon2"/>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>

            <section id="website">
            <div class="collapse" id="collapserelationship">
            <div class="section-content">
                <h3>Add Relationship </h3>
              </div>
              <p><i class=" text-danger">Add your collapserelationship status !</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_relationship')}}" enctype="multipart/form-data" id="updaterelationship">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <select name="relationship" id="relationship" value="{{$alldata->blood}}" class="form-control" form="updaterelationship" >
                    <option value="{{$alldata->relationship}}" >{{$alldata->relationship}} </option>
                    <option value="Single">Single</option>
                    <option value="In a Relationship">In a Relationship</option>
                    <option value="Engaged">Engaged</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                    <option value="Widowed">Widowed</option>
                  </select>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>

            <section id="website">
            <div class="collapse" id="collapseblood">
            <div class="section-content">
                <h3>Add Blood group </h3>
              </div>
              <p><i class=" text-danger">Add your Blood group !</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_blood')}}" enctype="multipart/form-data" id="updateBloodForm">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <select name="blood" id="bloods" value="{{$alldata->blood}}" class="form-control" form="updateBloodForm" >
                    <option value="{{$alldata->blood}}" >{{$alldata->blood}} </option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                  </select>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>

            <section id="website">
            <div class="collapse" id="collapselanguage">
            <div class="section-content">
                <h3>Add Language </h3>
              </div>
              <p><i class=" text-danger">Add Language !</i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_language')}}" enctype="multipart/form-data" id="updatelanguage">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <select name="language" id="language" value="{{$alldata->language}}" class="form-control" form="updatelanguage" >
                    <option value="{{$alldata->language}}" >{{$alldata->language}} </option>
                    <option value="Bengli">Bengli</option>
                    <option value="English">English</option>
                    <option value="Hindi">Hindi</option>
                  </select>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>


            <section id="website">
            <div class="collapse" id="collapsehobies">
            <div class="section-content">
                <h3>Add Other other_activitis </h3>
              </div>
              <p><i class=" text-danger">Add your other activitis </i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_hobies')}}" enctype="multipart/form-data" id="updatehobies">
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <select name="hobies" id="hobies" value="{{$alldata->hobies}}" class="form-control" form="updatehobies" >
                    <option value="{{$alldata->hobies}}" >{{$alldata->hobies}} </option>
                    <option value="Bengli">Bengli</option>
                    <option value="English">English</option>
                    <option value="Hindi">Hindi</option>
                  </select>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>
            <section id="website">
            <div class="collapse" id="collapseother_activitis">
              <p><i class=" text-danger">Add your other activits </i>
              <form method="post" action="{{url('dashboard/user/BasicInfo/update_other_activitis')}}" enctype="multipart/form-data" >
                  @csrf
                  <div class="row">
                  <!-- aphone end -->
                  <div class="col-md-8">
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="id"  value="{{ $alldata->Creator_id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="user_id"  value="{{ Auth::user()->id }}" />
                  <input type="hidden" class="form-control" id="basic-default-fullname" name="slug"  value="{{ $alldata->slug }}" />
                    <div class="mb-3">
                    <div class="input-group">
                    <textarea type="text" name="other_activitis" value="{{$alldata->other_activitis}}" class="form-control" placeholder="Add other activitis " aria-label="Recipient's username" aria-describedby="button-addon2">{{$alldata->other_activitis}}</textarea>
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">save</button>
                  </div>
                    </div>
                  </div>
                  <!-- aphone end -->
                  </div>
                  <!-- row -->
                </form>
              </p>
              <!-- end form -->
            </div>
          </section>
          </div>
          <!-- col end  -->
        </div>

        </div>
      </div>
    </div>
  </section>
















@endsection 