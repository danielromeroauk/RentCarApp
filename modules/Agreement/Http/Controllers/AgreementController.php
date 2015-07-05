<?php namespace Modules\Agreement\Http\Controllers;

use Modules\Agreement\Entities\Agreement;
use Modules\Agreement\Entities\AgreementStatus;
use Modules\Car\Entities\Car;
use Modules\Client\Entities\Client;
use Pingpong\Modules\Routing\Controller;

class AgreementController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }

    public function index() {

        $agreements = Agreement::all();

        return view('agreement::index', compact('agreements'));
    }

    public function create() {

        $clients = Client::orderBy('lastname', 'asc')->lists('lastname', 'id');

        $cars = Car::orderBy('sheet_number', 'asc')->lists('sheet_number', 'id');

        $status = AgreementStatus::orderBy('name', 'asc')->lists('name', 'id');

        return view('agreement::create', compact('clients', 'cars', 'status'));

    }

    public function store() {
        return '';
    }

    private function generateRandomString($length) {
        $pattern = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        return substr(str_shuffle($pattern), 0, $length);
    }

    private function generateRandomNumber($length) {
        $pattern = "0123456789";
        return substr(str_shuffle($pattern), 0, $length);
    }

    private function generateCode($lengthString, $lengthNumber) {
        return $this->generateRandomString($lengthString).$this->generateRandomNumber($lengthNumber);
    }
	
}