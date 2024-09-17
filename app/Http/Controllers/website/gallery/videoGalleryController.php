<?php

namespace App\Http\Controllers\website\gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\video_gallery;
use Carbon\Carbon;

class videoGalleryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
           $all= video_gallery::where('status',1)->where('heading', 'LIKE', "%$search%")->orwhere('location','LIKE',"%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = video_gallery::where('status', 1)->orderBy('video_gallery_id', 'ASC')->paginate(5);
         }
        $totalpost = video_gallery::count();
        return view('websiteBackend.gallery.video_gallery.index',compact('all','search','totalpost'));
    }
    public function add(){
        $totalpost = video_gallery::count();
        $lastcreat = video_gallery::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.gallery.video_gallery.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=video_gallery::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.gallery.video_gallery.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=video_gallery::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.gallery.video_gallery.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=video_gallery::insertGetId([
            'service_image'=>$request['service_image'],
            'location'=>$request['location'],
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('video_gallery.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('video_gallery.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=video_gallery::where('status',1)->where('video_gallery_id',$id)->where('slug',$slug)->update([
          'service_image'=>$request['service_image'],
          'location'=>$request['location'],
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect()->route('video_gallery.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('video_gallery.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=video_gallery::where('post_status',2)->where('video_gallery_id',$id)->update([
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
        $post_deactive =video_gallery::where('post_status',1)->where('video_gallery_id',$id)->update([
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
        $post =video_gallery::where('video_gallery_id',$id);
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
        $post =video_gallery::withTrashed()->where('video_gallery_id',$id);
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
    $data = video_gallery::onlyTrashed()->where('video_gallery_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/gallery/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }
        // Delete the database information
        video_gallery::where('video_gallery_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
}
