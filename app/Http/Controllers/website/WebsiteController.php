<?php

namespace App\Http\Controllers\website;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\aboutus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
/*----------  use model -----*/
use App\Models\allbanner;
use App\Models\allpost;
use App\Models\bannerbottom;
use App\Models\dipositads;
use App\Models\faq;
use App\Models\testimonial;
use App\Models\loansteps;
use App\Models\micro_service;
use App\Models\page_desc;
use App\Models\security_trust;
use App\Models\whatsnew;
use App\Models\serviceOverview;
use App\Models\slogan;
use App\Models\smeads;
use App\Models\whatwedo;

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
        $banner= allbanner::where('status',1)->where('page_unique_name','about_us_page')->limit(1)->get();
        $aboutus= aboutus::where('post_status',1)->orderby('aboutus_id','ASC')->limit(1)->get();
        $whatwedo= whatwedo::where('post_status',1)->orderby('whatwedo_id','ASC')->limit(4)->get();
        $whatwedo_head= whatwedo::where('post_status',1)->orderby('whatwedo_id','ASC')->limit(1)->get();
        $security= security_trust::where('post_status',1)->orderby('security_trust_id','ASC')->limit(1)->get();
        //dd($banner);
        return view('website.pages.about_us',compact('banner','aboutus','whatwedo','whatwedo_head','security'));
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
        return view('website.pages.organizetional_structure');
    }
    public function chairmam(){
        return view('website.pages.chairman');
    }
    public function managing_director(){
        return view('website.pages.maneging_director');
    }
    public function chaifinance_directorrmam(){
        return view('website.pages.organizetional_structure');
    }
    public function financial_statement(){
        return view('website.pages.financial_statement');
    }
    public function where_we_work(){
        return view('website.pages.where_we_work');
    }
    public function our_stratiegy(){
        return view('website.pages.our_stratiegy');
    }
    public function mission_vision(){
        return view('website.pages.mission_vision');
    }
    public function our_faith(){
        return view('website.pages.faith');
    }
   /*------- what we do page and linked page -------*/ 
   public function what_we_do(){
        return view('website.pages.what_we_do');
   }
   public function micro_finance(){
    $banner= allbanner::where('post_status',1)->where('page_unique_name','micro_finance_Page')->limit(1)->get();
    $desc= page_desc::where('post_status',1)->where('category_as','micro_finance')->limit(1)->get();
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
        $desc= page_desc::where('post_status',1)->where('category_as', 'emergency_relife')->limit(1)->get();
        $slogan= slogan::where('post_status',1)->where('set_as','donation_slogan')->get();
        $post = allpost::where('post_status',1)->where('category_as','emergency_relife')->get();
        $bannerbt =bannerbottom::where('post_status',1)->where('category_as','emergency_relife')->limit(1)->get();
        return view('website.pages.emergency_relife',compact('banner','desc','slogan','post','bannerbt'));
    }
    public function child_protection(){
        return view('website.pages.child_protection');
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
        $desc= page_desc::where('post_status',1)->where('category_as', 'health_and_nutrition')->limit(1)->get();
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
        return view('website.pages.gallery');
    }
    public function video_gallery(){
        return view('website.pages.video');
    }
    public function photo_gallery(){
        return view('website.pages.photo');
    }
    public function field_storis(){
        return view('website.pages.feild_strois');
    }
/* ------blog and news ---*/
    public function hands_blogs(){
        return view('website.pages.our_all_projects');
    }
    public function news(){
        return view('website.pages.news');
    }
    public function blog_events(){
        return view('website.pages.blog_events');
    }
/* ------ get involved  ---*/
    public function get_involved(){
        return view('website.pages.get_involved');
    }
    public function volunteer(){
        return view('website.pages.volunteer');
    }
    public function becoome_volunteer(){
        return view('website.pages.become_a_volunteer');
    }
    public function others_program(){
        return view('website.pages.others_program');
    }
    public function valueable_donner(){
        return view('website.pages.valueable_donner');
    }
    public function product(){
        return view('website.pages.product');
    }
    public function free_health(){
        return view('website.pages.health_campaign');
    }
    public function our_impact(){
        return view('website.pages.our_impact');
    }
    /*----  our team-------- */
    public function our_Team(){
        return view('website.pages.our_team');
    }
    public function genrel_team(){
        return view('website.pages.genarel_team');
    }

    public function legal_team(){
        return view('website.pages.legal_team');
    }
/*------  othes page and linked  */

    public function internship(){
        return view('website.pages.internship_oppertunity');
    }

    public function career(){
        return view('website.pages.career');
    }
    public function appoinment(){
        return view('website.pages.appoinment');
    }
    public function apply_loan(){
        return view('website.pages.apply_loan');
    }
    public function donation(){
        return view('website.pages.make_donation');
    }
    public function privacy_policy(){
        return view('website.pages.privacy_policy');
    }

    public function support(){
        return view('website.pages.support');
    }
    public function notice(){
        return view('website.pages.notice');
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
        $currenturl = URL::current();
        //dd($currenturl);
       // $subs= subcategory::where('status', 1)->get();
       $pageIds = allbanner::where('status', 1)->where('menu_url',$currenturl)->get();
      

       //dd($pageIds);
        $banner= allbanner::where('status',1)->get();
        //dd($banner);
        return view('website.pages.contact',compact('banner','pageIds'));
    }




}
