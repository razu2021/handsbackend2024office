<?php
namespace App\Http\Controllers\website\manage_application;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\main_menu;
use Carbon\Carbon;

class mainmenuController extends Controller
{ //// constructor auth 
        public function __construct(){
            $this->middleware('auth');
        }
        public function index(Request $request){
          $id= Auth::guard('admin')->user()->id;
          $search = $request['search'] ?? "";
             if($search !=""){
               $all= main_menu::where('status',1)->where('menu_title', 'LIKE', "%$search%")->orwhere('menu_name','LIKE',"%$search%")->orwhere('menu_url','LIKE',"%$search%")->paginate(5);
             }
             else{
               $all = main_menu::where('status', 1)->orderBy('menu_id', 'ASC')->paginate(5);
             }
            $totalpost = main_menu::count();
            return view('admin.manage_application.mainmenu.index',compact('all','search','totalpost'));
        }
        public function add(){
            return view('admin.manage_application.mainmenu.add');
        }
        /* ------  this is edit page --------*/
        public function edit($slug){
          $id= Auth::guard('admin')->user()->id;
          $data=main_menu::where('status',1)->where('slug',$slug)->firstOrFail();
            return view('admin.manage_application.mainmenu.edit',compact('data'));
          }
          /* ------  this is view page --------*/
          public function view($slug){
            $data=main_menu::where('status',1)->where('slug',$slug)->firstOrFail();
            return view('admin.manage_application.mainmenu.view',compact('data'));
          }
        /* ------  this is submit or insert page --------*/
          public function insert(Request $request){

            $request->validate([
                'menu_name' => 'required',
                'menu_url' => ['required','string','max:120','unique:'.main_menu::class,'regex:/^[a-z0-9\/-]+$/'],
            ],
                [
                    'menu_name.required' => 'The menu name is required.',
                    'menu_url.required' => 'The menu URL is required.',
                    'menu_url.string' => 'The menu URL must be a string.',
                    'menu_url.max' => 'The menu URL must not exceed 120 characters.',
                    'menu_url.unique' => 'The menu URL has already been taken.',
                    'menu_url.regex' => 'The menu URL must only contain lowercase letters, numbers, and dashes (-).',
                ]
            );
              $slug='admin'.uniqid('20');
              $creator=Auth::guard('admin')->user()->id;
              $app_url= config('app.url');
              $insert=main_menu::insertGetId([
                'menu_title'=>$request['menu_title'],
                'menu_name'=>$request['menu_name'],
                'menu_url'=>$request['menu_url'],
                'app_urls'=>$app_url.$request['menu_url'],
                'order_by'=>$request['set_position'] + 1,
                'slug'=>$slug,
                'creator'=>$creator,
                'created_at'=>Carbon::now()->toDateTimeString(),
              ]);
          
              // *********
              if ($insert) {
                Session::flash('success','value');
                return redirect('admin/dashboard/manage-application/main-menu/add')->with('message',' Information Added successful !');
            } else {
                Session::flash('error','value');
                return redirect('admin/dashboard/manage-application/main-menu/add')->with('error',' Information Added Failed !');
            }
          }
        
          /* ------  this is update page --------*/
          public function update(Request $request){
            $request->validate([
              'menu_name' => 'required',
              'menu_url' => ['required','string','max:120','unique:'.main_menu::class,'regex:/^[a-z0-9-]+$/'],
          ],
              [
                  'menu_name.required' => 'The menu name is required.',
                  'menu_url.required' => 'The menu URL is required.',
                  'menu_url.string' => 'The menu URL must be a string.',
                  'menu_url.max' => 'The menu URL must not exceed 120 characters.',
                  'menu_url.unique' => 'The menu URL has already been taken.',
                  'menu_url.regex' => 'The menu URL must only contain lowercase letters, numbers, and dashes (-).',
              ]
          );
            $id=$request['id'];
            $admin_id=$request['admin_id'];
            $slug=$request['slug'];
            $editor = Auth::guard('admin')->user()->id;
            $update=main_menu::where('status',1)->where('menu_id',$id)->where('slug',$slug)->update([
              'menu_title'=>$request['menu_title'],
              'menu_name'=>$request['menu_name'],
              'menu_url'=>$request['menu_url'],
              // 'order_by'=>$request['set_position'] + 1,
              'editor'=>$editor,
              'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
            if($update){
              Session::flash('success','value');
              return redirect('admin/dashboard/manage-application/main-menu/view/'.$slug);
            }else{
              Session::flash('error','value');
              return redirect('admin/dashboard/manage-application/main-menu/view/'.$slug)->with('message','Information Update Failed !');
            }
          }
          /*-------  post active ---*/
          public function post_active($id){
            $softdelete=main_menu::where('post_status',2)->where('menu_id',$id)->update([
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
          public function post_deactive($id){
            $softdelete=main_menu::where('post_status',1)->where('menu_id',$id)->update([
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
            $post =main_menu::where('menu_id',$id);
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
            $post =main_menu::withTrashed()->where('menu_id',$id);
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
        $data = main_menu::onlyTrashed()->where('menu_id', $id)->first();
    
        if ($data) {
            // Delete the first image
            $profileimage = public_path('uploads/' . $data->profile_image);
            if (file_exists($profileimage)) {
                File::delete($profileimage);
            }
    
            // Delete the second image
            $coverphoto = public_path('uploads/' . $data->ban_image);
            if (file_exists($coverphoto)){
                File::delete($coverphoto);
            }
    
            // Delete the database information
            main_menu::where('menu_id', $id)->forceDelete();
    
            return redirect()->back()->with('message', 'Delete Successfuly');
        } else {
          return redirect()->back()->with('message', 'Delete failed !');
        }
        }

}
