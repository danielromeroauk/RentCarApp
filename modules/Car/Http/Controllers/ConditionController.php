<?php namespace Modules\Car\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Modules\Car\Entities\Condition;
use Modules\Car\Http\Requests\ConditionRequest;
use Pingpong\Modules\Routing\Controller;

class ConditionController extends Controller {
	
	public function index()
	{
        $conditions = Condition::all();

		return view('car::condition.index', compact('conditions'));
	}

    public function create()
    {
        return view('car::condition.create');
    }

    public function store(ConditionRequest $request)
    {
        $data = Condition::create($request->all());

        $condition = Condition::findOrFail($data->id);

        Session::flash('message', trans('car::ui.condition.message_create', array('name' => $condition->name)));

        return redirect('car/condition/create');
    }

    public function edit($id)
    {

        $condition = Condition::findOrFail($id);

        return view('car::condition.edit', compact('condition'));
    }

    public function update($id, ConditionRequest $request)
    {

        $condition = Condition::findOrFail($id);

        $condition->update($request->all());

        Session::flash('message', trans('car::ui.condition.message_update', array('name' => $condition->name)));

        return redirect('car/condition');
    }

    public function destroy($id)
    {
        $condition = Condition::findOrFail($id);

        Condition::destroy($id);

        Session::flash('message', trans('car::ui.condition.message_delete', array('name' => $condition->name)));

        return redirect('car/condition');
    }
	
}