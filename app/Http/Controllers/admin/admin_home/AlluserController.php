<?php

namespace App\Http\Controllers\admin\admin_home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Your_Profile;
use App\Models\AddworkPlace;
use App\Models\AddEducation;
use App\Models\BasicInfo;
use Carbon\Carbon;


class AlluserController extends Controller
{
    //
    public function index(Request $request){
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $alldata= User::where('name', 'LIKE', "%$search%")->orwhere('email','LIKE',"%$search%")->orderby('id','DESC')
           ->paginate(10);
         }
         else{
           $alldata = User::orderBy('id', 'DESC')->paginate(10);
         }
        $totalpost = User::count();
        $deletecount = User::onlyTrashed()->count();
        return view('admin.admin_home.users.index',compact('alldata','search','totalpost','deletecount'));
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
    public function edit($id){
      $data=User::where('id',$id)->firstOrFail();
      return view('admin.admin_home.users.edit',compact('data'));
  }

  /* ------  this is update page --------*/
  public function update(Request $request){
    $id=$request['id'];
    $update=User::where('id',$id)->update([
        'role'=>$request['role'],
        'updated_at'=>Carbon::now()->toDateTimeString(),
    ]);
  /*------- image start here ------ */
    if($update){
      Session::flash('success','value');
      return redirect()->route('alluser.view',$id);
    }else{
      Session::flash('error','value');
      return redirect()->route('alluser.view',$id)->with('message','Information Update Failed !');
    }
  }
  /*-------- update end here -------- */
    /*----  soft Delete  --------*/
    public function softdelete($id){
      $post =User::where('id',$id);
      $post->delete();
      if($post){
        return redirect()->back()->with('message', 'Account Destroy Successfuly !');
      }else{
        return redirect()->back()->with('message', 'Data Restore Faild!');
      }
    }
     /*----  Restore Data  --------*/
     public function restore($id){
      $post =User::withTrashed()->where('id',$id);
      $post->restore();
      if($post){
        return redirect()->back()->with('message', 'Data Restore Successfuly !');
      }else{
        return redirect()->back()->with('message', 'Data Restore  Faild !');
      }
    }


  // permanent delete data from Database and image into the public folder directory 
  public function delete($id)
  { 
    // Retrieve the data from the database
  $data = User::onlyTrashed()->where('id', $id)->first();
  if ($data) {
      // Delete the database information
      User::where('id', $id)->forceDelete();
      return redirect()->back()->with('message', 'Delete Successfuly');
  } else {
    return redirect()->back()->with('message', 'Delete failed !');
  }

  }


  // Recycle bin code is start here 
  public function recycle(Request $request){
    $search = $request['search'] ?? "";
    if($search !=""){
        $all= User::onlyTrashed()->where('name', 'LIKE', "%$search%")->orwhere('email','LIKE',"%$search%")->paginate(5);
    }
    else{
        $all = User::onlyTrashed()->orderBy('id', 'ASC')->paginate(5);
    }
    $totalpost = User::count();
    return view('admin.admin_home.users.recycle',compact('all','search','totalpost'));
}


























    public function alldata(){
      
        $id=Auth::user()->id;
        $profileinfo=Your_Profile::where('user_id',$id)->where('status',1)->get();

        //dd($profileinfo);
        
        return view('admin.admin_home.users.alldata',compact('profileinfo'));
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
