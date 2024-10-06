<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\doctors;
use Carbon\Carbon;
class doctorsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= doctors::where('status',1)->where('name', 'LIKE', "%$search%")->orwhere('category_as','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")->orwhere('email','LIKe',"%$search%")
           ->paginate(5);
         }
         else{
           $all = doctors::where('status', 1)->orderBy('doctors_id', 'ASC')->paginate(5);
         }
        $totalpost = doctors::count();
        $deletecount = doctors::onlyTrashed()->count();
        return view('websiteBackend.other.doctors.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = doctors::count();
        $lastcreat = doctors::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.doctors.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $totalpost = doctors::count();
      $id= Auth::guard('admin')->user()->id;
      $data=doctors::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.doctors.edit',compact('data','totalpost'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=doctors::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.doctors.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'name' => 'required',
              'designation' => 'required',
          ],
              [
                'name.required' => 'Name is Required.',
                'designation.required' => 'Designation is Required.',
              ]
          );
          $slugname = $request['name'];
          $removespace = str_replace(' ', '', $slugname);
          $slug=$removespace.'-'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=doctors::insertGetId([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'designation'=>$request['designation'],
            'caption'=>$request['caption'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          if($request->hasFile('service_image')){
            $image=$request->file('service_image');
            $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            doctors::where('doctors_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
          // *********
          if ($insert){
            Session::flash('success','value');
            return redirect()->route('doctors.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('doctors.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=doctors::where('status',1)->where('doctors_id',$id)->where('slug',$slug)->update([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'designation'=>$request['designation'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('service_image')){
            $image=$request->file('service_image');
            $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            doctors::where('doctors_id',$id)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('doctors.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('doctors.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=doctors::where('post_status',2)->where('doctors_id',$id)->update([
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
        $post_deactive =doctors::where('post_status',1)->where('doctors_id',$id)->update([
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
        $post =doctors::where('doctors_id',$id);
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
        $post =doctors::withTrashed()->where('doctors_id',$id);
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
    $data = doctors::onlyTrashed()->where('doctors_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)){
            File::delete($bannerbgimage);
        }
        // Delete the database information
        doctors::where('doctors_id', $id)->forceDelete();
        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
    // Recycle bin code is start here 
    public function recycle(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
          $all= doctors::onlyTrashed()->where('name', 'LIKE', "%$search%")->orwhere('category_as','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")->orwhere('email','LIKe',"%$search%")
          ->paginate(5);
        }
        else{
          $all = doctors::onlyTrashed()->where('status', 1)->orderBy('doctors_id', 'ASC')->paginate(5);
        }
        $totalpost = doctors::count();
        return view('websiteBackend.other.doctors.recycle',compact('all','search','totalpost'));
    }
}
