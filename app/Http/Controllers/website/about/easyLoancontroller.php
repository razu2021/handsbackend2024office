<?php

namespace App\Http\Controllers\website\about;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\easyloan;
use Carbon\Carbon;
class easyLoancontroller extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= easyloan::where('status',1)->where('top_heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = easyloan::where('status', 1)->orderBy('easyloan_id', 'ASC')->paginate(5);
         }
        $totalpost = easyloan::count();
        return view('websiteBackend.about.easyloan.index',compact('all','search','totalpost'));
    }
    public function add(){
        $totalpost = easyloan::count();
        $lastcreat = easyloan::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.about.easyloan.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=easyloan::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.about.easyloan.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=easyloan::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.about.easyloan.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'title' => 'required',
              'caption' => 'required',
          ],
              [
                'title.required' => ' Title is Required.',
                'caption.required' => 'caption  is Required.',
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=easyloan::insertGetId([
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'button'=>$request['button'],
            'button_url'=>$request['button_url'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('easyloan.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('easyloan.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=easyloan::where('status',1)->where('easyloan_id',$id)->where('slug',$slug)->update([
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'button'=>$request['button'],
            'button_url'=>$request['button_url'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('easyloan.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('easyloan.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=easyloan::where('post_status',2)->where('easyloan_id',$id)->update([
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
        $post_deactive =easyloan::where('post_status',1)->where('easyloan_id',$id)->update([
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
        $post =easyloan::where('easyloan_id',$id);
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
        $post =easyloan::withTrashed()->where('easyloan_id',$id);
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
    $data = easyloan::onlyTrashed()->where('easyloan_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        easyloan::where('easyloan_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
}
