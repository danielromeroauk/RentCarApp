<?php namespace Modules\Agreement\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class AgreementController extends Controller {
	
	public function index()
	{
		return view('agreement::index');
	}
	
}