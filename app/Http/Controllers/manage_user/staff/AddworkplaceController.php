<?php

namespace App\Http\Controllers\manage_user\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\AddworkPlace;
use Carbon\Carbon;
use Image;

class AddworkplaceController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $id= Auth::user()->id;
        $all=AddworkPlace::where('status',1)->where('user_id',$id)->get();
       // dd($all);
        return view('manage_user.staff.addwork_place.index',compact('all'));
    }
    public function add(){
      $years = range(date("Y"), date("Y") - 25);
        return view('manage_user.staff.addwork_place.add',compact('years'));
    }
    public function edit($slug){
      $id= Auth::user()->id;
      $data=AddworkPlace::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
        return view('manage_user.staff.addwork_place.edit',compact('data'));
      }
      public function view($slug){
        $id= Auth::user()->id;
        $data=AddworkPlace::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
        return view('manage_user.staff.addwork_place.view',compact('data'));
      }
    
      public function insert(Request $request){
        $request->validate([
            'organization_name' => 'required',
            'curent_position' => 'required',
            'starting_date' => 'required',
            'ending_date' => 'required',
        ]);
        $user_id=Auth::user()->id;
        $slug='users'.uniqid('20');
        $insert=AddworkPlace::insertGetId([
          'user_id'=>$user_id,
          'organization_name'=>$request['organization_name'],
          'curent_position'=>$request['curent_position'],
          'starting_date'=>$request['starting_date'],
          'ending_date'=>$request['ending_date'],
          'job_des'=>$request['job_des'],
          'slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
    
        // *********
        if ($insert) {
          Session::flash('success','value');
          return redirect('dashboard/user/Add_work_places/add')->with('message',' Information Added successful !');
      } else {
          Session::flash('error','value');
          return redirect('dashboard/user/Add_work_places/view/add')->with('error',' Information Added Failed 1');
      }
      
      }
    
      public function update(Request $request){
    
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=AddworkPlace::where('status',1)->where('Creator_id',$id)->update([
          'organization_name'=>$request['organization_name'],
          'curent_position'=>$request['curent_position'],
          'starting_date'=>$request['starting_date'],
          'ending_date'=>$request['ending_date'],
          'job_des'=>$request['job_des'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/Add_work_places/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/Add_work_places/view/'.$slug)->with('message','Information Update Failed !');
        }
      }
      public function post_active($id){
        $softdelete=AddworkPlace::where('post_status',2)->where('Creator_id',$id)->update([
          'post_status'=>0,
        ]);
        
        //$post->delete();
        // return redirect()->back()->with(['message'=>'Successfully deleted!!']);
        if($softdelete){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      public function post_deactive($id){
        $softdelete=AddworkPlace::where('post_status',1)->where('Creator_id',$id)->update([
          'post_status'=>2,
        ]);
        
        //$post->delete();
        // return redirect()->back()->with(['message'=>'Successfully deleted!!']);
        if($softdelete){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      
      // soft delete 
      public function softdelete($id){
        $post =AddworkPlace::where('Creator_id',$id);
        $post->delete();
        if($post){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }

      //  Resotore data 
      public function restore($id){
      
        $post =AddworkPlace::withTrashed()->where('Creator_id',$id);
        $post->restore();
      
        if($post){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
  // permanent delete data from Database and image into the public folder directory 
    public function delete($id)
    { 
      // Retrieve the data from the database
    $data = AddworkPlace::onlyTrashed()->where('Creator_id', $id)->first();

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
      public function recycle(){
        $all=AddworkPlace::onlyTrashed()->where('status',1)->orderBy('Creator_id','DESC')->get();
        return view('admin.blog.BlogBanner.recycle',compact('all'));
      }
}
