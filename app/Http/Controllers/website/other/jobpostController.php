<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\jobpost;
use Carbon\Carbon; 
class jobpostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= jobpost::where('status',1)->where('name', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = jobpost::where('status', 1)->orderBy('jobpost_id', 'ASC')->paginate(5);
         }
        $totalpost = jobpost::count();
        return view('websiteBackend.other.jobpost.index',compact('all','search','totalpost'));
    }
    public function add(){
        $totalpost = jobpost::count();
        $lastcreat = jobpost::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.jobpost.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=jobpost::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.jobpost.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=jobpost::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.jobpost.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'location' => 'required',
            'type' => 'required',
            'salary' => 'required',
            'app_instruction' => 'required',
            'app_mail' => 'required',
            'app_deadline' => 'required',
            'caption' => 'required',
        ],
            [
              'name.required' => ' Organization Name is Required.',
              'title.required' => 'Job Title is Required.',
              'locaton.required' => 'Job locaton is Required.',
              'type.required' => 'Job type is Required.',
              'salary.required' => 'Job salary is Required.',
              'app_instruction.required' => 'application instruction is Required.',
              'app_mail.required' => 'application Mail is Required.',
              'app_deadline.required' => 'application Deadline is Required.',
              'caption.required' => 'Job Context is Required.',
            ]
        );
          $slug=uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=jobpost::insertGetId([
            'name'=>$request['name'],
            'title'=>$request['title'],
            'location'=>$request['location'],
            'type'=>$request['type'],
            'salary'=>$request['salary'],
            'app_instruction'=>$request['app_instruction'],
            'app_mail'=>$request['app_mail'],
            'app_deadline'=>$request['app_deadline'],
            'note'=>$request['note'],
            'caption'=>$request['caption'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
        //   image 
        if($request->hasFile('service_image')){
            $image=$request->file('service_image');
            $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            jobpost::where('jobpost_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('jobpost.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('jobpost.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=jobpost::where('status',1)->where('jobpost_id',$id)->where('slug',$slug)->update([
            'name'=>$request['name'],
            'title'=>$request['title'],
            'location'=>$request['location'],
            'type'=>$request['type'],
            'salary'=>$request['salary'],
            'app_instruction'=>$request['app_instruction'],
            'app_mail'=>$request['app_mail'],
            'app_deadline'=>$request['app_deadline'],
            'note'=>$request['note'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      /*------- image start here ------ */
      if($request->hasFile('service_image')){
        $image=$request->file('service_image');
        $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
        Image::make($image)->fit(300, 300, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('webp', 90)->save('uploads/website/'.$imageName);
        jobpost::where('jobpost_id',$id)->update([
          'service_image'=>$imageName,
        ]);
      }
        if($update){
          Session::flash('success','value');
          return redirect()->route('jobpost.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('jobpost.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=jobpost::where('post_status',2)->where('jobpost_id',$id)->update([
          'post_status'=>1,
        ]);
        if($post_actives){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      /*----  post deactive code --------*/
      public function post_deactive($id){
        $post_deactive =jobpost::where('post_status',1)->where('jobpost_id',$id)->update([
          'post_status'=>2,
        ]);

        if($post_deactive){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      
      /*----  soft Delete  --------*/
      public function softdelete($id){
        $post =jobpost::where('jobpost_id',$id);
        $post->delete();
        if($post){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }

     /*----  Restore Data  --------*/
      public function restore($id){
        $post =jobpost::withTrashed()->where('jobpost_id',$id);
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
    $data = jobpost::onlyTrashed()->where('jobpost_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        jobpost::where('jobpost_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
}
