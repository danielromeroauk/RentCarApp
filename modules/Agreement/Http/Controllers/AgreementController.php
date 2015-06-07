<?php namespace Modules\Agreement\Http\Controllers;

use Modules\Agreement\Entities\Agreement;
use Pingpong\Modules\Routing\Controller;

class AgreementController extends Controller {

    public function index() {

        $agreements = Agreement::all();

        //dd($agreements);

        return view('agreement::index', compact('agreements'));
    }
	
}