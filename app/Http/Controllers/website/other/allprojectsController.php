<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\allprojects;
use Carbon\Carbon;
class allprojectsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= allprojects::where('status',1)->where('pro_name', 'LIKE', "%$search%")->orwhere('pro_title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = allprojects::where('status', 1)->orderBy('allprojects_id', 'ASC')->paginate(5);
         }
        $totalpost = allprojects::count();
        $deletecount = allprojects::onlyTrashed()->count();
        return view('websiteBackend.other.allprojects.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = allprojects::count();
        $lastcreat = allprojects::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.allprojects.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=allprojects::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.allprojects.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=allprojects::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.allprojects.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'pro_status' => 'required',
          ],
              [
                'pro.required' => ' Title is Required.',
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=allprojects::insertGetId([
            'pro_status'=>$request['pro_status'],
            'category_as'=>$request['category_as'],
            'pro_name'=>$request['pro_name'],
            'pro_title'=>$request['pro_title'],
            'pro_heading'=>$request['pro_heading'],
            'pro_location'=>$request['pro_location'],
            'pro_start'=>$request['pro_start'],
            'pro_end'=>$request['pro_end'],
            'target_amount'=>$request['target_amount'],
            'raised_amount'=>$request['raised_amount'],
            'cost'=>$request['cost'],
            'people'=>$request['people'],
            'pro_purpose'=>$request['pro_purpose'],
            'pro_des'=>$request['pro_des'],
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
            allprojects::where('allprojects_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('allprojects.add')->with('message',' Project Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('allprojects.add')->with('error',' Project Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=allprojects::where('status',1)->where('allprojects_id',$id)->where('slug',$slug)->update([
          'pro_status'=>$request['pro_status'],
          'category_as'=>$request['category_as'],
          'pro_name'=>$request['pro_name'],
          'pro_title'=>$request['pro_title'],
          'pro_heading'=>$request['pro_heading'],
          'pro_location'=>$request['pro_location'],
          'pro_start'=>$request['pro_start'],
          'pro_end'=>$request['pro_end'],
          'target_amount'=>$request['target_amount'],
          'raised_amount'=>$request['raised_amount'],
          'cost'=>$request['cost'],
          'people'=>$request['people'],
          'pro_purpose'=>$request['pro_purpose'],
          'pro_des'=>$request['pro_des'],
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
            allprojects::where('allprojects_id',$id)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('allprojects.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('allprojects.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=allprojects::where('post_status',2)->where('allprojects_id',$id)->update([
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
        $post_deactive =allprojects::where('post_status',1)->where('allprojects_id',$id)->update([
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
        $post =allprojects::where('allprojects_id',$id);
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
        $post =allprojects::withTrashed()->where('allprojects_id',$id);
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
    $data = allprojects::onlyTrashed()->where('allprojects_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        allprojects::where('allprojects_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

    // Recycle bin code is start here 
    public function recycle(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
            
            $all= allprojects::onlyTrashed()->where('pro_name', 'LIKE', "%$search%")->orwhere('pro_title','LIKE',"%$search%")->orwhere('pro_status','LIKE',"%$search%")
            ->paginate(5);
        }
        else{
            $all = allprojects::onlyTrashed()->where('status', 1)->orderBy('allprojects_id', 'ASC')->paginate(5);
        }
        $totalpost = allprojects::count();
        return view('websiteBackend.other.allprojects.recycle',compact('all','search','totalpost'));
    }
}
