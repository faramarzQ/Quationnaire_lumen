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
    // public function __construct()
    // {
    //     $this->middleware('auth_web');
    // }
   
    /**
     * Login user
     *
     * @return void
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|numeric',
            'password' => 'required|string'
        ]);

        $user = User::where('type', 'admin')->where('mobile', $request->input('mobile'))->first();

        if(Hash::check($request->input('password'), $user->password)){

            $session = $request->session();
	        $session->put('user_id', $user->id);
            
            // show admin page
            return 'true';
        }
        
        //refresh login page with alert(wrong password or username)
    }

    public function logout(Request $request)
    {
        $request->session()->remove('user_id');

        //redirect to login page
        return 'removed';
    }

    public function test(Request $request)
    {
        return $request->user;
    }
}