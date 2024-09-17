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
use App\Models\allabout;
use Carbon\Carbon;
class allAboutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= allabout::where('status',1)->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")->orwhere('category_as','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = allabout::where('status', 1)->orderBy('allabout_id', 'ASC')->paginate(5);
         }
        $totalpost = allabout::count();
        return view('websiteBackend.common.allabout.index',compact('all','search','totalpost'));
    }
    public function add(){
        $totalpost = allabout::count();
        $lastcreat = allabout::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.common.allabout.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
    

      $data=allabout::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.allabout.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){


        $data=allabout::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.allabout.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'category_as' => 'required',
          ],
              [
                'category_as.required' => ' Category is Required.',
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=allabout::insertGetId([
            'category_as'=>$request['category_as'],
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'subtitle'=>$request['subtitle'],
            'caption'=>$request['caption'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          /*------- image inser start here ------ */
          if($request->hasFile('service_image')){
            $image=$request->file('service_image');
            $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(370, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            allabout::where('allabout_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('allabout.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('allabout.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=allabout::where('status',1)->where('allabout_id',$id)->where('slug',$slug)->update([
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'subtitle'=>$request['subtitle'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        /*---- image upload code ---- */
         if($request->hasFile('service_image')){
            $image=$request->file('service_image');
            $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(370, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            allabout::where('allabout_id',$id)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('allabout.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('allabout.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=allabout::where('post_status',2)->where('allabout_id',$id)->update([
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
        $post_deactive =allabout::where('post_status',1)->where('allabout_id',$id)->update([
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
        $post =allabout::where('allabout_id',$id);
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
        $post =allabout::withTrashed()->where('allabout_id',$id);
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
    $data = allabout::onlyTrashed()->where('allabout_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        allabout::where('allabout_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
}
