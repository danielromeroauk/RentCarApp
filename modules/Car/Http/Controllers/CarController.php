<?php namespace Modules\Car\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Modules\Car\Entities\Brand;
use Modules\Car\Entities\Car;
use Modules\Car\Entities\Color;
use Modules\Car\Entities\Condition;
use Modules\Car\Entities\Prototype;
use Modules\Car\Http\Requests\CarRequest;
use Pingpong\Modules\Routing\Controller;

class CarController extends Controller {
	
	public function index() {

        $cars = Car::all();

		return view('car::index', compact('cars'));
	}

    public function create() {

        $brands = Brand::orderBy('name', 'asc')->lists('name', 'id');
        $prototypes = Prototype::orderBy('name', 'asc')->lists('name', 'id');
        $colors = Color::orderBy('name', 'asc')->lists('name', 'id');
        $conditions = Condition::orderBy('name', 'asc')->lists('name', 'id');

        return view('car::create', compact('brands', 'prototypes', 'colors', 'conditions'));
    }

    public function store(CarRequest $request) {

        $data = Car::create($request->all());

        $car = Car::findOrFail($data->id);

        Session::flash('message', trans(
                'car::ui.car.message_create', array('brand' => $car->brand->name))
        );

        return redirect('car/create');
    }

    public function edit($id) {

        $car = Car::findOrFail($id);

        $brands = Brand::orderBy('name', 'asc')->lists('name', 'id');
        $prototypes = Prototype::orderBy('name', 'asc')->lists('name', 'id');
        $colors = Color::orderBy('name', 'asc')->lists('name', 'id');
        $conditions = Condition::orderBy('name', 'asc')->lists('name', 'id');

        return view('car::edit', compact('car', 'brands', 'prototypes', 'colors', 'conditions'));

    }

    public function update($id, CarRequest $request)
    {

        $car = Car::findOrFail($id);

        $car->update($request->all());

        Session::flash('message', trans(
                'car::ui.car.message_update', array('brand' => $car->brand->name))
        );

        return redirect('car');
    }

    public function destroy($id) {

        $car = Car::findOrFail($id);

        Car::destroy($id);

        Session::flash('message', trans(
                'car::ui.car.message_delete', array('brand' => $car->brand->name))
        );

        return redirect('car');
    }


}