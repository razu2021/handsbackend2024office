<?php

namespace App\Http\Controllers\admin\recycle;

use App\Http\Controllers\Controller;
use App\Models\aboutus;
use Illuminate\Http\Request;

/* - use modal - */
use App\Models\main_menu;
use App\Models\category;
use App\Models\subcategory;
use App\Models\socialmedia;
use App\Models\phone;
use App\Models\email;
use App\Models\address;
use App\Models\allbanner;
use App\Models\allpost;
use App\Models\bannerbottom;
use App\Models\dipositads;
use App\Models\easyloan;
use App\Models\faq;
use App\Models\loansteps;
use App\Models\micro_service;
use App\Models\page_desc;
use App\Models\product;
use App\Models\security_trust;
use App\Models\whatsnew;
use App\Models\serviceOverview;
use App\Models\smeads;
use App\Models\testimonial;
use App\Models\whatwedo;

class recyclebinController extends Controller
{
    //


    public function index(){
        $all=main_menu::onlyTrashed()->where('status',1)->orderBy('menu_id','DESC')->get();
        $category=category::onlyTrashed()->where('status',1)->orderBy('category_id','DESC')->get();
        $subcategory=subcategory::onlyTrashed()->where('status',1)->orderBy('subcategory_id','DESC')->get();
        $socialmedia=socialmedia::onlyTrashed()->where('status',1)->orderBy('social_media_id','DESC')->get();
        $phone=phone::onlyTrashed()->where('status',1)->orderBy('phone_id','DESC')->get();
        $email=email::onlyTrashed()->where('status',1)->orderBy('email_id','DESC')->get();
        $address=address::onlyTrashed()->where('status',1)->orderBy('address_id','DESC')->get();
        $allbanner=allbanner::onlyTrashed()->where('status',1)->orderBy('banner_id','DESC')->get();
        $whtasnew=whatsnew::onlyTrashed()->where('status',1)->orderBy('whatsnew_id','DESC')->get();
        $serviceOver=serviceOverview::onlyTrashed()->where('status',1)->orderBy('soverview_id','DESC')->get();
        $smeads=smeads::onlyTrashed()->where('status',1)->orderBy('smeads_id','DESC')->get();
        $dipositads=dipositads::onlyTrashed()->where('status',1)->orderBy('dipositads_id','DESC')->get();
        $loanstep=loansteps::onlyTrashed()->where('status',1)->orderBy('loanstep_id','DESC')->get();
        $aboutus=aboutus::onlyTrashed()->where('status',1)->orderBy('aboutus_id','DESC')->get();
        $faqs=faq::onlyTrashed()->where('status',1)->orderBy('faqs_id','DESC')->get();
        $whatwedo=whatwedo::onlyTrashed()->where('status',1)->orderBy('whatwedo_id','DESC')->get();
        $security=security_trust::onlyTrashed()->where('status',1)->orderBy('security_trust_id','DESC')->get();
        $easyloan=easyloan::onlyTrashed()->where('status',1)->orderBy('easyloan_id','DESC')->get();
        $testimonial=testimonial::onlyTrashed()->where('status',1)->orderBy('testimonial_id','DESC')->get();
        $microservice=micro_service::onlyTrashed()->where('status',1)->orderBy('micro_service_id','DESC')->get();
        $page_des=page_desc::onlyTrashed()->where('status',1)->orderBy('page_desc_id','DESC')->get();
        $allpost=allpost::onlyTrashed()->where('status',1)->orderBy('allpost_id','DESC')->get();
        $product=product::onlyTrashed()->where('status',1)->orderBy('product_id','DESC')->get();
        $bbottom=bannerbottom::onlyTrashed()->where('status',1)->orderBy('bannerbottom_id','DESC')->get();
     
        
        return view('admin.bin.recycle',compact('all','category','subcategory','socialmedia','phone','email','address','allbanner','serviceOver','whtasnew',
        'smeads','dipositads','loanstep','aboutus','faqs','whatwedo','security','easyloan','testimonial','microservice','page_des','allpost','product',
        'bbottom',
    ));

    }
}
