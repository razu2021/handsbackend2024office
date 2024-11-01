<?php
namespace App\Http\Controllers\website\invo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\ourimpact;
use Carbon\Carbon;
class ourImpactController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;
      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= ourimpact::where('status',1)->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = ourimpact::where('status', 1)->orderBy('ourimpact_id', 'ASC')->paginate(5);
         }
        $totalpost = ourimpact::count();
        $deletecount = ourimpact::onlyTrashed()->count();
        return view('websiteBackend.invo.ourimpact.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = ourimpact::count();
        $lastcreat = ourimpact::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.invo.ourimpact.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
    

      $data=ourimpact::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.invo.ourimpact.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){


        $data=ourimpact::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.invo.ourimpact.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
          $slug='admin'.uniqid('20');
          $creator=Auth::guard('admin')->user()->id;
          $insert=ourimpact::insertGetId([
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
            Image::make($image)->fit(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            ourimpact::where('ourimpact_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
          // *********
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('ourimpact.add')->with('message',' Information Added successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('ourimpact.add')->with('error',' Information Added Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=ourimpact::where('status',1)->where('ourimpact_id',$id)->where('slug',$slug)->update([
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
            Image::make($image)->fit(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            ourimpact::where('ourimpact_id',$id)->update([
              'service_image'=>$imageName,
            ]);
          }
      /*------- image start here ------ */
        if($update){
          Session::flash('success','value');
          return redirect()->route('ourimpact.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('ourimpact.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=ourimpact::where('post_status',2)->where('ourimpact_id',$id)->update([
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
        $post_deactive =ourimpact::where('post_status',1)->where('ourimpact_id',$id)->update([
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
        $post =ourimpact::where('ourimpact_id',$id);
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
        $post =ourimpact::withTrashed()->where('ourimpact_id',$id);
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
    $data = ourimpact::onlyTrashed()->where('ourimpact_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        ourimpact::where('ourimpact_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }

        // Recycle bin code is start here 
        public function recycle(Request $request){
          $search = $request['search'] ?? "";
          if($search !=""){
              $all= ourimpact::onlyTrashed()->where('heading', 'LIKE', "%$search%")->orwhere('title','LIKE',"%$search%")
              ->paginate(5);
          }
          else{
              $all = ourimpact::onlyTrashed()->where('status', 1)->orderBy('ourimpact_id', 'ASC')->paginate(5);
          }
          $totalpost = ourimpact::count();
          return view('websiteBackend.invo.ourimpact.recycle',compact('all','search','totalpost'));
      }
}
