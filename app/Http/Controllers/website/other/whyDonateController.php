<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\whaydonate;
use Carbon\Carbon;
class whyDonateController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= whaydonate::where('status',1)->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = whaydonate::where('status', 1)->orderBy('whaydonate_id', 'ASC')->paginate(5);
         }
        $totalpost = whaydonate::count();
        $deletecount = whaydonate::onlyTrashed()->count();
        return view('websiteBackend.other.whaydonate.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = whaydonate::count();
        $lastcreat = whaydonate::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.whaydonate.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=whaydonate::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.whaydonate.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=whaydonate::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.whaydonate.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'title' => 'required',
              'des' => 'required',
          ],
              [
                'title.required' => ' Title is Required.',
                'des.required' => 'caption  is Required.',
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=whaydonate::insertGetId([
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'subtitle'=>$request['subtitle'],
            'caption'=>$request['caption'],
            'des'=>$request['des'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('whaydonate.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('whaydonate.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=whaydonate::where('status',1)->where('whaydonate_id',$id)->where('slug',$slug)->update([
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'subtitle'=>$request['subtitle'],
            'caption'=>$request['caption'],
            'des'=>$request['des'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('whaydonate.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('whaydonate.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=whaydonate::where('post_status',2)->where('whaydonate_id',$id)->update([
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
        $post_deactive =whaydonate::where('post_status',1)->where('whaydonate_id',$id)->update([
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
        $post =whaydonate::where('whaydonate_id',$id);
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
        $post =whaydonate::withTrashed()->where('whaydonate_id',$id);
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
    $data = whaydonate::onlyTrashed()->where('whaydonate_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        whaydonate::where('whaydonate_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
        // Recycle bin code is start here 
        public function recycle(Request $request){
            $search = $request['search'] ?? "";
            if($search !=""){
                $all= whaydonate::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")->orwhere('subtitle','LIKE',"%$search%")
                ->paginate(5);
            }
            else{
                $all = whaydonate::onlyTrashed()->where('status', 1)->orderBy('whaydonate', 'ASC')->paginate(5);
            }
            $totalpost = whaydonate::count();
            return view('websiteBackend.other.whaydonate.recycle',compact('all','search','totalpost'));
        }
}
