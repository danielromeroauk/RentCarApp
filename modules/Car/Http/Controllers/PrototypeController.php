<?php namespace Modules\Car\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Modules\Car\Entities\Prototype;
use Modules\Car\Http\Requests\PrototypeRequest;
use Pingpong\Modules\Routing\Controller;

class PrototypeController extends Controller {

    public function index()
    {
        $prototypes = Prototype::all();

        return view('car::prototype.index', compact('prototypes'));
    }

    public function create()
    {
        return view('car::prototype.create');
    }

    public function store(PrototypeRequest $request)
    {
        $data = Prototype::create($request->all());

        $prototype = Prototype::findOrFail($data->id);

        Session::flash('message', trans('car::ui.prototype.message_create', array('name' => $prototype->name)));

        return redirect('car/model/create');
    }

    public function edit($id)
    {

        $prototype = Prototype::findOrFail($id);

        return view('car::prototype.edit', compact('prototype'));
    }

    public function update($id, PrototypeRequest $request)
    {

        $prototype = Prototype::findOrFail($id);

        $prototype->update($request->all());

        Session::flash('message', trans('car::ui.prototype.message_update', array('name' => $prototype->name)));

        return redirect('car/model');
    }

    public function destroy($id)
    {
        $prototype = Prototype::findOrFail($id);

        Prototype::destroy($id);

        Session::flash('message', trans('car::ui.prototype.message_delete', array('name' => $prototype->name)));

        return redirect('car/model');
    }

}