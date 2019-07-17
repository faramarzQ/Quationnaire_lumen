<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class QuestionnaireController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}
    
    /**
     * Show all questionnares
     *
     * @return view
     */
    public function index()
    {
        $users = User::all();

        return view('admin.questionnaire.index', compact('users'));
    }
    
    /**
     * Show questionnare by id
     *
     * @param User id
     * @return view
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.questionnaire.index', compact('user'));
    }
    
    /**
     * Show create questionnare form
     *
     * @return view
     */
    public function create()
    {
        return view('admin.questionnaire.create');
    }
    
    /**
     * store questionnare
     *
     * @return view
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->get('name'),
            'password' => Hash::make($request->get('password')),
            'mobile' => $request->get('mobile'),
            'type' => $request->get('questionnare'),
        ]);

        return view('admin.questionnaire');
    }

    /**
     * show questionnare's edit form
     *
     * @return view
     */
    public function edit(Request $request)
    {
        return view('admin.questionnaire.edit');
    }
    
    /**
     * update questionnare
     *
     * @return view
     */
    public function update($id, Request $request)
    {
        $saved = User::where('id', $id)->update([
            'name' => $request->get('name'),
            'password' => Hash::make($request->get('password')),
            'mobile' => $request->get('mobile'),
        ]);

        if($saved) {
            //success session
        } else {
            //fail session
        }

        return view('admin.questionnaire');
    }

    /**
     * delete questionnare
     *
     * @return view
     */
    public function delete($id)
    {
        User::find($id)->delete();

        return view('admin.questionnaire');
    }
    
}