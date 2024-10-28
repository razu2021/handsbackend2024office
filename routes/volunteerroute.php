<?php
use App\Http\Controllers\manage_user\volunteer\VolunteerController;
use Illuminate\Support\Facades\Route;

/*---------  All route is protected for auth admin start here ---------*/
Route::middleware(['auth','VolunteerAuth'])->group(function () {
/*---------  All route is protected for auth admin start here ---------*/

Route::post('/volunteer-dashboard-submit', [VolunteerController::class, 'role_update'])->name('volunteer_role_update');












/*=------------------------  all route is protected  end here ----------------------- */
});
require __DIR__.'/auth.php';
/*=------------------------  all route is protected  end here ----------------------- */
