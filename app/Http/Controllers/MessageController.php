<?php

namespace App\Http\Controllers;
use App\Models\Projecte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
            
    /**
     * store
     * Funció per validar el formulari de creació d'article, 
     * afegir-lo a la taula de projectes i redireccionar a la vista principal
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request){
       
        $idUsuario = Auth::id();
        $validatedData = $request->validate([
            'name' => 'required',
            'content' => 'required|min:10'
        ]);

                $projecte = new Projecte();
                $projecte->titol = $validatedData['name'];
                $projecte->descripcio = $validatedData['content'];
                $projecte->id_usuari = $idUsuario;
                $projecte->save();
                
                return redirect()->route('dashboard');

}
}
