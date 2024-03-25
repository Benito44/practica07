<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use Illuminate\Support\Facades\Auth;

class CaptchaController extends Controller
{
    public function show(Request $request)
    {
        return view('captcha');
    }
    public function store(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
        ]);
    
        $previousUrl = route('login');
    
        return "Successfully created!";
    }
    
    
}
