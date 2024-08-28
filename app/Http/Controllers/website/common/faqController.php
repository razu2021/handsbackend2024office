<?php

namespace App\Http\Controllers\website\common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\faq;
use Carbon\Carbon;
class faqController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
           $all= faq::where('status',1)->where('answer', 'LIKE', "%$search%")->orwhere('qustion','LIKE',"%$search%")->orwhere('name','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = faq::where('status', 1)->orderBy('faqs_id', 'ASC')->paginate(5);
         }
        $totalpost = faq::count();
        return view('websiteBackend.common.faq.index',compact('all','search','totalpost'));
    }
    public function add(){
        $totalpost = faq::count();
        $lastcreat = faq::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.common.faq.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=faq::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.faq.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=faq::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.faq.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'qustion' => 'required',
              'answer' => 'required',
          ],
              [
                'qustion.required' => 'Qustion is Required.',
                'answer.required' => 'Answer is Required.',
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=faq::insertGetId([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'district'=>$request['district'],
            'qustion'=>$request['qustion'],
            'answer'=>$request['answer'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          // Redirect back
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('faqs.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('faqs.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $request->validate([
            'qustion' => 'required',
            'answer' => 'required',
        ],
            [
              'qustion.required' => 'Qustion is Required.',
              'answer.required' => 'Answer is Required.',
            ]
        );
        $update=faq::where('status',1)->where('faqs_id',$id)->where('slug',$slug)->update([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'district'=>$request['district'],
            'qustion'=>$request['qustion'],
            'answer'=>$request['answer'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        // Redirect back
        if($update){
          Session::flash('success','value');
          return redirect()->route('faqs.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('faqs.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=faq::where('post_status',2)->where('faqs_id',$id)->update([
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
        $post_deactive =faq::where('post_status',1)->where('faqs_id',$id)->update([
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
        $post =faq::where('faqs_id',$id);
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
        $post =faq::withTrashed()->where('faqs_id',$id);
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
    $data = faq::onlyTrashed()->where('faqs_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }
        // Delete the database information
        faq::where('faqs_id', $id)->forceDelete();
        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
}
