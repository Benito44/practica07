<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use Illuminate\Support\Facades\Auth;

class CaptchaController extends Controller
{    
    /**
     * show
     * Mostrar la vista de reCaptcha
     * @param  mixed $request
     * @return void
     */
    public function show(Request $request)
    {
        return view('captcha');
    }
        
    /**
     * store
     * Funció per validar el reCaptcha
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
        ]);
    
        //$previousUrl = route('login');
    
        return "Successfully created!";
    }
    
    
}
