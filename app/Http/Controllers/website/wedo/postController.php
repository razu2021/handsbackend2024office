<?php

namespace App\Http\Controllers\website\wedo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\allpost;
use Carbon\Carbon;
class postController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
           $all= allpost::where('status',1)->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")->orwhere('category_as','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = allpost::where('status', 1)->orderBy('allpost_id', 'ASC')->paginate(5);
         }
        $totalpost = allpost::count();
        $deletecount = allpost::onlyTrashed()->count();
        return view('websiteBackend.common.allpost.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = allpost::count();
        $lastcreat = allpost::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.common.allpost.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=allpost::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.allpost.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=allpost::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.allpost.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
        $request->validate([
            'category_as' => 'required',
            'heading' => 'required',
            'title' => 'required',
            'caption' => 'required',
        ],
            [
              'category_as.required' => 'Service Category is Required.',
              'heading.required' => ' Heading is Required.',
              'title.required' => ' Title is Required.',
              'caption.required' => 'Caption is Required.',
          
            ]
        );

        $slugname = $request['title'];
          $removespace = str_replace(' ', '', $slugname);
          $slug=$removespace.'-'.uniqid('30');
          $creator=Auth::guard('admin')->user()->id;
          $insert=allpost::insertGetId([
            'category_as'=>$request['category_as'],
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
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
            Image::make($image)->fit(1080, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            allpost::where('allpost_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
        /*------- image inset end here ------ */
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('allpost.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('allpost.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $request->validate([
            'category_as' => 'required',
            'heading' => 'required',
            'title' => 'required',
            'caption' => 'required',
        ],
            [
              'category_as.required' => 'Service Category is Required.',
              'heading.required' => ' Heading is Required.',
              'title.required' => ' Title is Required.',
              'caption.required' => 'Caption is Required.',
          
            ]
        );
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=allpost::where('status',1)->where('allpost_id',$id)->where('slug',$slug)->update([
            'category_as'=>$request['category_as'],
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        // bg image 
        $request->validate([
            'service_image' => 'mimes:jpeg,jpg,png,gif,avi,webp|max:5120', // Adjust file types and max size as needed
         ],
            [
                    
            ]
            
         );
         if($request->hasFile('service_image')){
            $image=$request->file('service_image');
            $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(1080, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            allpost::where('allpost_id',$id)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('allpost.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('allpost.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=allpost::where('post_status',2)->where('allpost_id',$id)->update([
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
        $post_deactive =allpost::where('post_status',1)->where('allpost_id',$id)->update([
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
        $post =allpost::where('allpost_id',$id);
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
        $post =allpost::withTrashed()->where('allpost_id',$id);
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
    $data = allpost::onlyTrashed()->where('allpost_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }
        // Delete the database information
        allpost::where('allpost_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
      // Recycle bin code is start here 
      public function recycle(Request $request){
      $search = $request['search'] ?? "";
      if($search !=""){
          $all= allpost::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
          ->paginate(5);
      }
      else{
          $all = allpost::onlyTrashed()->where('status', 1)->orderBy('allpost_id', 'ASC')->paginate(5);
      }
      $totalpost = allpost::count();
      return view('websiteBackend.common.allpost.recycle',compact('all','search','totalpost'));
  }
}
