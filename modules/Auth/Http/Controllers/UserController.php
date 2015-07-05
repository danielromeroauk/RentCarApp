<?php namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Auth\Entities\User;
use Modules\Auth\Http\Requests\UserRequest;
use Pingpong\Modules\Routing\Controller;
use Modules\Auth\Entities\Role;

class UserController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }

	public function index() {

        if(Auth::user()->can('read-users')) {

            $users = User::with('roles')->get();

            return view('auth::user.index', compact('users'));
        }
        return redirect('auth/logout');
	}

    public function create() {

        if(Auth::user()->can('create-users')) {

            $roles = Role::orderBy('display_name', 'asc')->lists('display_name', 'id');

            return view('auth::user.create', compact('roles'));
        }
        return redirect('auth/logout');
    }

    public function store(UserRequest $request) {

        if(Auth::user()->can('create-users')) {

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
        return redirect('auth/logout');
    }

    public function edit($id) {

        if(Auth::user()->can('update-users')) {

            $user = User::with('roles')->findOrFail($id);

            $roles = Role::orderBy('display_name', 'asc')->lists('display_name', 'id');

            return view('auth::user.edit', compact('user', 'roles'));
        }

        return redirect('auth/logout');
    }

    public function update($id){

        if($this->user->can('update-users')) {

        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if($this->user->can('delete-users')) {

            $user = User::findOrFail($id);

            User::destroy($id);

            Session::flash('message', trans('auth::ui.user.message_delete', array('name' => $user->firstname)));

            return redirect('auth/user');
        }

        return redirect('auth/logout');
    }
}