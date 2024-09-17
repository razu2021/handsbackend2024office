<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\apply_course;
use Carbon\Carbon; 
class applyCourseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= apply_course::where('status',1)->where('provider_name', 'LIKE', "%$search%")->orwhere('apply_course_title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = apply_course::where('status', 1)->orderBy('apply_course_id', 'ASC')->paginate(5);
         }
        $totalpost = apply_course::count();
        return view('websiteBackend.other.apply_course.index',compact('all','search','totalpost'));
    }
    public function add(){
        $totalpost = apply_course::count();
        $lastcreat = apply_course::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.apply_course.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=apply_course::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.apply_course.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=apply_course::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.apply_course.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
        // $request->validate([
        //     'provider_name' => 'required',
        
        // ],
        //     [
        //       'provider_name.required' => ' Organization Name is Required.',
             
        //     ]
        // );
          $slug=uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=apply_course::insertGetId([
            'name'=>$request['name'],
            'occupation'=>$request['occupation'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'age'=>$request['age'],
            'gender'=>$request['gender'],
            'education'=>$request['education'],
            'address'=>$request['address'],
            'caption'=>$request['caption'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('apply_course.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('apply_course.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=apply_course::where('status',1)->where('apply_course_id',$id)->where('slug',$slug)->update([
            'name'=>$request['name'],
            'occupation'=>$request['occupation'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'age'=>$request['age'],
            'gender'=>$request['gender'],
            'education'=>$request['education'],
            'address'=>$request['address'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect()->route('apply_course.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('apply_course.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=apply_course::where('post_status',2)->where('apply_course_id',$id)->update([
          'post_status'=>1,
        ]);
        if($post_actives){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      /*----  post deactive code --------*/
      public function post_deactive($id){
        $post_deactive =apply_course::where('post_status',1)->where('apply_course_id',$id)->update([
          'post_status'=>2,
        ]);

        if($post_deactive){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      
      /*----  soft Delete  --------*/
      public function softdelete($id){
        $post =apply_course::where('apply_course_id',$id);
        $post->delete();
        if($post){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }

     /*----  Restore Data  --------*/
      public function restore($id){
        $post =apply_course::withTrashed()->where('apply_course_id',$id);
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
    $data = apply_course::onlyTrashed()->where('apply_course_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        apply_course::where('apply_course_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
}
