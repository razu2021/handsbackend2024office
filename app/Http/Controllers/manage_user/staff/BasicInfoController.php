<?php

namespace App\Http\Controllers\manage_user\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\BasicInfo;
use App\Models\Your_Profile;
use Carbon\Carbon;
use Image;
class BasicInfoController extends Controller
{
    //
     //
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $id= Auth::user()->id;
        $all=BasicInfo::where('status',1)->where('user_id',$id)->get();
        $profileinfo=Your_Profile::where('status',1)->where('user_id',$id)->get();
        $Proinfo=Your_Profile::where('status',1)->where('user_id',$id)->limit('1')->get();
       
      
        //dd($social);
        return view('manage_user.staff.BasicInfo.index',compact('all','Proinfo','profileinfo'));
    }
    public function add(){
        return view('manage_user.staff.BasicInfo.add');
    }
    public function edit($slug){
      $id= Auth::user()->id;
      $alldata=BasicInfo::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
      //$Proinfo=Your_Profile::where('status',1)->where('user_id',$id)->limit('1')->get();
        return view('manage_user.staff.BasicInfo.edit',compact('alldata'));
      }
      public function view($slug){
        $id= Auth::user()->id;
        $data=BasicInfo::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
        return view('manage_user.staff.BasicInfo.view',compact('data'));
      }
    
      public function insert(Request $request){
        $request->validate([
          'user_name' => ['required','string','max:10','unique:'.BasicInfo::class],
      ]);
      
          $user_id=Auth::user()->id;
          $slug='users'.uniqid('20');
          $insert=BasicInfo::insertGetId([
            'user_id'=>$user_id,
            'user_name'=>$request['user_name'],
            'slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);

        // *********
        if ($insert) {
          Session::flash('success','value');
          return redirect()->back();
      } else {
          Session::flash('error','value');
          return redirect()->back();
      }
      
      }
    
      public function insertfacebook(Request $request){
        $insert=BasicInfo::insertGetId([
          'facebook'=>$request['facebook'],
        ]);
    
        // *********
        if ($insert) {
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo/add')->with('message',' Information Added successful !');
      } else {
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/view/add')->with('error',' Information Added Failed 1');
      }
      
      }

      // update basice information 
      public function update_website(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'website'=>$request['website'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_facebook(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'facebook'=>$request['facebook'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_twitter(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'twitter'=>$request['twitter'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_linkedin(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'linkedin'=>$request['linkedin'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_instagram(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'instagram'=>$request['instagram'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_family_member(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'family_member'=>$request['family_member'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_father_info(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'father_name'=>$request['father_name'],
            'father_ocupation'=>$request['father_ocupation'],
            'father_phone'=>$request['father_phone'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_mother_info(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'mother_name'=>$request['mother_name'],
            'mother_ocupation'=>$request['mother_ocupation'],
            'mother_phone'=>$request['mother_phone'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_present_address(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'present_address'=>$request['present_address'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_permanet_address(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'permanet_address'=>$request['permanet_address'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_birth_date(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'birth_date'=>$request['birth_date'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_birth_place(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'birth_place'=>$request['birth_place'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_relationship(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'relationship'=>$request['relationship'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_blood(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'blood'=>$request['blood'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_language(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'language'=>$request['language'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_hobies(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'hobies'=>$request['hobies'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 
      public function update_other_activitis(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=BasicInfo::where('status',1)->where('Creator_id',$id)->update([
            'other_activitis'=>$request['other_activitis'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/BasicInfo');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/BasicInfo/edit/'.$slug)->with('message','Information Update Failed !');
        }
      }
      // end 


// post active deactive 
      public function post_active($id){
        $softdelete=BasicInfo::where('post_status',2)->where('Creator_id',$id)->update([
          'post_status'=>0,
        ]);
        
        //$post->delete();
        // return redirect()->back()->with(['message'=>'Successfully deleted!!']);
        if($softdelete){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
      public function post_deactive($id){
        $softdelete=BasicInfo::where('post_status',1)->where('Creator_id',$id)->update([
          'post_status'=>2,
        ]);
        
        //$post->delete();
        // return redirect()->back()->with(['message'=>'Successfully deleted!!']);
        if($softdelete){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }
    
       // soft delete 
       public function softdelete($id){
        $post =BasicInfo::where('Creator_id',$id);
        $post->delete();
        if($post){
          Session::flash('success_soft','value');
          return redirect()->back();
        }else{
          Session::flash('error_soft','value');
          return redirect()->back();
        }
      }

      //  Resotore data 
      public function restore($id){
      
        $post =BasicInfo::withTrashed()->where('Creator_id',$id);
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
    $data = BasicInfo::onlyTrashed()->where('Creator_id', $id)->first();
    if ($data) {
        // Delete the first image
        $profileimage = public_path('uploads/' . $data->profile_image);
        if (file_exists($profileimage)) {
            File::delete($profileimage);
        }
        // Delete the second image
        $coverphoto = public_path('uploads/' . $data->ban_image);
        if (file_exists($coverphoto)) {
            File::delete($coverphoto);
        }
        // Delete the database information
        BasicInfo::where('Creator_id', $id)->forceDelete();

        return redirect()->back()->with('message', 'Delete Successfuly');
    } else {
      return redirect()->back()->with('message', 'Delete failed !');
    }
    
    }



// single data delete  code is here 
    public function website_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'website'=>Null,
      ]);
      return redirect()->back();
    }  // end here 
    public function facebook_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'facebook'=>Null,
      ]);
      return redirect()->back();
    } // end here 
    public function twitter_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'twitter'=>Null,
      ]);
      return redirect()->back();
    } // end here 
    public function linkedin_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'twitter'=>Null,
      ]);
      return redirect()->back();
    } // end here 
    public function instagram_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'instagram'=>Null,
      ]);
      return redirect()->back();
    } // end here 
    public function familymember_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'family_member'=>Null,
      ]);
      return redirect()->back();
    } // end 
    public function fatherinfo_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'father_name'=>Null,
        'father_ocupation'=>Null,
        'father_phone'=>Null,
      ]);
      return redirect()->back();
    } // end here 
    public function motherinfo_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'mother_name'=>Null,
        'mother_ocupation'=>Null,
        'mother_phone'=>Null,
      ]);
      return redirect()->back();
    } // end here 
    public function presentaddress_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'present_address'=>Null,

      ]);
      return redirect()->back();
    } // end here 
    public function permanentaddress_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'permanent_address'=>Null,

      ]);
      return redirect()->back();
    } // end here 
    public function birthdate_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'birth_date'=>Null,

      ]);
      return redirect()->back();
    } // end here 
    public function birthplace_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'birth_place'=>Null,

      ]);
      return redirect()->back();
    } // end here 
    public function relationship_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'relationship'=>Null,

      ]);
      return redirect()->back();
    } // end here 
    public function blood_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'blood'=>Null,

      ]);
      return redirect()->back();
    } // end here 
    public function language_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'language'=>Null,

      ]);
      return redirect()->back();
    } // end here 
    public function hobies_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'hobies'=>Null,

      ]);
      return redirect()->back();
    } // end here 
    public function otheractivitis_delete($id){
      $webdelete=BasicInfo::where('Creator_id',$id)->update([
        'other_activitis'=>Null,

      ]);
      return redirect()->back();
    } // end here 

      







    
      public function recycle(){
        $all=BasicInfo::onlyTrashed()->where('status',1)->orderBy('Creator_id','DESC')->get();
        return view('admin.blog.BlogBanner.recycle',compact('all'));
      }
}
