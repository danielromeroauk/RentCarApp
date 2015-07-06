<?php namespace Modules\Client\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Client\Entities\Country;
use Modules\Client\Http\Requests\CountryRequest;
use Pingpong\Modules\Routing\Controller;

class CountryController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }
	
	public function index() {

        if(Auth::user()->can('read-countries')) {

        $countries = Country::all();

		return view('client::country.index', compact('countries'));
        }

        return redirect('auth/logout');
	}

    public function create() {

        if(Auth::user()->can('create-countries')) {

            return view('client::country.create');
        }

        return redirect('auth/logout');
    }

    public function store(CountryRequest $request) {

        if(Auth::user()->can('create-countries')) {

            $data = Country::create($request->all());

            $country = Country::findOrFail($data->id);

            Session::flash('message', trans('client::ui.country.message_create', array('name' => $country->name)));

            return redirect('client/country/create');
        }

        return redirect('auth/logout');
	
    }

    public function edit($id) {

        if(Auth::user()->can('update-countries')) {

            $country = Country::findOrFail($id);

            return view('client::country.edit', compact('country'));
        }

        return redirect('auth/logout');
    }

    public function update($id, CountryRequest $request) {

        if(Auth::user()->can('update-countries')) {

            $country = Country::findOrFail($id);

            $country->update($request->all());

            Session::flash('message', trans('client::ui.country.message_update', array('name' => $country->name)));

            return redirect('client/country');
        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(Auth::user()->can('delete-countries')) {

        $country = Country::findOrFail($id);

        Country::destroy($id);

        Session::flash('message', trans('client::ui.country.message_delete', array('name' => $country->name)));

        return redirect('client/country');
        }

        return redirect('auth/logout');
    }
}