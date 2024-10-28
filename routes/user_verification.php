<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



/*=== Email verification system start here ======== */
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
/*==========  Email Verification system end here  */

// Staff  Authenticate route
    Route::get('/dashboard', function () {
        return view('manage_user.staff.index');
    })->middleware(['auth','StaffAuth','verified'])->name('dashboard');

    // volunteer dashboard 
    Route::get('/volunteer-dashboard', function () {
        return view('manage_user.volunteer.index');
    })->middleware(['auth','VolunteerAuth','verified'])->name('volunteer-dashboard'); 

    // customer dashboard 
    Route::get('/customer-dashboard', function () {
        return view('manage_user.customer.index');
    })->middleware(['auth','CustomerAuth','verified'])->name('customer-dashboard');

    // User dashboard 
    Route::get('/user-dashboard', function () {
        return view('manage_user.normal_user.index');
    })->middleware(['auth','UserAuth','verified'])->name('user-dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__.'/auth.php';

