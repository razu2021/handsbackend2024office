<?php

namespace App\Http\Controllers\website\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\whatsnew;
use App\Models\bladeinfo;
use Carbon\Carbon;

class whatsnewController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= whatsnew::where('status',1)->where('top_heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = whatsnew::where('status', 1)->orderBy('whatsnew_id', 'ASC')->paginate(5);
         }
        $totalpost = whatsnew::count();
        return view('websiteBackend.home.whatsnew.index',compact('all','search','totalpost'));
    }
    public function add(){
        $totalpost = whatsnew::count();
        $lastcreat = whatsnew::where('status',1)->orderby('created_at','desc')->first();
        
        $inserted = bladeinfo::where('status',1)->get();
        return view('websiteBackend.home.whatsnew.add',compact('inserted','totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
    

      $data=whatsnew::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.home.whatsnew.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){


        $data=whatsnew::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.home.whatsnew.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'title' => 'required',
              'button' => 'required',
              'button_url' => 'required',
          ],
              [
                'title.required' => 'Service Title is Required.',
                'button.required' => 'Service Button Required.',
                'button_url.required' => 'Service Button URL Required.',
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=whatsnew::insertGetId([
            'top_heading'=>$request['top_heading'],
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
            Image::make($image)->fit(1080, 1920, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            whatsnew::where('whatsnew_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
         
        /*------- image inset end here ------ */
      
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('whatsnew.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('whatsnew.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){

        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $request->validate([
            'title' => 'required',
            'button' => 'required',
            'button_url' => 'required',
        ],
            [
              'title.required' => 'Service Title is Required.',
              'button.required' => 'Service Button Required.',
              'button_url.required' => 'Service Button URL Required.',
            ]
        );
        $update=whatsnew::where('status',1)->where('whatsnew_id',$id)->where('slug',$slug)->update([
            'top_heading'=>$request['top_heading'],
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
            Image::make($image)->fit(1080, 1920, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            whatsnew::where('whatsnew_id',$update)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('whatsnew.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('whatsnew.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=whatsnew::where('post_status',2)->where('whatsnew_id',$id)->update([
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
        $post_deactive =whatsnew::where('post_status',1)->where('whatsnew_id',$id)->update([
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
        $post =whatsnew::where('whatsnew_id',$id);
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
        $post =whatsnew::withTrashed()->where('whatsnew_id',$id);
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
    $data = whatsnew::onlyTrashed()->where('whatsnew_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->banner_bg_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the second image
        $bannerimage = public_path('uploads/website/'. $data->banner_image);
        if (file_exists($bannerimage)){
            File::delete($bannerimage);
        }

        // Delete the database information
        whatsnew::where('whatsnew_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }


}
