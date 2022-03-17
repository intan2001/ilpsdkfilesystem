<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
Use Illuminate\Http\Request;
Use Auth;
Use DB;
use App\Models\User;
use Carbon\Carbon;
Use Session;


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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $email = $request->email;
        $password = $request->password;

        $remember = $request -> has('remember')? true:false;
        if(auth() -> attempt (['email' => $email, 'password' => $password], $remember))
        {
            //$user = auth() -> user();
            return redirect($this->redirectTo);
        }
        else
        {
            return redirect()->back()->with('Fail! WRONG EMAIL OR PASSWORD', 'ERROR');
        }

    }
}
