<?php
namespace App\Http\Controllers\website\home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\dipositads;
use Carbon\Carbon;
class dipositAdsController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
}
public function index(Request $request){
  $id= Auth::guard('admin')->user()->id;
  $search = $request['search'] ?? "";
     if($search !=""){
      
       $all= dipositads::where('status',1)->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
       ->paginate(5);
     }
     else{
       $all = dipositads::where('status', 1)->orderBy('dipositads_id', 'ASC')->paginate(5);
     }
    $totalpost = dipositads::count();
    $deletecount = dipositads::onlyTrashed()->count();
    return view('websiteBackend.home.dipositads.index',compact('all','search','totalpost','deletecount'));
}
public function add(){
    $totalpost = dipositads::count();
    $lastcreat = dipositads::where('status',1)->orderby('created_at','desc')->first();
    return view('websiteBackend.home.dipositads.add',compact('totalpost','lastcreat'));
}
/* ------  this is edit page --------*/
public function edit($slug){
  $id= Auth::guard('admin')->user()->id;
  $data=dipositads::where('status',1)->where('slug',$slug)->firstOrFail();
    return view('websiteBackend.home.dipositads.edit',compact('data'));
  }
  /* ------  this is view page --------*/
  public function view($slug){
    $data=dipositads::where('status',1)->where('slug',$slug)->firstOrFail();
    return view('websiteBackend.home.dipositads.view',compact('data'));
  }
/* ------  this is submit or insert page --------*/
  public function insert(Request $request){
        $request->validate([
          'heading' => 'required',
          'title' => 'required',
          'button' => 'required',
          'button_url' => 'required',
      ],
          [
            'heading.required' => 'SME Title is Required.',
            'title.required' => 'SME Title is Required.',
            'button.required' => 'SMe Button Required.',
            'button_url.required' => 'SMe Button URL Required.',
          ]
      );
      $slug='admin'.uniqid('20');
      $creator=Auth::guard('admin')->user()->id;
      $insert=dipositads::insertGetId([
        'heading'=>$request['heading'],
        'title'=>$request['title'],
        'button'=>$request['button'],
        'button_url'=>$request['button_url'],
        'slug'=>$slug,
        'creator'=>$creator,
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);
      /*------- image start here ------ */
      // bg image 
      $request->validate([
        'service_image' => 'required|mimes:jpeg,jpg,png,gif,avi,webp|max:5120', // Adjust file types and max size as needed
     ],
         [
             'service_image.required' => 'Service Image is Required!',     
         ]
     );
      if($request->hasFile('service_image')){
        $image=$request->file('service_image');
        $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
        Image::make($image)->fit(1080, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('webp', 90)->save('uploads/website/'.$imageName);
        dipositads::where('dipositads_id',$insert)->update([
          'service_image'=>$imageName,
        ]);
      }
    /*------- image inset end here ------ */
      // *********
      if ($insert) {
        Session::flash('success','value');
        return redirect()->route('dipositads.add')->with('message',' Information Added successful !');
    } else {
        Session::flash('error','value');
        return redirect()->route('dipositads.add')->with('error',' Information Added Failed !');
    }
  }
  /* ------  this is update page --------*/
  public function update(Request $request){
    $id=$request['id'];
    $admin_id=$request['admin_id'];
    $slug=$request['slug'];
    $editor = Auth::guard('admin')->user()->id;
    $request->validate([
        'heading' => 'required',
        'title' => 'required',
        'button' => 'required',
        'button_url' => 'required',
    ],
        [
          'heading.required' => 'SME Heading is Required.',
          'title.required' => 'SME Title is Required.',
          'button.required' => 'SME Button Required.',
          'button_url.required' => 'SME Button URL Required.',
        ]
    );
    $update=dipositads::where('status',1)->where('dipositads_id',$id)->where('slug',$slug)->update([
        'heading'=>$request['heading'],
        'title'=>$request['title'],
        'button'=>$request['button'],
        'button_url'=>$request['button_url'],
        'editor'=>$editor,
        'updated_at'=>Carbon::now()->toDateTimeString(),
    ]);
    // bg image 
    $request->validate([
        'service_image' => 'mimes:jpeg,jpg,png,gif,avi,webp|max:5120', // Adjust file types and max size as needed
     ],
        
     );
      if($request->hasFile('service_image')){
        $image=$request->file('service_image');
        $imageName=rand(10000,9999999).'_'.$update.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
        Image::make($image)->fit(1080, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('webp', 90)->save('uploads/website/'.$imageName);
        dipositads::where('dipositads_id',$update)->update([
          'service_image'=>$imageName,
        ]);
      }
  /*------- image start here ------ */
    if($update){
      Session::flash('success','value');
      return redirect()->route('dipositads.view',$slug);
    }else{
      Session::flash('error','value');
      return redirect()->route('dipositads.view',$slug)->with('message','Information Update Failed !');
    }
  }
  /*-------  post active ---*/
  public function post_active($id){
    $post_actives=dipositads::where('post_status',2)->where('dipositads_id',$id)->update([
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
    $post_deactive =dipositads::where('post_status',1)->where('dipositads_id',$id)->update([
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
    $post =dipositads::where('dipositads_id',$id);
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
    $post =dipositads::withTrashed()->where('dipositads_id',$id);
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
$data = dipositads::onlyTrashed()->where('dipositads_id', $id)->first();
if ($data) {
    // Delete the first image
    $bannerbgimage = public_path('uploads/website/' . $data->service_image);
    if (file_exists($bannerbgimage)) {
        File::delete($bannerbgimage);
    }
    // Delete the database information
    dipositads::where('dipositads_id', $id)->forceDelete();
    return redirect()->back()->with('message', 'Delete Successfuly');
} else {
  return redirect()->back()->with('message', 'Delete failed !');
}
}

    // Recycle bin code is start here 
    public function recycle(Request $request){
      $search = $request['search'] ?? "";
      if($search !=""){
          $all= dipositads::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
          ->paginate(5);
      }
      else{
          $all = dipositads::onlyTrashed()->where('status', 1)->orderBy('dipositads_id', 'ASC')->paginate(5);
      }
      $totalpost = dipositads::count();
      return view('websiteBackend.home.dipositads.recycle',compact('all','search','totalpost'));
  }


}