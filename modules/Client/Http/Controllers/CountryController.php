<?php namespace Modules\Client\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Modules\Client\Entities\Country;
use Modules\Client\Http\Requests\CountryRequest;
use Pingpong\Modules\Routing\Controller;

class CountryController extends Controller {
	
	public function index() {

        $countries = Country::all();

		return view('client::country.index', compact('countries'));
	}

    public function create() {

        return view('client::country.create');
    }

    public function store(CountryRequest $request) {

        $data = Country::create($request->all());

        $country = Country::findOrFail($data->id);

       Session::flash('message', trans('client::ui.country.message_create', array('name' => $country->name)));

        return redirect('client/country/create');
	
    }

    public function edit($id) {

        $country = Country::findOrFail($id);

        return view('client::country.edit', compact('country'));
    }

    public function update($id, CountryRequest $request) {

        $country = Country::findOrFail($id);

        $country->update($request->all());

        Session::flash('message', trans('client::ui.country.message_update', array('name' => $country->name)));

        return redirect('client/country');
    }

    public function destroy($id) {
        $country = Country::findOrFail($id);

        Country::destroy($id);

        Session::flash('message', trans('client::ui.country.message_delete', array('name' => $country->name)));

        return redirect('client/country');
    }
}