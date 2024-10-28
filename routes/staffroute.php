<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\manage_user\staff\WorkStatusController;

/* ------------  all route protected group start here ----------*/
 Route::middleware('auth')->group(function () {
/* ------------  all route protected group start here ----------*/




Route::get('/dashboard/recycle/data', [RecycleController::class, 'recycle']);




Route::get('/dashboard/employee/all-threads', [StaffDashboardController::class, 'all_threads'])->name('all_threads');


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
// add basice info ------------------------------------------------
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
// ---------------------------------------

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

// work status roue 
Route::prefix('dashboard/emplyee/work-status')->name('work_status.')->group(function(){
Route::get('/', [WorkStatusController::class, 'index'])->name('all');
Route::get('/add', [WorkStatusController::class, 'add'])->name('add');
Route::get('/edit/{slug}', [WorkStatusController::class, 'edit'])->name('edit');
Route::get('/view/{slug}', [WorkStatusController::class, 'view'])->name('view');
Route::post('/submit', [WorkStatusController::class, 'insert'])->name('submit');
Route::post('/update', [WorkStatusController::class, 'update'])->name('update');
Route::get('/softdelete/{id}', [WorkStatusController::class, 'softdelete'])->name('softdelete');
Route::get('/restore/{id}', [WorkStatusController::class, 'restore'])->name('restore');
Route::get('/delete/{id}', [WorkStatusController::class, 'delete'])->name('delete');
Route::get('/recycle', [WorkStatusController::class, 'recycle'])->name('recycle');
Route::get('/post_active/{id}', [WorkStatusController::class, 'post_active'])->name('post_active');
Route::get('/post_deactive/{id}', [WorkStatusController::class, 'post_deactive'])->name('post_deactive');
});

/*=------------------------  all route is protected  end here ----------------------- */
});
require __DIR__.'/auth.php';
/*=------------------------  all route is protected  end here ----------------------- */