<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use App\Models\branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\customer;
use App\Models\designation;
use Carbon\Carbon;
class customerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= customer::where('status',1)->where('name', 'LIKE', "%$search%")->orwhere('branch_name','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")->orwhere('nid','LIKe',"%$search%")
           ->paginate(5);
         }
         else{
           $all = customer::where('status', 1)->orderBy('customer_id', 'ASC')->paginate(5);
         }
        $totalpost = customer::count();
        $deletecount = customer::onlyTrashed()->count();
        return view('websiteBackend.other.customer.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = customer::count();
        $branch = branch::where('post_status',1)->orderby('branch_id','DESC')->get();
        $lastcreat = customer::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.customer.add',compact('totalpost','lastcreat','branch'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $totalpost = customer::count();
      $id= Auth::guard('admin')->user()->id;
      $branch = branch::where('post_status',1)->orderby('branch_id','DESC')->get();
      $data=customer::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.customer.edit',compact('data','totalpost','branch'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=customer::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.customer.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'branch_name' => 'required',
              'name' => 'required',
              'phone' => 'required',
          ],
              [
                'branch_name.required' => 'Branch Name is Required.',
                'name.required' => 'Name is Required.',
                'phone.required' => 'Phone is Required.',
              ]
          );
          $slugname = $request['name'];
          $removespace = str_replace(' ', '', $slugname);
          $slug=$removespace.'-'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=customer::insertGetId([
            'branch_name'=>$request['branch_name'],
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'nid'=>$request['nid'],
            'address'=>$request['address'],
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
            })->encode('webp', 90)->save('uploads/website/customer/'.$imageName);
            customer::where('customer_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('customer.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('customer.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=customer::where('status',1)->where('customer_id',$id)->where('slug',$slug)->update([
            'branch_name'=>$request['branch_name'],
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'nid'=>$request['nid'],
            'address'=>$request['address'],
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
            })->encode('webp', 90)->save('uploads/website/customer/'.$imageName);
            customer::where('customer_id',$id)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('customer.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('customer.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=customer::where('post_status',2)->where('customer_id',$id)->update([
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
        $post_deactive =customer::where('post_status',1)->where('customer_id',$id)->update([
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
        $post =customer::where('customer_id',$id);
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
        $post =customer::withTrashed()->where('customer_id',$id);
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
    $data = customer::onlyTrashed()->where('customer_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/customer/' . $data->service_image);
        if (file_exists($bannerbgimage)){
            File::delete($bannerbgimage);
        }
        // Delete the database information
        customer::where('customer_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

    // Recycle bin code is start here 
    public function recycle(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
          
          $all= customer::onlyTrashed()->where('name', 'LIKE', "%$search%")->orwhere('category_as','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")->orwhere('email','LIKe',"%$search%")
          ->paginate(5);
        }
        else{
          $all = customer::onlyTrashed()->where('status', 1)->orderBy('customer_id', 'ASC')->paginate(5);
        }
        $totalpost = customer::count();
        return view('websiteBackend.other.customer.recycle',compact('all','search','totalpost'));
    }
    
}
