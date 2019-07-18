<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class QuestionerController extends Controller
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

        return view('admin.questioners.index', compact('users'));
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

        return view('admin.questioners.show', compact('user'));
    }
    
    /**
     * Show create questionnare form
     *
     * @return view
     */
    public function create()
    {
        return view('admin.questioners.create');
    }
    
    /**
     * store questionnare
     *
     * @return view
     */
    public function store(Request $request)
    {
        // dd($request->get('mobile'));
        User::create([
            'name' => $request->get('name'),
            'password' => Hash::make($request->get('password')),
            'mobile' => $request->get('mobile'),
            'type' => $request->get('type'),
        ]);

        return redirect()->route('questioners.index');
    }

    /**
     * show questionnare's edit form
     *
     * @return view
     */
    public function edit(Request $request)
    {
        return view('admin.questioners.edit');
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

        return view('admin.questioners');
    }

    /**
     * delete questionnare
     *
     * @return view
     */
    public function delete($id)
    {
        $user = User::find($id);

        $user->deleted_at = date("Y-m-d h:i:s");
        $usr->save();

        return view('admin.questioners');
    }

    /**
     * activate or inactivate questioner
     *
     * @return view
     */
    public function check($id)
    {
        $user = User::find($id);

        if($user->status == 'active') {
            $user->deleted_at = 'inactive';
        } else {
            $user->status = 'active';
        }
        $usr->save();

        return redirect()->back();
    }
    
}