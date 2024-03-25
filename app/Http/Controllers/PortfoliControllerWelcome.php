<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Projecte;

class PortfoliControllerWelcome extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $portafoli = Projecte::where('id_usuari', NULL)->paginate(4);
        return view('welcome',compact('portafoli'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}