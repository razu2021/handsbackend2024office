<?php

namespace App\Http\Controllers\website\gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\photo_gallery;
use Carbon\Carbon;
class photoGealleryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
           $all= photo_gallery::where('status',1)->where('heading', 'LIKE', "%$search%")->orwhere('location','LIKE',"%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = photo_gallery::where('status', 1)->orderBy('photo_gallery_id', 'ASC')->paginate(5);
         }
        $totalpost = photo_gallery::count();
        $deletecount= photo_gallery::onlyTrashed()->count();
        return view('websiteBackend.gallery.photo_gallery.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = photo_gallery::count();
        $lastcreat = photo_gallery::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.gallery.photo_gallery.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=photo_gallery::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.gallery.photo_gallery.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=photo_gallery::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.gallery.photo_gallery.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=photo_gallery::insertGetId([
            'location'=>$request['location'],
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
            Image::make($image)->fit(1080, 700, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/gallery/'.$imageName);
            photo_gallery::where('photo_gallery_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
        /*------- image inset end here ------ */
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('photo_gallery.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('photo_gallery.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=photo_gallery::where('status',1)->where('photo_gallery_id',$id)->where('slug',$slug)->update([
            'location'=>$request['location'],
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
            Image::make($image)->fit(1080, 700, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/gallery/'.$imageName);
            photo_gallery::where('photo_gallery_id',$id)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('photo_gallery.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('photo_gallery.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=photo_gallery::where('post_status',2)->where('photo_gallery_id',$id)->update([
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
        $post_deactive =photo_gallery::where('post_status',1)->where('photo_gallery_id',$id)->update([
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
        $post =photo_gallery::where('photo_gallery_id',$id);
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
        $post =photo_gallery::withTrashed()->where('photo_gallery_id',$id);
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
    $data = photo_gallery::onlyTrashed()->where('photo_gallery_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/gallery/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }
        // Delete the database information
        photo_gallery::where('photo_gallery_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

      // Recycle bin code is start here 
      public function recycle(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
            $all= photo_gallery::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
            ->paginate(5);
        }
        else{
            $all = photo_gallery::onlyTrashed()->where('status', 1)->orderBy('photo_gallery_id', 'ASC')->paginate(5);
        }
        $totalpost = photo_gallery::count();
        return view('websiteBackend.gallery.photo_gallery.recycle',compact('all','search','totalpost'));
    }
}
