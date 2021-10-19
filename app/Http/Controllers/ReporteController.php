<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DetalleUsuario;
use App\Models\Categoria;
use App\Models\Pelicula;
use App\Models\DetallePelicula;
use App\Models\Accione;
use Auth;
use PDF;
use DB;

class ReporteController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function pdfPeliculas(){
        $categorias = Categoria::all();

        //Capturar en una sola sentencia ambas tablas para la informacion necesaria
        $peliculas = DB::table('peliculas')
                        ->join('detalle_peliculas','peliculas.id','=','detalle_peliculas.pelicula_id')
                        ->select('peliculas.titulo', 'peliculas.fecha_estreno', 'peliculas.categoria_id', 'peliculas.disponible', 
                                'detalle_peliculas.sinopsis', 'detalle_peliculas.genero')
                        ->paginate();

        $pdf = PDF::loadView('pdf.pdf-pelicula', ['categorias' => $categorias, 'peliculas' => $peliculas]);

        return $pdf->stream('Reporte de peliculas.pdf');
    }

    public function pdfUsers(){
        $usuarios = User::all();

        $pdf = PDF::loadView('pdf.pdf-usuario', ['usuarios' => $usuarios]);

        return $pdf->stream('Reporte de usuarios.pdf');
    }   

    public function pdfAcciones(){

        $acciones = DB::table('acciones')
                        ->join('users','users.id','=','acciones.user_id')
                        ->join('peliculas','peliculas.id','=','acciones.pelicula_id')
                        ->select('users.email', 'peliculas.titulo', 'acciones.accion', 'acciones.fecha_transaccion')
                        ->where('users.rol','=','usuario')
                        ->get();

        $pdf = PDF::loadView('pdf.pdf-acciones', ['acciones' => $acciones]);

        return $pdf->stream('Reporte de movimientos.pdf');

    }
}
