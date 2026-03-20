<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\PostController;
Use App\Models\Pagina;
use App\Models\User;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('welcome');
})->name('vista_inicio');


Route::get('/hello', [HomeController::class, 'empresa']);

Route::get('contact', function(){
    $nombre = "Dafne Cruz";
    
    return view('contact', ['nombre'=>$nombre, 'carrera'=>'Desarrollo de Software']); })->name('contact');


Route::get('post/mensaje', [PostController::class, 'mensaje']);
Route::get('post/about/{param?}/{name}', [PostController::class, 'about']);


Route::get('/empresa', [HomeController::class, 'empresa'])->name('empresa');

//metodo para crear un nuevo registro
Route::get('nuevoregistro', function (){
    $pagina = new Pagina();
    $pagina->name='Jose Maria';
    $pagina->email='jose@example.com';
    $pagina->email_verified_at=date('Y-m-d');
    $pagina->password='5532235';
    $pagina->avatar='avatar.png';
    $pagina->telefono='532236';
    $pagina->calle='523';
    $pagina->save();

    return $pagina;
});

// metodo para buscar por id para obtener unicamente un registro
Route::get('buscarpaginaid', function(){
    $post = Pagina::find(1);
    return $post;
});

//metodo para buscar por un campo determinado
Route::get('buscarxname', function(){
    $post = Pagina::where('name', 'Dafne')->first();
    return $post;
});

// recuperar más de un registro
Route::get('obtenertodos', function(){
    $post= Pagina::all();
    return $post;
});

// metodo para cambiar un registro
Route::get('updatename', function(){
    $post = Pagina::where('name', 'Dafne')->first();
    $post->email='dafne@example.com';
    $post->save();
    return $post;
});

//metodo para obtener una lista conforma a un criterio determinado para obtener mas de un registro
Route::get('filter', function(){
    $post = Pagina::where('calle', 'like', '%89%')->orderBy("id", "desc")->get();
    return $post;
});

//unicamente los campos que queremos recuperar
Route::get('trescampos', function(){
    $post = Pagina::select('name', 'email', 'telefono')->get();
    return $post;
});

// solamente traerme un cierto numero de registros
Route::get('filtroxnumreg', function(){
    $post = Pagina::select("name", "email")->orderBy("name")->take(2)->get();
    return $post;
});

// eliminar un determinado registro
Route::get('eliminar_registro', function(){
    $post = Pagina::find(1);
    $post->delete();
    return "Eliminado";
});

//obtener la fecha conforme a un formato
Route::get('Obtenerfechaformato', function(){
    $post = Pagina::select("name","email", "created_at")->get(3);
    return $post;
});

//obtener el valor de is active
Route::get('Obtenerestatus', function(){
    $post = Pagina::find(3);
    dd($post->is_active);
});
