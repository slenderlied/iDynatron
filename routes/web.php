<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('cloudinformacion', function () {
    return view('cloudinformacion');
});

Route::get('login', function () {
        return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('menu', function () {
    return view('menu');
});

Route::get('menuprincipal', function () {
    return view('menuprincipal');
});

Route::get('servidoresusuarios', function () {
    return view('servidoresusuarios');
});

Route::get('perfilusuario', function () {
    return view('perfilusuario');
});

Route::get('modificarusuario', function () {
    return view('modificarusuario');
});

Route::get('consultasservidoresusuario', function () {
    return view('consultasservidoresusuario');
});

Route::get('servidores', function () {
    return view('servidores');
});

Route::get('tcoservidores', function () {
    return view('tcoservidores');
});

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::get('resultados', function () {
    return view('resultados');
 
});

Route::get('tcoresultados', function () {
    return view('tcoresultados');
 
});

Route::get('pdf', function () {
    
    $pdf = PDF::loadView('pdf');    

    return $pdf->stream();
});

Route::get('buscador', function () {
    return view('buscador');
 
});
