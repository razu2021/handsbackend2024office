<?php

namespace App\Http\Controllers\manage_user\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;

class UsersController extends Controller
{
   public function __construct(){
        $this->middleware('auth');
    }

      /* ------  this is update page --------*/
  public function role_update(Request $request){
    $request->validate([
        'role_request' => 'required',
    ],
        [
          'role_request.required' => 'Select Role Type !',
        ]
    );
    $id=$request['id'];
    $update=User::where('id',$id)->update([
        'role_request'=>$request['role_request'],
        'updated_at'=>Carbon::now()->toDateTimeString(),
    ]);
  /*------- image start here ------ */
  /*------- image start here ------ */
  if($update) {
    Session::flash('success', 'Request has been submitted successfully!');
    return redirect()->back();
} else {
    Session::flash('error', 'Request submission failed!');
    return redirect()->back();
}
// ---- session messages end 
  }
}
