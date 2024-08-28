<?php

namespace App\Http\Controllers\admin\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\LeaveType;

use Carbon\Carbon;


class LeaveDetailsController extends Controller
{
    //
    public function index(Request $request){
      $search =$request['search'] ?? "";
      if($search !=""){
        $all=LeaveType::where('types_name','LIKE',"%$search%")->get();
      }else{  
        $all=LeaveType::where('status',1)->paginate(7);
      }
        
        //dd($creatorData);
        return view('admin.admin_home.common.LeaveApplication.index',compact('all','search'));
    }
    public function add(){

      //$years = range(date("Y"), date("Y") - 25);

        return view('admin.admin_home.common.LeaveApplication.add');
    }
    public function edit($slug){
  
      $data=LeaveType::where('status',1)->where('slug',$slug)->firstOrFail();
      $years = range(date("Y"), date("Y") - 25);
        return view('admin.admin_home.common.LeaveApplication.edit',compact('data'));
      }
      public function view($slug){
     
        $data=LeaveType::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.admin_home.common.LeaveApplication.view',compact('data'));
      }
    
      public function insert(Request $request){
     
        $creatorData= Auth::guard('admin')->user()->id;
        $slug='admins'.uniqid('20');
        $insert=LeaveType::insertGetId([
          'types_name'=>$request['types_name'],
          'creator'=>$creatorData,
          'slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
    
        // *********
        if ($insert) {
          Session::flash('success','value');
          return redirect('admin/dashboard/manage/application_types/add')->with('message',' Information Added successful !');
      } else {
          Session::flash('error','value');
          return redirect('admin/dashboard/manage/application_types/add')->with('error',' Information Added Failed 1');
      }
      
      }
    
      public function update(Request $request){
        $editordata= Auth::guard('admin')->user()->id;
        $id=$request['id'];
        $slug=$request['slug'];
        $update=LeaveType::where('status',1)->where('types_id',$id)->update([
          'types_name'=>$request['types_name'],
          'editor'=>$editordata,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
          Session::flash('success','value');
          return redirect('admin/dashboard/manage/application_types/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('admin/dashboard/manage/application_types/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      public function post_active($id){
        $softdelete=LeaveType::where('post_status',2)->where('types_id',$id)->update([
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
        $softdelete=LeaveType::where('post_status',1)->where('types_id',$id)->update([
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
          $post =LeaveType::where('types_id',$id);
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
        $post =LeaveType::withTrashed()->where('types_id',$id);
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
    $data = LeaveType::onlyTrashed()->where('types_id', $id)->first();
    //$data = LeaveType::onlyTrashed()->find($id);

    if ($data) {
        // Delete the first image
        $profileimage = public_path('uploads/'. $data->profile_image);
        if (file_exists($profileimage)) {
            File::delete($profileimage);
        }
        // Delete the second image
        $coverphoto = public_path('uploads/' . $data->ban_image);
        if (file_exists($coverphoto)) {
            File::delete($coverphoto);
        }
        // Delete the database information
        LeaveType::where('types_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
      public function recycle(){
        $all=LeaveType::onlyTrashed()->where('status',1)->orderBy('types_id','DESC')->get();
       // dd($all);
        return view('admin.admin_home.common.LeaveApplication.recycle',compact('all'));
      }




}
