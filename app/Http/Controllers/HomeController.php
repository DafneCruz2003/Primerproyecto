<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\User;
use App\Models\Pagina;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function empresa()
    {
    $datos["nombre"]="Dafne Cruz";
    $datos["fecha"]="26-15-15";
    $datos["actividad"]="Desarrollo de software";
    $datos["descripcion_about"]="Empresa dedicada al desarrollo de software";
    $datos["texto_ejemplo"]="Texto de ejemplo";

    $usuarios=new Pagina();
    $datos["listadousuarios"] = $usuarios->ObtenerListado();
    return view('empresa', $datos);
    }

    public function update(Request $request) {
        $usuarios = new Pagina();
        $respuesta = $usuarios->BuscarId($request->id);
        if(!empty($respuesta)){
            $respuesta->name = $request->name;
            $respuesta->calle = $request->calle;
            $respuesta->save();
        }
        return $respuesta;
    }

    public function eliminarlogica(Request $request) {
        $usuarios = new Pagina();
        $respuesta = $usuarios->BuscarId($request->id);
        if (!empty($respuesta)) {
        $respuesta->is_active = 0;
        $respuesta->save();
        return response()->json(['success' => true, 'mensaje' => 'Registro eliminado lógicamente']);
    }
    return response()->json(['success' => false, 'mensaje' => 'not found'], 404);
    }

    public function eliminarfisica(Request $request) {
        $usuarios = new Pagina();
        $respuesta = $usuarios->BuscarId($request->id);
        if (!empty($respuesta)) {
        $respuesta->delete();
        return response()->json(['success' => true, 'mensaje' => 'Registro eliminado físicamente']);
    }
    return response()->json(['success' => false, 'mensaje' => 'not found'], 404);
    }


}