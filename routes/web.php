<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// website controller 
use App\Http\Controllers\website\WebsiteController;


//admin controller

//admin controller
use App\Http\Controllers\admin\AdminController;

// admin admin site controller ----------------------------------------------------     ADMIN SITE CONTROLLER --------------
use App\Http\Controllers\admin\admin_home\AlluserController;
use App\Http\Controllers\admin\admin_home\staff\AlluserApplicationController;
//COMMON CONTROLLER 
use App\Http\Controllers\admin\common\LeaveDetailsController;
use App\Http\Controllers\admin\common\LeaveResonController;

//manage user user site conntroller 
use App\Http\Controllers\manage_user\staff\StaffDashboardController;
use App\Http\Controllers\manage_user\staff\OvervewController;
use App\Http\Controllers\manage_user\staff\ProfileUpdateController;
use App\Http\Controllers\manage_user\staff\AddworkplaceController;
use App\Http\Controllers\manage_user\staff\AddEducationController;
use App\Http\Controllers\manage_user\staff\BasicInfoController;
use App\Http\Controllers\manage_user\staff\ServiceController;
use App\Http\Controllers\manage_user\staff\PortfolioImageController;
use App\Http\Controllers\manage_user\staff\ApplicationController;
use App\Http\Controllers\manage_user\staff\RecycleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/* ==== website route is start here */
Route::get('/', [WebsiteController::class, 'index'])->name('index');
/*-----about section----*/
Route::get('/about-human-and-nature-developmetn-society-(hands)', [WebsiteController::class, 'about_us'])->name('about_us');
Route::post('/about-human-and-nature-developmetn-society-(hands)/submit', [WebsiteController::class, 'testi_insert'])->name('testimonial_insert');
Route::get('/organizetional-structure', [WebsiteController::class, 'organizetional_structure'])->name('organizetion_structure');
Route::get('/financial-statement', [WebsiteController::class, 'financial_statement'])->name('financial_statement');
Route::get('/chairman-of-hands', [WebsiteController::class, 'chairmam'])->name('chairman');
Route::get('/managing-director-of-hands', [WebsiteController::class, 'managing_director'])->name('managing_director');
Route::get('/finance-director-of-hands', [WebsiteController::class, 'finance_directore'])->name('finance_directore');
Route::get('/staff-details-of-HANDS/{slug}', [WebsiteController::class, 'staff_details'])->name('staff_details');

Route::get('/where-we-work', [WebsiteController::class, 'where_we_work'])->name('where_we_work');
Route::get('/our-stratiegy', [WebsiteController::class, 'our_stratiegy'])->name('our_stratiegy');
Route::get('/our-stratiegy-details/{slug}', [WebsiteController::class, 'strategy_details'])->name('strategy_details');
Route::get('/our-mission-and-our-vision', [WebsiteController::class, 'mission_vision'])->name('mission_vision');
Route::get('/our-faith', [WebsiteController::class, 'our_faith'])->name('our_faith');
/*-----what we do section----*/
Route::get('/what-we-do', [WebsiteController::class, 'what_we_do'])->name('what_we_do');
Route::get('/micro-finance-loan', [WebsiteController::class, 'micro_finance'])->name('micro_finance');
Route::get('/basic-loan', [WebsiteController::class, 'basic_loan'])->name('basic_loan');
Route::get('/microenterprice-loan', [WebsiteController::class, 'microenterpris_loan'])->name('microenterpris_loan');
Route::get('/crop-loan', [WebsiteController::class, 'crop_loan'])->name('crop_loan');
Route::get('/livestock-loan', [WebsiteController::class, 'livestock_loan'])->name('livestock_loan');
Route::get('/special-loan', [WebsiteController::class, 'special_loan'])->name('special_loan');
Route::get('/house-loan', [WebsiteController::class, 'house_loan'])->name('house_loan');
Route::get('/agriculture-loan', [WebsiteController::class, 'agriculture_loan'])->name('agriculture_loan');
Route::get('/higher-education-loan', [WebsiteController::class, 'higher_education'])->name('higher_education');
Route::get('/woman-empowerment-loan', [WebsiteController::class, 'woman_empowerment'])->name('woman_empowerment');
/*-----seving account section----*/
Route::get('/hands-saving-accounts-plan', [WebsiteController::class, 'saving_ac_plan'])->name('sevings');
Route::get('/hands-pension-scheme', [WebsiteController::class, 'hands_pension_scheme'])->name('pension');
Route::get('/fixed-dipsit-plan', [WebsiteController::class, 'fixed_diposit'])->name('fixed_diposit');
Route::get('/dubble-and-8years-diposit', [WebsiteController::class, 'diposit_limit'])->name('diposit_limit');
Route::get('/family-welfair-saving-plan', [WebsiteController::class, 'family_saving'])->name('family_saving');
Route::get('/two-years-saving', [WebsiteController::class, 'two_years_saving'])->name('two_years_saving');
/*-----what we do dropdown section----*/
Route::get('/emergency relief for emergency crisis', [WebsiteController::class, 'emergency_relif'])->name('emergency_relif');
Route::get('/what-we-do-for-economic-development-for-underprivileged-area', [WebsiteController::class, 'economic_development'])->name('economic_development');
Route::get('/what-we-do-for-child-protection', [WebsiteController::class, 'child_protection'])->name('child_protection');
Route::get('/support-for-education', [WebsiteController::class, 'education_program'])->name('education_program');
Route::get('/health-and-nutrition', [WebsiteController::class, 'health_nutrition'])->name('health_nutrition');
Route::get('/water-sanitation-and-hygiene', [WebsiteController::class, 'water_hygiene'])->name('water_hygiene');
/*-----legal aid section----*/
Route::get('legal-aid', [WebsiteController::class, 'legal_aid'])->name('legal_aid');
Route::get('legal-aid-awareness-and-training', [WebsiteController::class, 'awareness'])->name('awareness');
Route::get('mediation', [WebsiteController::class, 'mediation'])->name('mediation');
Route::get('public-interest-litigation', [WebsiteController::class, 'pil'])->name('pil');
Route::get('litigation', [WebsiteController::class, 'litigation'])->name('liigation');
/*-----gallery section----*/
Route::get('our-gallery', [WebsiteController::class, 'gallery'])->name('gallery');
Route::get('video-gallery', [WebsiteController::class, 'video_gallery'])->name('vide_gallery');
Route::get('photo-gallery', [WebsiteController::class, 'photo_gallery'])->name('photo_gallery');
Route::get('our-field-stories', [WebsiteController::class, 'field_storis'])->name('field_storis');
/*-----news feed section----*/
Route::get('hands-news-and-blogs-events', [WebsiteController::class, 'hands_blogs'])->name('hands_blogs');
Route::get('our-all-news', [WebsiteController::class, 'news'])->name('all_news');
Route::get('our-blogs-and-events', [WebsiteController::class, 'blog_events'])->name('all_blog');
Route::get('human-and-nature-development-society-hands-all-projects', [WebsiteController::class, 'all_projects'])->name('all_projects');
Route::get('projects-details/{slug}', [WebsiteController::class, 'all_projects_details'])->name('all_projects_details');
/*-----involved section----*/
Route::get('get-involved', [WebsiteController::class, 'get_involved']);
Route::get('volunteer', [WebsiteController::class, 'volunteer'])->name('volunteer');
Route::get('volunteer-details/{slug}', [WebsiteController::class, 'volunteer_details'])->name('volunteer_details');
Route::get('become-volunteer', [WebsiteController::class, 'becoome_volunteer'])->name('become_volunteer');
Route::post('become-volunteer-application', [WebsiteController::class, 'volunteer_application'])->name('volunteer_application');
Route::get('other-programs-and-activitis-of-hands', [WebsiteController::class, 'others_program'])->name('other_program');
Route::get('our-valueable-donners-and-members', [WebsiteController::class, 'valueable_donner'])->name('valueable_donner');
Route::get('product-for-human-being', [WebsiteController::class, 'product'])->name('product');
Route::get('free-medical-and-health-campaign', [WebsiteController::class, 'free_health'])->name('free_health');
Route::get('our-impact', [WebsiteController::class, 'our_impact'])->name('our_impact');
/*-----team section ----*/
Route::get('administrative-Support-team-of-HANDS', [WebsiteController::class, 'administrative_support'])->name('administrative_support');
Route::get('management-and-program-team-of-HANDS', [WebsiteController::class, 'management_program'])->name('management_program');
Route::get('finance-and-credit-role-team-of-HANDS', [WebsiteController::class, 'finance_credit'])->name('finance_credit');
Route::get('research-adn-development-team-of_HANDS', [WebsiteController::class, 'research_development'])->name('research_development');
Route::get('legal-comliance-team-of-HANDS', [WebsiteController::class, 'legal_comliance'])->name('legal_comliance');
Route::get('marketing-outreach-team-of-HANDS', [WebsiteController::class, 'marketing_outreach'])->name('marketing_outreach');
Route::get('monitoring-evaluation-team-of-HANDS', [WebsiteController::class, 'monitoring_evaluation'])->name('monitoring_evaluation');
Route::get('field-staff-team-of-HANDS', [WebsiteController::class, 'field_staff'])->name('field_staff');
Route::get('technology-and-innovation-team-of-HANDS', [WebsiteController::class, 'technology_innovation'])->name('technology_innovation');
Route::get('training-and-capacity-team-of_HANDS', [WebsiteController::class, 'trainig_capacity'])->name('trainig_capacity');
Route::get('intern-position-team-of-HANDS', [WebsiteController::class, 'intern_position'])->name('intern_position');
Route::get('consultant-andother-team-of-HANDS', [WebsiteController::class, 'consultant_other'])->name('consultant_other');
Route::get('team-details-of-HANDS/{slug}', [WebsiteController::class, 'team_details'])->name('team_details');
/*-----contact and others section ----*/
Route::get('contact-us', [WebsiteController::class, 'contact'])->name('contact');
Route::post('contact-us-form', [WebsiteController::class, 'contact_form'])->name('contact_form');
Route::get('interenship-program', [WebsiteController::class, 'internship'])->name('internship');
Route::get('internship-and-Training-Details/{slug}', [WebsiteController::class, 'course'])->name('course');
Route::post('internship-and-Training-Application-submit', [WebsiteController::class, 'apply_course'])->name('apply_course');
Route::get('job-and-career-program', [WebsiteController::class, 'career'])->name('career');
Route::get('job-and-career-details/{slug}', [WebsiteController::class, 'job_career'])->name('job_career');
Route::get('get-appoinment', [WebsiteController::class, 'appoinment'])->name('appoinment');
Route::post('appoinment-submit', [WebsiteController::class, 'appoinment_book'])->name('appoinment_book');
Route::get('apply-for-loan', [WebsiteController::class, 'apply_loan'])->name('apply-loan');
Route::post('application-for-loan-submit', [WebsiteController::class, 'loan_application'])->name('loan_application');
Route::get('make-your-donation', [WebsiteController::class, 'donation'])->name('make_donation');
Route::get('privacy-and-policy', [WebsiteController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('get-support', [WebsiteController::class, 'support'])->name('support');
Route::get('hands-notice-board', [WebsiteController::class, 'notice'])->name('notice');
Route::get('Frequently-Asked-Questions-Faq', [WebsiteController::class, 'faq'])->name('faq');
Route::get('post-details/{slug}', [WebsiteController::class, 'post_details'])->name('post_details');
Route::get('all-projects', [WebsiteController::class, 'all_projects'])->name('all_projects');
Route::post('Frequently-Asked-Questions-Faq/submit', [WebsiteController::class, 'insert'])->name('submit');
Route::post('make-valueable-donation', [WebsiteController::class, 'donation_submit'])->name('donation_submit');
Route::get('sitemap', [WebsiteController::class, 'sitemap'])->name('site_map');




/* ==== website route is end  here */


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

// admin dashboard route ------------------------------------------------------------------

Route::get('/admin/dashboard', function () {
    return view('admin.admin_home.index');
})->middleware(['auth:admin', 'verified'])->name('dashboard');

Route::middleware('auth:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ------------------------------------------------------------------------------------
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard/admin_allusers', [AlluserController::class, 'index']);
    Route::get('/admin/dashboard/admin_user_all_information', [AlluserController::class, 'alldata']);
    Route::get('/admin/dashboard/admin_allusers/view/{id}', [AlluserController::class, 'view']);
    Route::get('/admin/dashboard/admin_allusers/delete/{id}', [AlluserController::class, 'delete']);
    Route::get('admin/dashboard/admin_allusers_/delete/{id}', [AlluserController::class, 'profiledelete']);
    Route::get('admin/dashboard/admin_allusers_work_place/delete/{id}', [AlluserController::class, 'work_place_delete']);
    Route::get('admin/dashboard/admin_allusers_edicaton/delete/{id}', [AlluserController::class, 'edicaton_delete']);


    // active post 
    Route::get('admin/dashboard/admin_allusers_/post_active_profile/{id}', [AlluserController::class, 'post_active_profile']);
    Route::get('admin/dashboard/admin_allusers_/post_deactive_profile/{id}', [AlluserController::class, 'post_deactive_profile']);
    Route::get('admin/dashboard/admin_allusers_/post_active_work/{id}', [AlluserController::class, 'post_active_work']);
    Route::get('admin/dashboard/admin_allusers_/post_deactive_work/{id}', [AlluserController::class, 'post_deactive_work']);
    
    Route::get('admin/dashboard/admin_allusers_/post_active_education/{id}', [AlluserController::class, 'post_active_education']);
    Route::get('admin/dashboard/admin_allusers_/post_deactive_education/{id}', [AlluserController::class, 'post_deactive_education']);






    // admin manage route start here  common database route 
    Route::get('admin/dashboard/manage/application_types', [LeaveDetailsController::class, 'index']);
    Route::get('admin/dashboard/manage/application_types/add', [LeaveDetailsController::class, 'add']);
    Route::get('admin/dashboard/manage/application_types/edit/{slug}', [LeaveDetailsController::class, 'edit']);
    Route::get('admin/dashboard/manage/application_types/view/{slug}', [LeaveDetailsController::class, 'view']);
    Route::post('admin/dashboard/manage/application_types/submit', [LeaveDetailsController::class, 'insert']);
    Route::post('admin/dashboard/manage/application_types/update', [LeaveDetailsController::class, 'update']);
    Route::get('admin/dashboard/manage/application_types/softdelete/{id}', [LeaveDetailsController::class, 'softdelete']);
    Route::get('admin/dashboard/manage/application_types/restore/{id}', [LeaveDetailsController::class, 'restore']);
    Route::get('admin/dashboard/manage/application_types/delete/{id}', [LeaveDetailsController::class, 'delete']);
    Route::get('admin/dashboard/manage/application_types/recycle', [LeaveDetailsController::class, 'recycle']);
    Route::get('admin/dashboard/manage/application_types/post_active/{id}', [LeaveDetailsController::class, 'post_active']);
    Route::get('admin/dashboard/manage/application_types/post_deactive/{id}', [LeaveDetailsController::class, 'post_deactive']);

    Route::get('admin/dashboard/manage/reason_types', [LeaveResonController::class, 'index']);
    Route::get('admin/dashboard/manage/reason_types/add', [LeaveResonController::class, 'add']);
    Route::get('admin/dashboard/manage/reason_types/edit/{slug}', [LeaveResonController::class, 'edit']);
    Route::get('admin/dashboard/manage/reason_types/view/{slug}', [LeaveResonController::class, 'view']);
    Route::post('admin/dashboard/manage/reason_types/submit', [LeaveResonController::class, 'insert']);
    Route::post('admin/dashboard/manage/reason_types/update', [LeaveResonController::class, 'update']);
    Route::get('admin/dashboard/manage/reason_types/softdelete/{id}', [LeaveResonController::class, 'softdelete']);
    Route::get('admin/dashboard/manage/reason_types/restore/{id}', [LeaveResonController::class, 'restore']);
    Route::get('admin/dashboard/manage/reason_types/delete/{id}', [LeaveResonController::class, 'delete']);
    Route::get('admin/dashboard/manage/reason_types/recycle', [LeaveResonController::class, 'recycle']);
    Route::get('admin/dashboard/manage/reason_types/post_active/{id}', [LeaveResonController::class, 'post_active']);
    Route::get('admin/dashboard/manage/reason_types/post_deactive/{id}', [LeaveResonController::class, 'post_deactive']);

    // manage user application route 
    Route::get('admin/dashboard/manage/leave_application', [AlluserApplicationController::class, 'index']);
    Route::get('admin/dashboard/manage/leave_application/edit/{slug}', [AlluserApplicationController::class, 'edit']);
    Route::get('admin/dashboard/manage/leave_application/view/{slug}', [AlluserApplicationController::class, 'view']);
    Route::post('admin/dashboard/manage/leave_application/submit', [AlluserApplicationController::class, 'insert']);
    Route::post('admin/dashboard/manage/leave_application/update', [AlluserApplicationController::class, 'update']);
    Route::get('admin/dashboard/manage/leave_application/softdelete/{id}', [AlluserApplicationController::class, 'softdelete']);
    Route::get('admin/dashboard/manage/leave_application/restore/{id}', [AlluserApplicationController::class, 'restore']);
    Route::get('admin/dashboard/manage/leave_application/delete/{id}', [AlluserApplicationController::class, 'delete']);
    Route::get('admin/dashboard/manage/leave_application/recycle', [AlluserApplicationController::class, 'recycle']);
    Route::get('admin/dashboard/manage/leave_application/post_active/{id}', [AlluserApplicationController::class, 'post_active']);
    Route::get('admin/dashboard/manage/leave_application/post_deactive/{id}', [AlluserApplicationController::class, 'post_deactive']);



});



require __DIR__.'/adminauth.php';




// staf route 

// Route::group(['middleware'=>'stuffauth'],function(){
//     Route::get('staff_dashboard', [StaffController::class, 'index']);
// });


Route::get('/dashboard/recycle/data', [RecycleController::class, 'recycle']);

Route::get('/dashboard', [StaffDashboardController::class, 'index']);
Route::get('/staff_login', [StaffDashboardController::class, 'login']);
Route::get('/staff_register', [StaffDashboardController::class, 'register']);
Route::get('staff_dashboard/edit/{slug}', [StaffDashboardController::class, 'edit']);
Route::get('staff_dashboard/view/{slug}', [StaffDashboardController::class, 'view']);
Route::post('staff_dashboard/submit', [StaffDashboardController::class, 'insert']);
Route::post('staff_dashboard/update', [StaffDashboardController::class, 'update']);
Route::get('staff_dashboard/softdelete/{id}', [StaffDashboardController::class, 'softdelete']);
Route::get('staff_dashboard/restore/{id}', [StaffDashboardController::class, 'restore']);
Route::get('staff_dashboard/delete/{id}', [StaffDashboardController::class, 'delete']);
Route::get('staff_dashboard/recycle', [StaffDashboardController::class, 'recycle']);
// registration route end here 

Route::get('/profile_overview', [OvervewController::class, 'index']);
Route::get('/staff_login', [OvervewController::class, 'login']);
Route::get('/staff_register', [OvervewController::class, 'register']);
Route::get('staff_dashboard/edit/{slug}', [OvervewController::class, 'edit']);
Route::get('staff_dashboard/view/{slug}', [OvervewController::class, 'view']);
Route::post('staff_dashboard/submit', [OvervewController::class, 'insert']);
Route::post('staff_dashboard/update', [OvervewController::class, 'update']);
Route::get('staff_dashboard/softdelete/{id}', [OvervewController::class, 'softdelete']);
Route::get('staff_dashboard/restore/{id}', [OvervewController::class, 'restore']);
Route::get('staff_dashboard/delete/{id}', [OvervewController::class, 'delete']);
Route::get('staff_dashboard/recycle', [OvervewController::class, 'recycle']);
// update profile route end here 
Route::get('dashboard/user/profile', [ProfileUpdateController::class, 'index']);
Route::get('dashboard/user/profile/add', [ProfileUpdateController::class, 'add']);
Route::get('dashboard/user/profile/edit/{slug}', [ProfileUpdateController::class, 'edit']);
Route::get('dashboard/user/profile/view/{slug}', [ProfileUpdateController::class, 'view']);
Route::post('dashboard/user/profile/submit', [ProfileUpdateController::class, 'insert']);
Route::post('dashboard/user/profile/update', [ProfileUpdateController::class, 'update']);
Route::get('dashboard/user/profile/softdelete/{id}', [ProfileUpdateController::class, 'softdelete']);
Route::get('dashboard/user/profile/restore/{id}', [ProfileUpdateController::class, 'restore']);
Route::get('dashboard/user/profile/delete/{id}', [ProfileUpdateController::class, 'delete']);
Route::get('dashboard/user/profile/recycle', [ProfileUpdateController::class, 'recycle']);
Route::get('dashboard/user/profile/post_active/{id}', [ProfileUpdateController::class, 'post_active']);
Route::get('dashboard/user/profile/post_deactive/{id}', [ProfileUpdateController::class, 'post_deactive']);
// add work place 
Route::get('dashboard/user/Add_work_places', [AddworkplaceController::class, 'index']);
Route::get('dashboard/user/Add_work_places/add', [AddworkplaceController::class, 'add']);
Route::get('dashboard/user/Add_work_places/edit/{slug}', [AddworkplaceController::class, 'edit']);
Route::get('dashboard/user/Add_work_places/view/{slug}', [AddworkplaceController::class, 'view']);
Route::post('dashboard/user/Add_work_places/submit', [AddworkplaceController::class, 'insert']);
Route::post('dashboard/user/Add_work_places/update', [AddworkplaceController::class, 'update']);
Route::get('dashboard/user/Add_work_places/softdelete/{id}', [AddworkplaceController::class, 'softdelete']);
Route::get('dashboard/user/Add_work_places/restore/{id}', [AddworkplaceController::class, 'restore']);
Route::get('dashboard/user/Add_work_places/delete/{id}', [AddworkplaceController::class, 'delete']);
Route::get('dashboard/user/Add_work_places/recycle', [AddworkplaceController::class, 'recycle']);
Route::get('dashboard/user/Add_work_places/post_active/{id}', [AddworkplaceController::class, 'post_active']);
Route::get('dashboard/user/Add_work_places/post_deactive/{id}', [AddworkplaceController::class, 'post_deactive']);
// add work place 
Route::get('dashboard/user/services', [ServiceController::class, 'index']);
Route::get('dashboard/user/services/add', [ServiceController::class, 'add']);
Route::get('dashboard/user/services/edit/{slug}', [ServiceController::class, 'edit']);
Route::get('dashboard/user/services/view/{slug}', [ServiceController::class, 'view']);
Route::post('dashboard/user/services/submit', [ServiceController::class, 'insert']);
Route::post('dashboard/user/services/update', [ServiceController::class, 'update']);
Route::get('dashboard/user/services/softdelete/{id}', [ServiceController::class, 'softdelete']);
Route::get('dashboard/user/services/restore/{id}', [ServiceController::class, 'restore']);
Route::get('dashboard/user/services/delete/{id}', [ServiceController::class, 'delete']);
Route::get('dashboard/user/services/recycle', [ServiceController::class, 'recycle']);
Route::get('dashboard/user/services/post_active/{id}', [ServiceController::class, 'post_active']);
Route::get('dashboard/user/services/post_deactive/{id}', [ServiceController::class, 'post_deactive']);

// portfolio image 
Route::get('dashboard/user/portfolio_image', [PortfolioImageController::class, 'index']);
Route::get('dashboard/user/portfolio_image/add', [PortfolioImageController::class, 'add']);
Route::get('dashboard/user/portfolio_image/edit/{slug}', [PortfolioImageController::class, 'edit']);
Route::get('dashboard/user/portfolio_image/view/{slug}', [PortfolioImageController::class, 'view']);
Route::post('dashboard/user/portfolio_image/submit', [PortfolioImageController::class, 'insert']);
Route::post('dashboard/user/portfolio_image/update', [PortfolioImageController::class, 'update']);
Route::get('dashboard/user/portfolio_image/softdelete/{id}', [PortfolioImageController::class, 'softdelete']);
Route::get('dashboard/user/portfolio_image/restore/{id}', [PortfolioImageController::class, 'restore']);
Route::get('dashboard/user/portfolio_image/delete/{id}', [PortfolioImageController::class, 'delete']);
Route::get('dashboard/user/portfolio_image/recycle', [PortfolioImageController::class, 'recycle']);
Route::get('dashboard/user/portfolio_image/userrequest/{id}', [PortfolioImageController::class, 'userrequest']);
Route::get('dashboard/user/portfolio_image/adminrequest/{id}', [PortfolioImageController::class, 'adminrequest']);


// add education 
Route::get('dashboard/user/Add_education', [AddEducationController::class, 'index']);
Route::get('dashboard/user/Add_education/add', [AddEducationController::class, 'add']);
Route::get('dashboard/user/Add_education/edit/{slug}', [AddEducationController::class, 'edit']);
Route::get('dashboard/user/Add_education/view/{slug}', [AddEducationController::class, 'view']);
Route::post('dashboard/user/Add_education/submit', [AddEducationController::class, 'insert']);
Route::post('dashboard/user/Add_education/update', [AddEducationController::class, 'update']);
Route::get('dashboard/user/Add_education/softdelete/{id}', [AddEducationController::class, 'softdelete']);
Route::get('dashboard/user/Add_education/restore/{id}', [AddEducationController::class, 'restore']);
Route::get('dashboard/user/Add_education/delete/{id}', [AddEducationController::class, 'delete']);
Route::get('dashboard/user/Add_education/recycle', [AddEducationController::class, 'recycle']);
Route::get('dashboard/user/Add_education/userrequest/{id}', [AddEducationController::class, 'userrequest']);
Route::get('dashboard/user/Add_education/adminrequest/{id}', [AddEducationController::class, 'adminrequest']);
// add basice info ------------------------------------------------------------------------------------------------------------------------------------------ 
Route::get('dashboard/user/BasicInfo', [BasicInfoController::class, 'index']);
Route::get('dashboard/user/BasicInfo/add', [BasicInfoController::class, 'add']);
Route::get('dashboard/user/BasicInfo/edit/{slug}', [BasicInfoController::class, 'edit']);
Route::get('dashboard/user/BasicInfo/view/{slug}', [BasicInfoController::class, 'view']);
Route::post('dashboard/user/BasicInfo/submit', [BasicInfoController::class, 'insert']);
// update route
Route::post('dashboard/user/BasicInfo/update_website', [BasicInfoController::class, 'update_website']);
Route::post('dashboard/user/BasicInfo/update_facebook', [BasicInfoController::class, 'update_facebook']);
Route::post('dashboard/user/BasicInfo/update_twitter', [BasicInfoController::class, 'update_twitter']);
Route::post('dashboard/user/BasicInfo/update_linkedin', [BasicInfoController::class, 'update_linkedin']);
Route::post('dashboard/user/BasicInfo/update_instagram', [BasicInfoController::class, 'update_instagram']);
Route::post('dashboard/user/BasicInfo/update_family_member', [BasicInfoController::class, 'update_family_member']);
Route::post('dashboard/user/BasicInfo/update_father_info', [BasicInfoController::class, 'update_father_info']);
Route::post('dashboard/user/BasicInfo/update_mother_info', [BasicInfoController::class, 'update_mother_info']);
Route::post('dashboard/user/BasicInfo/update_present_address', [BasicInfoController::class, 'update_present_address']);
Route::post('dashboard/user/BasicInfo/update_permanet_address', [BasicInfoController::class, 'update_permanet_address']);
Route::post('dashboard/user/BasicInfo/update_birth_date', [BasicInfoController::class, 'update_birth_date']);
Route::post('dashboard/user/BasicInfo/update_birth_place', [BasicInfoController::class, 'update_birth_place']);
Route::post('dashboard/user/BasicInfo/update_relationship', [BasicInfoController::class, 'update_relationship']);
Route::post('dashboard/user/BasicInfo/update_blood', [BasicInfoController::class, 'update_blood']);
Route::post('dashboard/user/BasicInfo/update_language', [BasicInfoController::class, 'update_language']);
Route::post('dashboard/user/BasicInfo/update_hobies', [BasicInfoController::class, 'update_hobies']);
Route::post('dashboard/user/BasicInfo/update_other_activitis', [BasicInfoController::class, 'update_other_activitis']);
//end update route
Route::post('dashboard/user/BasicInfo/update', [BasicInfoController::class, 'update']);
Route::get('dashboard/user/BasicInfo/softdelete/{id}', [BasicInfoController::class, 'softdelete']);
Route::get('dashboard/user/BasicInfo/restore/{id}', [BasicInfoController::class, 'restore']);
Route::get('dashboard/user/BasicInfo/delete/{id}', [BasicInfoController::class, 'delete']);
// single  column  value delete 
Route::get('dashboard/user/BasicInfo/website_delete/{id}', [BasicInfoController::class, 'website_delete']);
Route::get('dashboard/user/BasicInfo/facebook_delete/{id}', [BasicInfoController::class, 'facebook_delete']);
Route::get('dashboard/user/BasicInfo/twitter_delete/{id}', [BasicInfoController::class, 'twitter_delete']);
Route::get('dashboard/user/BasicInfo/linkedin_delete/{id}', [BasicInfoController::class, 'linkedin_delete']);
Route::get('dashboard/user/BasicInfo/instagram_delete/{id}', [BasicInfoController::class, 'instagram_delete']);
Route::get('dashboard/user/BasicInfo/familymember_delete/{id}', [BasicInfoController::class, 'familymember_delete']);
Route::get('dashboard/user/BasicInfo/fatherinfo_delete/{id}', [BasicInfoController::class, 'fatherinfo_delete']);
Route::get('dashboard/user/BasicInfo/motherinfo_delete/{id}', [BasicInfoController::class, 'motherinfo_delete']);
Route::get('dashboard/user/BasicInfo/presentaddress_delete/{id}', [BasicInfoController::class, 'presentaddress_delete']);
Route::get('dashboard/user/BasicInfo/permanentaddress_delete/{id}', [BasicInfoController::class, 'permanentaddress_delete']);
Route::get('dashboard/user/BasicInfo/birthdate_delete/{id}', [BasicInfoController::class, 'birthdate_delete']);
Route::get('dashboard/user/BasicInfo/birthplace_delete/{id}', [BasicInfoController::class, 'birthplace_delete']);
Route::get('dashboard/user/BasicInfo/relationship_delete/{id}', [BasicInfoController::class, 'relationship_delete']);
Route::get('dashboard/user/BasicInfo/blood_delete/{id}', [BasicInfoController::class, 'blood_delete']);
Route::get('dashboard/user/BasicInfo/language_delete/{id}', [BasicInfoController::class, 'language_delete']);
Route::get('dashboard/user/BasicInfo/hobies_delete/{id}', [BasicInfoController::class, 'hobies_delete']);
Route::get('dashboard/user/BasicInfo/otheractivitis_delete/{id}', [BasicInfoController::class, 'otheractivitis_delete']);
// --------------
Route::get('dashboard/user/BasicInfo/recycle', [BasicInfoController::class, 'recycle']);
Route::get('dashboard/user/BasicInfo/post_active/{id}', [BasicInfoController::class, 'post_active']);
Route::get('dashboard/user/BasicInfo/post_deactive/{id}', [BasicInfoController::class, 'post_deactive']);
Route::get('dashboard/user/BasicInfo/softdelete/{id}', [BasicInfoController::class, 'softdelete']);
Route::get('dashboard/user/BasicInfo/restore/{id}', [BasicInfoController::class, 'restore']);
Route::get('dashboard/user/BasicInfo/delete/{id}', [BasicInfoController::class, 'delete']);
// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// portfolio image 
Route::get('dashboard/user/leave_application', [ApplicationController::class, 'index']);
Route::get('dashboard/user/leave_application/add', [ApplicationController::class, 'add']);
Route::get('dashboard/user/leave_application/edit/{slug}', [ApplicationController::class, 'edit']);
Route::get('dashboard/user/leave_application/view/{slug}', [ApplicationController::class, 'view']);
Route::post('dashboard/user/leave_application/submit', [ApplicationController::class, 'insert']);
Route::post('dashboard/user/leave_application/update', [ApplicationController::class, 'update']);
Route::get('dashboard/user/leave_application/softdelete/{id}', [ApplicationController::class, 'softdelete']);
Route::get('dashboard/user/leave_application/restore/{id}', [ApplicationController::class, 'restore']);
Route::get('dashboard/user/leave_application/delete/{id}', [ApplicationController::class, 'delete']);
Route::get('dashboard/user/leave_application/recycle', [ApplicationController::class, 'recycle']);
Route::get('dashboard/user/leave_application/post_active/{id}', [ApplicationController::class, 'post_active']);
Route::get('dashboard/user/leave_application/post_deactive/{id}', [ApplicationController::class, 'post_deactive']);






/*---------------   website route is start here-------------------------- */





