<?php
namespace App\Http\Controllers\website\common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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
        return view('websiteBackend.common.bladeinfo.index',compact('all','search','totalpost'));
    }
    public function add(){
        $viewFiles = File::allFiles(resource_path('views/website'));
        $viewNames = array_map(function ($file) {
            return $file->getBasename('.blade.php'); // Remove the .blade.php extension
        }, $viewFiles);
        
        $inserted = bladeinfo::where('status',1)->get();
       

        return view('websiteBackend.common.bladeinfo.add',compact('viewNames','inserted'));
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
              'page_name' => 'required',
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
            return redirect('admin/dashboard/website-manage/blade-page/add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect('admin/dashboard/website-manage/blade-page/add')->with('error',' Information Added Failed !');
        }
      }
    
      /* ------  this is update page --------*/
      public function update(Request $request){
        $request->validate([
          'menu_name' => 'required',
          'menu_url' => ['required','string','max:120','unique:'.bladeinfo::class,'regex:/^[a-z0-9-]+$/'],
      ],
          [
              'menu_name.required' => 'The menu name is required.',
              'menu_url.required' => 'The menu URL is required.',
              'menu_url.string' => 'The menu URL must be a string.',
              'menu_url.max' => 'The menu URL must not exceed 120 characters.',
              'menu_url.unique' => 'The menu URL has already been taken.',
              'menu_url.regex' => 'The menu URL must only contain lowercase letters, numbers, and dashes (-).',
          ]
      );
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=bladeinfo::where('status',1)->where('banner_id',$id)->where('slug',$slug)->update([
          'menu_title'=>$request['menu_title'],
          'menu_name'=>$request['menu_name'],
          'menu_url'=>$request['menu_url'],
          // 'order_by'=>$request['set_position'] + 1,
          'editor'=>$editor,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('admin/dashboard/manage-application/blade-page/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('admin/dashboard/manage-application/blade-page/view/'.$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $softdelete=bladeinfo::where('post_status',2)->where('banner_id',$id)->update([
          'post_status'=>1,
        ]);
        //$post->delete();
        // return redirect()->back()->with(['message'=>'Successfully deleted!!']);
        if($softdelete){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      public function post_deactive($id){
        $softdelete=bladeinfo::where('post_status',1)->where('banner_id',$id)->update([
          'post_status'=>2,
        ]);
        //$post->delete();
        // return redirect()->back()->with(['message'=>'Successfully deleted!!']);
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
        $post =bladeinfo::where('banner_id',$id);
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
        $post =bladeinfo::withTrashed()->where('banner_id',$id);
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
    $data = bladeinfo::onlyTrashed()->where('banner_id', $id)->first();

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
        bladeinfo::where('banner_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
}
