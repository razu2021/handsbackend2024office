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
use App\Models\AddEducation;
use Carbon\Carbon;
use Image;

class AddEducationController extends Controller
{
    //
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $id= Auth::user()->id;
        $all=AddEducation::where('status',1)->where('user_id',$id)->get();
       // dd($all);
        return view('manage_user.staff.add_education.index',compact('all'));
    }
    public function add(){

      $years = range(date("Y"), date("Y") - 25);

        return view('manage_user.staff.add_education.add',compact('years'));
    }
    public function edit($slug){
      $id= Auth::user()->id;
      $data=AddEducation::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
      $years = range(date("Y"), date("Y") - 25);
        return view('manage_user.staff.add_education.edit',compact('data','years'));
      }
      public function view($slug){
        $id= Auth::user()->id;
        $data=AddEducation::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
        return view('manage_user.staff.add_education.view',compact('data'));
      }
    
      public function insert(Request $request){
        $request->validate([
            'collage_name' => 'required',
            'subject_name' => 'required',
            'starting_date' => 'required',
            'ending_date' => 'required',
            'session_date' => 'required',
            'degree_name' => 'required',
        ]);
        $user_id=Auth::user()->id;
        $slug='users'.uniqid('20');
        $insert=AddEducation::insertGetId([
          'user_id'=>$user_id,
          'collage_name'=>$request['collage_name'],
          'subject_name'=>$request['subject_name'],
          'starting_date'=>$request['starting_date'],
          'ending_date'=>$request['ending_date'],
          'session_date'=>$request['session_date'],
          'degree_name'=>$request['degree_name'],
          'slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
    
        // *********
        if ($insert) {
          Session::flash('success','value');
          return redirect('dashboard/user/Add_education/add')->with('message',' Information Added successful !');
      } else {
          Session::flash('error','value');
          return redirect('dashboard/user/Add_education/view/add')->with('error',' Information Added Failed 1');
      }
      
      }
    
      public function update(Request $request){
    
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=AddEducation::where('status',1)->where('education_id',$id)->update([
          'collage_name'=>$request['collage_name'],
          'subject_name'=>$request['subject_name'],
          'starting_date'=>$request['starting_date'],
          'ending_date'=>$request['ending_date'],
          'session_date'=>$request['session_date'],
          'degree_name'=>$request['degree_name'],
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/Add_education/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/Add_education/view/'.$slug)->with('message','Information Update Failed !');
        }
      }
      public function userrequest($id){
        $softdelete=AddEducation::where('post_status',2)->where('education_id',$id)->update([
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
      public function adminrequest($id){
        $softdelete=AddEducation::where('post_status',0)->where('education_id',$id)->update([
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
        // soft delete 
        public function softdelete($id){
          $post =AddEducation::where('education_id',$id);
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
        $post =AddEducation::withTrashed()->where('education_id',$id);
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
    $data = AddEducation::onlyTrashed()->where('education_id', $id)->first();
    //$data = AddEducation::onlyTrashed()->find($id);

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
        AddEducation::where('education_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
      public function recycle(){
        $all=AddEducation::onlyTrashed()->where('status',1)->orderBy('education_id','DESC')->get();
        return view('manage_user.staff.add_education.recycle',compact('all'));
      }
}
