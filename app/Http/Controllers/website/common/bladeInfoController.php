<?php
namespace App\Http\Controllers\website\common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\bladeinfo;
use Carbon\Carbon;

class bladeInfoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= bladeinfo::where('status',1)->where('page_name', 'LIKE', "%$search%")->orwhere('page_unique_name','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = bladeinfo::where('status', 1)->orderBy('blades_id', 'ASC')->paginate(5);
         }
        $totalpost = bladeinfo::count();
        $deletecount=bladeinfo::onlyTrashed()->count();
        return view('websiteBackend.common.bladeinfo.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $viewFiles = File::allFiles(resource_path('views/website'));
        $viewNames = array_map(function ($file) {
            return $file->getBasename('.blade.php'); // Remove the .blade.php extension
        }, $viewFiles);
        $inserted = bladeinfo::where('status',1)->get();
        $totalpost= bladeinfo::count();
         return view('websiteBackend.common.bladeinfo.add',compact('viewNames','inserted','totalpost'));
      
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=bladeinfo::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.bladeinfo.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=bladeinfo::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.bladeinfo.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
        $request->validate([
              'page_name' => ['required','string','unique:'.bladeinfo::class],
          ],
              [
                'page_name.required' => 'The page name is required.',
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $pages = '_Page';
          $insert=bladeinfo::insertGetId([
            'page_name'=>$request['page_name'],
            'page_unique_name'=>$request['page_name'].$pages,
            'slug'=>$slug,
            'creator'=>$creator, 
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
        /*------- image start here ------ */
      
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('blade.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('blade.add')->with('error',' Information Added Failed !');
        }
      }
    
      /*-------  post active ---*/
      public function post_active($id){
        $softdelete=bladeinfo::where('post_status',2)->where('blades_id',$id)->update([
          'post_status'=>1,
        ]);
        if($softdelete){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      public function post_deactive($id){
        $softdelete=bladeinfo::where('post_status',1)->where('blades_id',$id)->update([
          'post_status'=>2,
        ]);
       
        if($softdelete){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      
      // soft delete 
      public function softdelete($id){
        $post =bladeinfo::where('blades_id',$id);
        $post->delete();
        if($post){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }

      //  Resotore data 
      public function restore($id){
        $post =bladeinfo::withTrashed()->where('blades_id',$id);
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
    $data = bladeinfo::onlyTrashed()->where('blades_id', $id)->first();

    if ($data) {
        // Delete the first image
        $profileimage = public_path('uploads/' . $data->profile_image);
        if (file_exists($profileimage)) {
            File::delete($profileimage);
        }

        // Delete the second image
        $coverphoto = public_path('uploads/' . $data->ban_image);
        if (file_exists($coverphoto)){
            File::delete($coverphoto);
        }

        // Delete the database information
        bladeinfo::where('blades_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

    // Recycle bin code is start here 
    public function recycle(Request $request){
      $search = $request['search'] ?? "";
      if($search !=""){
          $all= bladeinfo::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
          ->paginate(5);
      }
      else{
          $all = bladeinfo::onlyTrashed()->where('status', 1)->orderBy('blades_id', 'ASC')->paginate(5);
      }
      $totalpost = bladeinfo::count();
      return view('websiteBackend.common.bladeinfo.recycle',compact('all','search','totalpost'));
  }
 
}
