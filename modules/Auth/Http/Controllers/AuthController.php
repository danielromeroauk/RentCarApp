<?php namespace Modules\Auth\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class AuthController extends Controller {
	
	public function index() {

		return view('auth::login');
	}

    public function login() {

        return redirect('client');
    }
	
}