<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    public function login(Request $request)
    {
        $maxAttempts = 3;

        if ($this->hasTooManyLoginAttempts($request)) {
            return redirect()->route('auth.captcha');
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return redirect()->back()->withErrors(['email' => __('auth.failed')]);
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        return Session::get('login_attempts', 0) >= 3;
    }

    protected function incrementLoginAttempts(Request $request)
    {
        Session::put('login_attempts', Session::get('login_attempts', 0) + 1);
    }
}
