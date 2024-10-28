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
use App\Models\work_statuse;
use Carbon\Carbon;

class WorkStatusController extends Controller
{
   //
   public function __construct(){
    $this->middleware('auth');
}
public function index(Request $request){
    $id= Auth::user()->id;
    $search =$request['search'] ?? "";
    if($search !=""){
      $all=work_statuse::where('user_id' ,$id)->where('task_name','LIKE',"%$search%")->orwhere('curent_date','LIKE',"%$search%")->paginate(5);
    }else{  
      $all=work_statuse::where('user_id' ,$id)->where('status',1)->orderby('worker_id','desc')->paginate(7);
    }
    
   // dd($all);
   $deletecount = work_statuse::onlyTrashed()->count();
    return view('manage_user.staff.work_statuse.index',compact('all','search','deletecount'));
}



public function add(){
  $years = range(date("Y"), date("Y") - 25);
    return view('manage_user.staff.work_statuse.add',compact('years'));
}
public function edit($slug){
  $id= Auth::user()->id;
  $data=work_statuse::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
    return view('manage_user.staff.work_statuse.edit',compact('data'));
  }
  public function view($slug){
    $id= Auth::user()->id;
    $data=work_statuse::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
    return view('manage_user.staff.work_statuse.view',compact('data'));
  }

  public function insert(Request $request){
    $request->validate([
      'task_name' => 'required',
      'start_time' => 'required',
      'ending_time' => 'required',
      'description' => 'required',
  ],
      [
        'task_name' => 'Title is Required',
        'start_time' => 'Work start Time is Required',
        'ending_time' => 'Work Ending Time is Required',
        'description' => 'Work Description is Required',
    
      ]
  );

    
    $user_id=Auth::user()->id;
    $creator=Auth::user()->id;
    $slug='users'.uniqid('20');
    $insert=work_statuse::insertGetId([
      'user_id'=>$user_id,
      'task_name'=>$request['task_name'],
      'curent_date'=>$request['curent_date'],
      'start_time'=>$request['start_time'],
      'ending_time'=>$request['ending_time'],
      'description'=>$request['description'],
      'creator'=>$creator,
      'slug'=>$slug,
      'created_at'=>Carbon::now()->toDateTimeString(),
    ]);

    // *********
    if ($insert) {
      Session::flash('success', 'Information Added successfully!');
      return redirect()->route('work_status.add')->with('message',' Information Added successful !');
  } else {
    Session::flash('error', 'Infromation Added failed!');
      return redirect()->route('work_status.add')->with('error',' Information Added Failed 1');
  }
  
  }

  public function update(Request $request){

    $id=$request['id'];
    $editor=$request['user_id'];
    $slug=$request['slug'];
    $update=work_statuse::where('status',1)->where('worker_id',$id)->update([
      'task_name'=>$request['task_name'],
      'curent_date'=>$request['curent_date'],
      'start_time'=>$request['start_time'],
      'ending_time'=>$request['ending_time'],
      'description'=>$request['description'],
      'creator'=>$editor,
      'created_at'=>Carbon::now()->toDateTimeString(),
    ]);

    if($update){
      Session::flash('success','value');
      return redirect('dashboard/user/work_statuse/view/'.$slug);
    }else{
      Session::flash('error','value');
      return redirect('dashboard/user/work_statuse/view/'.$slug)->with('message','Information Update Failed !');
    }
  }
  public function post_active($id){
    $softdelete=work_statuse::where('post_status',0)->where('worker_id',$id)->update([
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
    $softdelete=work_statuse::where('post_status',1)->where('worker_id',$id)->update([
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
  
  // soft delete 
  public function softdelete($id){
    $post =work_statuse::where('worker_id',$id);
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
  
    $post =work_statuse::withTrashed()->where('worker_id',$id);
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
$data = work_statuse::onlyTrashed()->where('worker_id', $id)->first();

if ($data) {
    // Delete the first image
    $profileimage = public_path('uploads/' . $data->profile_image);
    if (file_exists($profileimage)) {
        File::delete($profileimage);
    }

    // Delete the second image
    $coverphoto = public_path('uploads/' . $data->ban_image);
    if (file_exists($coverphoto)) {
        File::delete($coverphoto);
    }

    // Delete the database information
    work_statuse::where('worker_id', $id)->forceDelete();

    return redirect()->back()->with('message', 'Delete Successfuly');
} else {
  return redirect()->back()->with('message', 'Delete failed !');
}
}
 

  // Recycle bin code is start here 
  public function recycle(Request $request){
    $id= Auth::user()->id;
    $search = $request['search'] ?? "";
    if($search !=""){
        $all= work_statuse::where('user_id' ,$id)->onlyTrashed()->where('task_name', 'LIKE', "%$search%")->orwhere('curent_date','LIKE',"%$search%")
        ->paginate(5);
    }
    else{
        $all = work_statuse::where('user_id' ,$id)->onlyTrashed()->where('status', 1)->orderBy('worker_id', 'ASC')->paginate(5);
    }
    $totalpost = work_statuse::count();
    return view('manage_user.staff.work_statuse.recycle',compact('all','search','totalpost'));
}






}
