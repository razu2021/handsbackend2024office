<?php

namespace App\Http\Controllers\website\wedo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\micro_service;
use Carbon\Carbon;
class microFinanceServicecontroller extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
           $all= micro_service::where('status',1)->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")->orwhere('category_as','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = micro_service::where('status', 1)->orderBy('micro_service_id', 'ASC')->paginate(5);
         }
        $totalpost = micro_service::count();
        $deletecount = micro_service::onlyTrashed()->count();
        return view('websiteBackend.common.micro_service.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = micro_service::count();
        $lastcreat = micro_service::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.common.micro_service.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=micro_service::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.micro_service.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=micro_service::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.micro_service.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
        $request->validate([
            'category_as' => 'required',
            'unique_name' => 'required',
            'heading' => 'required',
            'title' => 'required',
            'caption' => 'required',
            'service_image' => 'required|mimes:jpeg,jpg,png,gif,avi,webp|max:5120', // Adjust file types and max size as needed
        ],
            [
              'category_as.required' => 'Service Category is Required.',
              'unique_name.required' => 'Unique Name is Required.',
              'heading.required' => ' Heading is Required.',
              'title.required' => ' Title is Required.',
              'caption.required' => 'Caption is Required.',
              'service_image.required' => 'Service Image is Required!',   
            ]
        );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=micro_service::insertGetId([
            'category_as'=>$request['category_as'],
            'unique_name'=>$request['unique_name'],
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'button'=>$request['button'],
            'button_url'=>$request['button_url'],
            'slug'=>$slug,
            'creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          /*------- image start here ------ */
          // bg image 
          if($request->hasFile('service_image')){
            $image=$request->file('service_image');
            $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(1080, 700, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            micro_service::where('micro_service_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
        /*------- image inset end here ------ */
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('micro_service.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('micro_service.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $request->validate([
            'category_as' => 'required',
            'unique_name' => 'required',
            'heading' => 'required',
            'title' => 'required',
            'caption' => 'required',
        ],
            [
              'category_as.required' => 'Service Category is Required.',
              'unique_name.required' => 'Unique Name is Required.',
              'heading.required' => ' Heading is Required.',
              'title.required' => ' Title is Required.',
              'caption.required' => 'Caption is Required.',
            ]
        );
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=micro_service::where('status',1)->where('micro_service_id',$id)->where('slug',$slug)->update([
            'category_as'=>$request['category_as'],
            'unique_name'=>$request['unique_name'],
            'heading'=>$request['heading'],
            'title'=>$request['title'],
            'caption'=>$request['caption'],
            'button'=>$request['button'],
            'button_url'=>$request['button_url'],
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
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            micro_service::where('micro_service_id',$id)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('micro_service.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('micro_service.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=micro_service::where('post_status',2)->where('micro_service_id',$id)->update([
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
        $post_deactive =micro_service::where('post_status',1)->where('micro_service_id',$id)->update([
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
        $post =micro_service::where('micro_service_id',$id);
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
        $post =micro_service::withTrashed()->where('micro_service_id',$id);
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
    $data = micro_service::onlyTrashed()->where('micro_service_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }
        // Delete the database information
        micro_service::where('micro_service_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
       // Recycle bin code is start here 
       public function recycle(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
            $all= micro_service::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
            ->paginate(5);
        }
        else{
            $all = micro_service::onlyTrashed()->where('status', 1)->orderBy('micro_service_id', 'ASC')->paginate(5);
        }
        $totalpost = micro_service::count();
        return view('websiteBackend.common.micro_service.recycle',compact('all','search','totalpost'));
    }
}
