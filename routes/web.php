<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\WebsiteController;
/* ==== website route is start here */
Route::get('/', [WebsiteController::class, 'index'])->name('index');
/*-----about section----*/
Route::get('/about-human-and-nature-developmetn-society-hands', [WebsiteController::class, 'about_us'])->name('about_us');
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
Route::get('/emergency-relief-for-emergency-crisis', [WebsiteController::class, 'emergency_relif'])->name('emergency_relif');
Route::get('/what-we-do-for-economic-development-for-underprivileged-area', [WebsiteController::class, 'economic_development'])->name('economic_development');
Route::get('/what-we-do-for-child-protection', [WebsiteController::class, 'child_protection'])->name('child_protection');
Route::get('/support-for-education', [WebsiteController::class, 'education_program'])->name('education_program');
Route::get('/health-and-nutrition', [WebsiteController::class, 'health_nutrition'])->name('health_nutrition');
Route::get('/disablity-and-other', [WebsiteController::class, 'water_hygiene'])->name('water_hygiene');
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


Route::get('our-all-news', [WebsiteController::class, 'news'])->name('all_news');
Route::get('human-and-nature-development-society-hands-all-projects', [WebsiteController::class, 'all_projects'])->name('all_projects');
Route::get('hands-all-events', [WebsiteController::class, 'hands_events'])->name('hands_events');
Route::get('our-all-blogs', [WebsiteController::class, 'hands_blogs'])->name('hands_blogs');

Route::get('projects-details/{slug}', [WebsiteController::class, 'all_projects_details'])->name('all_projects_details');
Route::get('post-details/{slug}', [WebsiteController::class, 'post_details'])->name('post_details');
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
Route::get('apply-for-loan', [WebsiteController::class, 'apply_loan'])->name('apply_loan');
Route::post('application-for-loan-submit', [WebsiteController::class, 'loan_application'])->name('loan_application');
Route::get('make-your-donation', [WebsiteController::class, 'donation'])->name('make_donation');
Route::get('privacy-and-policy', [WebsiteController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('get-support', [WebsiteController::class, 'support'])->name('support');
Route::get('hands-notice-board', [WebsiteController::class, 'notice'])->name('notice');
Route::get('Frequently-Asked-Questions-Faq', [WebsiteController::class, 'faq'])->name('faq');
Route::post('Frequently-Asked-Questions-Faq/submit', [WebsiteController::class, 'insert'])->name('submit');
Route::post('make-valueable-donation', [WebsiteController::class, 'donation_submit'])->name('donation_submit');
Route::get('sitemap', [WebsiteController::class, 'sitemap'])->name('site_map');

/*---------------   website route is start here-------------------------- */





