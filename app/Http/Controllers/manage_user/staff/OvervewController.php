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
use App\Models\AddEducation;
use App\Models\AddworkPlace;
use App\Models\Service;
use App\Models\PortfolioImage;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\DB;
class OvervewController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $id= Auth::user()->id;

        // $alldata = DB::table('users')
        // ->leftJoin('your__profiles', 'users.id', '=', 'your__profiles.user_id')
        // ->leftJoin('add_education', 'users.id', '=', 'add_education.user_id')
        // ->select('users.*', 'your__profiles.*', 'add_education.*')
        // ->where('users.id', $id)  // Specify the table alias for 'user_id'
        // ->where('your__profiles.status', 1)  // Specify the table alias for 'status'
        // ->get();


        $profileinfo=Your_Profile::where('status',1)->where('user_id',$id)->limit('1')->get();
        $education=AddEducation::where('status',1)->where('user_id',$id)->get();
        $education1=AddEducation::where('status',1)->where('user_id',$id)->orderBy('education_id','asc')->limit('1')->get();
        $workplace=AddworkPlace::where('status',1)->where('user_id',$id)->get();
        $service=Service::where('status',1)->where('user_id',$id)->get();
        $portfolio=PortfolioImage::where('status',1)->where('user_id',$id)->get();


        




      
       // dd($education1);
        
        return view('manage_user.staff.overview.index',compact('profileinfo','education','education1','workplace','service','portfolio'));
    }







}
