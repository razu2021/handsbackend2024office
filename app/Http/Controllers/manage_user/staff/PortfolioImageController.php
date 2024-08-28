<?php

namespace App\Http\Controllers\manage_user\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PortfolioImage;
use Carbon\Carbon;

class PortfolioImageController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        $id= Auth::user()->id;
        $all=PortfolioImage::where('status',1)->where('user_id',$id)->get();
       // dd($all);
        return view('manage_user.staff.PortfolioImage.index',compact('all'));
    }
    public function add(){
        return view('manage_user.staff.PortfolioImage.add');
    }
    public function edit($slug){
      $id= Auth::user()->id;
      $data=PortfolioImage::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
        return view('manage_user.staff.PortfolioImage.edit',compact('data'));
      }
      public function view($slug){
        $id= Auth::user()->id;
        $data=PortfolioImage::where('status',1)->where('slug',$slug)->where('user_id',$id)->firstOrFail();
        return view('manage_user.staff.PortfolioImage.view',compact('data'));
      }
    
      public function insert(Request $request){

        $user_id=Auth::user()->id;
        $slug='users'.uniqid('20');
        $insert=PortfolioImage::insertGetId([
          'user_id'=>$user_id,
          'name1'=>$request['name1'],
          'name2'=>$request['name2'],
          'name3'=>$request['name3'],
          'name4'=>$request['name4'],
          'slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        // image
        if($request->hasFile('image1')){
          $image=$request->file('image1');
          $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
    
          PortfolioImage::where('Portfolio_id',$insert)->update([
            'image1'=>$imageName,
          ]);
        }

        //image 
        if($request->hasFile('image2')){
            $image=$request->file('image2');
            $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
      
            PortfolioImage::where('Portfolio_id',$insert)->update([
              'image2'=>$imageName,
            ]);
          }

          // image
          if($request->hasFile('image3')){
            $image=$request->file('image3');
            $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
            PortfolioImage::where('Portfolio_id',$insert)->update([
              'image3'=>$imageName,
            ]);
          }

          //image
          if($request->hasFile('image4')){
            $image=$request->file('image4');
            $imageName=rand(10000,9999999).'_'.$insert.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
      
            PortfolioImage::where('Portfolio_id',$insert)->update([
              'image4'=>$imageName,
            ]);
          }


        // *********
        if ($insert) {
          Session::flash('success','value');
          return redirect('dashboard/user/PortfolioImage/add')->with('message','Profile Information Added successful !');
      } else {
          Session::flash('error','value');
          return redirect('dashboard/user/PortfolioImage/view/add')->with('error','Prifile Information Added Failed 1');
      }
      }
      public function update(Request $request){
        $id=$request['id'];
        $user_id=$request['user_id'];
        $slug=$request['slug'];
        $update=PortfolioImage::where('status',1)->where('Portfolio_id',$id)->update([
            'name1'=>$request['name1'],
            'name2'=>$request['name2'],
            'name3'=>$request['name3'],
            'name4'=>$request['name4'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        
        // image
        if($request->hasFile('image1')){
          $image=$request->file('image1');
          $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
          PortfolioImage::where('Portfolio_id',$id)->update([
            'image1'=>$imageName,
          ]);
        }

        //image
        if($request->hasFile('image2')){
            $image=$request->file('image2');
            $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
            PortfolioImage::where('Portfolio_id',$id)->update([
              'image2'=>$imageName,
            ]);
          }

        //image
        if($request->hasFile('image3')){
            $image=$request->file('image3');
            $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
            PortfolioImage::where('Portfolio_id',$id)->update([
              'image3'=>$imageName,
            ]);
          }
        //image
        if($request->hasFile('image4')){
        $image=$request->file('image4');
        $imageName=rand(10000,9999999).'_'.$id.'-'.time().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('uploads/'.$imageName);
        PortfolioImage::where('Portfolio_id',$id)->update([
            'image4'=>$imageName,
        ]);
        }

        // bg image upload here 
        if($update){
          Session::flash('success','value');
          return redirect('dashboard/user/Portfolio_image/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('dashboard/user/Portfolio_image/view/'.$slug)->with('message','Profile Information Update Failed !');
        }
      }


      // post active 
      public function userrequest($id){
        $softdelete=PortfolioImage::where('post_status',2)->where('Portfolio_id',$id)->update([
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
      public function adminrequest($id){
        $softdelete=PortfolioImage::where('post_status',0)->where('Portfolio_id',$id)->update([
          'post_status'=>1,
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
        $post =PortfolioImage::where('Portfolio_id',$id);
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
      
        $post =PortfolioImage::withTrashed()->where('Portfolio_id',$id);
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
      $data = PortfolioImage::onlyTrashed()->find($id);
  
      if ($data){
          // Delete the images
          $img1 = public_path('uploads/'.$data->image1);
          if (file_exists($img1)){
              File::delete($img1);
          }
          $img2 = public_path('uploads/'.$data->image2);
          if (file_exists($img2)){
              File::delete($img2);
          }
          $img3 = public_path('uploads/'.$data->image3);
          if (file_exists($img3)){
              File::delete($img3);
          }
  
          $img4 = public_path('uploads/'.$data->image4);
          if (file_exists($img4)){
              File::delete($img4);
          }
          
          // Delete the database information
          $data->forceDelete();
  
          return redirect()->back()->with('message', 'Delete Successfully');
      } else {
          return redirect()->back()->with('message', 'Delete failed !');
      }
  }
  
  // recycle  
  public function recycle()
  {
      $all = PortfolioImage::onlyTrashed()->where('status', 1)->orderBy('Portfolio_id', 'DESC')->get();
      return view('manage_user.staff.PortfolioImage.recycle', compact('all'));
  }
  
}
