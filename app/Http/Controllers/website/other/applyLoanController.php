<?php

namespace App\Http\Controllers\website\other;

use App\Http\Controllers\Controller;
use App\Models\branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\applyloan;
use App\Models\designation;
use App\Models\micro_service;
use Carbon\Carbon;
class applyLoanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= applyloan::where('status',1)->where('fname', 'LIKE', "%$search%")->orwhere('branch_name','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")->orwhere('nid','LIKe',"%$search%")
           ->paginate(5);
         }
         else{
           $all = applyloan::where('status', 1)->orderBy('applyloan_id', 'ASC')->paginate(5);
         }
        $totalpost = applyloan::count();
        $deletecount = applyloan::onlyTrashed()->count();
        return view('websiteBackend.other.applyloan.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = applyloan::count();
        $branch = branch::where('post_status',1)->orderby('branch_id','DESC')->get();
        $micro = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
        $lastcreat = applyloan::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.applyloan.add',compact('totalpost','lastcreat','branch','micro'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $totalpost = applyloan::count();
      $id= Auth::guard('admin')->user()->id;
      $branch = branch::where('post_status',1)->orderby('branch_id','DESC')->get();
      $micro = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
      $data=applyloan::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.applyloan.edit',compact('data','totalpost','branch','micro'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=applyloan::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.applyloan.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'branch_name' => 'required',
              'fname' => 'required',
              'phone' => 'required',
          ],
              [
                'branch_name.required' => 'Branch Name is Required.',
                'fname.required' => 'Name is Required.',
                'phone.required' => 'Phone is Required.',
              ]
          );
          $slugname = $request['name'];
          $removespace = str_replace(' ', '', $slugname);
          $slug=$removespace.'-'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=applyloan::insertGetId([
            'fname'=>$request['fname'],
            'lname'=>$request['lname'],
           'name' => $request['fname'] . ' ' . $request['lname'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'nid'=>$request['nid'],
            'birth_date'=>$request['birth_date'],
            'occupation'=>$request['occupation'],
            'monthly_income'=>$request['monthly_income'],
            'target_amount'=>$request['target_amount'],
            'loan_category'=>$request['loan_category'],
            'branch_name'=>$request['branch_name'],
            'address'=>$request['address'],
            'caption'=>$request['caption'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('applyloan.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('applyloan.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=applyloan::where('status',1)->where('applyloan_id',$id)->where('slug',$slug)->update([
            'fname'=>$request['fname'],
            'lname'=>$request['lname'],
            'phone'=>$request['phone'],
            'name' => $request['fname'] . ' ' . $request['lname'],
            'email'=>$request['email'],
            'nid'=>$request['nid'],
            'birth_date'=>$request['birth_date'],
            'occupation'=>$request['occupation'],
            'monthly_income'=>$request['monthly_income'],
            'target_amount'=>$request['target_amount'],
            'loan_category'=>$request['loan_category'],
            'branch_name'=>$request['branch_name'],
            'address'=>$request['address'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect()->route('applyloan.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('applyloan.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=applyloan::where('post_status',2)->where('applyloan_id',$id)->update([
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
        $post_deactive =applyloan::where('post_status',1)->where('applyloan_id',$id)->update([
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
        $post =applyloan::where('applyloan_id',$id);
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
        $post =applyloan::withTrashed()->where('applyloan_id',$id);
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
    $data = applyloan::onlyTrashed()->where('applyloan_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/applyloan/' . $data->service_image);
        if (file_exists($bannerbgimage)){
            File::delete($bannerbgimage);
        }
        // Delete the database information
        applyloan::where('applyloan_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

    // Recycle bin code is start here 
    public function recycle(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
          $all= applyloan::onlyTrashed()->where('name', 'LIKE', "%$search%")->orwhere('category_as','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")->orwhere('email','LIKe',"%$search%")
          ->paginate(5);
        }
        else{
          $all = applyloan::onlyTrashed()->where('status', 1)->orderBy('applyloan_id', 'ASC')->paginate(5);
        }
        $totalpost = applyloan::count();
        return view('websiteBackend.other.applyloan.recycle',compact('all','search','totalpost'));
    }
    
}
