<?php namespace Modules\Car\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Modules\Car\Entities\Brand;
use Modules\Car\Http\Requests\BrandRequest;
use Pingpong\Modules\Routing\Controller;

class BrandController extends Controller {
	
	public function index()
	{
        $brands = Brand::all()->sort('asc');

		return view('car::brand.index', compact('brands'));
	}

    public function create()
    {
        return view('car::brand.create');
    }

    public function store(BrandRequest $request)
    {
        $data = Brand::create($request->all());

        $brand = Brand::findOrFail($data->id);

        Session::flash('message', trans('car::ui.brand.message_create', array('name' => $brand->name)));

        return redirect('car/brand/create');
    }

    public function edit($id)
    {

        $brand = Brand::findOrFail($id);

        return view('car::brand.edit', compact('brand'));
    }

    public function update($id, BrandRequest $request)
    {

        $brand = Brand::findOrFail($id);

        $brand->update($request->all());

        Session::flash('message', trans('car::ui.brand.message_update', array('name' => $brand->name)));

        return redirect('car/brand');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        Brand::destroy($id);

        Session::flash('message', trans('car::ui.brand.message_delete', array('name' => $brand->name)));

        return redirect('car/brand');
    }
	
}