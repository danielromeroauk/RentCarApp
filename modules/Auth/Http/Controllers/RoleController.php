<?php namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Pingpong\Modules\Routing\Controller;
use Modules\Auth\Entities\Permission;
use Modules\Auth\Entities\Role;
use Modules\Auth\Http\Requests\RoleRequest;

class RoleController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }
	
	public function index() {

        if(Auth::user()->can('read-roles')) {

            $roles = Role::with('permissions')->get();

            return view('auth::role.index', compact('roles'));
        }

        return redirect('auth/logout');
	}

	public function create() {

        if(Auth::user()->can('create-roles')) {

		$permissions = Permission::lists('display_name', 'id');
		
		return view('auth::role.create', compact('permissions'));
        }

        return redirect('auth/logout');
	}

	public function store(RoleRequest $request) {

        if(Auth::user()->can('create-roles')) {

        $data = Role::create($request->all());

        $role = Role::findOrFail($data->id);

        $data->attachPermissions($request->input('permission_id'));

        Session::flash('message', trans('auth::ui.role.message_create', array('name' => $role->name)));

        return redirect('auth/role/create');
        }

        return redirect('auth/logout');
    }

    public function edit($id) {

        if(Auth::user()->can('update-roles')) {

        $role = Role::with('permissions')->findOrFail($id);

        $permissions = Permission::orderBy('display_name', 'asc')->lists('display_name', 'id');

        return view('auth::role.edit', compact('role', 'permissions'));
        }

        return redirect('auth/logout');
    }

    public function update($id){

        if(Auth::user()->can('update-roles')) {

        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(Auth::user()->can('delete-roles')) {

        $role = Role::findOrFail($id);

        Role::destroy($id);

        Session::flash('message', trans('auth::ui.role.message_delete', array('name' => $role->display_name)));

        return redirect('auth/role');
        }

        return redirect('auth/logout');
    }
	
}