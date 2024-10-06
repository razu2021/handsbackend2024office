<?php
namespace App\Http\Controllers\website\other;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\member_donner;
use Carbon\Carbon; 
class memberDonnerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
      $id= Auth::guard('admin')->user()->id;

      $search = $request['search'] ?? "";
         if($search !=""){
          
           $all= member_donner::where('status',1)->where('name', 'LIKE', "%$search%")->orwhere('email','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")
           ->paginate(5);
         }
         else{
           $all = member_donner::where('status', 1)->orderBy('member_donner_id', 'DESC')->paginate(5);
         }
        $totalpost = member_donner::count();
        $deletecount = member_donner::onlyTrashed()->count();
        return view('websiteBackend.other.member_donner.index',compact('all','search','totalpost','deletecount'));
    }
    public function add(){
        $totalpost = member_donner::count();
        $lastcreat = member_donner::where('status',1)->orderby('created_at','desc')->first();
        return view('websiteBackend.other.member_donner.add',compact('totalpost','lastcreat'));
    }
    /* ------  this is edit page --------*/
    public function edit($slug){
      $id= Auth::guard('admin')->user()->id;
      $data=member_donner::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.member_donner.edit',compact('data'));
      }
      /* ------  this is view page --------*/
      public function view($slug){
        $data=member_donner::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('websiteBackend.other.member_donner.view',compact('data'));
      }
    /* ------  this is submit or insert page --------*/
      public function insert(Request $request){
        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'amount' => 'required',
        ],
        [
            'email.required' => ' Email is Required.',
            'phone.required' => ' Phone Number is Required.',
            'amount.required' => ' Amount is Required.',
        ]
        );
        $slug=uniqid('20');
        $insert=member_donner::insertGetId([
          'or_name'=>$request['or_name'],
          'name'=>$request['name'],
          'email'=>$request['email'],
          'phone'=>$request['phone'],
          'amount'=>$request['amount'],
          'purpose'=>$request['purpose'],
          'address'=>$request['address'],
          'caption'=>$request['caption'],
          'slug'=>$slug,
          'creator'=>$request['name'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        // image 
        if($request->hasFile('or_logo')){
            $image=$request->file('or_logo');
            $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            member_donner::where('member_donner_id',$insert)->update([
              'or_logo'=>$imageName,
            ]);
          }
        // image 
        if($request->hasFile('service_image')){
            $image=$request->file('service_image');
            $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            member_donner::where('member_donner_id',$insert)->update([
              'service_image'=>$imageName,
            ]);
          }
        if($insert) {
            Session::flash('success','value');
            return redirect()->route('member_donner.add')->with('message',' Application Submit successful !');
        } else {
            Session::flash('error','value');
            return redirect()->route('member_donner.add')->with('error',' Application Submit Failed !');
        }
      }
      /* ------  this is update page --------*/
      public function update(Request $request){
        $id=$request['id'];
        $admin_id=$request['admin_id'];
        $slug=$request['slug'];
        $editor = Auth::guard('admin')->user()->id;
        $update=member_donner::where('status',1)->where('member_donner_id',$id)->where('slug',$slug)->update([
            'or_name'=>$request['or_name'],
            'name'=>$request['name'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'amount'=>$request['amount'],
            'purpose'=>$request['purpose'],
            'address'=>$request['address'],
            'caption'=>$request['caption'],
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        // image 
        if($request->hasFile('or_logo')){
            $image=$request->file('or_logo');
            $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            member_donner::where('member_donner_id',$id)->update([
                'or_logo'=>$imageName,
            ]);
            }
        // image 
        if($request->hasFile('service_image')){
            $image=$request->file('service_image');
            $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
            Image::make($image)->fit(500, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('webp', 90)->save('uploads/website/'.$imageName);
            member_donner::where('member_donner_id',$id)->update([
                'service_image'=>$imageName,
            ]);
            }
        if($update){
          Session::flash('success','value');
          return redirect()->route('member_donner.view',$slug);
        }else{
          Session::flash('error','value');
          return redirect()->route('member_donner.view',$slug)->with('message','Information Update Failed !');
        }
      }
      /*-------  post active ---*/
      public function post_active($id){
        $post_actives=member_donner::where('post_status',2)->where('member_donner_id',$id)->update([
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
        $post_deactive =member_donner::where('post_status',1)->where('member_donner_id',$id)->update([
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
        $post =member_donner::where('member_donner_id',$id);
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
        $post =member_donner::withTrashed()->where('member_donner_id',$id);
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
    $data = member_donner::onlyTrashed()->where('member_donner_id', $id)->first();
    if ($data) {
        // Delete the first image
        $bannerbgimage = public_path('uploads/website/' . $data->service_image);
        if (file_exists($bannerbgimage)) {
            File::delete($bannerbgimage);
        }

        // Delete the database information
        member_donner::where('member_donner_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    }


    // Recycle bin code is start here 
    public function recycle(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
         
          $all= member_donner::onlyTrashed()->where('status',1)->where('name', 'LIKE', "%$search%")->orwhere('email','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")
          ->paginate(5);
        }
        else{
          $all = member_donner::onlyTrashed()->where('status', 1)->orderBy('member_donner_id', 'ASC')->paginate(5);
        }
        $totalpost = member_donner::count();
        return view('websiteBackend.other.member_donner.recycle',compact('all','search','totalpost'));
    }



/*---controller end here  */
}


