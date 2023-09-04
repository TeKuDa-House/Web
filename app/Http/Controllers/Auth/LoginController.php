<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $loginField = request()->input('login_field');

        // Determine if the input is an email, phone number, or username
        $fieldType = filter_var($loginField, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : (ctype_digit($loginField) ? 'phone' : 'username');

        request()->merge([$fieldType => $loginField]);

        return $fieldType;
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }
}
