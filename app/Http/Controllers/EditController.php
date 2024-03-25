<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{    
    /**
     * index
     * Obtenir els articles i els ids dels articles de l'usuari
     * @return void
     */
    public function index()
    {
    
    $userId = Auth::id();

    $proyectos = Projecte::where('id_usuari', $userId)->pluck('id');
    $portafoli = Projecte::where('id_usuari', $userId)->paginate(1);
    
    return view('edit', ['proyectos' => $proyectos, 'portafoli' => $portafoli]);    
}
    

/**
 * update
 * Validar les dades del formulari i editar les dades de l'article
 * @param  mixed $request
 * @return void
 */
public function update(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'titulo' => 'required',
        'descripcion' => 'required',
    ]);

    // Obtenir l'id de l'articles
    $proyecto_id = $request->proyecto_id;

    $proyecto = Projecte::find($proyecto_id);

    $proyecto->titol = $request->titulo;
    $proyecto->descripcio = $request->descripcion;
    $proyecto->save();

    
    return redirect()->route('dashboard')->with('success', 'Proyecto actualizado correctamente');
}

    

}
