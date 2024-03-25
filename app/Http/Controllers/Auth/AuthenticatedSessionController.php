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
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Verificar el número de intentos fallidos de inicio de sesión
        $failedAttempts = Session::get('login_failed_attempts', 0);

        if ($failedAttempts >= 2) {
            // Si se excede el límite de intentos fallidos, redirigir a la vista con el captcha
                    // Limpiar los intentos fallidos de inicio de sesión
        Session::forget('login_failed_attempts');
            return redirect()->route('captcha.show');
        }

        // Autenticar al usuario
        if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Incrementar el contador de intentos fallidos
            Session::put('login_failed_attempts', $failedAttempts + 1);

            return redirect()->back()->withErrors(['email' => __('auth.failed')]);
        }



        // Regenerar el token de sesión
        $request->session()->regenerateToken();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}