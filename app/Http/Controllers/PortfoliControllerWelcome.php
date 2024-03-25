<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Projecte;

class PortfoliControllerWelcome extends Controller
{
    
    /**
     * index
     * Mostrem els articles que no pertanyin a cap usuari
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        $portafoli = Projecte::where('id_usuari', NULL)->paginate(4);
        return view('welcome',compact('portafoli'));

    }
}
