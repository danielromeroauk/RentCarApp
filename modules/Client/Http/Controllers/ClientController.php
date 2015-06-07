<?php namespace Modules\Client\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Modules\Client\Entities\Client;
use Modules\Client\Entities\Country;
use Modules\Client\Http\Requests\ClientRequest;
use Pingpong\Modules\Routing\Controller;

class ClientController extends Controller {
	
	public function index()
	{
        $clients = Client::with('country')->get();

		return view('client::index', compact('clients'));
	}

    public function create() {

        $countries = Country::orderBy('name', 'asc')->lists('name', 'id');

        return view('client::create', compact('countries'));
    }

    public function store(ClientRequest $request) {

        $data = Client::create($request->all());

        $client = Client::findOrFail($data->id);

        Session::flash('message', trans(
            'client::ui.client.message_create', array('name' => $client->firstname.' '.$client->lastname))
        );

        return redirect('client/create');
    }

    public function edit($id) {

        $client = Client::findOrFail($id);

        $countries = Country::orderBy('name', 'asc')->lists('name', 'id');

        return view('client::edit', compact('client', 'countries'));

    }

    public function update($id, ClientRequest $request) {

        $client = Client::findOrFail($id);

        $client->update($request->all());

        Session::flash('message', trans(
                'client::ui.client.message_update', array('name' => $client->firstname.' '.$client->lastname))
        );

        return redirect('client');
    }

    public function destroy($id) {

        $client = Client::findOrFail($id);

        Client::destroy($id);

        Session::flash('message', trans(
                'client::ui.client.message_delete', array('name' => $client->firstname.' '.$client->lastname))
        );

        return redirect('client');
    }
	
}