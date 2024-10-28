<?php

namespace App\Http\Controllers\website\gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\field_storise;
use Carbon\Carbon;
class fieldStoriseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
           $all= field_storise::where('status',1)->where('heading', 'LIKE', "%$search%")->orwhere('location','LIKE',"%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = field_storise::where('status', 1)->orderBy('field_storise_id', 'ASC')->paginate(5);
         }
        $totalpost = field_storise::count();
        $deletecount= field_storise::onlyTrashed()->count();
        return view('websiteBackend.gallery.field_storise.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = field_storise::count();
        $lastcreat = field_storise::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.gallery.field_storise.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=field_storise::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.gallery.field_storise.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=field_storise::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.gallery.field_storise.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=field_storise::insertGetId([
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
            return redirect()->route('field_storise.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('field_storise.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=field_storise::where('status',1)->where('field_storise_id',$id)->where('slug',$slug)->update([
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
          return redirect()->route('field_storise.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('field_storise.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=field_storise::where('post_status',2)->where('field_storise_id',$id)->update([
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
        $post_deactive =field_storise::where('post_status',1)->where('field_storise_id',$id)->update([
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
        $post =field_storise::where('field_storise_id',$id);
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
        $post =field_storise::withTrashed()->where('field_storise_id',$id);
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
    $data = field_storise::onlyTrashed()->where('field_storise_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/gallery/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }
        // Delete the database information
        field_storise::where('field_storise_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

          // Recycle bin code is start here 
          public function recycle(Request $request){
            $search = $request['search'] ?? "";
            if($search !=""){
                $all= field_storise::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
                ->paginate(5);
            }
            else{
                $all = field_storise::onlyTrashed()->where('status', 1)->orderBy('field_storise_id', 'ASC')->paginate(5);
            }
            $totalpost = field_storise::count();
            return view('websiteBackend.gallery.field_storise.recycle',compact('all','search','totalpost'));
        }
}
