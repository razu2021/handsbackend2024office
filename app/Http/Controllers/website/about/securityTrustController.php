<?php
namespace App\Http\Controllers\website\about;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\security_trust;
use Carbon\Carbon;

class securityTrustController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= security_trust::where('status',1)->where('top_heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = security_trust::where('status', 1)->orderBy('security_trust_id', 'ASC')->paginate(5);
         }
        $totalpost = security_trust::count();
        return view('websiteBackend.about.security_trust.index',compact('all','search','totalpost'));
    }
    public function add(){
        $totalpost = security_trust::count();
        $lastcreat = security_trust::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.about.security_trust.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=security_trust::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.about.security_trust.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=security_trust::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.about.security_trust.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
            $request->validate([
              'heading' => 'required',
              'title' => 'required',
              'caption' => 'required',
          ],
              [
                'heading.required' => ' Heading is Required.',
                'title.required' => ' Title is Required.',
                'caption.required' => 'caption  is Required.',
              ]
          );
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=security_trust::insertGetId([
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
            Image::make($image)->fit(900, 900, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            security_trust::where('security_trust_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
        /*------- image inset end here ------ */
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('security_trust.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('security_trust.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=security_trust::where('status',1)->where('security_trust_id',$id)->where('slug',$slug)->update([
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
            Image::make($image)->fit(900, 900, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            security_trust::where('security_trust_id',$id)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('security_trust.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('security_trust.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=security_trust::where('post_status',2)->where('security_trust_id',$id)->update([
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
        $post_deactive =security_trust::where('post_status',1)->where('security_trust_id',$id)->update([
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
        $post =security_trust::where('security_trust_id',$id);
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
        $post =security_trust::withTrashed()->where('security_trust_id',$id);
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
    $data = security_trust::onlyTrashed()->where('security_trust_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        security_trust::where('security_trust_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }
}
