<?php namespace Modules\Agreement\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Modules\Agreement\Entities\AgreementStatus;
use Modules\Agreement\Http\Requests\AgreementStatusRequest;
use Pingpong\Modules\Routing\Controller;

class AgreementStatusController extends Controller {
	
	public function index() {

        $status = AgreementStatus::all();

		return view('agreement::status.index', compact('status'));
	}

    public function create() {

        return view('agreement::status.create');
    }
    
    public function store(AgreementStatusRequest $request) {
        
        $data = AgreementStatus::create($request->all());
        
        $status = AgreementStatus::findOrFail($data->id);

        Session::flash('message', trans('agreement::ui.status.message_create', array('name' => $status->name)));

        return redirect('agreement/status/create');
        
    }

    public function edit($id) {

        $status = AgreementStatus::findOrFail($id);

        return view('agreement::status.edit', compact('status'));
    }

    public function update($id, AgreementStatusRequest $request) {

        $status = AgreementStatus::findOrFail($id);

        $status->update($request->all());

        Session::flash('message', trans('agreement::ui.status.message_update', array('name' => $status->name)));

        return redirect('agreement/status');
    }

    public function destroy($id) {

        $status = AgreementStatus::findOrFail($id);

        AgreementStatus::destroy($id);

        Session::flash('message', trans('agreement::ui.status.message_delete', array('name' => $status->name)));

        return redirect('agreement/status');
    }
	
}