<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class migrateController extends Controller
{
    public function index(){
        return response()->json([
            "hello"=>"world",
            "name"=>"migrate"
        ]);
    }

    public function create(Request $request, Persona $persona){
        $persona->nombre = $request->nombre;
        $persona->ap_paterno = $request->ap_paterno;
        $persona->ap_materno = $request->ap_materno;
        $persona->edad = $request->edad;
        $persona->save();

        if ($persona)
            return response()->json([
            "message"=>"Persona creada correctamente",
            "persona"=>$persona
            ],201);
        else
            return response()->json([
            "message"=>"Error al crear persona"
            ],401);
    }
}
