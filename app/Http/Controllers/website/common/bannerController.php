<?php

namespace App\Http\Controllers\website\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\allbanner;
use App\Models\bladeinfo;
use Carbon\Carbon;
class bannerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= allbanner::where('status',1)->where('banner_title', 'LIKE', "%$search%")->orwhere('banner_heading','LIKE',"%$search%")
           ->orwhere('banner_caption','LIKE',"%$search%")->orwhere('page_unique_name','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = allbanner::where('status', 1)->orderBy('banner_id', 'ASC')->paginate(5);
         }
        $totalpost = allbanner::count();
        return view('websiteBackend.common.allbanner.index',compact('all','search','totalpost'));
    }
    public function add(){
        $totalpost = allbanner::count();
        $lastcreat = allbanner::where('status',1)->orderby('created_at','desc')->first();
        
        $inserted = bladeinfo::where('status',1)->get();
        return view('websiteBackend.common.allbanner.add',compact('inserted','totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
    

      $data=allbanner::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.allbanner.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){


        $data=allbanner::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.allbanner.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'page_unique_name' => 'required',
          ],
              [
                'page_unique_name.required' => 'The page name is required.',
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=allbanner::insertGetId([
            'page_unique_name'=>$request['page_unique_name'],
            'banner_title'=>$request['banner_title'],
            'banner_heading'=>$request['banner_heading'],
            'banner_caption'=>$request['banner_caption'],
            'banner_button1'=>$request['banner_button1'],
            'banner_button_url1'=>$request['banner_button_url1'],
            'banner_button2'=>$request['banner_button2'],
            'banner_button_url2'=>$request['banner_button_url2'],
            'order_by'=>$request['set_position'] + 1,
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          /*------- image start here ------ */
          // bg image 
          $request->validate([
            'banner_bg_image' => 'mimes:jpeg,jpg,png,gif,avi,webp|max:10240', // Adjust file types and max size as needed
            'banner_image' => 'mimes:jpeg,jpg,png,gif,avi,webp|max:5120', // Adjust file types and max size as needed
         ],
            //  [
            //      'banner_bg_image.jpeg' => 'only upload jpeg image',
                 
            //  ]
         );
          if($request->hasFile('banner_bg_image')){
            $image=$request->file('banner_bg_image');
            $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(1920, 1073, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            allbanner::where('banner_id',$insert)->update([
              'banner_bg_image'=>$imageName,
            ]);
          }
          //image 
          if($request->hasFile('banner_image')){
              $image=$request->file('banner_image');
              $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
              Image::make($image)->fit(703, 950, function ($constraint) {
                  $constraint->aspectRatio();
                  $constraint->upsize();
              })->encode('webp', 90)->save('uploads/website/'.$imageName);
              allbanner::where('banner_id',$insert)->update([
                'banner_image'=>$imageName,
              ]);
            }
        /*------- image inset end here ------ */
      
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect('admin/dashboard/website-manage/home-banner/add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect('admin/dashboard/website-manage/home-banner/add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=allbanner::where('status',1)->where('banner_id',$id)->where('slug',$slug)->update([
          'banner_title'=>$request['banner_title'],
          'banner_heading'=>$request['banner_heading'],
          'banner_caption'=>$request['banner_caption'],
          'banner_button1'=>$request['banner_button1'],
          'banner_button_url1'=>$request['banner_button_url1'],
          'banner_button2'=>$request['banner_button2'],
          'banner_button_url2'=>$request['banner_button_url2'],
          'editor'=>$editor,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        // bg image 
        $request->validate([
          'banner_bg_image' => 'mimes:jpeg,jpg,png,gif,avi,webp|max:10240', // Adjust file types and max size as needed
          'banner_image' => 'mimes:jpeg,jpg,png,gif,avi,webp|max:5120', // Adjust file types and max size as needed
        ],
          //  [
          //      'banner_bg_image.jpeg' => 'only upload jpeg image',
                
          //  ]
        );
        if($request->hasFile('banner_bg_image')){
          $image=$request->file('banner_bg_image');
          $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
          Image::make($image)->fit(1920, 1073, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
          })->encode('webp', 90)->save('uploads/website/'.$imageName);
          allbanner::where('banner_id',$id)->update([
            'banner_bg_image'=>$imageName,
          ]);
        }

        //image 
        if($request->hasFile('banner_image')){
            $image=$request->file('banner_image');
            $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(703, 950, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            allbanner::where('banner_id',$id)->update([
              'banner_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect('admin/dashboard/website-manage/home-banner/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('admin/dashboard/website-manage/home-banner/view/'.$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=allbanner::where('post_status',2)->where('banner_id',$id)->update([
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
        $post_deactive =allbanner::where('post_status',1)->where('banner_id',$id)->update([
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
        $post =allbanner::where('banner_id',$id);
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
        $post =allbanner::withTrashed()->where('banner_id',$id);
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
    $data = allbanner::onlyTrashed()->where('banner_id', $id)->first();
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
        allbanner::where('banner_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }



    
}
