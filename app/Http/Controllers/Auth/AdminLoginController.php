<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // validations
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=>'required|min:5'
        ]);

        // Attempt to log the user in if success
        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password],$request->remember)){

            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));

        
    }


}
