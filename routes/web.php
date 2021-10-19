<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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




Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/email/verify', function (){
        return view('auth.verify-email');
    })->name('verification.notice');
});



Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    //PARA ADMINISTRADORES
    Route::resource('peliculas', App\Http\Controllers\PeliculaController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
    Route::resource('acciones', App\Http\Controllers\AccioneController::class);

    Route::get('/pdf-users', [App\Http\Controllers\ReporteController::class, 'pdfUsers'])->name('usuario.pdf');
    Route::get('/pdf-peliculas', [App\Http\Controllers\ReporteController::class, 'pdfPeliculas'])->name('pelicula.pdf');
    Route::get('/pdf-acciones', [App\Http\Controllers\ReporteController::class, 'pdfAcciones'])->name('movimiento.pdf');

});


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/inicio');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


