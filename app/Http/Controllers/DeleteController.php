<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
    // Obtener el ID del usuario logeado
    $userId = Auth::id();

    // Obtener todos los IDs de los proyectos del usuario
    $proyectos = Projecte::where('id_usuari', $userId)->pluck('id');
    $portafoli = Projecte::where('id_usuari', $userId)->paginate(1);
    // Pasar los IDs a la vista
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

    // Actualizar los datos del proyecto
    $proyecto_id = $request->proyecto_id;

    $proyecto = Projecte::find($proyecto_id);

    $proyecto->delete();

    // Redireccionar con un mensaje de éxito
    return redirect()->route('dashboard')->with('success', 'Projecte eliminat correctament');
}

    

}
