<?php namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Modules\Auth\Entities\User;
use Modules\Auth\Http\Requests\UserRequest;
use Pingpong\Modules\Routing\Controller;
use Modules\Auth\Entities\Role;

class UserController extends Controller {

	public function index() {

        $users = User::with('roles')->get();

		return view('auth::user.index', compact('users'));
	}

    public function create() {

        $roles = Role::orderBy('display_name', 'asc')->lists('display_name', 'id');

        return view('auth::user.create', compact('roles'));
    }

    public function store(UserRequest $request) {

        $data = User::create([
            'firstname' =>  $request->input('firstname'),
            'lastname'  =>  $request->input('lastname'),
            'email'     =>  $request->input('email'),
            'password'  =>  \Hash::make($request->input('password')),
        ]);

        $user = User::findOrFail($data->id);

        $data->attachRoles($request->input('role_id'));

        Session::flash('message', trans('auth::ui.user.message_create', array('name' => $user->firstname)));

        return redirect('auth/user/create');
    }

    public function edit($id) {

        $user = User::with('roles')->findOrFail($id);

        $roles = Role::orderBy('display_name', 'asc')->lists('display_name', 'id');

        return view('auth::user.edit', compact('user', 'roles'));
    }

    public function update($id){

    }

    public function destroy($id) {

        $user = User::findOrFail($id);

        User::destroy($id);

        Session::flash('message', trans('auth::ui.user.message_delete', array('name' => $user->firstname)));

        return redirect('auth/user');
    }
	
}