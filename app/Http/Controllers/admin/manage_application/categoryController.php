<?php

namespace App\Http\Controllers\admin\manage_application;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\category;
use App\Models\main_menu;
use Carbon\Carbon;

class categoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    $id= Auth::guard('admin')->user()->id;
     $search = $request['search'] ?? "";
        if($search !=""){
          $category = category::where('status',1)->where('category_name', 'LIKE', "%$search%")->orwhere('category_title','LIKE',"%$search%")->orwhere('category_url','LIKE',"%$search%")->paginate(5);
        }
        else{
          $category = category::where('status', 1)->orderBy('category_id', 'ASC')->paginate(5);
        }
      $totalpost = category::count();
        return view('admin.manage_application.category.index',compact('category','search','totalpost'));
       
        
    }


    public function add(){
        $all = main_menu::where('status', 1)->orderBy('menu_id', 'ASC')->get();
        return view('admin.manage_application.category.add',compact('all'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $all = main_menu::where('status', 1)->get();
      $data=category::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.manage_application.category.edit',compact('data','all'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=category::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.manage_application.category.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
        $request->validate([
            'category_name' => 'required',
            'category_url' => ['required','string','max:120','unique:'.category::class,'regex:/^[a-z0-9-]+$/'],
        ],
            [
                'category_name.required' => 'The menu name is required.',
                'category_url.required' => 'The menu URL is required.',
                'category_url.string' => 'The menu URL must be a string.',
                'category_url.max' => 'The menu URL must not exceed 120 characters.',
                'category_url.unique' => 'The menu URL has already been taken.',
                'category_url.regex' => 'The menu URL must only contain lowercase letters, numbers, and dashes (-).',
            ]
        );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=category::insertGetId([
            'category_title'=>$request['category_title'],
            'category_name'=>$request['category_name'],
            'category_url'=>$request['category_url'],
            'main_menu_id'=>$request['main_menu_id'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
      
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect('admin/dashboard/manage-application/category/add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect('admin/dashboard/manage-application/category/add')->with('error',' Information Added Failed !');
        }
      }
    
      /* ------  this is update page --------*/
      public function update(Request $request){
        $request->validate([
            'category_name' => 'required',
            'category_url' => ['required','string','max:120','unique:'.category::class,'regex:/^[a-z0-9-]+$/'],
        ],
            [
                'category_name.required' => 'The menu name is required.',
                'category_url.required' => 'The menu URL is required.',
                'category_url.string' => 'The menu URL must be a string.',
                'category_url.max' => 'The menu URL must not exceed 120 characters.',
                'category_url.unique' => 'The menu URL has already been taken.',
                'category_url.regex' => 'The menu URL must only contain lowercase letters, numbers, and dashes (-).',
            ]
        );
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=category::where('status',1)->where('category_id',$id)->where('slug',$slug)->update([
            'category_title'=>$request['category_title'],
            'category_name'=>$request['category_name'],
            'category_url'=>$request['category_url'],
            'main_menu_id'=>$request['main_menu_id'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('admin/dashboard/manage-application/category/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('admin/dashboard/manage-application/category/view/'.$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $active_post=category::where('post_status',2)->where('category_id',$id)->update([
          'post_status'=>1,
        ]);
        //$post->delete();
        // return redirect()->back()->with(['message'=>'Successfully deleted!!']);
        if($active_post){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      public function post_deactive($id){
        $softdelete=category::where('post_status',1)->where('category_id',$id)->update([
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
        $post =category::where('category_id',$id);
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
        $post =category::withTrashed()->where('category_id',$id);
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
    $data = category::onlyTrashed()->where('category_id', $id)->first();

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
        category::where('category_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

}
