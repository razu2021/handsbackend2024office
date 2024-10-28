<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// email verification notice 
Route::get('/email/verify', function () {
    return view('admin.auth.verify-email');
})->middleware('auth:admin')->name('admin.verification.notice');


//email verification handler 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('admin.dashboard');
})->middleware(['auth:admin', 'signed'])->name('admin.verification.verify');


//Resend Email verification link 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth:admin', 'throttle:6,1'])->name('admin.verification.send');


// Admin dashboard route
Route::get('/admin/dashboard', function () {
    return view('admin.admin_home.index');
})->middleware(['auth:admin'])->name('admin.dashboard');


Route::get('admin-dashboard-website-manage-usefull-link', [AdminController::class, 'all_link'])->name('all_link');


// admin profile manage 
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});









/* ######################   all protected route end here ========== ##################3*/
require __DIR__.'/adminauth.php';
/* ######################   all protected route end here ========== ##################3*/


