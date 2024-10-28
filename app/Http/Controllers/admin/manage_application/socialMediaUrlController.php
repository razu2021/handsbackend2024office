<?php

namespace App\Http\Controllers\admin\manage_application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\socialmediaurl;
use App\Models\socialmedia;

class socialMediaUrlController extends Controller
{
      //
      public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    $id= Auth::guard('admin')->user()->id;
     $search = $request['search'] ?? "";
        if($search !=""){
          $socialmediaurl = socialmediaurl::where('status',1)->where('social_media_url', 'LIKE', "%$search%")->paginate(5);
        }
        else{
          $socialmediaurl = socialmediaurl::where('status', 1)->orderBy('url_id', 'ASC')->paginate(5);
        }
        $totalpost = socialmediaurl::count();
        return view('admin.manage_application.socialmediaurl.index',compact('socialmediaurl','search','totalpost'));  
    }
    public function add(){
        $all = socialmedia::where('status',1)->get();
        return view('admin.manage_application.socialmediaurl.add',compact('all'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $all = socialmedia::where('status',1)->get();
      $data=socialmediaurl::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.manage_application.socialmediaurl.edit',compact('data','all'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=socialmediaurl::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.manage_application.socialmediaurl.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
        $request->validate([

          'social_media_url' => 'required',
          'social_mediaid' => ['required','unique:'.socialmediaurl::class,],
      ],
          [
              'social_media_url.required' => 'Social Media URL is Required',
              'social_mediaid.required' => 'Social Media Name is Required',
              'social_mediaid.unique' => 'Social Media Name already has been Teken!',
          ],
      );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=socialmediaurl::insertGetId([
            'social_media_url'=>$request['social_media_url'],
            'social_mediaid'=>$request['social_mediaid'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
      
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect('admin/dashboard/manage-application/socialmediaurl/add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect('admin/dashboard/manage-application/socialmediaurl/add')->with('error',' Information Added Failed !');
        }
      }
    
      /* ------  this is update page --------*/
      public function update(Request $request){
        $request->validate([
          'social_media_url' => 'required',
          'social_mediaid' => ['required','unique:'.socialmediaurl::class,],
      ],
          [
              'social_media_url.required' => 'Social Media URL is Required',
              'social_mediaid.required' => 'Social Media Name is Required',
              'social_mediaid.unique' => 'Social Media Name already has been Teken!',
          ],
      );
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=socialmediaurl::where('status',1)->where('url_id',$id)->where('slug',$slug)->update([
            'social_media_url'=>$request['social_media_url'],
            'social_mediaid'=>$request['social_mediaid'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('admin/dashboard/manage-application/socialmediaurl/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('admin/dashboard/manage-application/socialmediaurl/view/'.$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $active_post=socialmediaurl::where('post_status',2)->where('url_id',$id)->update([
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
        $softdelete=socialmediaurl::where('post_status',1)->where('url_id',$id)->update([
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
        $post =socialmediaurl::where('url_id',$id);
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
        $post =socialmediaurl::withTrashed()->where('url_id',$id);
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
    $data = socialmediaurl::onlyTrashed()->where('url_id', $id)->first();

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
        socialmediaurl::where('url_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
}
