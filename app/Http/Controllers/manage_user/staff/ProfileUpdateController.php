<?php

namespace App\Http\Controllers\manage_user\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Your_Profile;
use Carbon\Carbon;
use Intervention\Image\Image;
use Illuminate\Support\Facades\File;

class ProfileUpdateController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        $id= Auth::user()->id;
        $all=Your_Profile::where('status',1)->where('user_id',$id)->get();
       // dd($all);
        return view('manage_user.staff.profile_update.index',compact('all'));
    }
    public function add(){
        return view('manage_user.staff.profile_update.add');
    }
    public function edit($slug){
      $id= Auth::user()->id;
      $data=Your_Profile::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
        return view('manage_user.staff.profile_update.edit',compact('data'));
      }
      public function view($slug){
        $id= Auth::user()->id;
        $data=Your_Profile::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
        return view('manage_user.staff.profile_update.view',compact('data'));
      }
    
      public function insert(Request $request){
        $request->validate([
            'another_email' => ['required','string','max:50','email'],
            'phone' => ['required','string','max:20','min:11','unique:'.Your_Profile::class],
            'organization_name' => 'required',
            'curent_position' => 'required',
            'about' => 'required',
        ]);
        $user_id=Auth::user()->id;
        $name=Auth::user()->name;
        $email=Auth::user()->email;
        $username =$name.uniqid('15');
        $slug='users'.uniqid('20');
        $insert=Your_Profile::insertGetId([
          'user_id'=>$user_id,
          'username'=>$username,
          'name'=>$name,
          'email'=> $email,
          'another_email'=>$request['another_email'],
          'phone'=>$request['phone'],
          'organization_name'=>$request['organization_name'],
          'curent_position'=>$request['curent_position'],
          'about'=>$request['about'],
          'slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
    
        if($request->hasFile('profile_image')){
          $image=$request->file('profile_image');
          $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
    
          Your_Profile::where('Creator_id',$insert)->update([
            'profile_image'=>$imageName,
          ]);
        }
        // bg image upload here 
        if($request->hasFile('ban_image')){
          $image=$request->file('ban_image');
          $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(1080, 500)->save('uploads/'.$imageName);
    
          Your_Profile::where('Creator_id',$insert)->update([
            'ban_image'=>$imageName,
          ]);
        }
        // *********
        if ($insert) {
          Session::flash('success','value');
          return redirect('dashboard/user/profile/add')->with('message','Profile Information Added successful!');
      } else {
          Session::flash('error','value');
          return redirect('dashboard/user/profile/view/add')->with('error','Prifile Information Added Failed 1');
      }
      
      }
    
      public function update(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=Your_Profile::where('status',1)->where('Creator_id',$id)->update([
          'another_email'=>$request['another_email'],
          'phone'=>$request['phone'],
          'organization_name'=>$request['organization_name'],
          'curent_position'=>$request['curent_position'],
          'about'=>$request['about'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
    
        if($request->hasFile('profile_image')){
          $image=$request->file('profile_image');
          $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
    
          Your_Profile::where('Creator_id',$id)->update([
            'profile_image'=>$imageName,
          ]);
        }
        // bg image upload here 
        if($request->hasFile('ban_image')){
          $image=$request->file('ban_image');
          $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(1080, 500)->save('uploads/'.$imageName);
          Your_Profile::where('Creator_id',$id)->update([
            'ban_image'=>$imageName,
          ]);
        }
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/profile/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/profile/view/'.$slug)->with('message','Profile Information Update Failed !');
        }
      }
      public function post_active($id){
        $softdelete=Your_Profile::where('post_status',2)->where('Creator_id',$id)->update([
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
        $softdelete=Your_Profile::where('post_status',1)->where('Creator_id',$id)->update([
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
        $post =Your_Profile::where('Creator_id',$id);
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
      
        $post =Your_Profile::withTrashed()->where('Creator_id',$id);
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
    $data = Your_Profile::onlyTrashed()->where('Creator_id', $id)->first();
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
      public function recycle(){
        $all=Your_Profile::onlyTrashed()->where('status',1)->orderBy('Creator_id','DESC')->get();
        return view('admin.blog.BlogBanner.recycle',compact('all'));
      }
}
