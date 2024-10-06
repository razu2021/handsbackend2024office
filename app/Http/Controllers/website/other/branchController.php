<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\branch;
use Carbon\Carbon;
class branchController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= branch::where('status',1)->where('name', 'LIKE', "%$search%")->orwhere('location','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = branch::where('status', 1)->orderBy('branch_id', 'ASC')->paginate(5);
         }
        $totalpost = branch::count();
        $deletecount = branch::onlyTrashed()->count();
        return view('websiteBackend.other.branch.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = branch::count();
        $lastcreat = branch::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.branch.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=branch::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.branch.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=branch::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.branch.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'name' => 'required',
              'location' => 'required',
          ],
              [
                'name.required' => ' Name is Required.',
                'location.required' => 'Location is Required.',
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=branch::insertGetId([
            'name'=>$request['name'],
            'location'=>$request['location'],
            'contact'=>$request['contact'],
            'caption'=>$request['caption'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('branch.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('branch.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=branch::where('status',1)->where('branch_id',$id)->where('slug',$slug)->update([
            'name'=>$request['name'],
            'location'=>$request['location'],
            'contact'=>$request['contact'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('branch.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('branch.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=branch::where('post_status',2)->where('branch_id',$id)->update([
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
        $post_deactive =branch::where('post_status',1)->where('branch_id',$id)->update([
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
        $post =branch::where('branch_id',$id);
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
        $post =branch::withTrashed()->where('branch_id',$id);
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
    $data = branch::onlyTrashed()->where('branch_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        branch::where('branch_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
        // Recycle bin code is start here 
        public function recycle(Request $request){
            $search = $request['search'] ?? "";
            if($search !=""){
                $all= branch::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")->orwhere('subtitle','LIKE',"%$search%")
                ->paginate(5);
            }
            else{
                $all = branch::onlyTrashed()->where('status', 1)->orderBy('branch', 'ASC')->paginate(5);
            }
            $totalpost = branch::count();
            return view('websiteBackend.other.branch.recycle',compact('all','search','totalpost'));
        }
}
