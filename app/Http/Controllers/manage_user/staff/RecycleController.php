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
use App\Models\Your_Profile;
use App\Models\AddworkPlace;
use App\Models\Service;
use App\Models\BasicInfo;
use Carbon\Carbon;
use Image;

class RecycleController extends Controller
{
    //










    public function recycle(){
        $all = PortfolioImage::onlyTrashed()->where('status', 1)->orderBy('Portfolio_id', 'DESC')->get();
        $education=AddEducation::onlyTrashed()->where('status',1)->orderBy('education_id','DESC')->get();
        $profileupdate=Your_Profile::onlyTrashed()->where('status',1)->orderBy('Creator_id','DESC')->get();
        $workplace=AddworkPlace::onlyTrashed()->where('status',1)->orderBy('Creator_id','DESC')->get();
        $services=Service::onlyTrashed()->where('status',1)->orderBy('Service_id','DESC')->get();
        $basicinfo=BasicInfo::onlyTrashed()->where('status',1)->orderBy('Creator_id','DESC')->get();

        return view('manage_user.staff.recycle.recycle',compact('all','education','profileupdate','workplace','services','basicinfo'));
    }


}
