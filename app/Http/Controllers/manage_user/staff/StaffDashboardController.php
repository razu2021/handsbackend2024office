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
use App\Models\PortfolioImage;
use App\Models\AddEducation;
use App\Models\work_statuse;
use Carbon\Carbon;



class StaffDashboardController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('manage_user.staff.index');
    }


    // all Threads is here 
    public function all_threads(){
        $allthreads = work_statuse::where('post_status',1)->get();


        return view('manage_user.staff.all_threads.index',compact('allthreads'));
    }

















    public function recycle(){
        $all = PortfolioImage::onlyTrashed()->where('status', 1)->orderBy('Portfolio_id', 'DESC')->get();
        $education=AddEducation::onlyTrashed()->where('status',1)->orderBy('Creator_id','DESC')->get();

        return view('manage_user.staff.recycle.recycle',compact('all','education'));
    }




}
