<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    
    /**
     * index
     * Mostrar els articles que siguin del propi usuari
     * @return void
     */
    public function index()
    {

        $idUsuario = Auth::id();
        $portafoli = Projecte::where('id_usuari', $idUsuario)->paginate(1);
        return view('dashboard',compact('portafoli'));
    }
}
