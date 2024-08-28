<?php

namespace App\Http\Controllers\admin\admin_home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Your_Profile;
use App\Models\AddworkPlace;
use App\Models\AddEducation;
use App\Models\BasicInfo;
use Carbon\Carbon;
use Image;

class AlluserController extends Controller
{
    //

    public function index(){

        $alldata=User::all();
        //dd($alldata);
        return view('admin.admin_home.users.index',compact('alldata'));
    }

    public function alldata(){
      
        $id=Auth::user()->id;
        $profileinfo=Your_Profile::where('user_id',$id)->where('status',1)->get();

        //dd($profileinfo);
        


        return view('admin.admin_home.users.alldata',compact('profileinfo'));
    }




    public function view($id){
    
        $data=User::where('id',$id)->firstOrFail();
        $profileinfo=Your_Profile::where('user_id',$id)->where('status',1)->get();
        $addworkplace=AddworkPlace::where('user_id',$id)->where('status',1)->get();
        $education=AddEducation::where('user_id',$id)->where('status',1)->get();
        $basicinfo=BasicInfo::where('user_id',$id)->where('status',1)->get();
        
       //dd($profileinfo);
        return view('admin.admin_home.users.view',compact('data','profileinfo','addworkplace','education','basicinfo'));
    }

    public function delete($id)
    { 
      // Retrieve the data from the database
    $data = User::where('id', $id)->first();


    $data->forceDelete();

    return redirect('admin/dashboard/admin_allusers');
    

   
    }



// profile delete 
    public function profiledelete($id){ 
      // Retrieve the data from the database
    $data = Your_Profile::where('Creator_id', $id)->first();

    if ($data) {
        // Delete the first image
        $profileimage = public_path('uploads/' . $data->profile_image);
        if (file_exists($profileimage)) {
            File::delete($profileimage);
        }

        // Delete the second image
        $coverphoto = public_path('uploads/' . $data->ban_image);
        if (file_exists($coverphoto)) {
            File::delete($coverphoto);
        }

        // Delete the database information
        Your_Profile::where('Creator_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

// work place deleter 
public function work_place_delete($id){ 
    // Retrieve the data from the database
    $data = AddworkPlace::where('Creator_id', $id)->first();

    if ($data) {
        // Delete the first image
        $profileimage = public_path('uploads/' . $data->profile_image);
        if (file_exists($profileimage)) {
            File::delete($profileimage);
        }

        // Delete the second image
        $coverphoto = public_path('uploads/' . $data->ban_image);
        if (file_exists($coverphoto)) {
            File::delete($coverphoto);
        }

        // Delete the database information
        AddworkPlace::where('Creator_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }

 
  }
// Delete education 
public function edicaton_delete($id){ 
    // Retrieve the data from the database
    $data = AddEducation::where('Creator_id', $id)->first();

    if ($data) {
        // Delete the first image
        $profileimage = public_path('uploads/' . $data->profile_image);
        if (file_exists($profileimage)) {
            File::delete($profileimage);
        }

        // Delete the second image
        $coverphoto = public_path('uploads/' . $data->ban_image);
        if (file_exists($coverphoto)) {
            File::delete($coverphoto);
        }

        // Delete the database information
        AddEducation::where('Creator_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }

 
  }



    // active post 

    public function post_active_profile($id){
        $active=Your_Profile::where('post_status',0)->where('Creator_id',$id)->update([
          'post_status'=>1,
        ]);

        if($active){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }

// Deactive post 
public function post_deactive_profile($id){
    $active=Your_Profile::where('post_status',1)->where('Creator_id',$id)->update([
      'post_status'=>2,
    ]);

    if($active){
      Session::flash('success_soft','value');
      return redirect()->back();
    }else{
      Session::flash('error_soft','value');
      return redirect()->back();
    }
  }
// work place 
public function post_active_work($id){
    $active=AddworkPlace::where('post_status',0)->where('Creator_id',$id)->update([
      'post_status'=>1,
    ]);

    if($active){
      Session::flash('success_soft','value');
      return redirect()->back();
    }else{
      Session::flash('error_soft','value');
      return redirect()->back();
    }
  }

// Deactive post 
public function post_deactive_work($id){
$active=AddworkPlace::where('post_status',1)->where('Creator_id',$id)->update([
  'post_status'=>2,
]);

if($active){
  Session::flash('success_soft','value');
  return redirect()->back();
}else{
  Session::flash('error_soft','value');
  return redirect()->back();
}
}
// eduaction post active 
public function post_active_education($id){
    $active=AddEducation::where('post_status',0)->where('Creator_id',$id)->update([
      'post_status'=>1,
    ]);

    if($active){
      Session::flash('success_soft','value');
      return redirect()->back();
    }else{
      Session::flash('error_soft','value');
      return redirect()->back();
    }
  }

// Deactive post 
public function post_deactive_education($id){
$active=AddEducation::where('post_status',1)->where('Creator_id',$id)->update([
  'post_status'=>2,
]);

if($active){
  Session::flash('success_soft','value');
  return redirect()->back();
}else{
  Session::flash('error_soft','value');
  return redirect()->back();
}
}





















}
