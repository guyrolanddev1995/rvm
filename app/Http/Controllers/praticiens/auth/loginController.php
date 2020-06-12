<?php

namespace App\Http\Controllers\praticiens\auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class loginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect admins after login.
     *
     * @var string
     */
    protected $redirectTo = '/praticien/home';

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('praticien.login');
    }

    protected function guard()
    {
        return Auth::guard('praticien');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->route('praticien-login');
    }
}
