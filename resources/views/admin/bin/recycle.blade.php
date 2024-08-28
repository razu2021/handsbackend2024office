@extends('layouts.adminmaster')
@section('admin_content')
<!-- Basic Bootstrap Table -->

<section class="mt-4 mb-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="row">
            <div class="col-lg-12  ">
              <div class="mt-2 mb-2 ">
                <h2 class="mt-4 mb-2 fw-bold px-4">Delete Information </h2>
              </div>
            </div>

          </div>
          <hr>

          <table class="table table-striped">
            <tbody>
            @foreach($all as $data)
              <tr>
                <td> {{$data->menu_id}}</td>
                <td>{{$data->menu_title}}</td>
                <td>{{$data->menu_name}}</td>
                <td>{{$data->menu_url}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{url('admin/dashboard/manage-application/main-menu/restore/'.$data->menu_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{url('admin/dashboard/manage-application/main-menu/delete/'.$data->menu_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- ---------  information end here  -->

              @foreach($category as $data)
              <tr>
                <td>{{$data->category_id}}</td>
                <td>{{$data->category_title}}</td>
                <td>{{$data->category_name}}</td>
                <td>{{$data->category_url}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{url('admin/dashboard/manage-application/category/restore/'.$data->category_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{url('admin/dashboard/manage-application/category/delete/'.$data->category_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($subcategory as $data)
              <tr>
                <td>{{$data->categoryMenu->category_name}}</td>
                <td>{{$data->subcategory_id}}</td>
                <td>{{$data->subcategory_title}}</td>
                <td>{{$data->subcategory_name}}</td>
                <td>{{$data->subcategory_url}}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{url('admin/dashboard/manage-application/subcategory/restore/'.$data->subcategory_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{url('admin/dashboard/manage-application/subcategory/delete/'.$data->subcategory_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($socialmedia as $data)
              <tr>
                <td>{{$data->social_media_id}}</td>
                <td>{{$data->social_media_name}}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{url('admin/dashboard/manage-application/socialmedia/restore/'.$data->social_media_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{url('admin/dashboard/manage-application/socialmedia/delete/'.$data->social_media_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($phone as $data)
              <tr>
                <td>{{$data->phone_id}}</td>
                <td>{{$data->phone_number}}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{url('admin/dashboard/manage-application/phone/restore/'.$data->phone_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{url('admin/dashboard/manage-application/phone/delete/'.$data->phone_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              <!-- -------------  main menu informatin  -->
              @foreach($email as $data)
              <tr>
                <td>{{$data->email_id}}</td>
                <td>{{$data->email_name}}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{url('admin/dashboard/manage-application/email/restore/'.$data->email_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{url('admin/dashboard/manage-application/email/delete/'.$data->email_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($address as $data)
              <tr>
                <td>{{$data->address_id}}</td>
                <td>{{$data->address_title}}</td>
                <td>{!! Str::words($data->address_name,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{url('admin/dashboard/manage-application/address/restore/'.$data->address_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{url('admin/dashboard/manage-application/address/delete/'.$data->address_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($allbanner as $data)
              <tr>
                <td>{{$data->page_unique_name}}</td>
                <td>{{$data->banner_title}}</td>
                <td>{!! Str::words($data->banner_heading,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{url('admin/dashboard/website-manage/home-banner/restore/'.$data->banner_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{url('admin/dashboard/website-manage/home-banner/delete/'.$data->banner_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($serviceOver as $data)
              <tr>
                <td>{{$data->soverview_id}}</td>
                <td>{{$data->title}}</td>
                <td>{!! Str::words($data->banner_heading,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('serviceOverview.restore',$data->soverview_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('serviceOverview.delete',$data->soverview_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($whtasnew as $data)
              <tr>
                <td>{{$data->whatsnew_id}}</td>
                <td>{{$data->title}}</td>
                <td>{!! Str::words($data->banner_heading,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('whatsnew.restore',$data->whatsnew_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('whatsnew.delete',$data->whatsnew_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($smeads as $data)
              <tr>
                <td>{{$data->smeads_id}}</td>
                <td>{{$data->heading}}</td>
                <td>{!! Str::words($data->title,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('smeads.restore',$data->smeads_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('smeads.delete',$data->smeads_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($dipositads as $data)
              <tr>
                <td>{{$data->dipositads_id}}</td>
                <td>{{$data->heading}}</td>
                <td>{!! Str::words($data->title,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('dipositads.restore',$data->dipositads_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('dipositads.delete',$data->dipositads_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($loanstep as $data)
              <tr>
                <td>{{$data->loanstep_id}}</td>
                <td>{{$data->heading}}</td>
                <td>{!! Str::words($data->title,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('loansteps.restore',$data->loanstep_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('loansteps.delete',$data->loanstep_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($aboutus as $data)
              <tr>
                <td>{{$data->aboutus_id}}</td>
                <td>{{$data->heading}}</td>
                <td>{!! Str::words($data->title,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('aboutus.restore',$data->aboutus_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('aboutus.delete',$data->aboutus_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($faqs as $data)
              <tr>
                <td>{{$data->faqs_id}}</td>
                <td>{{$data->qustion}}</td>
                <td>{!! Str::words($data->answer,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('faqs.restore',$data->faqs_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('faqs.delete',$data->faqs_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($whatwedo as $data)
              <tr>
                <td>{{$data->whatwedo_id}}</td>
                <td>{{$data->heading}}</td>
                <td>{!! Str::words($data->title,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('whatwedo.restore',$data->whatwedo_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('whatwedo.delete',$data->whatwedo_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($security as $data)
              <tr>
                <td>{{$data->security_trust_id}}</td>
                <td>{{$data->heading}}</td>
                <td>{!! Str::words($data->title,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('security_trust.restore',$data->security_trust_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('security_trust.delete',$data->security_trust_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($easyloan as $data)
              <tr>
                <td>{{$data->easyloan_id}}</td>
                <td>{{$data->title}}</td>
                <td>{!! Str::words($data->caption,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('easyloan.restore',$data->easyloan_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('easyloan.delete',$data->easyloan_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($testimonial as $data)
              <tr>
                <td>{{$data->testimonial_id}}</td>
                <td>{{$data->name}}</td>
                <td>{!! Str::words($data->caption,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('testimonial.restore',$data->testimonial_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('testimonial.delete',$data->testimonial_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($microservice as $data)
              <tr>
                <td>{{$data->micro_service_id}}</td>
                <td>{{$data->category_as}}</td>
                <td>{{$data->heading}}</td>
                <td>{!! Str::words($data->caption,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('micro_service.restore',$data->micro_service_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('micro_service.delete',$data->micro_service_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($page_des as $data)
              <tr>
                <td>{{$data->page_desc_id}}</td>
                <td>{{$data->category_as}}</td>
                <td>{{$data->title}}</td>
                <td>{!! Str::words($data->caption,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('page_desc.restore',$data->page_desc_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('page_desc.delete',$data->page_desc_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($allpost as $data)
              <tr>
                <td>{{$data->allpost_id}}</td>
                <td>{{$data->category_as}}</td>
                <td>{{$data->title}}</td>
                <td>{!! Str::words($data->caption,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('allpost.restore',$data->allpost_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('allpost.delete',$data->allpost_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($product as $data)
              <tr>
                <td>{{$data->product_id}}</td>
                <td>{{$data->title}}</td>
                <td>{!! Str::words($data->caption,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('product.restore',$data->product_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('product.delete',$data->product_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
              @foreach($bbottom as $data)
              <tr>
                <td>{{$data->bannerbottom_id}}</td>
                <td>{{$data->title}}</td>
                <td>{!! Str::words($data->caption,20) !!}</td>
                <td>{{$data->created_at->format('Y-m-d H:i:s A')}}</td>
                <td>{{$data->deleted_at->format('Y-m-d H:i:s A')}}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Action
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Restor this Information')" 
                          href="{{route('bannerbottom.restore',$data->bannerbottom_id)}}">Restor Data </a>
                      </li>
                      <li><a class="dropdown-item" onclick="return confirm('Are you Confirm ? Delete this Information')"
                          href="{{route('bannerbottom.delete',$data->bannerbottom_id)}}">Delete Data</a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- -------------  main menu informatin  -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ----------------  section end here ------------------ -->

































@endsection