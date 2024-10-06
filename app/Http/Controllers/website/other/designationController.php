<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\designation;
use App\Models\allstaff;
use Carbon\Carbon;
class designationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= designation::where('status',1)->where('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = designation::where('status', 1)->orderBy('designation_id', 'ASC')->paginate(5);
         }
         $deletecount = designation::onlyTrashed()->count();
        $totalpost = designation::count();
        return view('websiteBackend.other.designation.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = designation::count();
        $lastcreat = designation::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.designation.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=designation::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.designation.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=designation::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.designation.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'title' => 'required',
              'designation_name' => 'required',
              
          ],
              [
                'title.required' => ' Designation is Required.',
                'designation_name.required' => ' Designation Name is Required.',
              
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=designation::insertGetId([
            'designation_name'=>$request['designation_name'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('designation.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('designation.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=designation::where('status',1)->where('designation_id',$id)->where('slug',$slug)->update([
            'designation_name'=>$request['designation_name'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('designation.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('designation.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=designation::where('post_status',2)->where('designation_id',$id)->update([
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
        $post_deactive =designation::where('post_status',1)->where('designation_id',$id)->update([
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
        $post =designation::where('designation_id',$id);
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
        $post =designation::withTrashed()->where('designation_id',$id);
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
    $data = designation::onlyTrashed()->where('designation_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        designation::where('designation_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

  // Recycle bin code is start here 
  public function recycle(Request $request){
      $search = $request['search'] ?? "";
      if($search !=""){
        
        $all= designation::onlyTrashed()->where('title', 'LIKE', "%$search%")->orwhere('caption','LIKe',"%$search%")
        ->paginate(5);
      }
      else{
        $all = designation::onlyTrashed()->where('status', 1)->orderBy('designation_id', 'ASC')->paginate(5);
      }
      $totalpost = designation::count();
      return view('websiteBackend.other.designation.recycle',compact('all','search','totalpost'));
  }
}
