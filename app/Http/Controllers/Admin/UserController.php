<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}
    
    /**
     * show login form
     *
     * @param Request
     * @return view
     */
    public function showLoginForm(Request $request)
    {
        if($request->session()->has('user_id')) {
            return redirect()->route('dashboard');
        }
        
        return view('auth.login');
    }
   
    /**
     * Login user
     *
     * @param Request
     * @return view
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|numeric',
            'password' => 'required|string'
        ]);

        $user = User::where('type', 'admin')->where('mobile', $request->input('mobile'))->first();
//      if(Hash::check($request->input('password'), $user->password)){
        if( $request->input('password') == $user->password ){
            $session = $request->session();
            $session->put('user_id', $user->id);
            $_SESSION['success'] = 'ورود با موفقیت انجام شد';
//            $session->put('success', 'ورود با موفقیت');
//            $session->put('fail', 'info');
            return redirect()->route('dashboard');
        }
        //refresh login page with alert(wrong password or username)
        else{
            $_SESSION['fail'] = 'شماره کاربری یا رمز عبور اشتباه است';
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->remove('user_id');
        $_SESSION['success'] = 'خروج با موفقیت انجام شد';
        //redirect to login page
        return redirect()->route('login');
    }

    public function test(Request $request)
    {
        return $request->user;
    }
}