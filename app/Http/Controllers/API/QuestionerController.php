<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class QuestionerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * verify if user is authorized to use the app
     *
     * @param Request verification
     * @return Response
     */
    public function verifyEntrance(Request $request)
    {
        $this->validate($request, [
            'verification' => 'required|string',
        ]);

        $verification_record = Verification::first();

        if( Hash::check($request->get('verification'), $verification_record->password) ) {
            return response()->json([
                'api_token' => $apikey
            ], 200);
        } else {
            return response()->json([], 400);
        }
    }

    /**
     * Login User
     *
     * @param Request mobile, password
     * @return Token
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|numeric',
            'password' => 'required|string'
        ]);

        $user = User::where('type', 'visitor')->where('mobile', $request->input('mobile'))->first();

        if(Hash::check($request->input('password'), $user->password)){

            $apikey = base64_encode(str_random(40));
            User::where('mobile', $request->input('mobile'))->update(['api_token' => "$apikey"]);
            
            return response()->json([
                'api_token' => $apikey
            ], 200);
        }
        
        return response()->json([],401);
    }

}
