<?php 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*---------  All route is protected for auth admin start here ---------*/
Route::middleware('auth:admin')->group(function () {
/*---------  All route is protected for auth admin start here ---------*/







// your route is start herre 









/* ######################   all protected route end here ========== ##################3*/
});
require __DIR__.'/adminauth.php';
/* ######################   all protected route end here ========== ##################3*/
    