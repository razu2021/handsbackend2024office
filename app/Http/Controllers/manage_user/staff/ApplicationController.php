<?php
namespace App\Http\Controllers\manage_user\staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\leave_application;
use App\Models\LeaveType;
use App\Models\LeaveReason;
use App\Models\Your_Profile;
use Carbon\Carbon;
use DateTime;
use Intervention\Image\Image;

class ApplicationController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
   //
   public function index(Request $request){
    $id= Auth::user()->id;
    $search =$request['search'] ?? "";
    if($search !=""){
      $all=leave_application::where('types_name','LIKE',"%$search%")->get();
    }else{  
      $all=leave_application::where('user_id' ,$id)->where('status',1)->orderby('application_id','desc')->paginate(7);
    }
      
      //dd($creatorData);
      return view('manage_user.staff.LeaveApplication.index',compact('all','search'));
  }
  public function add(){

    $leavetype=LeaveType::where('post_status',1)->get();
    $leavereson=LeaveReason::where('post_status',1)->get();
    //$years = range(date("Y"), date("Y") - 25);
      return view('manage_user.staff.LeaveApplication.add',compact('leavetype','leavereson'));
  }
  public function edit($slug){
    $leavetype=LeaveType::where('post_status',1)->get();
    $leavereson=LeaveReason::where('post_status',1)->get();
    $alldata=leave_application::where('status',1)->where('slug',$slug)->firstOrFail();
  
      return view('manage_user.staff.LeaveApplication.edit',compact('alldata','leavetype','leavereson'));
    }
    public function view($slug){

      $id= Auth::user()->id;
      $prodata=Your_Profile::where('status',1)->where('user_id',$id)->get();

      //dd($prodata);
      $alldata=leave_application::where('status',1)->where('slug',$slug)->firstOrFail();
      return view('manage_user.staff.LeaveApplication.view',compact('alldata','prodata'));
    }
  
    public function insert(Request $request){
      $startDate = $request['starting_date'];
      $endDate = $request['ending_date'];
      $startDateObj = new DateTime($startDate);
      $endDateObj = new DateTime($endDate);
      $interval = $startDateObj->diff($endDateObj);
      $totaldays = $interval->days;
        // date sum 
      $creatorData= Auth::user()->name;
      $user_id= Auth::user()->id;
      $slug='admins'.uniqid('20');
      $refid=uniqid('10').'RS';
      $insert=leave_application::insertGetId([
        'user_id'=>$user_id,
        'ref_id'=>$refid,
        'app_date'=>Carbon::now()->toDateTimeString(),
        'request_days'=>$totaldays,
        'app_subject'=>$request['app_subject'],
        'app_diclaration'=>$request['app_diclaration'],
        'starting_date'=>$request['starting_date'],
        'ending_date'=>$request['ending_date'],
        'leave_details'=>$request['leave_details'],
        'leave_reason'=>$request['leave_reason'],
        'additional_comment'=>$request['additional_comment'],
        'creator'=>$creatorData,
        'slug'=>$slug,
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);
  
      // *********
      if ($insert) {
        Session::flash('success','value');
        return redirect('dashboard/user/leave_application')->with('message',' Information Added successful !');
    } else {
        Session::flash('error','value');
        return redirect('dashboard/user/leave_application/add')->with('error',' Information Added Failed 1');
    }
    }
    public function update(Request $request){
      $startDate = $request['starting_date'];
      $endDate = $request['ending_date'];
      $startDateObj = new DateTime($startDate);
      $endDateObj = new DateTime($endDate);
      $interval = $startDateObj->diff($endDateObj);
      $totaldays = $interval->days;
        // date sum 
      $editordata= Auth::user()->name;
      $id=$request['id'];
      $user_id=$request['user_id'];
      $slug=$request['slug'];
      $update=leave_application::where('status',1)->where('application_id',$id)->update([
        'app_date'=>Carbon::now()->toDateTimeString(),
        'request_days'=>$totaldays,
        'app_subject'=>$request['app_subject'],
        'app_diclaration'=>$request['app_diclaration'],
        'starting_date'=>$request['starting_date'],
        'ending_date'=>$request['ending_date'],
        'leave_details'=>$request['leave_details'],
        'leave_reason'=>$request['leave_reason'],
        'additional_comment'=>$request['additional_comment'],
        'editor'=>$editordata,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);
      if($update){
        Session::flash('success','value');
        return redirect('dashboard/user/leave_application/view/'.$slug);
      }else{
        Session::flash('error','value');
        return redirect('dashboard/user/leave_application/edit/'.$slug)->with('message','Information Update Failed !');
      }
    }
    public function post_active($id){
      $softdelete=leave_application::where('post_status',2)->where('application_id',$id)->update([
        'post_status'=>0,
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
      $softdelete=leave_application::where('post_status',0)->where('application_id',$id)->update([
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
        $post =leave_application::where('application_id',$id);
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
      $post =leave_application::withTrashed()->where('application_id',$id);
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
  $data = leave_application::onlyTrashed()->where('application_id', $id)->first();
  //$data = LeaveApplication::onlyTrashed()->find($id);

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
      leave_application::where('application_id', $id)->forceDelete();

      return redirect()->back()->with('message', 'Delete Successfuly');
  } else {
    return redirect()->back()->with('message', 'Delete failed !');
  }
  }
    public function recycle(){
      $all=leave_application::onlyTrashed()->where('status',1)->orderBy('application_id','DESC')->get();
     // dd($all);
      return view('manage_user.staff.LeaveApplication.recycle',compact('all'));
    }


}
