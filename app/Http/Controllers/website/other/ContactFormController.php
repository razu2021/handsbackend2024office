<?php
namespace App\Http\Controllers\website\other;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\contactform;
use Carbon\Carbon; 
class ContactFormController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;

      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= contactform::where('status',1)->where('name', 'LIKE', "%$search%")->orwhere('email','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = contactform::where('status', 1)->orderBy('contactform_id', 'DESC')->paginate(5);
         }
        $totalpost = contactform::count();
        $deletecount = contactform::onlyTrashed()->count();
        return view('websiteBackend.other.contactform.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = contactform::count();
        $lastcreat = contactform::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.contactform.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=contactform::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.contactform.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=contactform::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.contactform.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'caption' => 'required',
        ],
        [
            'name.required' => '  Name is Required.',
            'email.required' => ' Email is Required.',
            'phone.required' => ' Phone Number is Required.',
            'caption.required' => ' Message is Required.',
        ]
        );
        $slug=uniqid('20');
        $insert=contactform::insertGetId([
          'name'=>$request['name'],
          'email'=>$request['email'],
          'phone'=>$request['phone'],
          'caption'=>$request['caption'],
          'slug'=>$slug,
          'creator'=>$request['name'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('contactform.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('contactform.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=contactform::where('status',1)->where('contactform_id',$id)->where('slug',$slug)->update([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'caption'=>$request['caption'],
            'answer'=>$request['answer'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect()->route('contactform.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('contactform.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=contactform::where('post_status',2)->where('contactform_id',$id)->update([
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
        $post_deactive =contactform::where('post_status',1)->where('contactform_id',$id)->update([
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
   
      public function denied($id){
        $post_deactive =contactform::where('post_status',2)->where('contactform_id',$id)->update([
          'post_status'=>0,
        ]);

        if($post_deactive){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      public function resume($id){
        $post_deactive =contactform::where('post_status',0)->where('contactform_id',$id)->update([
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
        $post =contactform::where('contactform_id',$id);
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
        $post =contactform::withTrashed()->where('contactform_id',$id);
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
    $data = contactform::onlyTrashed()->where('contactform_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        contactform::where('contactform_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }


    // Recycle bin code is start here 
    public function recycle(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
         
          $all= contactform::onlyTrashed()->where('status',1)->where('name', 'LIKE', "%$search%")->orwhere('email','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")
          ->paginate(5);
        }
        else{
          $all = contactform::onlyTrashed()->where('status', 1)->orderBy('contactform_id', 'ASC')->paginate(5);
        }
        $totalpost = contactform::count();
        return view('websiteBackend.other.contactform.recycle',compact('all','search','totalpost'));
    }



/*---controller end here  */
}


