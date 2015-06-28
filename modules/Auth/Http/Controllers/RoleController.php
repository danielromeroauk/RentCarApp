<?php namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Pingpong\Modules\Routing\Controller;
use Modules\Auth\Entities\Permission;
use Modules\Auth\Entities\Role;
use Modules\Auth\Http\Requests\RoleRequest;

class RoleController extends Controller {
	
	public function index() {

        $roles = Role::with('permissions')->get();

		return view('auth::role.index', compact('roles'));
	}

	public function create() {

		$permissions = Permission::orderBy('display_name', 'asc')->lists('display_name', 'id');
		
		return view('auth::role.create', compact('permissions'));
	}

	public function store(RoleRequest $request) {

        $data = Role::create($request->all());

        $role = Role::findOrFail($data->id);

        $data->attachPermissions($request->input('permission_id'));

        Session::flash('message', trans('auth::ui.role.message_create', array('name' => $role->name)));

        return redirect('auth/role/create');
    }

    public function edit($id) {

        $role = Role::with('permissions')->findOrFail($id);

        $permissions = Permission::orderBy('display_name', 'asc')->lists('display_name', 'id');

        return view('auth::role.edit', compact('role', 'permissions'));
    }

    public function update($id){

    }

    public function destroy($id) {

        $role = Role::findOrFail($id);

        Role::destroy($id);

        Session::flash('message', trans('auth::ui.role.message_delete', array('name' => $role->display_name)));

        return redirect('auth/role');
    }
	
}