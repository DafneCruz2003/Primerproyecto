<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function mensaje()
    {
        return "Hola desde el controlador de post";
    }


    public function About ($param=null,$nombre=null){
        $datos=['parametro'=>$param, 'nombre'=>$nombre];
        return view('about',$datos);
    }

    public function contacto(){
        return view('contacto',['mensaje'=>'mensaje desde el controlador']);
    }
}


