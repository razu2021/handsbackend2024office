<?php

use App\Http\Controllers\manage_user\customer\CustomerController;
use Illuminate\Support\Facades\Route;

/*---------  All route is protected for auth admin start here ---------*/
Route::middleware(['auth','CustomerAuth'])->group(function () {
/*---------  All route is protected for auth admin start here ---------*/

Route::post('/customer-dashboard-submit', [CustomerController::class, 'role_update'])->name('customer_role_update');












/*=------------------------  all route is protected  end here ----------------------- */
});
require __DIR__.'/auth.php';
/*=------------------------  all route is protected  end here ----------------------- */
