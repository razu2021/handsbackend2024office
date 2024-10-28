<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\course;
use Carbon\Carbon; 
class courseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= course::where('status',1)->where('provider_name', 'LIKE', "%$search%")->orwhere('course_title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = course::where('status', 1)->orderBy('course_id', 'ASC')->paginate(5);
         }
        $totalpost = course::count();
        $deletecount= course::onlyTrashed()->count();
        return view('websiteBackend.other.course.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = course::count();
        $lastcreat = course::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.course.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=course::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.course.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=course::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.course.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
        $request->validate([
            'provider_name' => 'required',
            'course_title' => 'required',
            'course_location' => 'required',
            'course_type' => 'required',
            'course_price' => 'required',
            'app_instruction' => 'required',
            'app_target' => 'required',
            'app_deadline' => 'required',
            // 'app_reased' => 'required',
            'app_education' => 'required',
            'app_gender' => 'required',
            'caption' => 'required',
        ],
            [
              'provider_name.required' => ' Organization Name is Required.',
              'course_title.required' => 'Course Title is Required.',
              'course_location.required' => 'Course locaton is Required.',
              'course_type.required' => 'Course type is Required.',
              'course_price.required' => 'Course Price is Required.',
              'app_instruction.required' => 'application instruction is Required.',
              'app_target.required' => 'How many applications do you want to accept?',
              'app_deadline.required' => 'application Deadline is Required.',
            //   'app_reased.required' => 'How many applications do you want to accept?',
              'app_education.required' => 'Education  is Required.',
              'app_gender.required' => ' Gender is Required.',
              'caption.required' => 'Job Context is Required.',
            ]
        );
          $slug=uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=course::insertGetId([
            'provider_name'=>$request['provider_name'],
            'course_title'=>$request['course_title'],
            'course_location'=>$request['course_location'],
            'course_type'=>$request['course_type'],
            'course_price'=>$request['course_price'],
            'app_instruction'=>$request['app_instruction'],
            'app_target'=>$request['app_target'],
            'app_deadline'=>$request['app_deadline'],
            'app_reased'=>$request['app_reased'],
            'app_education'=>$request['app_education'],
            'app_gender'=>$request['app_gender'],
            'course_duration'=>$request['course_duration'],
            'course_start'=>$request['course_start'],
            'course_end'=>$request['course_end'],
            'class_duration'=>$request['class_duration'],
            'class_start'=>$request['class_start'],
            'class_end'=>$request['class_end'],
            'total_class'=>$request['total_class'],
            'certificate'=>$request['certificate'],
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
            course::where('course_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
          if($request->hasFile('service_bg_image')){
            $image=$request->file('service_bg_image');
            $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(700, 310, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            course::where('course_id',$insert)->update([
              'service_bg_image'=>$imageName,
            ]);
          }
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('course.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('course.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=course::where('status',1)->where('course_id',$id)->where('slug',$slug)->update([
            'provider_name'=>$request['provider_name'],
            'course_title'=>$request['course_title'],
            'course_location'=>$request['course_location'],
            'course_type'=>$request['course_type'],
            'course_price'=>$request['course_price'],
            'app_instruction'=>$request['app_instruction'],
            'app_target'=>$request['app_target'],
            'app_deadline'=>$request['app_deadline'],
            'app_reased'=>$request['app_reased'],
            'app_education'=>$request['app_education'],
            'app_gender'=>$request['app_gender'],
            'course_duration'=>$request['course_duration'],
            'class_duration'=>$request['class_duration'],
            'class_start'=>$request['class_start'],
            'class_end'=>$request['class_end'],
            'total_class'=>$request['total_class'],
            'certificcate'=>$request['certificcate'],
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
        course::where('course_id',$id)->update([
          'service_image'=>$imageName,
        ]);
      }
      if($request->hasFile('service_bg_image')){
        $image=$request->file('service_bg_image');
        $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
        Image::make($image)->fit(700, 310, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('webp', 90)->save('uploads/website/'.$imageName);
        course::where('course_id',$id)->update([
          'service_bg_image'=>$imageName,
        ]);
      }
        if($update){
          Session::flash('success','value');
          return redirect()->route('course.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('course.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=course::where('post_status',2)->where('course_id',$id)->update([
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
        $post_deactive =course::where('post_status',1)->where('course_id',$id)->update([
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
        $post =course::where('course_id',$id);
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
        $post =course::withTrashed()->where('course_id',$id);
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
    $data = course::onlyTrashed()->where('course_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        course::where('course_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
        // Recycle bin code is start here 
        public function recycle(Request $request){
          $search = $request['search'] ?? "";
          if($search !=""){
              $all= course::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")->orwhere('subtitle','LIKE',"%$search%")
              ->paginate(5);
          }
          else{
              $all = course::onlyTrashed()->where('status', 1)->orderBy('course_id', 'ASC')->paginate(5);
          }
          $totalpost = course::count();
          return view('websiteBackend.other.course.recycle',compact('all','search','totalpost'));
      }
        
}
