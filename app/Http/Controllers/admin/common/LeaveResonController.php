<?php
namespace App\Http\Controllers\admin\common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\LeaveReason;
use Carbon\Carbon;

class LeaveResonController extends Controller
{
public function index(Request $request){
    $search =$request['search'] ?? "";
    if($search !=""){
        $all=LeaveReason::where('reason_name','LIKE',"%$search%")->get();
    }else{
        $all=LeaveReason::where('status',1)->paginate(7);
    }
    //dd($creatorData);
    return view('admin.admin_home.common.LeaveReason.index',compact('all','search'));
}
public function add(){

  //$years = range(date("Y"), date("Y") - 25);

    return view('admin.admin_home.common.LeaveReason.add');
}
public function edit($slug){

  $data=LeaveReason::where('status',1)->where('slug',$slug)->firstOrFail();
  $years = range(date("Y"), date("Y") - 25);
    return view('admin.admin_home.common.LeaveReason.edit',compact('data'));
  }
  public function view($slug){
 
    $data=LeaveReason::where('status',1)->where('slug',$slug)->firstOrFail();
    return view('admin.admin_home.common.LeaveReason.view',compact('data'));
  }
  public function insert(Request $request){
    $creatorData= Auth::guard('admin')->user()->id;
    $slug='admins'.uniqid('20');
    $insert=LeaveReason::insertGetId([
      'reason_name'=>$request['reason_name'],
      'creator'=>$creatorData,
      'slug'=>$slug,
      'created_at'=>Carbon::now()->toDateTimeString(),
    ]);

    // *********
    if ($insert) {
      Session::flash('success','value');
      return redirect('admin/dashboard/manage/reason_types/add')->with('message',' Information Added successful !');
  } else {
      Session::flash('error','value');
      return redirect('admin/dashboard/manage/reason_types/add')->with('error',' Information Added Failed 1');
  }
  
  }

    public function update(Request $request){
        $editordata= Auth::guard('admin')->user()->id;
        $id=$request['id'];
        $slug=$request['slug'];
        $update=LeaveReason::where('status',1)->where('reason_id',$id)->update([
        'reason_name'=>$request['reason_name'],
        'editor'=>$editordata,
        'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
        Session::flash('success','value');
        return redirect('admin/dashboard/manage/reason_types/view/'.$slug);
        }else{
        Session::flash('error','value');
        return redirect('admin/dashboard/manage/reason_types/edit/'.$slug)->with('message','Information Update Failed !');
        }
    }
    public function post_active($id){
        $softdelete=LeaveReason::where('post_status',2)->where('reason_id',$id)->update([
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
        $softdelete=LeaveReason::where('post_status',1)->where('reason_id',$id)->update([
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
        $post =LeaveReason::where('reason_id',$id);
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
        $post =LeaveReason::withTrashed()->where('reason_id',$id);
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
    $data = LeaveReason::onlyTrashed()->where('reason_id', $id)->first();
    //$data = LeaveReason::onlyTrashed()->find($id);

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
        LeaveReason::where('reason_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
    return redirect()->back()->with('message', 'Delete failed !');
    }
    }
    public function recycle(){
        $all=LeaveReason::onlyTrashed()->where('status',1)->orderBy('reason_id','DESC')->get();
    // dd($all);
        return view('admin.admin_home.common.LeaveReason.recycle',compact('all'));
    }


}
