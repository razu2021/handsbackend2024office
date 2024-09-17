<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\recycle\recyclebinController;
use App\Http\Controllers\website\about\aboutController;
use App\Http\Controllers\website\about\easyLoancontroller;
use App\Http\Controllers\website\about\securityTrustController;
use App\Http\Controllers\website\about\whatwedoController;
use App\Http\Controllers\website\common\allAboutController;
use App\Http\Controllers\website\common\bannerBottomController;
/*--------- website frontend manage constroller start here 
--------------------------------------------------
-------------------------------------------------------- */
/*-------   common controller ------- */
use App\Http\Controllers\website\common\bannerController;
use App\Http\Controllers\website\common\bladeInfoController;
use App\Http\Controllers\website\common\faqController;
use App\Http\Controllers\website\common\sloganController;
use App\Http\Controllers\website\common\testimonialController;
use App\Http\Controllers\website\gallery\fieldStoriseController;
use App\Http\Controllers\website\gallery\photoGealleryController;
use App\Http\Controllers\website\gallery\videoGalleryController;
use App\Http\Controllers\website\home\dipositAdsController;
use App\Http\Controllers\website\home\loanStepController;
use App\Http\Controllers\website\home\serviceOverviewController;
use App\Http\Controllers\website\home\smeAdsController;
use App\Http\Controllers\website\home\whatsnewController;
use App\Http\Controllers\website\invo\ourImpactController;
use App\Http\Controllers\website\other\allStaffController;
use App\Http\Controllers\website\other\applyCourseController;
use App\Http\Controllers\website\other\bookAppoinmentController;
use App\Http\Controllers\website\other\courseController;
use App\Http\Controllers\website\other\designationController;
use App\Http\Controllers\website\other\jobpostController;
use App\Http\Controllers\website\other\noticeController;
use App\Http\Controllers\website\wedo\microFinanceServicecontroller;
use App\Http\Controllers\website\wedo\pageDescriptionController;
use App\Http\Controllers\website\wedo\postController;
use App\Http\Controllers\website\wedo\productController;
use App\Models\designation;

/*--------- website frontend manage constroller end  here -------- */



Route::middleware('auth:admin')->group(function () {
    Route::get('admin/dashboard/manage_application/recycle', [recyclebinController::class, 'index']);

    /*-------- manage enrair menu --------*/
    Route::get('admin/dashboard/website-manage/home-banner', [bannerController::class, 'index']);
    Route::get('admin/dashboard/website-manage/home-banner/add', [bannerController::class, 'add']);
    Route::get('admin/dashboard/website-manage/home-banner/edit/{slug}', [bannerController::class, 'edit']);
    Route::get('admin/dashboard/website-manage/home-banner/view/{slug}', [bannerController::class, 'view']);
    Route::post('admin/dashboard/website-manage/home-banner/submit', [bannerController::class, 'insert']);
    Route::post('admin/dashboard/website-manage/home-banner/update', [bannerController::class, 'update']);
    Route::get('admin/dashboard/website-manage/home-banner/softdelete/{id}', [bannerController::class, 'softdelete']);
    Route::get('admin/dashboard/website-manage/home-banner/restore/{id}', [bannerController::class, 'restore']);
    Route::get('admin/dashboard/website-manage/home-banner/delete/{id}', [bannerController::class, 'delete']);
    Route::get('admin/dashboard/website-manage/home-banner/recycle', [bannerController::class, 'recycle']);
    Route::get('admin/dashboard/website-manage/home-banner/post_active/{id}', [bannerController::class, 'post_active']);
    Route::get('admin/dashboard/website-manage/home-banner/post_deactive/{id}', [bannerController::class, 'post_deactive']);
    /*--------  Banner end here  --------*/
    Route::get('admin/dashboard/website-manage/blade-page', [bladeInfoController::class, 'index']);
    Route::get('admin/dashboard/website-manage/blade-page/add', [bladeInfoController::class, 'add']);
    Route::get('admin/dashboard/website-manage/blade-page/edit/{slug}', [bladeInfoController::class, 'edit']);
    Route::get('admin/dashboard/website-manage/blade-page/view/{slug}', [bladeInfoController::class, 'view']);
    Route::post('admin/dashboard/website-manage/blade-page/submit', [bladeInfoController::class, 'insert']);
    Route::post('admin/dashboard/website-manage/blade-page/update', [bladeInfoController::class, 'update']);
    Route::get('admin/dashboard/website-manage/blade-page/softdelete/{id}', [bladeInfoController::class, 'softdelete']);
    Route::get('admin/dashboard/website-manage/blade-page/restore/{id}', [bladeInfoController::class, 'restore']);
    Route::get('admin/dashboard/website-manage/blade-page/delete/{id}', [bladeInfoController::class, 'delete']);
    Route::get('admin/dashboard/website-manage/blade-page/recycle', [bladeInfoController::class, 'recycle']);
    Route::get('admin/dashboard/website-manage/blade-page/post_active/{id}', [bladeInfoController::class, 'post_active']);
    Route::get('admin/dashboard/website-manage/blade-page/post_deactive/{id}', [bladeInfoController::class, 'post_deactive']);
    // --------------  common route --------------- 
    Route::prefix('admin/dashboard/website-manage/faqs')->name('faqs.')->group(function () {
        Route::get('/', [faqController::class, 'index'])->name('all');
        Route::get('/add', [faqController::class, 'add'])->name('add');
        Route::get('/edit/{slug}', [faqController::class, 'edit'])->name('edit');
        Route::get('/view/{slug}', [faqController::class, 'view'])->name('view');
        Route::post('/submit', [faqController::class, 'insert'])->name('submit'); 
        Route::post('/update', [faqController::class, 'update'])->name('update');
        Route::get('/softdelete/{id}', [faqController::class, 'softdelete'])->name('softdelete');
        Route::get('/restore/{id}', [faqController::class, 'restore'])->name('restore');
        Route::get('/delete/{id}', [faqController::class, 'delete'])->name('delete');
        Route::get('/recycle', [faqController::class, 'recycle'])->name('recycle');
        Route::get('/post_active/{id}', [faqController::class, 'post_active'])->name('post_active');
        Route::get('/post_deactive/{id}', [faqController::class, 'post_deactive'])->name('post_deactive');
    });
    /*---------  common route end here --------- */





    /*-------- ===========================   
    Home Page rout Start here 
    =====================================- --------*/

    Route::prefix('admin/dashboard/website-manage/whatsnew')->name('whatsnew.')->group(function () {
        Route::get('/', [whatsnewController::class, 'index'])->name('all');
        Route::get('/add', [whatsnewController::class, 'add'])->name('add');
        Route::get('/edit/{slug}', [whatsnewController::class, 'edit'])->name('edit');
        Route::get('/view/{slug}', [whatsnewController::class, 'view'])->name('view');
        Route::post('/submit', [whatsnewController::class, 'insert'])->name('submit');
        Route::post('/update', [whatsnewController::class, 'update'])->name('update');
        Route::get('/softdelete/{id}', [whatsnewController::class, 'softdelete'])->name('softdelete');
        Route::get('/restore/{id}', [whatsnewController::class, 'restore'])->name('restore');
        Route::get('/delete/{id}', [whatsnewController::class, 'delete'])->name('delete');
        Route::get('/recycle', [whatsnewController::class, 'recycle'])->name('recycle');
        Route::get('/post_active/{id}', [whatsnewController::class, 'post_active'])->name('post_active');
        Route::get('/post_deactive/{id}', [whatsnewController::class, 'post_deactive'])->name('post_deactive');
    });
    // ---------------whats new end here ---------------
    Route::prefix('admin/dashboard/website-manage/service_overview')->name('serviceOverview.')->group(function () {
        Route::get('/', [serviceOverviewController::class, 'index'])->name('all');
        Route::get('/add', [serviceOverviewController::class, 'add'])->name('add');
        Route::get('/edit/{slug}', [serviceOverviewController::class, 'edit'])->name('edit');
        Route::get('/view/{slug}', [serviceOverviewController::class, 'view'])->name('view');
        Route::post('/submit', [serviceOverviewController::class, 'insert'])->name('submit');
        Route::post('/update', [serviceOverviewController::class, 'update'])->name('update');
        Route::get('/softdelete/{id}', [serviceOverviewController::class, 'softdelete'])->name('softdelete');
        Route::get('/restore/{id}', [serviceOverviewController::class, 'restore'])->name('restore');
        Route::get('/delete/{id}', [serviceOverviewController::class, 'delete'])->name('delete');
        Route::get('/recycle', [serviceOverviewController::class, 'recycle'])->name('recycle');
        Route::get('/post_active/{id}', [serviceOverviewController::class, 'post_active'])->name('post_active');
        Route::get('/post_deactive/{id}', [serviceOverviewController::class, 'post_deactive'])->name('post_deactive');
    });
    // ---------------  service over view end here ---------------
    Route::prefix('admin/dashboard/website-manage/smeads')->name('smeads.')->group(function () {
        Route::get('/', [smeAdsController::class, 'index'])->name('all');
        Route::get('/add', [smeAdsController::class, 'add'])->name('add');
        Route::get('/edit/{slug}', [smeAdsController::class, 'edit'])->name('edit');
        Route::get('/view/{slug}', [smeAdsController::class, 'view'])->name('view');
        Route::post('/submit', [smeAdsController::class, 'insert'])->name('submit');
        Route::post('/update', [smeAdsController::class, 'update'])->name('update');
        Route::get('/softdelete/{id}', [smeAdsController::class, 'softdelete'])->name('softdelete');
        Route::get('/restore/{id}', [smeAdsController::class, 'restore'])->name('restore');
        Route::get('/delete/{id}', [smeAdsController::class, 'delete'])->name('delete');
        Route::get('/recycle', [smeAdsController::class, 'recycle'])->name('recycle');
        Route::get('/post_active/{id}', [smeAdsController::class, 'post_active'])->name('post_active');
        Route::get('/post_deactive/{id}', [smeAdsController::class, 'post_deactive'])->name('post_deactive');
    });
    // ---------------  EME end here ---------------
    Route::prefix('admin/dashboard/website-manage/dipositads')->name('dipositads.')->group(function () {
        Route::get('/', [dipositAdsController::class, 'index'])->name('all');
        Route::get('/add', [dipositAdsController::class, 'add'])->name('add');
        Route::get('/edit/{slug}', [dipositAdsController::class, 'edit'])->name('edit');
        Route::get('/view/{slug}', [dipositAdsController::class, 'view'])->name('view');
        Route::post('/submit', [dipositAdsController::class, 'insert'])->name('submit');
        Route::post('/update', [dipositAdsController::class, 'update'])->name('update');
        Route::get('/softdelete/{id}', [dipositAdsController::class, 'softdelete'])->name('softdelete');
        Route::get('/restore/{id}', [dipositAdsController::class, 'restore'])->name('restore');
        Route::get('/delete/{id}', [dipositAdsController::class, 'delete'])->name('delete');
        Route::get('/recycle', [dipositAdsController::class, 'recycle'])->name('recycle');
        Route::get('/post_active/{id}', [dipositAdsController::class, 'post_active'])->name('post_active');
        Route::get('/post_deactive/{id}', [dipositAdsController::class, 'post_deactive'])->name('post_deactive');
    });
    // ---------------  Deposit ads end here ---------------
    Route::prefix('admin/dashboard/website-manage/loansteps')->name('loansteps.')->group(function () {
        Route::get('/', [loanStepController::class, 'index'])->name('all');
        Route::get('/add', [loanStepController::class, 'add'])->name('add');
        Route::get('/edit/{slug}', [loanStepController::class, 'edit'])->name('edit');
        Route::get('/view/{slug}', [loanStepController::class, 'view'])->name('view');
        Route::post('/submit', [loanStepController::class, 'insert'])->name('submit');
        Route::post('/update', [loanStepController::class, 'update'])->name('update');
        Route::get('/softdelete/{id}', [loanStepController::class, 'softdelete'])->name('softdelete');
        Route::get('/restore/{id}', [loanStepController::class, 'restore'])->name('restore');
        Route::get('/delete/{id}', [loanStepController::class, 'delete'])->name('delete');
        Route::get('/recycle', [loanStepController::class, 'recycle'])->name('recycle');
        Route::get('/post_active/{id}', [loanStepController::class, 'post_active'])->name('post_active');
        Route::get('/post_deactive/{id}', [loanStepController::class, 'post_deactive'])->name('post_deactive');
    });
    // ---------------  Deposit ads end here ---------------
    
   /*-------- ===========================  Home Page rout end here ====================================- --------*/
    // about us route 
   Route::prefix('admin/dashboard/website-manage/about-us')->name('aboutus.')->group(function () {
    Route::get('/', [aboutController::class, 'index'])->name('all');
    Route::get('/add', [aboutController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [aboutController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [aboutController::class, 'view'])->name('view');
    Route::post('/submit', [aboutController::class, 'insert'])->name('submit');
    Route::post('/update', [aboutController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [aboutController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [aboutController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [aboutController::class, 'delete'])->name('delete');
    Route::get('/recycle', [aboutController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [aboutController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [aboutController::class, 'post_deactive'])->name('post_deactive');
});
//what we do start 
   Route::prefix('admin/dashboard/website-manage/whatwedo')->name('whatwedo.')->group(function () {
    Route::get('/', [whatwedoController::class, 'index'])->name('all');
    Route::get('/add', [whatwedoController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [whatwedoController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [whatwedoController::class, 'view'])->name('view');
    Route::post('/submit', [whatwedoController::class, 'insert'])->name('submit');
    Route::post('/update', [whatwedoController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [whatwedoController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [whatwedoController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [whatwedoController::class, 'delete'])->name('delete');
    Route::get('/recycle', [whatwedoController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [whatwedoController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [whatwedoController::class, 'post_deactive'])->name('post_deactive');
});
//what Security and trust route start here  
   Route::prefix('admin/dashboard/website-manage/security_trust')->name('security_trust.')->group(function () {
    Route::get('/', [securityTrustController::class, 'index'])->name('all');
    Route::get('/add', [securityTrustController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [securityTrustController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [securityTrustController::class, 'view'])->name('view');
    Route::post('/submit', [securityTrustController::class, 'insert'])->name('submit');
    Route::post('/update', [securityTrustController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [securityTrustController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [securityTrustController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [securityTrustController::class, 'delete'])->name('delete');
    Route::get('/recycle', [securityTrustController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [securityTrustController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [securityTrustController::class, 'post_deactive'])->name('post_deactive');
});
//Easy Loan route start here  
   Route::prefix('admin/dashboard/website-manage/easyloan')->name('easyloan.')->group(function () {
    Route::get('/', [easyLoancontroller::class, 'index'])->name('all');
    Route::get('/add', [easyLoancontroller::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [easyLoancontroller::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [easyLoancontroller::class, 'view'])->name('view');
    Route::post('/submit', [easyLoancontroller::class, 'insert'])->name('submit');
    Route::post('/update', [easyLoancontroller::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [easyLoancontroller::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [easyLoancontroller::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [easyLoancontroller::class, 'delete'])->name('delete');
    Route::get('/recycle', [easyLoancontroller::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [easyLoancontroller::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [easyLoancontroller::class, 'post_deactive'])->name('post_deactive');
});
//Testimonial route start here  
   Route::prefix('admin/dashboard/website-manage/testimonial')->name('testimonial.')->group(function () {
    Route::get('/', [testimonialController::class, 'index'])->name('all');
    Route::get('/add', [testimonialController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [testimonialController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [testimonialController::class, 'view'])->name('view');
    Route::post('/submit', [testimonialController::class, 'insert'])->name('submit');
    Route::post('/update', [testimonialController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [testimonialController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [testimonialController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [testimonialController::class, 'delete'])->name('delete');
    Route::get('/recycle', [testimonialController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [testimonialController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [testimonialController::class, 'post_deactive'])->name('post_deactive');
});
//slogan route start here  
   Route::prefix('admin/dashboard/website-manage/slogan')->name('slogan.')->group(function () {
    Route::get('/', [sloganController::class, 'index'])->name('all');
    Route::get('/add', [sloganController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [sloganController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [sloganController::class, 'view'])->name('view');
    Route::post('/submit', [sloganController::class, 'insert'])->name('submit');
    Route::post('/update', [sloganController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [sloganController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [sloganController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [sloganController::class, 'delete'])->name('delete');
    Route::get('/recycle', [sloganController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [sloganController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [sloganController::class, 'post_deactive'])->name('post_deactive');
});

/*-------- ===========================  Home Page rout end here ====================================- --------*/
/*-------- ===========================  what we do Page rout end here ====================================- --------*/
Route::prefix('admin/dashboard/website-manage/micro_service')->name('micro_service.')->group(function () {
    Route::get('/', [microFinanceServicecontroller::class, 'index'])->name('all');
    Route::get('/add', [microFinanceServicecontroller::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [microFinanceServicecontroller::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [microFinanceServicecontroller::class, 'view'])->name('view');
    Route::post('/submit', [microFinanceServicecontroller::class, 'insert'])->name('submit');
    Route::post('/update', [microFinanceServicecontroller::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [microFinanceServicecontroller::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [microFinanceServicecontroller::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [microFinanceServicecontroller::class, 'delete'])->name('delete');
    Route::get('/recycle', [microFinanceServicecontroller::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [microFinanceServicecontroller::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [microFinanceServicecontroller::class, 'post_deactive'])->name('post_deactive');
});
Route::prefix('admin/dashboard/website-manage/page_desc')->name('page_desc.')->group(function () {
    Route::get('/', [pageDescriptionController::class, 'index'])->name('all');
    Route::get('/add', [pageDescriptionController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [pageDescriptionController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [pageDescriptionController::class, 'view'])->name('view');
    Route::post('/submit', [pageDescriptionController::class, 'insert'])->name('submit');
    Route::post('/update', [pageDescriptionController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [pageDescriptionController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [pageDescriptionController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [pageDescriptionController::class, 'delete'])->name('delete');
    Route::get('/recycle', [pageDescriptionController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [pageDescriptionController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [pageDescriptionController::class, 'post_deactive'])->name('post_deactive');
});
//  page descrioption end here 
Route::prefix('admin/dashboard/website-manage/allpost')->name('allpost.')->group(function () {
    Route::get('/', [postController::class, 'index'])->name('all');
    Route::get('/add', [postController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [postController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [postController::class, 'view'])->name('view');
    Route::post('/submit', [postController::class, 'insert'])->name('submit');
    Route::post('/update', [postController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [postController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [postController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [postController::class, 'delete'])->name('delete');
    Route::get('/recycle', [postController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [postController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [postController::class, 'post_deactive'])->name('post_deactive');
});
// ------ all post controller -------
Route::prefix('admin/dashboard/website-manage/product')->name('product.')->group(function () {
    Route::get('/', [productController::class, 'index'])->name('all');
    Route::get('/add', [productController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [productController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [productController::class, 'view'])->name('view');
    Route::post('/submit', [productController::class, 'insert'])->name('submit');
    Route::post('/update', [productController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [productController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [productController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [productController::class, 'delete'])->name('delete');
    Route::get('/recycle', [productController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [productController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [productController::class, 'post_deactive'])->name('post_deactive');
});
// ------ all post controller -------
Route::prefix('admin/dashboard/website-manage/bannerbottom')->name('bannerbottom.')->group(function () {
    Route::get('/', [bannerBottomController::class, 'index'])->name('all');
    Route::get('/add', [bannerBottomController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [bannerBottomController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [bannerBottomController::class, 'view'])->name('view');
    Route::post('/submit', [bannerBottomController::class, 'insert'])->name('submit');
    Route::post('/update', [bannerBottomController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [bannerBottomController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [bannerBottomController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [bannerBottomController::class, 'delete'])->name('delete');
    Route::get('/recycle', [bannerBottomController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [bannerBottomController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [bannerBottomController::class, 'post_deactive'])->name('post_deactive');
});
// ------ all banner bottom route end   -------
Route::prefix('admin/dashboard/website-manage/photo_gallery')->name('photo_gallery.')->group(function () {
    Route::get('/', [photoGealleryController::class, 'index'])->name('all');
    Route::get('/add', [photoGealleryController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [photoGealleryController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [photoGealleryController::class, 'view'])->name('view');
    Route::post('/submit', [photoGealleryController::class, 'insert'])->name('submit');
    Route::post('/update', [photoGealleryController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [photoGealleryController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [photoGealleryController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [photoGealleryController::class, 'delete'])->name('delete');
    Route::get('/recycle', [photoGealleryController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [photoGealleryController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [photoGealleryController::class, 'post_deactive'])->name('post_deactive');
});
Route::prefix('admin/dashboard/website-manage/video_gallery')->name('video_gallery.')->group(function () {
    Route::get('/', [videoGalleryController::class, 'index'])->name('all');
    Route::get('/add', [videoGalleryController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [videoGalleryController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [videoGalleryController::class, 'view'])->name('view');
    Route::post('/submit', [videoGalleryController::class, 'insert'])->name('submit');
    Route::post('/update', [videoGalleryController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [videoGalleryController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [videoGalleryController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [videoGalleryController::class, 'delete'])->name('delete');
    Route::get('/recycle', [videoGalleryController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [videoGalleryController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [videoGalleryController::class, 'post_deactive'])->name('post_deactive');
});
Route::prefix('admin/dashboard/website-manage/field_storise')->name('field_storise.')->group(function () {
    Route::get('/', [fieldStoriseController::class, 'index'])->name('all');
    Route::get('/add', [fieldStoriseController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [fieldStoriseController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [fieldStoriseController::class, 'view'])->name('view');
    Route::post('/submit', [fieldStoriseController::class, 'insert'])->name('submit');
    Route::post('/update', [fieldStoriseController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [fieldStoriseController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [fieldStoriseController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [fieldStoriseController::class, 'delete'])->name('delete');
    Route::get('/recycle', [fieldStoriseController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [fieldStoriseController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [fieldStoriseController::class, 'post_deactive'])->name('post_deactive');
});
Route::prefix('admin/dashboard/website-manage/allabout')->name('allabout.')->group(function () {
    Route::get('/', [allAboutController::class, 'index'])->name('all');
    Route::get('/add', [allAboutController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [allAboutController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [allAboutController::class, 'view'])->name('view');
    Route::post('/submit', [allAboutController::class, 'insert'])->name('submit');
    Route::post('/update', [allAboutController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [allAboutController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [allAboutController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [allAboutController::class, 'delete'])->name('delete');
    Route::get('/recycle', [allAboutController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [allAboutController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [allAboutController::class, 'post_deactive'])->name('post_deactive');
});
Route::prefix('admin/dashboard/website-manage/ourimpact')->name('ourimpact.')->group(function () {
    Route::get('/', [ourImpactController::class, 'index'])->name('all');
    Route::get('/add', [ourImpactController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [ourImpactController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [ourImpactController::class, 'view'])->name('view');
    Route::post('/submit', [ourImpactController::class, 'insert'])->name('submit');
    Route::post('/update', [ourImpactController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [ourImpactController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [ourImpactController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [ourImpactController::class, 'delete'])->name('delete');
    Route::get('/recycle', [ourImpactController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [ourImpactController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [ourImpactController::class, 'post_deactive'])->name('post_deactive');
});
/*-------------  Gallery route end here ------------------- */
Route::prefix('admin/dashboard/website-manage/notice')->name('notice.')->group(function () {
    Route::get('/', [noticeController::class, 'index'])->name('all');
    Route::get('/add', [noticeController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [noticeController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [noticeController::class, 'view'])->name('view');
    Route::post('/submit', [noticeController::class, 'insert'])->name('submit');
    Route::post('/update', [noticeController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [noticeController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [noticeController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [noticeController::class, 'delete'])->name('delete');
    Route::get('/recycle', [noticeController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [noticeController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [noticeController::class, 'post_deactive'])->name('post_deactive');
});
/*-------------  Gallery route end here ------------------- */
Route::prefix('admin/dashboard/website-manage/jobpost')->name('jobpost.')->group(function () {
    Route::get('/', [jobpostController::class, 'index'])->name('all');
    Route::get('/add', [jobpostController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [jobpostController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [jobpostController::class, 'view'])->name('view');
    Route::post('/submit', [jobpostController::class, 'insert'])->name('submit');
    Route::post('/update', [jobpostController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [jobpostController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [jobpostController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [jobpostController::class, 'delete'])->name('delete');
    Route::get('/recycle', [jobpostController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [jobpostController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [jobpostController::class, 'post_deactive'])->name('post_deactive');
});
/*-------------  job post route end here ------------------- */
Route::prefix('admin/dashboard/website-manage/course')->name('course.')->group(function () {
    Route::get('/', [courseController::class, 'index'])->name('all');
    Route::get('/add', [courseController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [courseController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [courseController::class, 'view'])->name('view');
    Route::post('/submit', [courseController::class, 'insert'])->name('submit');
    Route::post('/update', [courseController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [courseController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [courseController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [courseController::class, 'delete'])->name('delete');
    Route::get('/recycle', [courseController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [courseController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [courseController::class, 'post_deactive'])->name('post_deactive');
});
Route::prefix('admin/dashboard/website-manage/appoinment_book')->name('appoinment_book.')->group(function () {
    Route::get('/', [bookAppoinmentController::class, 'index'])->name('all');
    Route::get('/add', [bookAppoinmentController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [bookAppoinmentController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [bookAppoinmentController::class, 'view'])->name('view');
    Route::post('/submit', [bookAppoinmentController::class, 'insert'])->name('submit');
    Route::post('/update', [bookAppoinmentController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [bookAppoinmentController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [bookAppoinmentController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [bookAppoinmentController::class, 'delete'])->name('delete');
    Route::get('/recycle', [bookAppoinmentController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [bookAppoinmentController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [bookAppoinmentController::class, 'post_deactive'])->name('post_deactive');
    Route::get('/denied/{id}', [bookAppoinmentController::class, 'denied'])->name('denied');
    Route::get('/resume/{id}', [bookAppoinmentController::class, 'resume'])->name('resume');
   
});
/*-------------  job post route end here ------------------- */
Route::prefix('admin/dashboard/website-manage/apply_course')->name('apply_course.')->group(function () {
    Route::get('/', [applyCourseController::class, 'index'])->name('all');
    Route::get('/add', [applyCourseController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [applyCourseController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [applyCourseController::class, 'view'])->name('view');
    Route::post('/submit', [applyCourseController::class, 'insert'])->name('submit');
    Route::post('/update', [applyCourseController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [applyCourseController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [applyCourseController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [applyCourseController::class, 'delete'])->name('delete');
    Route::get('/recycle', [applyCourseController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [applyCourseController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [applyCourseController::class, 'post_deactive'])->name('post_deactive');
});
/*-------------  job post route end here ------------------- */
Route::prefix('admin/dashboard/website-manage/designation')->name('designation.')->group(function () {
    Route::get('/', [designationController::class, 'index'])->name('all');
    Route::get('/add', [designationController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [designationController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [designationController::class, 'view'])->name('view');
    Route::post('/submit', [designationController::class, 'insert'])->name('submit');
    Route::post('/update', [designationController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [designationController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [designationController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [designationController::class, 'delete'])->name('delete');
    Route::get('/recycle', [designationController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [designationController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [designationController::class, 'post_deactive'])->name('post_deactive');
});
/*-------------  job post route end here ------------------- */
Route::prefix('admin/dashboard/website-manage/allstaff')->name('allstaff.')->group(function () {
    Route::get('/', [allStaffController::class, 'index'])->name('all');
    Route::get('/add', [allStaffController::class, 'add'])->name('add');
    Route::get('/edit/{slug}', [allStaffController::class, 'edit'])->name('edit');
    Route::get('/view/{slug}', [allStaffController::class, 'view'])->name('view');
    Route::post('/submit', [allStaffController::class, 'insert'])->name('submit');
    Route::post('/update', [allStaffController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [allStaffController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [allStaffController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [allStaffController::class, 'delete'])->name('delete');
    Route::get('/recycle', [allStaffController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [allStaffController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [allStaffController::class, 'post_deactive'])->name('post_deactive');
});
/*-------------  job post route end here ------------------- */














































});



require __DIR__.'/adminauth.php';




