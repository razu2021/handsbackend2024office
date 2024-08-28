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
use App\Models\Service;
use Carbon\Carbon;
use Intervention\Image\Image;

class ServiceController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        $id= Auth::user()->id;
        $all=Service::where('status',1)->where('user_id',$id)->get();
       // dd($all);
        return view('manage_user.staff.service.index',compact('all'));
    }
    public function add(){
        return view('manage_user.staff.service.add');
    }
    public function edit($slug){
      $id= Auth::user()->id;
      $data=Service::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
        return view('manage_user.staff.service.edit',compact('data'));
      }
      public function view($slug){
        $id= Auth::user()->id;
        $data=Service::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
        return view('manage_user.staff.service.view',compact('data'));
      }
    
      public function insert(Request $request){
        $request->validate([
            'service_title' => ['required'],
            'service_subtitle' => ['required'],
            'service_info' => 'required',
        ]);
        $user_id=Auth::user()->id;
        $slug='users'.uniqid('20');
        $insert=Service::insertGetId([
          'user_id'=>$user_id,
          'service_title'=>$request['service_title'],
          'service_subtitle'=>$request['service_subtitle'],
          'service_info'=>$request['service_info'],
          'button'=>$request['button'],
          'button_url'=>$request['button_url'],
          'slug'=>$slug,
          'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString(),
        ]);
        if($request->hasFile('service_image')){
          $image=$request->file('service_image');
          $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
          Service::where('Service_id',$insert)->update([
            'service_image'=>$imageName,
          ]);
        }
        // *********
        if ($insert) {
          Session::flash('success','value');
          return redirect('dashboard/user/services/add')->with('message','Profile Information Added successful !');
      } else {
          Session::flash('error','value');
          return redirect('dashboard/user/services/add')->with('error','Prifile Information Added Failed 1');
      }
      }
      public function update(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=Service::where('status',1)->where('Service_id',$id)->update([
            'service_title'=>$request['service_title'],
            'service_subtitle'=>$request['service_subtitle'],
            'service_info'=>$request['service_info'],
            'button'=>$request['button'],
            'button_url'=>$request['button_url'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
    
        if($request->hasFile('service_image')){
          $image=$request->file('service_image');
          $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
          Service::where('Service_id',$id)->update([
            'service_image'=>$imageName,
          ]);
        }
        // bg image upload here 
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/services/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/services/view/'.$slug)->with('message','Profile Information Update Failed !');
        }
      }
      public function post_active($id){
        $softdelete=Service::where('post_status',2)->where('Service_id',$id)->update([
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
        $softdelete=Service::where('post_status',1)->where('Service_id',$id)->update([
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
      //  Resotore data 
    // soft delete 
    public function softdelete($id){
      $post =Service::where('Service_id',$id);
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

      $post =Service::withTrashed()->where('Service_id',$id);
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
    $data = Service::onlyTrashed()->where('Service_id', $id)->first();

    if ($data){
        // Delete the first image
        $profileimage = public_path('uploads/' . $data->service_image);
        if (file_exists($profileimage)){
            File::delete($profileimage);
        }

        // Delete the second image
        $coverphoto = public_path('uploads/' . $data->ban_image);
        if (file_exists($coverphoto)){
            File::delete($coverphoto);
        }
        // Delete the database information
        Service::where('Service_id', $id)->forceDelete();
 
    return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    
    }
      public function recycle(){
        $all=Service::onlyTrashed()->where('status',1)->orderBy('Service_id','DESC')->get();
        return view('admin.blog.BlogBanner.recycle',compact('all'));
      }
}
