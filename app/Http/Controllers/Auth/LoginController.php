<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin' ) {
            return redirect()->route('dashboard');
        } elseif ($user->role === 'doctor' && $user->status === 'active') {
            return redirect()->route('doctor_dashboard');
        } elseif ($user->role === 'patient' && $user->status === 'active') {
            return redirect()->route('patient_dashboard');
        }
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
