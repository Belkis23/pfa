<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\etudiant;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Spatie\Permission\Models\Permission;
use DB;
class LoginEtudiantController extends Controller
{
	 use AuthenticatesUsers;
     public function __construct()
    {
      $this->middleware('guest:etudiant');
    }

    public function showLoginForm()
    {
     
      return view('auth.loginetudiant');
    }

    public function login(Request $request)
    {
     // dd($request);
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);


      // Attempt to log the user in
      if (Auth::guard('etudiant')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      	$etudiant = etudiant::where('email',$request->email)->first();
        // if successful, then redirect to their intended location
        
     
        $president = Permission::where('name','president')->first();
        // dd($president);
        //  $setting =  DB::table('model_has_permissions')->where('permission_id',$president->id)->where('model_id',$etudiant->id)->where('model_type',"App\Models\etudiant")->first();
         
        if($etudiant->hasPermissionTo($president)){
        	 return redirect('home');
        	}else{
        		return back();
        	}
        
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('etudiant')->logout();
        return back();
    }
}
