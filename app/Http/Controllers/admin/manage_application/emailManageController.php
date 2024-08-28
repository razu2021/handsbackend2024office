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
use App\Models\email;
class emailManageController extends Controller
{
        //
        public function __construct(){
            $this->middleware('auth');
        }
        public function index(Request $request){
        $id= Auth::guard('admin')->user()->id;
         $search = $request['search'] ?? "";
            if($search !=""){
              $email = email::where('status',1)->where('email_name', 'LIKE', "%$search%")->paginate(5);
            }
            else{
              $email = email::where('status', 1)->orderBy('email_id', 'ASC')->paginate(5);
            }
            $totalpost = email::count();
            return view('admin.manage_application.email.index',compact('email','search','totalpost'));  
        }
        public function add(){
            $totalpost = email::count();
            return view('admin.manage_application.email.add',compact('totalpost'));
        }
        /* ------  this is edit page --------*/
        public function edit($slug){
          $id= Auth::guard('admin')->user()->id;
          $data=email::where('status',1)->where('slug',$slug)->firstOrFail();
            return view('admin.manage_application.email.edit',compact('data'));
          }
            /* ------  this is view page --------*/
          public function view($slug){
            $data=email::where('status',1)->where('slug',$slug)->firstOrFail();
            return view('admin.manage_application.email.view',compact('data'));
          }
            /* ------  this is submit or insert page --------*/
          public function insert(Request $request){
            $request->validate([
                'email_name' => ['required','string','max:100','unique:'.email::class,'email']
            ],
                [
                    'email_name.required' => 'Email Name is Required',
                    'email_name.string' => 'The Email Number must be a string.',
                    'email_name.max' => 'The Email Number must not exceed 100 characters.',
                ],
            );
            /*---- validetion end here ------*/
              $slug='admin'.uniqid('20');
              $creator=Auth::guard('admin')->user()->id;
              $insert=email::insertGetId([
                'email_name'=>$request['email_name'],
                'slug'=>$slug,
                'creator'=>$creator,
                'created_at'=>Carbon::now()->toDateTimeString(),
              ]);
          
              // *********
              if ($insert) {
                Session::flash('success','value');
                return redirect('admin/dashboard/manage-application/email/add')->with('message',' Information Added successful !');
            } else {
                Session::flash('error','value');
                return redirect('admin/dashboard/manage-application/email/add')->with('error',' Information Added Failed !');
            }
          }
        
          /* ------  this is update page --------*/
          public function update(Request $request){
            $request->validate([
                'email_name' => ['required','string','max:100','unique:'.email::class,'email']
            ],
                [
                    'email_name.required' => 'Email Name is Required',
                    'email_name.string' => 'The Email Number must be a string.',
                    'email_name.max' => 'The Email Number must not exceed 100 characters.',
                ],
            );
            /*---- validetion end here ------*/
            $id=$request['id'];
            $admin_id=$request['admin_id'];
            $slug=$request['slug'];
            $editor = Auth::guard('admin')->user()->id;
            $update=email::where('status',1)->where('email_id',$id)->where('slug',$slug)->update([
                'email_name'=>$request['email_name'],
                'editor'=>$editor,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
            if($update){
              Session::flash('success','value');
              return redirect('admin/dashboard/manage-application/email/view/'.$slug);
            }else{
              Session::flash('error','value');
              return redirect('admin/dashboard/manage-application/email/view/'.$slug)->with('message','Information Update Failed !');
            }
          }
          /*-------  post active ---*/
          public function post_active($id){
            $active_post=email::where('post_status',2)->where('email_id',$id)->update([
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
            $softdelete=email::where('post_status',1)->where('email_id',$id)->update([
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
            $post =email::where('email_id',$id);
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
            $post =email::withTrashed()->where('email_id',$id);
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
        $data = email::onlyTrashed()->where('email_id', $id)->first();
    
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
            email::where('email_id', $id)->forceDelete();
    
            return redirect()->back()->with('message', 'Delete Successfuly');
        } else {
          return redirect()->back()->with('message', 'Delete failed !');
        }
        }
}
