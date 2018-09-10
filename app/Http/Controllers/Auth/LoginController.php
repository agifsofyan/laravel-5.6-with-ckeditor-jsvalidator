<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Auth;

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
    protected $redirectTo = ('/admin');

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // $request->session()->flash('success', 'You are logged in!');

        // $request->session()->toastr()->success('!! Berhasil Login :)');
        // $request->session()->with($notification);

        toastr()->success('(: Selamat Datang '.$user->name);

        return redirect('/admin');
    }


      public function logout(Request $request)
    {

        Auth::logout();

        toastr()->success('You have been logged out.');

        return redirect('/admin');
    }
}
