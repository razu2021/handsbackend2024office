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
use App\Models\phone;
class phoneManageController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    $id= Auth::guard('admin')->user()->id;
     $search = $request['search'] ?? "";
        if($search !=""){
          $phone = phone::where('status',1)->where('phone_number', 'LIKE', "%$search%")->paginate(5);
        }
        else{
          $phone = phone::where('status', 1)->orderBy('phone_id', 'ASC')->paginate(5);
        }
        $totalpost = phone::count();
        return view('admin.manage_application.phone.index',compact('phone','search','totalpost'));  
    }
    public function add(){
        return view('admin.manage_application.phone.add');
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=phone::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.manage_application.phone.edit',compact('data'));
      }
        /* ------  this is view page --------*/
      public function view($slug){
        $data=phone::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.manage_application.phone.view',compact('data'));
      }
        /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
        $request->validate([
            'phone_number' => ['required','string','max:20','min:11','unique:'.phone::class,'regex:/^[0-9+\-]+$/']
        ],
            [
                'phone_number.required' => 'Phone Number is Required',
                'phone_number.string' => 'The Phone Number must be a string or Integer.',
                'phone_number.max' => 'The Phone Number must not exceed 20 characters.',
                'phone_number.min' => 'The Phone Number must Entair Minimum  11 characters.',
                'phone_number.regex' => 'The Phone Number can only contain numbers, plus (+), and hyphen (-) signs.',
            ],
        );
        /*---- validetion end here ------*/
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=phone::insertGetId([
            'phone_number'=>$request['phone_number'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
      
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect('admin/dashboard/manage-application/phone/add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect('admin/dashboard/manage-application/phone/add')->with('error',' Information Added Failed !');
        }
      }
    
      /* ------  this is update page --------*/
      public function update(Request $request){
      
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=phone::where('status',1)->where('phone_id',$id)->where('slug',$slug)->update([
            'phone_number'=>$request['phone_number'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('admin/dashboard/manage-application/phone/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('admin/dashboard/manage-application/phone/view/'.$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $active_post=phone::where('post_status',2)->where('phone_id',$id)->update([
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
        $softdelete=phone::where('post_status',1)->where('phone_id',$id)->update([
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
        $post =phone::where('phone_id',$id);
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
        $post =phone::withTrashed()->where('phone_id',$id);
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
    $data = phone::onlyTrashed()->where('phone_id', $id)->first();

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
        phone::where('phone_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
}
