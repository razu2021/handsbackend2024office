<?php
namespace App\Http\Controllers\website\wedo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\page_desc;
use Carbon\Carbon;
class pageDescriptionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
           $all= page_desc::where('status',1)->where('category_as', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = page_desc::where('status', 1)->orderBy('page_desc_id', 'ASC')->paginate(5);
         }
        $totalpost = page_desc::count();
        return view('websiteBackend.common.page_desc.index',compact('all','search','totalpost'));
    }
    public function add(){
        $totalpost = page_desc::count();
        $lastcreat = page_desc::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.common.page_desc.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=page_desc::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.page_desc.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=page_desc::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.page_desc.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=page_desc::insertGetId([
            'category_as'=>$request['category_as'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          /*------- image start here ------ */
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('page_desc.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('page_desc.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=page_desc::where('status',1)->where('page_desc_id',$id)->where('slug',$slug)->update([
            'category_as'=>$request['category_as'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect()->route('page_desc.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('page_desc.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=page_desc::where('post_status',2)->where('page_desc_id',$id)->update([
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
        $post_deactive =page_desc::where('post_status',1)->where('page_desc_id',$id)->update([
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
        $post =page_desc::where('page_desc_id',$id);
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
        $post =page_desc::withTrashed()->where('page_desc_id',$id);
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
    $data = page_desc::onlyTrashed()->where('page_desc_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/'.$data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        page_desc::where('page_desc_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
}
