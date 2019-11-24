<?php

namespace App\Http\Controllers\Auth;

use App\Bookstore;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers{
        logout as performLogout;
    }

    protected function authenticated(Request $request, $user)
    {
        if($user->bookstore_id !== null) {
            return redirect('/bookstore/offers');
        }
        else
            return redirect('/user/welcome');
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect('/welcome');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
