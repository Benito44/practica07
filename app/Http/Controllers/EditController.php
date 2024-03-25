<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecte;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function index()
    {
    // Obtener el ID del usuario logeado
    $userId = Auth::id();

    // Obtener todos los IDs de los proyectos del usuario
    $proyectos = Projecte::where('id_usuari', $userId)->pluck('id');
    $portafoli = Projecte::where('id_usuari', $userId)->paginate(1);
    // Pasar los IDs a la vista
    return view('edit', ['proyectos' => $proyectos, 'portafoli' => $portafoli]);    
}
    

public function update(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'titulo' => 'required',
        'descripcion' => 'required',
    ]);

    // Actualizar los datos del proyecto
    $proyecto_id = $request->proyecto_id;

    $proyecto = Projecte::find($proyecto_id);

    $proyecto->titol = $request->titulo;
    $proyecto->descripcio = $request->descripcion;
    $proyecto->save();

    // Redireccionar con un mensaje de éxito
    return redirect()->route('dashboard')->with('success', 'Proyecto actualizado correctamente');
}

    

}
