<?php

use App\Http\Controllers\manage_user\user\UsersController;
use Illuminate\Support\Facades\Route;

/*---------  All route is protected for auth admin start here ---------*/
Route::middleware(['auth','UserAuth'])->group(function () {
/*---------  All route is protected for auth admin start here ---------*/

Route::post('/user-dashboard-submit', [UsersController::class, 'role_update'])->name('role_update');













/*=------------------------  all route is protected  end here ----------------------- */
});
require __DIR__.'/auth.php';
/*=------------------------  all route is protected  end here ----------------------- */
