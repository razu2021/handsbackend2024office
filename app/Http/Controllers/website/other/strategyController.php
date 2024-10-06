<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\strategy;
use Carbon\Carbon;
class strategyController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= strategy::where('status',1)->where('caption', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = strategy::where('status', 1)->orderBy('strategy_id', 'ASC')->paginate(5);
         }
         $deletecount = strategy::onlyTrashed()->count();
        $totalpost = strategy::count();
        return view('websiteBackend.other.strategy.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = strategy::count();
        $lastcreat = strategy::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.strategy.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=strategy::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.strategy.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=strategy::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.strategy.view',compact('data'));
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
          $slug='stratiegy-details'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=strategy::insertGetId([
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('strategy.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('strategy.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=strategy::where('status',1)->where('strategy_id',$id)->where('slug',$slug)->update([
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('strategy.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('strategy.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=strategy::where('post_status',2)->where('strategy_id',$id)->update([
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
        $post_deactive =strategy::where('post_status',1)->where('strategy_id',$id)->update([
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
        $post =strategy::where('strategy_id',$id);
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
        $post =strategy::withTrashed()->where('strategy_id',$id);
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
    $data = strategy::onlyTrashed()->where('strategy_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        strategy::where('strategy_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }


    
  // Recycle bin code is start here 
  public function recycle(Request $request){
    $search = $request['search'] ?? "";
    if($search !=""){
      
      $all= strategy::onlyTrashed()->where('title', 'LIKE', "%$search%")->orwhere('caption','LIKe',"%$search%")
      ->paginate(5);
    }
    else{
      $all = strategy::onlyTrashed()->where('status', 1)->orderBy('strategy_id', 'ASC')->paginate(5);
    }
    $totalpost = strategy::count();
    return view('websiteBackend.other.strategy.recycle',compact('all','search','totalpost'));
}
}
