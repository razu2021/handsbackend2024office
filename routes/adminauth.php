<?php

use App\Http\Controllers\Adminauth\AuthenticatedSessionController;
use App\Http\Controllers\Adminauth\ConfirmablePasswordController;
use App\Http\Controllers\Adminauth\EmailVerificationNotificationController;
use App\Http\Controllers\Adminauth\EmailVerificationPromptController;
use App\Http\Controllers\Adminauth\NewPasswordController;
use App\Http\Controllers\Adminauth\PasswordController;
use App\Http\Controllers\Adminauth\PasswordResetLinkController;
use App\Http\Controllers\Adminauth\RegisteredUserController;
use App\Http\Controllers\Adminauth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    // Show the email verification notice
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    // Handle email verification via signed URL
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    // Resend email verification notification
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    // Confirm password before sensitive actions
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Update admin password
    Route::put('password', [PasswordController::class, 'update'])
                ->name('password.update');

    // Logout admin
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
