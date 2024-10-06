<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\allstaff;
use App\Models\designation;
use Carbon\Carbon;
class allStaffController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= allstaff::where('status',1)->where('name', 'LIKE', "%$search%")->orwhere('category_as','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")->orwhere('email','LIKe',"%$search%")
           ->paginate(5);
         }
         else{
           $all = allstaff::where('status', 1)->orderBy('allstaff_id', 'ASC')->paginate(5);
         }
        $totalpost = allstaff::count();
        $deletecount = allstaff::onlyTrashed()->count();
        return view('websiteBackend.other.allstaff.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = allstaff::count();
        $designation = designation::where('post_status',1)->orderby('designation_id','DESC')->get();
        $lastcreat = allstaff::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.allstaff.add',compact('totalpost','lastcreat','designation'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $totalpost = allstaff::count();
      $id= Auth::guard('admin')->user()->id;
      $designation = designation::where('post_status',1)->get();
      $data=allstaff::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.allstaff.edit',compact('data','designation','totalpost'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=allstaff::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.allstaff.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'category_as' => 'required',
              'name' => 'required',
              'designation' => 'required',
          ],
              [
                'category_as.required' => ' Category Name is Required.',
                'name.required' => 'Name is Required.',
                'designation.required' => 'Designation is Required.',
              ]
          );
          $slugname = $request['name'];
          $removespace = str_replace(' ', '', $slugname);
          $slug=$removespace.'-'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=allstaff::insertGetId([
            'category_as'=>$request['category_as'],
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
            allstaff::where('allstaff_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('allstaff.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('allstaff.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=allstaff::where('status',1)->where('allstaff_id',$id)->where('slug',$slug)->update([
            'category_as'=>$request['category_as'],
            'senior_official'=>$request['senior_official'],
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
            allstaff::where('allstaff_id',$id)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('allstaff.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('allstaff.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=allstaff::where('post_status',2)->where('allstaff_id',$id)->update([
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
        $post_deactive =allstaff::where('post_status',1)->where('allstaff_id',$id)->update([
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
        $post =allstaff::where('allstaff_id',$id);
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
        $post =allstaff::withTrashed()->where('allstaff_id',$id);
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
    $data = allstaff::onlyTrashed()->where('allstaff_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)){
            File::delete($bannerbgimage);
        }
        // Delete the database information
        allstaff::where('allstaff_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

    // Recycle bin code is start here 
    public function recycle(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
          
          $all= allstaff::onlyTrashed()->where('name', 'LIKE', "%$search%")->orwhere('category_as','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")->orwhere('email','LIKe',"%$search%")
          ->paginate(5);
        }
        else{
          $all = allstaff::onlyTrashed()->where('status', 1)->orderBy('allstaff_id', 'ASC')->paginate(5);
        }
        $totalpost = allstaff::count();
        return view('websiteBackend.other.allstaff.recycle',compact('all','search','totalpost'));
    }
    
}
