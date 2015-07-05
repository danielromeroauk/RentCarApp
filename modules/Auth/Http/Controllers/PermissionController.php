<?php namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Pingpong\Modules\Routing\Controller;
use Modules\Auth\Entities\Permission;
use Modules\Auth\Http\Requests\PermissionRequest;


class PermissionController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }
	
	public function index() {

        $permissions = Permission::all();

		return view('auth::permission.index', compact('permissions'));
	}

	public function create() {

        return view('auth::permission.create');
    }

    public function store(PermissionRequest $request) {

        $data = Permission::create($request->all());

        $permission = Permission::findOrFail($data->id);

       Session::flash('message', trans('auth::ui.permission.message_create', array('name' => $permission->name)));

        return redirect('auth/permission/create');
	
    }

    public function edit($id) {

        $permission = Permission::findOrFail($id);

        return view('auth::permission.edit', compact('permission'));
    }

    public function update($id, PermissionRequest $request) {

        $permission = Permission::findOrFail($id);

        $permission->update($request->all());

        Session::flash('message', trans('auth::ui.permission.message_update', array('name' => $permission->name)));

        return redirect('auth/permission');
	
    }

    public function destroy($id) {
    	
    	$permission = Permission::findOrFail($id);

    	Permission::destroy($id);

    	Session::flash('message', trans('auth::ui.permission.message_delete', array('name' => $permission->name)));

        return redirect('auth/permission');
    }
	
}