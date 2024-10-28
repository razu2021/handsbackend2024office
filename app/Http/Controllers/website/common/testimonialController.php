<?php
namespace App\Http\Controllers\website\common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\testimonial;
use Carbon\Carbon;
class testimonialController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
           $all= testimonial::where('status',1)->where('top_heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = testimonial::where('status', 1)->orderBy('testimonial_id', 'ASC')->paginate(5);
         }
        $totalpost = testimonial::count();
        $deletecount = testimonial::onlyTrashed()->count();
        return view('websiteBackend.common.testimonial.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = testimonial::count();
        $lastcreat = testimonial::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.common.testimonial.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
    

      $data=testimonial::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.testimonial.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){


        $data=testimonial::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.common.testimonial.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'name' => 'required',
              'caption' => 'required',
          ],
              [
                'name.required' => ' Name is Required.',
                'caption.required' => 'caption  is Required.',
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=testimonial::insertGetId([
            'heading'=>$request['heading'],
            'name'=>$request['name'],
            'organization_name'=>$request['organization_name'],
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
            Image::make($image)->fit(370, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            testimonial::where('testimonial_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
        /*------- image inset end here ------ */
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('testimonial.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('testimonial.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=testimonial::where('status',1)->where('testimonial_id',$id)->where('slug',$slug)->update([
            'heading'=>$request['heading'],
            'name'=>$request['name'],
            'organization_name'=>$request['organization_name'],
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
            Image::make($image)->fit(370, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            testimonial::where('testimonial_id',$id)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('testimonial.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('testimonial.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=testimonial::where('post_status',2)->where('testimonial_id',$id)->update([
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
        $post_deactive =testimonial::where('post_status',1)->where('testimonial_id',$id)->update([
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
        $post =testimonial::where('testimonial_id',$id);
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
        $post =testimonial::withTrashed()->where('testimonial_id',$id);
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
    $data = testimonial::onlyTrashed()->where('testimonial_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        testimonial::where('testimonial_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
  // Recycle bin code is start here 
  public function recycle(Request $request){
    $search = $request['search'] ?? "";
    if($search !=""){
        $all= testimonial::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
        ->paginate(5);
    }
    else{
        $all = testimonial::onlyTrashed()->where('status', 1)->orderBy('testimonial_id', 'ASC')->paginate(5);
    }
    $totalpost = testimonial::count();
    return view('websiteBackend.common.testimonial.recycle',compact('all','search','totalpost'));
}
}
