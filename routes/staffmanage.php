<?php 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;

// admin admin site controller ----------------------------------------------------     ADMIN SITE CONTROLLER --------------
use App\Http\Controllers\admin\admin_home\AlluserController;
use App\Http\Controllers\admin\admin_home\staff\AlluserApplicationController;
//COMMON CONTROLLER 
use App\Http\Controllers\admin\common\LeaveDetailsController;
use App\Http\Controllers\admin\common\LeaveResonController;
use App\Http\Controllers\manage_user\staff\WorkStatusController;

/*---------  All route is protected for auth admin start here ---------*/
Route::middleware('auth:admin')->group(function () {
/*---------  All route is protected for auth admin start here ---------*/

Route::prefix('admin/dashboard/admin_allusers')->name('alluser.')->group(function(){
    Route::get('/', [AlluserController::class, 'index'])->name('all');
    Route::get('/add', [AlluserController::class, 'add'])->name('add');
    Route::get('/edit/{id}', [AlluserController::class, 'edit'])->name('edit');
    Route::get('/view/{id}', [AlluserController::class, 'view'])->name('view');
    Route::post('/submit', [AlluserController::class, 'insert'])->name('submit');
    Route::post('/update', [AlluserController::class, 'update'])->name('update');
    Route::get('/softdelete/{id}', [AlluserController::class, 'softdelete'])->name('softdelete');
    Route::get('/restore/{id}', [AlluserController::class, 'restore'])->name('restore');
    Route::get('/delete/{id}', [AlluserController::class, 'delete'])->name('delete');
    Route::get('/recycle', [AlluserController::class, 'recycle'])->name('recycle');
    Route::get('/post_active/{id}', [AlluserController::class, 'post_active'])->name('post_active');
    Route::get('/post_deactive/{id}', [AlluserController::class, 'post_deactive'])->name('post_deactive');



});


    // Route::get('/admin/dashboard/admin_allusers', [AlluserController::class, 'index']);
    // Route::get('/admin/dashboard/admin_user_all_information', [AlluserController::class, 'alldata']);
    // Route::get('/admin/dashboard/admin_allusers/view/{id}', [AlluserController::class, 'view']);
    // Route::get('/admin/dashboard/admin_allusers/delete/{id}', [AlluserController::class, 'delete']);


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

  

/* ######################   all protected route end here ========== ##################3*/
});
require __DIR__.'/adminauth.php';
/* ######################   all protected route end here ========== ##################3*/
