<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{    
    /**
     * index
     * Mostrar els articles propis de l'usuari i obtenir els ids d'aquests per l'eliminació
     * @return void
     */
    public function index()
    {
    
    $userId = Auth::id();

    // Obtenir els ids dels articles propis de l'usuari
    $proyectos = Projecte::where('id_usuari', $userId)->pluck('id');
    // Obtenir els projectes de l'usuari
    $portafoli = Projecte::where('id_usuari', $userId)->paginate(1);
    
    return view('delete', ['proyectos' => $proyectos, 'portafoli' => $portafoli]);    
}
    

/**
 * delete
 * Funció per eliminar el projecte de l'usuari
 * @param  mixed $request
 * @return void
 */
public function delete(Request $request)
{

    // Obtenir l'id de l'articles
    $proyecto_id = $request->proyecto_id;

    $proyecto = Projecte::find($proyecto_id);

    $proyecto->delete();

    // Redireccionar con un mensaje de éxito
    return redirect()->route('dashboard')->with('success', 'Projecte eliminat correctament');
}

    

}
