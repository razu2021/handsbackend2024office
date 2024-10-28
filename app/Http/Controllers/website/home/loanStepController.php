<?php

namespace App\Http\Controllers\website\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\loansteps;
use Carbon\Carbon;
class loanStepController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= loansteps::where('status',1)->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = loansteps::where('status', 1)->orderBy('loanstep_id', 'ASC')->paginate(5);
         }
        $totalpost = loansteps::count();
        $deletecount= loansteps::onlyTrashed()->count();
        return view('websiteBackend.home.loansteps.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = loansteps::count();
        $lastcreat = loansteps::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.home.loansteps.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=loansteps::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.home.loansteps.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=loansteps::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.home.loansteps.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'heading' => 'required',
              'title' => 'required',
              'caption' => 'required',
          ],
              [
                'heading.required' => 'SME Title is Required.',
                'title.required' => 'SME Title is Required.',
                'caption.required' => 'Caption is Required.',
            
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=loansteps::insertGetId([
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          // Redirect back
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('loansteps.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('loansteps.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $request->validate([
            'heading' => 'required',
            'title' => 'required',
            'caption' => 'required',
        ],
            [
              'heading.required' => 'SME Heading is Required.',
              'title.required' => 'SME Title is Required.',
              'caption.required' => 'Caption Required.',
             
            ]
        );
        $update=loansteps::where('status',1)->where('loanstep_id',$id)->where('slug',$slug)->update([
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        // Redirect back
        if($update){
          Session::flash('success','value');
          return redirect()->route('loansteps.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('loansteps.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=loansteps::where('post_status',2)->where('loanstep_id',$id)->update([
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
        $post_deactive =loansteps::where('post_status',1)->where('loanstep_id',$id)->update([
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
        $post =loansteps::where('loanstep_id',$id);
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
        $post =loansteps::withTrashed()->where('loanstep_id',$id);
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
    $data = loansteps::onlyTrashed()->where('loanstep_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }
        // Delete the database information
        loansteps::where('loanstep_id', $id)->forceDelete();
        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

        // Recycle bin code is start here 
        public function recycle(Request $request){
          $search = $request['search'] ?? "";
          if($search !=""){
              $all= loansteps::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
              ->paginate(5);
          }
          else{
              $all = loansteps::onlyTrashed()->where('status', 1)->orderBy('loanstep_id', 'ASC')->paginate(5);
          }
          $totalpost = loansteps::count();
          return view('websiteBackend.home.loansteps.recycle',compact('all','search','totalpost'));
      }
}
