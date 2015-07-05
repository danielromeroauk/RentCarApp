<?php namespace Modules\Car\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Modules\Car\Entities\Color;
use Modules\Car\Http\Requests\ColorRequest;
use Pingpong\Modules\Routing\Controller;

class ColorController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }
	
	public function index()
	{
        $colors = Color::all();

		return view('car::color.index', compact('colors'));
	}

    public function create()
    {
        return view('car::color.create');
    }

    public function store(ColorRequest $request)
    {
        $data = Color::create($request->all());

        $color = Color::findOrFail($data->id);

        Session::flash('message', trans('car::ui.color.message_create', array('name' => $color->name)));

        return redirect('car/color/create');
    }

    public function edit($id)
    {

        $color = Color::findOrFail($id);

        return view('car::color.edit', compact('color'));
    }

    public function update($id, ColorRequest $request)
    {

        $color = Color::findOrFail($id);

        $color->update($request->all());

        Session::flash('message', trans('car::ui.color.message_update', array('name' => $color->name)));

        return redirect('car/color');
    }

    public function destroy($id)
    {
        $color = Color::findOrFail($id);

        Color::destroy($id);

        Session::flash('message', trans('car::ui.color.message_delete', array('name' => $color->name)));

        return redirect('car/color');
    }
	
}