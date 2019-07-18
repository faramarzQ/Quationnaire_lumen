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
        $this->validate($request, [
            'name'     => 'required',
            'mobile'   => 'required|numeric',
            'password' => 'required|string'
        ]);
        User::create([
            'name' => $request->get('name'),
            'password' => Hash::make($request->get('password')),
            'mobile' => $request->get('mobile'),
            'type' => $request->get('type'),
        ]);
        $_SESSION['success'] = 'کاربر با موفقیت ایجاد شد';
        return redirect()->route('questioners.index');
    }

    /**
     * show questionnare's edit form
     *
     * @return view
     */
    public function edit($id)
    {
        $questioner = User::find($id);
        return view('admin.questioners.edit', compact('questioner'));
    }
    
    /**
     * update questionnare
     *
     * @return view
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'mobile'   => 'required|numeric',
            'password' => 'required|string'
        ]);
        $input = [
            'name'     => $request->get('name'),
            'password' => Hash::make($request->get('password')),
            'mobile'   => $request->get('mobile'),
        ];

        if ($request->get('password') == ''){
            unset($input['password']);
        }

        $questionerItem = User::find($id);
        $questionerItem->update($input);

        if($questionerItem) {
            $_SESSION['success'] = 'کاربر با موفقیت ویرایش شد';
            return redirect()->route('questioners.index');
        } else {
            $_SESSION['fail'] = 'مشکلی پیش آمده';
            return redirect()->route('questioners.edit', ['id' => $id]);
        }
//        return redirect()->route('questioners.index');
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
        $user->save();

        $_SESSION['success'] = 'کاربر با موفقیت حذف شد';
        return redirect()->route('questioners.index');
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
        $user->save();

        $_SESSION['success'] = 'وضعیت کاربر با موفقیت تغییر کرد';
        return redirect()->back();
    }
    
}