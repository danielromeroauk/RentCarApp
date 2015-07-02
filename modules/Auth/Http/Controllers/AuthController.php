<?php namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Pingpong\Modules\Routing\Controller;

class AuthController extends Controller {

    public function __construct() {

        $this->middleware('guest', ['except' => 'getLogout']);
    }
	
	public function index() {

		return view('auth::login');
	}

    public function postLogin(Request $request) {

        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }

    public function getLogout() {

        Auth::logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    private function loginPath() {

        return property_exists($this, 'loginPath') ? $this->loginPath : '/';
    }

    private function getCredentials(Request $request) {

        return $request->only('email', 'password');
    }

    private function redirectPath() {

        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/dashboard';
    }

    private function getFailedLoginMessage() {

        return trans('auth::ui.login.credentials_error');
    }
	
}