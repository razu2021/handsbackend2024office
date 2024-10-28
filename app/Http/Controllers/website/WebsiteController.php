<?php

namespace App\Http\Controllers\website;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\aboutus;
use App\Models\allabout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
/*----------  use model -----*/
use App\Models\allbanner;
use App\Models\allpost;
use App\Models\allprojects;
use App\Models\allstaff;
use App\Models\apply_course;
use App\Models\applyloan;
use App\Models\appoinment_book;
use App\Models\bannerbottom;
use App\Models\becomevolunteer;
use App\Models\branch;
use App\Models\contactform;
use App\Models\course;
use App\Models\customer;
use App\Models\designation;
use App\Models\dipositads;
use App\Models\doctors;
use App\Models\easyloan;
use App\Models\email;
use App\Models\faq;
use App\Models\field_storise;
use App\Models\fstatement;
use App\Models\jobpost;
use App\Models\testimonial;
use App\Models\loansteps;
use App\Models\makeDonation;
use App\Models\member_donner;
use App\Models\micro_service;
use App\Models\notice;
use App\Models\ourimpact;
use App\Models\page_desc;
use App\Models\phone;
use App\Models\photo_gallery;
use App\Models\product;
use App\Models\security_trust;
use App\Models\whatsnew;
use App\Models\serviceOverview;
use App\Models\slogan;
use App\Models\smeads;
use App\Models\socialmediaurl;
use App\Models\strategy;
use App\Models\video_gallery;
use App\Models\whatwedo;
use App\Models\whaydonate;
use Illuminate\Support\Facades\DB;

/*-----------  end  model -----*/

class WebsiteController extends Controller
{
    // index page 
    public function index(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','index_page')->get();
        $bannerbg= allbanner::where('post_status',1)->where('page_unique_name','index_page')->limit(1)->get();
        $whatsnew= whatsnew::where('post_status',1)->orderby('whatsnew_id','ASC')->get();
        $whatsnew_heading= whatsnew::where('post_status',1)->orderby('whatsnew_id','ASC')->limit(1)->get();
        $serviceoverview= serviceOverview::where('post_status',1)->orderby('soverview_id','ASC')->get();
        $service_heading= serviceOverview::where('post_status',1)->orderby('soverview_id','ASC')->limit(1)->get();
        $smeads= smeads::where('post_status',1)->orderby('smeads_id','ASC')->limit(1)->get();
        $dipositads= dipositads::where('post_status',1)->orderby('dipositads_id','ASC')->limit(1)->get();
        $loanstep= loansteps::where('post_status',1)->orderby('loanstep_id','ASC')->get();
        $faqs= faq::where('post_status',1)->orderby('faqs_id','ASC')->limit(5)->get();
        //dd($banner);
        return view('website.index',compact('banner','bannerbg','whatsnew','whatsnew_heading','serviceoverview','service_heading','smeads','dipositads','loanstep','faqs'));
    }
   /*------- about page and linked page -------*/ 
    public function about_us(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','about_us_page')->limit(1)->get();
        $aboutus= aboutus::where('post_status',1)->orderby('aboutus_id','ASC')->limit(1)->get();
        $whatwedo= whatwedo::where('post_status',1)->orderby('whatwedo_id','ASC')->limit(4)->get();
        $whatwedo_head= whatwedo::where('post_status',1)->orderby('whatwedo_id','ASC')->limit(1)->get();
        $security= security_trust::where('post_status',1)->orderby('security_trust_id','ASC')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','organization_slogan')->limit(1)->get();
        $customer = customer::where('post_status',1)->orderby('customer_id','DESC')->limit(15)->get();
        $easyloan = easyloan::where('post_status',1)->get();
        $customercount = customer::count();
        $member = member_donner::where('post_status',1)->orderby('member_donner_id','DESC')->limit(12)->get();
        $testi = testimonial::where('post_status',1)->get();
        return view('website.pages.about_us',compact('banner','aboutus','whatwedo','whatwedo_head','security','member','slogan','testi','customer','customercount','easyloan'));
    }
    // testimonial form 
    public function testi_insert(Request $request){
        $request->validate([
          'name' => 'required',
          'caption' => 'required',
      ],
          [
            'name.required' => ' Name is Required.',
            'caption.required' => 'caption  is Required.',
          ]
      );
      $slug='user'.uniqid('20');
      $insert=testimonial::insertGetId([
        'heading'=>$request['heading'],
        'name'=>$request['name'],
        'organization_name'=>$request['organization_name'],
        'caption'=>$request['caption'],
        'slug'=>$slug,
        'creator'=>$request['name'],
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);
      /*------- image start here ------ */
      // bg image 
      $request->validate([
        'service_image' => 'required|mimes:jpeg,jpg,png,gif,avi,webp|max:5120', // Adjust file types and max size as needed
     ],
         [
             'service_image.required' => 'Profile Image is Required!',     
         ]
     );
      if($request->hasFile('service_image')){
        $image=$request->file('service_image');
        $imageName=rand(10000,9999999).'_'.'user_profile'.$insert.'-'.time().'.webp'; // .$image->getClientOriginalExtension()   ... replace webp
        Image::make($image)->fit(370, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('webp', 90)->save('uploads/website/'.$imageName);
        testimonial::where('testimonial_id',$insert)->update([
          'service_image'=>$imageName,
        ]);
      }
    /*------- image inset end here ------ */
      // *********
      if ($insert) {
        Session::flash('success','value');
        return redirect()->back()->with('message',' Information Added successful !');
    } else {
        Session::flash('error','value');
        return redirect()->back()->with('error',' Information Added Failed !');
    }
  }
//   testimonial end here 

    public function organizetional_structure(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','organizetional_structure_page')->limit(1)->get();
        $ececutive = allstaff::where('post_status',1)->where('category_as','Executive_Leadership')->limit(4)->get();
        $ganarelbody = allstaff::where('post_status',1)->where('category_as','Management_and_Program_Leadership')->limit(4)->get();
        $serial = allstaff::where('post_status',1)->orderby('senior_official','ASC')->get(); 
        return view('website.pages.organizetional_structure',compact('banner','ececutive','ganarelbody','serial'));
    }
    public function staff_details($slug){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','sataff_details_page')->limit(1)->get();
        $data = allstaff::where('post_status',1)->where('slug',$slug)->firstOrFail();
        return view('website.pages.sataff_details',compact('data'));
    }
    public function chairmam(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','chairman_page')->limit(1)->get();
        $chairman = allstaff::where('post_status',1)->where('designation','CEO')->get();
        return view('website.pages.chairman',compact('banner','chairman'));
    }
    public function managing_director(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','maneging_director_page')->limit(1)->get();
        $chairman = allstaff::where('post_status',1)->where('designation','managing director')->get();
        return view('website.pages.maneging_director',compact('banner','chairman'));
    }
    public function finance_directore(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','finance_director_page')->limit(1)->get();
        $chairman = allstaff::where('post_status',1)->where('designation','Finance Director')->get();
        return view('website.pages.finance_director',compact('banner','chairman'));
    }
    public function financial_statement(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','financial_statement_page')->limit(1)->get();
        $annualreport = fstatement::where('post_status',1)->where('report_type','annual_report')->get();
        $short = fstatement::where('post_status',1)->where('report_type','monthly_report')->get();
        $half = fstatement::where('post_status',1)->where('report_type','half_year_report')->get();
        return view('website.pages.financial_statement',compact('banner','annualreport','short','half'));
    }
    public function where_we_work(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','where_we_work_page')->limit(1)->get();
        $branchh = branch::where('post_status',1)->orderby('branch_id','ASC')->limit(1)->get();
        $whatwedo_head= whatwedo::where('post_status',1)->orderby('whatwedo_id','ASC')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','organization_slogan')->limit(1)->get();
        $makedonation= slogan::where('post_status',1)->where('set_as','donation_slogan')->limit(1)->get();
       
        $lastproject= allprojects::where('post_status',1)->orderby('allprojects_id','DESC')->limit(16)->get();
        $branch = branch::where('post_status',1)->get();
        return view('website.pages.where_we_work',compact('banner','branch','branchh','whatwedo_head','slogan','makedonation','lastproject'));
    }
    public function our_stratiegy(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','strategy_page')->limit(1)->get();
        $allstrategy =strategy::where('post_status',1)->paginate(8);
        return view('website.pages.strategy',compact('allstrategy','banner'));
    }
    public function strategy_details($slug){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','strategy_details_page')->limit(1)->get();
        $data =strategy::where('post_status',1)->where('slug',$slug)->firstOrFail();
        return view('website.pages.strategy_details',compact('data','banner'));
    }
    public function mission_vision(){
        $about = allabout::where('post_status',1)->where('category_as','about_mission')->limit(1)->get();
        $banner= allbanner::where('post_status',1)->where('page_unique_name','mission_vision_page')->limit(1)->get();
     
        return view('website.pages.mission_vision',compact('about','banner'));
    }
    public function our_faith(){
        $about = allabout::where('post_status',1)->where('category_as','about_faith')->limit(1)->get();
        $banner= allbanner::where('post_status',1)->where('page_unique_name','faith_page')->limit(1)->get();
        return view('website.pages.faith',compact('about','banner'));
    }
   /*------- what we do page and linked page -------*/ 
   public function what_we_do(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','what_we_do_page')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','organization_slogan')->limit(1)->get();
        $seving = micro_service::where('post_status',1)->where('category_as','seving_service')->get();
        $micro = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
        $legal = micro_service::where('post_status',1)->where('category_as','legal_aid')->get();
        $desc= page_desc::where('post_status',1)->where('category_as',' what_we_do')->limit(1)->get();
        $lastproject= allprojects::where('post_status',1)->orderby('allprojects_id','DESC')->limit(11)->get();
        return view('website.pages.what_we_do',compact('banner','micro','legal','lastproject','seving','slogan','desc'));
   }
   public function micro_finance(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','micro_finance_Page')->limit(1)->get();
    $desc= page_desc::where('post_status',1)->where('category_as','micro_finace')->limit(1)->get();
    $allservice = micro_service::where('post_status',1)->where('category_as','micro_finance')->paginate(4);
    $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
    $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->limit(4)->get();
        return view('website.pages.micro_finance',compact('banner','desc','allservice','servicelist','sevinglist'));
   }
   public function basic_loan(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','basic_loan_Page')->limit(1)->get();
    $servicedetails = micro_service::where('post_status',1)->where('category_as','micro_finance')->where('unique_name','basic_loan')->get();
    $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
    $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->limit(4)->get();
        return view('website.pages.basic_loan',compact('banner','servicelist','sevinglist','servicedetails'));
   }
   public function microenterpris_loan(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','micro_enterprice_loan_Page')->limit(1)->get();
    $servicedetails = micro_service::where('post_status',1)->where('category_as','micro_finance')->where('unique_name','microenterprice_loan')->get();
    $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
    $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->limit(4)->get();
        return view('website.pages.micro_enterprice_loan',compact('banner','servicelist','sevinglist','servicedetails'));
   }
   public function crop_loan(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','crop_loan_page')->limit(1)->get();
    $servicedetails = micro_service::where('post_status',1)->where('category_as','micro_finance')->where('unique_name','crop_loan')->get();
    $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
    $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->limit(4)->get();
        return view('website.pages.crop_loan',compact('banner','servicelist','sevinglist','servicedetails'));
   }
   public function livestock_loan(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','livestock_loan_page')->limit(1)->get();
    $servicedetails = micro_service::where('post_status',1)->where('category_as','micro_finance')->where('unique_name','livestock_loan')->get();
    $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
    $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->limit(4)->get();
        return view('website.pages.livestock_loan',compact('banner','servicelist','sevinglist','servicedetails'));
   }
   public function special_loan(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','special_loan_page')->limit(1)->get();
    $servicedetails = micro_service::where('post_status',1)->where('category_as','micro_finance')->where('unique_name','special_loan')->get();
    $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
    $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->limit(4)->get();
        return view('website.pages.special_loan',compact('banner','servicelist','sevinglist','servicedetails'));
   }
   public function house_loan(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','house_loan_page')->limit(1)->get();
    $servicedetails = micro_service::where('post_status',1)->where('category_as','micro_finance')->where('unique_name','house_loan')->get();
    $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
    $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->limit(4)->get();
        return view('website.pages.house_loan',compact('banner','servicelist','sevinglist','servicedetails'));
   }
   public function agriculture_loan(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','agriculture_loan_page')->limit(1)->get();
    $servicedetails = micro_service::where('post_status',1)->where('category_as','micro_finance')->where('unique_name','agriculture_loan')->get();
    $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
    $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->limit(4)->get();
        return view('website.pages.agriculture_loan',compact('banner','servicelist','sevinglist','servicedetails'));
   }
   public function higher_education(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','higher_education_loan_page')->limit(1)->get();
    $servicedetails = micro_service::where('post_status',1)->where('category_as','micro_finance')->where('unique_name','higher_education_loan')->get();
    $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
    $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->limit(4)->get();
        return view('website.pages.higher_education_loan',compact('banner','servicelist','sevinglist','servicedetails'));
   }
   public function woman_empowerment(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','woman_empowerment_page')->limit(1)->get();
    $servicedetails = micro_service::where('post_status',1)->where('category_as','micro_finance')->where('unique_name','woman_empowerment_loan')->get();
    $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
    $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->limit(4)->get();
        return view('website.pages.woman_empowerment',compact('banner','servicelist','sevinglist','servicedetails'));
   }
/*------- saving account page and linked page ---- */

    public function saving_ac_plan(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','saving_page')->limit(1)->get();
        $desc= page_desc::where('post_status',1)->where('category_as','sevings_service')->limit(1)->get();
        $allservice = micro_service::where('post_status',1)->where('category_as','seving_service')->paginate(4);
        $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->limit(4)->get();
        $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->get();
        return view('website.pages.saving',compact('banner','desc','allservice','servicelist','sevinglist'));
    }
    public function hands_pension_scheme(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','hands_pension_scheme_page')->limit(1)->get();
        $servicedetails = micro_service::where('post_status',1)->where('category_as','seving_service')->where('unique_name','hands_pension_scheme')->get();
        $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->limit(4)->get();
        $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->get();
        return view('website.pages.hands_pension_scheme',compact('banner','servicelist','sevinglist','servicedetails'));
    }
    public function fixed_diposit(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','fixed_deposit_Page')->limit(1)->get();
        $servicedetails = micro_service::where('post_status',1)->where('category_as','seving_service')->where('unique_name','fixed_dipsit_plan')->get();
        $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->limit(4)->get();
        $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->get();
        return view('website.pages.fixed_deposit',compact('banner','servicelist','sevinglist','servicedetails'));
    }
    public function diposit_limit(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','loan_limit_page')->limit(1)->get();
        $servicedetails = micro_service::where('post_status',1)->where('category_as','seving_service')->where('unique_name','dubble_and_8years_diposit')->get();
        $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->limit(4)->get();
        $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->get();
        return view('website.pages.loan_limit',compact('banner','servicelist','sevinglist','servicedetails'));
    }
    public function family_saving(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','family_saving_account_page')->limit(1)->get();
        $servicedetails = micro_service::where('post_status',1)->where('category_as','seving_service')->where('unique_name','family_welfair_saving_plan')->get();
        $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->limit(4)->get();
        $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->get();
        return view('website.pages.family_saving_account',compact('banner','servicelist','sevinglist','servicedetails'));
    }
    public function two_years_saving(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','two_years_saving_page')->limit(1)->get();
        $servicedetails = micro_service::where('post_status',1)->where('category_as','seving_service')->where('unique_name','two_years_saving')->get();
        $servicelist = micro_service::where('post_status',1)->where('category_as','micro_finance')->limit(4)->get();
        $sevinglist = micro_service::where('post_status',1)->where('category_as','seving_service')->get();
        return view('website.pages.two_years_saving',compact('banner','servicelist','sevinglist','servicedetails'));
    }
    public function economic_development(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','economic_development_page')->limit(1)->get();
        $desc= page_desc::where('post_status',1)->where('category_as', 'economic_development')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','donation_slogan')->get();
        $post = allpost::where('post_status',1)->where('category_as','economic_development')->get();
        $bannerbt =bannerbottom::where('post_status',1)->where('category_as','economic_development')->limit(1)->get();
        return view('website.pages.economic_development',compact('banner','desc','slogan','post','bannerbt'));
    }
    public function emergency_relif(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','emergency_relife_page')->limit(1)->get();
        $desc= page_desc::where('post_status',1)->where('category_as', 'emergency_relief')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','donation_slogan')->get();
        $post = allpost::where('post_status',1)->where('category_as','emergency_relife')->get();
        $bannerbt =bannerbottom::where('post_status',1)->where('category_as','emergency_relife')->limit(1)->get();
        return view('website.pages.emergency_relife',compact('banner','desc','slogan','post','bannerbt'));
    }
    public function child_protection(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','child_protection_page')->get();
        $whydonateh = whaydonate::where('post_status',1)->limit(1)->get();
        $whydonate = whaydonate::where('post_status',1)->limit(4)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','donation_slogan')->get();
        $post = allpost::where('post_status',1)->where('category_as','child_protection')->get();
        $totaldonner= member_donner::count();
        $totalprojects= allprojects::count();
        $people = allprojects::sum('people');
        $cost = allprojects::sum('cost');
        $lastproject= allprojects::where('post_status',1)->orderby('allprojects_id','DESC')->limit(4)->get();
        $upcoming= allprojects::where('post_status',1)->where('pro_status','upcooming')->limit(3)->get();
        return view('website.pages.child_protection',compact('banner','whydonateh','whydonate','slogan','post','totaldonner','totalprojects','people','cost','lastproject','upcoming'));
    }



    public function education_program(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','education_page')->limit(1)->get();
        $desc= page_desc::where('post_status',1)->where('category_as', 'education')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','donation_slogan')->get();
        $post = allpost::where('post_status',1)->where('category_as','education')->get();
        $bannerbt =bannerbottom::where('post_status',1)->where('category_as','education')->limit(1)->get();
        return view('website.pages.education',compact('banner','desc','slogan','post','bannerbt'));
    }
    public function health_nutrition(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','heath_nutrition_page')->limit(1)->get();
        $desc= page_desc::where('post_status',1)->where('category_as', 'health_nutrition')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','donation_slogan')->get();
        $post = allpost::where('post_status',1)->where('category_as','health_and_nutrition')->get();
        $bannerbt =bannerbottom::where('post_status',1)->where('category_as','health_and_nutrition')->limit(1)->get();
        return view('website.pages.heath_nutrition',compact('banner','desc','slogan','post','bannerbt'));
    }
    public function water_hygiene(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','water_hygiene_page')->limit(1)->get();
        $desc= page_desc::where('post_status',1)->where('category_as', 'water_sanitaion')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','donation_slogan')->get();
        $post = allpost::where('post_status',1)->where('category_as','water_sanitaion')->get();
        $bannerbt =bannerbottom::where('post_status',1)->where('category_as','water_sanitaion')->limit(1)->get();
        return view('website.pages.water_hygiene',compact('banner','desc','slogan','post','bannerbt'));
    }
/*------- legal aid and other ----- */
    public function legal_aid(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','legal_aid_Page')->limit(1)->get();
        $allservice = micro_service::where('post_status',1)->where('category_as','legal_aid')->paginate(8);
        return view('website.pages.legal_aid',compact('banner','allservice'));
    }
    public function awareness(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','awareness_page')->limit(1)->get();
        $allservice = micro_service::where('post_status',1)->where('category_as','legal_aid')->where('unique_name','awareness_and_training')->limit(1)->get();
        return view('website.pages.awareness',compact('banner','allservice'));
    }
    public function mediation(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','mediation_page')->limit(1)->get();
        $allservice = micro_service::where('post_status',1)->where('category_as','legal_aid')->where('unique_name','mediation')->limit(1)->get();
        return view('website.pages.mediation',compact('banner','allservice'));
    }
    public function pil(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','pil_page')->limit(1)->get();
        $allservice = micro_service::where('post_status',1)->where('category_as','legal_aid')->where('unique_name','public_interest_litigation')->limit(1)->get();
        return view('website.pages.pil',compact('banner','allservice'));
    }
    public function litigation(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','pil_page')->limit(1)->get();
        $allservice = micro_service::where('post_status',1)->where('category_as','legal_aid')->where('unique_name','public_interest_litigation')->limit(1)->get();
        return view('website.pages.litigation',compact('banner','allservice'));      
    }
    /*----- gallery and others----- */
    public function gallery(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','gallery_page')->limit(1)->get();
        return view('website.pages.gallery',compact('banner'));
    }
    public function video_gallery(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','video_page')->limit(1)->get();
        $video = video_gallery::where('post_status',1)->get();
        return view('website.pages.video',compact('banner','video'));
    }
    public function photo_gallery(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','photo_page')->limit(1)->get();
        $photo = photo_gallery::where('post_status',1)->get();
        return view('website.pages.photo',compact('banner','photo'));
    }
    public function field_storis(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','feild_strois_page')->limit(1)->get();
        $story = field_storise::where('post_status',1)->get();
        return view('website.pages.feild_strois',compact('banner','story'));
    }
/* ------blog and news ---*/
    public function news(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','news_page')->limit(1)->get();
        $news = allpost::where('post_status',1)->where('category_as','news_feeds')->get();
        return view('website.pages.news',compact('banner','news'));
    } 



    public function hands_blogs(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','all_blog_page')->limit(1)->get();
        $news = allpost::where('post_status',1)->where('category_as','news_feeds')->limit(3)->get();
        $blog = allpost::where('post_status',1)->where('category_as','blog_event')->limit(3)->get();
        $others = allpost::where('post_status',1)->where('category_as','other_activitis')->limit(3)->get();
        return view('website.pages.all_blog',compact('banner','news','blog','others'));
    }

    public function hands_events(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','all_events_page')->limit(1)->get();
        $blog = allpost::where('post_status',1)->where('category_as','blog_event')->get();
        return view('website.pages.all_events',compact('banner','blog'));
    }


    public function all_projects(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','all_projects_page')->get();
        $allprojects = allprojects::where('post_status',1)->orderby('allprojects_id','DESC')->get();
        return view('website.pages.all_projects',compact('banner','allprojects'));
    }
    public function all_projects_details($slug){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','all_projects_details_page')->get();
        $product = product::where('post_status',1)->orderby('product_id','DESC')->limit(4)->get();
        $data = allprojects::where('post_status',1)->where('slug',$slug)->firstOrFail();
        return view('website.pages.all_projects_details',compact('banner','data','product'));
    }

    public function post_details($slug){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','post_details_page')->get();
        $product = product::where('post_status',1)->orderby('product_id','DESC')->limit(4)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','organization_slogan')->limit(1)->get();
        $post = allpost::where('post_status',1)->where('slug',$slug)->firstOrFail();
        
        return view('website.pages.post_details',compact('banner','post','product','slogan'));
    }


/* ------ get involved  ---*/
    public function get_involved(){
        return view('website.pages.involved_involved');
    }
    public function volunteer(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','volunteer_page')->limit(1)->get();
        $successful = allprojects::where('post_status',1)->where('pro_status','successfull')->count();
        $running = allprojects::where('post_status',1)->where('pro_status','running')->count();
        $upcoming = allprojects::where('post_status',1)->where('pro_status','upcooming')->count();
        $aboutvolunteer = allabout::where('post_status',1)->where('category_as','about_volunteer')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Volunteer_and')->paginate(6);
        return view('website.pages.volunteer',compact('banner','successful','running','upcoming','aboutvolunteer','staff'));
    }
    public function becoome_volunteer(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','become_a_volunteer_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Volunteer_and')->get();
        return view('website.pages.become_a_volunteer',compact('banner','staff'));
    }
    public function volunteer_application(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'subject' => 'required',
        ],
        [
            'name.required' => '  Name is Required.',
            'email.required' => ' Email is Required.',
            'phone.required' => ' Phone Number is Required.',
            'address.required' => ' Address is Required.',
            'subject.required' => ' Purpose is Required.',
        ]
        );
        $slug=uniqid('20');
        $insert=becomevolunteer::insertGetId([
          'name'=>$request['name'],
          'email'=>$request['email'],
          'phone'=>$request['phone'],
          'address'=>$request['address'],
          'subject'=>$request['subject'],
          'caption'=>$request['caption'],
          'slug'=>$slug,
          'creator'=>$request['name'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
          if ($insert) {
            Session::flash('success','value');
            return redirect()->back()->with('message',' Application Submit successful !');
        } else {
            Session::flash('error','value');
            return redirect()->back()->with('error',' Application Submit Failed !');
        }
      }
// become a volunteer end 
        public function volunteer_details($slug){
            $banner= allbanner::where('post_status',1)->where('page_unique_name','volunteer_details_page')->get();
            $data= allstaff::where('post_status',1)->where('slug',$slug)->firstOrFail();
            return view('website.pages.volunteer_details',compact('banner','data'));
        }
    public function others_program(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','others_program_page')->get();
        $bannerh= allbanner::where('post_status',1)->where('page_unique_name','others_program_page')->limit(1)->get();
        $post= allpost::where('post_status',1)->where('category_as','other_activitis')->get();
        return view('website.pages.others_program',compact('bannerh','banner','post'));
    }
    public function valueable_donner(Request $request){
        $search = $request['search'] ?? "";
        if($search !=""){
          $donner= member_donner::where('status',1)->where('name', 'LIKE', "%$search%")->orwhere('or_name','LIKE',"%$search%")->orwhere('phone','LIKE',"%$search%")
          ->get();
        }
        else{
            $donner = member_donner::where('post_status',1)->orderby('member_donner_id','DESC')->paginate(10);
        }
        $banner= allbanner::where('post_status',1)->where('page_unique_name','valueable_donner_page')->get();
        $lastproject =allprojects::where('post_status',1)->where('pro_status','successfull')->orderby('allprojects_id','DESC')->limit(5)->get();
        $totalsuccess =allprojects::where('pro_status','successfull')->count();
        $totalrunning = allprojects::where('pro_status','running')->count();
        $totalupcoming = allprojects::where('pro_status','upcooming')->count();
        $people = allprojects::sum('people');
        $raised = allprojects::sum('target_amount');
        $cost = allprojects::sum('cost');
        $totaldonner = member_donner::count();
        $totalprojetc = allprojects::count();
        return view('website.pages.valueable_donner',compact('banner','donner','lastproject','totaldonner','totalprojetc','totalsuccess','totalrunning','totalupcoming','people','raised','cost'));
    }
    public function product(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','product_page')->get();
        $bannerh= allbanner::where('post_status',1)->where('page_unique_name','product_page')->limit(1)->get();
        $product= product::where('post_status',1)->paginate(4);
        $desc= page_desc::where('post_status',1)->where('category_as', 'products')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','organization_slogan')->get();
        $aboutproduct = allabout::where('post_status',1)->where('category_as','about_product')->limit(1)->get();
        return view('website.pages.product',compact('banner','desc','slogan','product','bannerh','aboutproduct'));
    }
    public function free_health(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','health_campaign_page')->get();
        $about = allabout::where('post_status',1)->where('category_as','about_health')->limit(1)->get();
        $doctor = doctors::where('post_status',1)->orderby('doctors_id','DESC')->limit(4)->get();
        $desc= page_desc::where('post_status',1)->where('category_as', 'health_campaign')->limit(1)->get();
        $allprojects =allprojects::where('post_status',1)->where('category_as','health_campaign')->count();
        $upcoming =allprojects::where('post_status',1)->where('category_as','health_campaign')->where('pro_status','upcooming')->count();
        $people = allprojects::where('category_as','health_campaign')->sum('people');
        $doctorcount = doctors::count();
        
    return view('website.pages.health_campaign',compact('banner','about','doctor','desc','allprojects','upcoming','people','doctorcount'));
    }
    public function our_impact(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','our_impact_page')->get();
        $allprojects =allprojects::where('post_status',1)->where('pro_status','successfull')->orderby('allprojects_id','DESC')->get();
        $allimpact = ourimpact::where('post_status',1)->get();
        return view('website.pages.our_impact',compact('allimpact','allprojects','banner'));
    }
    /*----  our team-------- */
    public function team_details($slug){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','team_details.blade_page')->limit(1)->get();
        $data= allstaff::where('post_status',1)->where('slug',$slug)->firstOrFail();
        return view('website.pages.team_details',compact('data'));
    }
    public function administrative_support(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','administrative_support_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Administrative_and_Support_Roles')->get();
        return view('website.pages.administrative_support',compact('banner','staff'));
    }
    public function management_program(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','management_program_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Management_and_Program_Leadership')->get();
        return view('website.pages.management_program',compact('banner','staff'));
    }
    public function finance_credit(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','finance_credit_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Finance_and_Credit_Roles')->get();
        return view('website.pages.finance_credit',compact('banner','staff'));
    }
    public function research_development(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','research_development_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Research_and_Development')->get();
        return view('website.pages.research_development',compact('banner','staff'));
    }
    public function legal_comliance(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','legal_comliance_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Legal_and_Compliance_Roles')->get();
        return view('website.pages.legal_comliance',compact('banner','staff'));
    }
    public function marketing_outreach(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','marketing_outreach_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Marketing_and_Outreach')->get();
        return view('website.pages.marketing_outreach',compact('banner','staff'));
    }
    public function monitoring_evaluation(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','monitoring_evaluation_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Monitoring_Evaluation')->get();
        return view('website.pages.monitoring_evaluation',compact('banner','staff'));
    }
    public function field_staff(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','field_staff_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Field_Level_Staff')->get();
        return view('website.pages.field_staff',compact('banner','staff'));
    }
    public function technology_innovation(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','technology_innovation_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Technology_and_Innovation_Roles')->get();
        return view('website.pages.technology_innovation',compact('banner','staff'));
    }
    public function trainig_capacity(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','trainig_capacity_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Training_and_Capacity_Building')->get();
        return view('website.pages.trainig_capacity',compact('banner','staff'));
    }
    public function intern_position(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','intern_position_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','Intern_Positions')->get();
        return view('website.pages.intern_position',compact('banner','staff'));
    }
    public function consultant_other(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','consultant_other_page')->limit(1)->get();
        $staff= allstaff::where('post_status',1)->where('category_as','consultant_other')->get();
        return view('website.pages.consultant_other',compact('banner','staff'));
    }
/*------  othes page and linked  */

    public function internship(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','internship_oppertunity_page')->get();
        $bannerbt =bannerbottom::where('post_status',1)->where('category_as','internship')->limit(1)->get();
        $desc= page_desc::where('post_status',1)->where('category_as', 'internship')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','organization_slogan')->get();
        $course= course::where('post_status',1)->get();
        return view('website.pages.internship_oppertunity',compact('banner','desc','course','slogan','bannerbt'));
    }
    public function course($slug){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','training_details_page')->get();
        $data = course::where('post_status',1)->where('slug',$slug)->firstOrFail();
        $course= course::where('post_status',1)->get(); 
        $items = course::where('post_status',1)->where('slug', $slug)->pluck('course_title'); // itmes find out 
        $apply_count = apply_course::where('post_status', 1)->whereIn('course_name', $items)->count(); // how many student apply with this courses 
        return view('website.pages.training_details',compact('banner','data','course','apply_count'));
    }
    public function apply_course(Request $request){
        $request->validate([
            'course_name' => 'required',
            'name' => 'required',
            'occupation' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
        ],
            [
              'course_name.required' => ' Course Name is Required.',
              'name.required' => '  Name is Required.',
              'occupation.required' => ' Occupation Name is Required.',
              'email.required' => ' Email is Required.',
              'phone.required' => ' Phone Number is Required.',
              'age.required' => ' Age is Required.',
              'gender.required' => ' Gender is Required.',
              'education.required' => ' education is Required.',
              'address.required' => ' Address is Required.',
            ]
        );
        $slug=uniqid('20');
        $insert=apply_course::insertGetId([
          'course_name'=>$request['course_name'],
          'name'=>$request['name'],
          'occupation'=>$request['occupation'],
          'email'=>$request['email'],
          'phone'=>$request['phone'],
          'age'=>$request['age'],
          'gender'=>$request['gender'],
          'education'=>$request['education'],
          'address'=>$request['address'],
          'caption'=>$request['caption'],
          'slug'=>$slug,
          'creator'=>$request['name'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
          Session::flash('success','value');
          return redirect()->route('internship')->with('message',' Application Submit successful !');
      } else {
          Session::flash('error','value');
          return redirect()->route('internship')->with('error',' Application Submit Failed !');
      }

    } // apply course end here 

    public function career(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','career_page')->get();
        $bannerh= allbanner::where('post_status',1)->where('page_unique_name','career_page')->limit(1)->get();
        $bannerbt =bannerbottom::where('post_status',1)->where('category_as','career')->limit(1)->get();
        $desc= page_desc::where('post_status',1)->where('category_as', 'career')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','organization_slogan')->get();
        $alljobs = jobpost::where('post_status',1)->get();
        return view('website.pages.career',compact('banner','bannerh','desc','alljobs','slogan','bannerbt'));
    }
    public function job_career($slug){
        $data = jobpost::where('post_status',1)->where('slug',$slug)->firstOrFail();
        return view('website.pages.job_details_post',compact('data'));
    }
    public function appoinment(){
        return view('website.pages.appoinment');
    }
    public function appoinment_book(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'subject' => 'required',
        ],
        [
            'name.required' => '  Name is Required.',
            'email.required' => ' Email is Required.',
            'phone.required' => ' Phone Number is Required.',
            'address.required' => ' Address is Required.',
            'subject.required' => ' Purpose is Required.',
        ]
        );
        $slug=uniqid('20');
        $insert=appoinment_book::insertGetId([
          'name'=>$request['name'],
          'email'=>$request['email'],
          'phone'=>$request['phone'],
          'address'=>$request['address'],
          'subject'=>$request['subject'],
          'slug'=>$slug,
          'creator'=>$request['name'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($insert) {
          Session::flash('success','value');
          return redirect()->route('appoinment')->with('message',' Appoinment Submit successful !');
      } else {
          Session::flash('error','value');
          return redirect()->route('appoinment')->with('error',' Appoinment Submit Failed !');
      }

    } // apply course end here 
    public function donation(){
        $whydonateh = whaydonate::where('post_status',1)->limit(1)->get();
        $whydonate = whaydonate::where('post_status',1)->limit(4)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','donation_slogan')->get();
        $alldoner = member_donner::where('post_status',1)->orderby('member_donner_id','DESC')->get();
        return view('website.pages.make_donation',compact('whydonateh','whydonate','slogan','alldoner'));
    }
    public function donation_submit(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'subject' => 'required',
        ],
        [
            'name.required' => '  Name is Required.',
            'email.required' => ' Email is Required.',
            'phone.required' => ' Phone Number is Required.',
            'address.required' => ' Address is Required.',
            'subject.required' => ' Purpose is Required.',
        ]
        );
        $slug=uniqid('20');
        $insert=makeDonation::insertGetId([
          'name'=>$request['name'],
          'email'=>$request['email'],
          'phone'=>$request['phone'],
          'address'=>$request['address'],
          'subject'=>$request['subject'],
          'caption'=>$request['caption'],
          'slug'=>$slug,
          'creator'=>$request['name'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
          if ($insert) {
            Session::flash('success','value');
            return redirect()->back()->with('message','Thank You! Messages Submit successful !');
        } else {
            Session::flash('error','value');
            return redirect()->back()->with('error',' Messages Submit Failed !');
        }
      }
// make  valueable donation end here 
    public function privacy_policy(){
        return view('website.pages.privacy_policy');
    }
    public function support(){
        return view('website.pages.support');
    }
    public function notice(){
        $notice = notice::where('post_status',1)->orderby('notice_id','DESC')->limit(1)->get();
        $allnotice=notice::where('post_status',1)->orderby('notice_id','DESC')->get();
        $slogan= slogan::where('post_status',1)->where('set_as','organization_slogan')->get();
        return view('website.pages.notice',compact('notice','allnotice','slogan'));
    }
    public function faq(Request $request){
        $search = $request['search'] ?? "";
        //active post search 
        if($search !=""){
          $faqs= faq::where('post_status',1)->where('name', 'LIKE', "%$search%")->orwhere('phone','LIKE',"%$search%")->orwhere('qustion','LIKE',"%$search%")
          ->orderBy('faqs_id', 'DESC')->paginate(8);
        }
        else{
          $faqs = faq::where('post_status', 1)->orderBy('faqs_id', 'DESC')->paginate(8);
        }

        $totalpost= faq::count();
        $review= faq::where('post_status',2)->count();
        $insertcurrent = faq::where('post_status',1)->orderBy('faqs_id', 'DESC')->limit(1)->get();
        $pending = faq::where('post_status', 2)->orderBy('faqs_id', 'DESC')->paginate(5);
        return view('website.pages.faq',compact('faqs','totalpost','search','insertcurrent','review','pending'));
    }
    public function insert(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'district' => 'required',
            'qustion' => 'required',
        ],
            [
              'name.required' => 'Name is Required.',
              'phone.required' => 'Phone Number is Required.',
              'email.required' => 'E-mail is Required.',
              'district.required' => 'Address is Required.',
              'qustion.required' => 'Question is Required.',
            ]
        );
        $slug='user'.uniqid('20');
        $insert=faq::insertGetId([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'district'=>$request['district'],
            'qustion'=>$request['qustion'],
            'answer'=>$request['answer'],
            'slug'=>$slug,
            'creator'=>$request['name'],
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          // Redirect back
          if ($insert) {
            Session::flash('success','value');
            return redirect()->route('faq')->with('message',' Information Submitted successfully !');
        } else {
            Session::flash('error','value');
            return redirect()->route('faq')->with('error',' Information Submited Failed !');
        }
    }
    // coming soon  page 
    public function contact(){
        $banner= allbanner::where('post_status',1)->where('page_unique_name','contact_page')->limit(1)->get();
        $phone = phone::where('post_status',1)->limit(3)->get();
        $email = email::where('post_status',1)->limit(2)->get();
        $social = socialmediaurl::where('post_status',1)->get();
        return view('website.pages.contact',compact('banner','phone','email','social'));
    }
    public function contact_form(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'caption' => 'required',
        ],
        [
            'name.required' => '  Name is Required.',
            'email.required' => ' Email is Required.',
            'phone.required' => ' Phone Number is Required.',
            'caption.required' => ' Message is Required.',
        ]
        );
        $slug=uniqid('20');
        $insert=contactform::insertGetId([
          'name'=>$request['name'],
          'email'=>$request['email'],
          'phone'=>$request['phone'],
          'caption'=>$request['caption'],
          'slug'=>$slug,
          'creator'=>$request['name'],
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
          if ($insert) {
            Session::flash('success','value');
            return redirect()->back()->with('message',' Message Submit successful !');
        } else {
            Session::flash('error','value');
            return redirect()->back()->with('error',' Message Submit Failed !');
        }
    }
//site map 
public function sitemap(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','sitemap_page')->limit(1)->get();
    return view('website.pages.sitemap',compact('banner'));
}
public function apply_loan(){
    $branch = branch::where('post_status',1)->get();
    $micro = micro_service::where('post_status',1)->where('category_as','micro_finance')->get();
    $desc= page_desc::where('post_status',1)->where('category_as',' loan_application')->limit(1)->get();
    $slogan= slogan::where('post_status',1)->where('set_as','organization_slogan')->limit(1)->get();
    return view('website.pages.apply_loan',compact('branch','micro','desc','slogan'));
}
public function loan_application(Request $request){
    $request->validate([
      'fname' => 'required',
      'lname' => 'required',
      'phone' => 'required',
      'email' => 'required',
      'nid' => 'required',
      'birth_date' => 'required',
      'occupation' => 'required',
      'monthly_income' => 'required',
      'target_amount' => 'required',
      'loan_category' => 'required',
      'branch_name' => 'required',
      'address' => 'required',
  ],
      [
        'fname.required' => 'Firt Name is Required.',
        'lname.required' => 'Last Name is Required.',
        'phone.required' => 'Phone  is Required.',
        'email.required' => 'Email is Required.',
        'nid.required' => 'NID Number is Required.',
        'birth_date.required' => 'Birth Date is Required.',
        'occupation.required' => 'Occupation Name is Required.',
        'monthly_income.required' => 'Monthly Income is Required.',
        'target_amount.required' => 'Loan Amount is Required.',
        'loan_category.required' => 'Loan Category is Required.',
        'branch_name.required' => 'Branch Name is Required.',
        'address.required' => 'Full Address is Required.',
      ]
  );
  $slugname = $request['name'];
  $removespace = str_replace(' ', '', $slugname);
  $slug=$removespace.'-'.uniqid('20');
  $insert=applyloan::insertGetId([
    'fname'=>$request['fname'],
    'lname'=>$request['lname'],
    'name' => $request['fname'] . ' ' . $request['lname'],
    'phone'=>$request['phone'],
    'email'=>$request['email'],
    'nid'=>$request['nid'],
    'birth_date'=>$request['birth_date'],
    'occupation'=>$request['occupation'],
    'monthly_income'=>$request['monthly_income'],
    'target_amount'=>$request['target_amount'],
    'loan_category'=>$request['loan_category'],
    'branch_name'=>$request['branch_name'],
    'address'=>$request['address'],
    'caption'=>$request['caption'],
    'slug'=>$slug,
    'creator'=>$request['fname'],
    'created_at'=>Carbon::now()->toDateTimeString(),
  ]);
  
  if ($insert) {
    Session::flash('success','value');
    return redirect()->back()->with('message','Application submission successful! . We will contact you as soon as possible after reviewing your application!, Thank You ');
} else {
    Session::flash('error','value');
    return redirect()->back()->with('error',' Information Added Failed !');
}
}
// end 





// end controller 
}
