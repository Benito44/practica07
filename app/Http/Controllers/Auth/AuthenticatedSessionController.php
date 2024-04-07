<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    
    /**
     * create
     * Retorna la vista del login
     * @return View
     */
    public function create(): View
    {
        return view('auth.login');
    }

    
    /**
     * store
     * Funció per contar els errors d'inici de sessió erronis i quan
     * pasi de 3 errors mostrar el reCaptcha
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $failedAttempts = Session::get('login_failed_attempts', 0);
    
        if ($failedAttempts >= 2) {
            Session::forget('login_failed_attempts');
            return redirect()->route('captcha.show');
        }
    
        // Autenticar al usuario
        if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Incrementar el contador de intentos fallidos
            Session::put('login_failed_attempts', $failedAttempts + 1);
    
            return redirect()->back()->withErrors(['email' => __('auth.failed')])->withInput($request->only('email'));
        }
    
        // Regenerar el token de sesión
        $request->session()->regenerateToken();
    
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    
    /**
     * destroy
     * Funció per tancar la sessió
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}