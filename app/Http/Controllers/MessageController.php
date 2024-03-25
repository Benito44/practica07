<?php

namespace App\Http\Controllers;
use App\Models\Projecte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
        
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
                $missatge = "Insertado el projecte ";
                return view('new');

}
}
