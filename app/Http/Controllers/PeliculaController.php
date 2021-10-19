<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Categoria;
use App\Models\DetallePelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
/**
 * Class PeliculaController
 * @package App\Http\Controllers
 */
class PeliculaController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = DB::table('peliculas')
                        ->join('categorias','peliculas.categoria_id','=','categorias.id')
                        ->select('peliculas.id as id', 'peliculas.titulo', 'peliculas.foto', 'peliculas.fecha_estreno',
                                'categorias.nombre_categoria','peliculas.disponible','peliculas.stock', 'peliculas.precio_renta', 'precio_compra')
                        ->paginate();

        return view('pelicula.index', compact('peliculas'))
            ->with('i', (request()->input('page', 1) - 1) * $peliculas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelicula = new Pelicula();
        //Usando pluck para hacer un array donde solo requerimos el nombre y el id de la categoria
        $categorias = Categoria::pluck('nombre_categoria', 'id');
        $detallePelicula = new DetallePelicula();

        return view('pelicula.create', compact('pelicula', 'categorias', 'detallePelicula'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'titulo' => 'required|string|max:100',
		    'foto' => 'required|max:10000|mimes:jpeg,png,jpg',
            'fecha_estreno' => 'required',
		    'stock' => 'required|min:0',
            'precio_renta' => 'min:0',
            'precio_compra' => 'required|min:0',
            'sinopsis' => 'required|string',
            'genero' => 'required|string',
            'director' => 'required|string'
        ];

        $error_mensaje = [
            'required' => 'El campo :attribute es requerido',
            'string' => 'Ingresar caracteres en el campo :attribute',
            'mimes' => 'Formato incorrecto',
            'min' => 'El valor minimo posible es 0',
            'foto.required' => 'La foto es requerida',
        ];

        request()->validate($request, $reglas, $error_mensaje);
        
        $datosPelicula = request()->except('_token','sinopsis','genero','director');

        if($request->hasFile('foto')){
            $datosPelicula['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        
        if(Pelicula::create($datosPelicula)){
            //Si la pelicula se registra
            $ultimaPelicula = Pelicula::latest()->first();

            $request['pelicula_id'] = $ultimaPelicula->id;

            DetallePelicula::create([
                'pelicula_id' => $request['pelicula_id'],
                'sinopsis' => $request['sinopsis'],
                'genero' => $request['genero'],
                'director' => $request['director']
            ]);
        }

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //$pelicula = Pelicula::find($id);
        $pelicula = DB::table('peliculas')
                        ->join('categorias','peliculas.categoria_id','=','categorias.id')
                        ->join('detalle_peliculas','peliculas.id','=','detalle_peliculas.pelicula_id')
                        ->select('peliculas.id as id', 'peliculas.titulo', 'peliculas.foto', 'peliculas.fecha_estreno',
                                'categorias.nombre_categoria','peliculas.disponible','peliculas.stock', 'peliculas.precio_renta', 
                                'peliculas.precio_compra')
                        ->where('peliculas.id','=',$id)
                        ->first();

        
        return view('pelicula.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula = Pelicula::find($id);
        $categorias = Categoria::pluck('nombre_categoria', 'id');
        $detallePelicula = DetallePelicula::where('pelicula_id','=',$id)->first();

        return view('pelicula.edit', compact('pelicula', 'categorias', 'detallePelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reglas = [
            'titulo' => 'required|string|max:100|unique:peliculas',
		    'foto' => 'required|max:10000|mimes:jpeg,png,jpg',
            'fecha_estreno' => 'required',
		    'stock' => 'required|min:0',
            'precio_renta' => 'min:0',
            'precio_compra' => 'required|min:0',
            'sinopsis' => 'required|string',
            'genero' => 'required|string',
            'director' => 'required|string'
        ];

        $error_mensaje = [
            'required' => 'El campo :attribute es requerido',
            'unique' => 'Ya existe una pelicula con dicho titulo',
            'string' => 'Ingresar caracteres en el campo :attribute',
            'mimes' => 'Formato incorrecto',
            'min' => 'El valor minimo posible es 0',
            'foto.required' => 'La foto es requerida',
        ];

        if($request->hasFile('foto')){
            $campos = ['foto' => 'required|max:10000|mimes:jpeg,png,jpg'];

            $error_mensaje = ['foto.required' => 'La foto es requerida'];
        }

        request()->validate(Pelicula::$rules, $error_mensaje);
        
        $datosPelicula = request()->except(['_token', '_method', 'sinopsis', 'genero', 'director']);
        
        if($request->hasFile('foto')){
            $pelicula = Pelicula::findOrFail($id);
            Storage::delete('/public/'.$pelicula->foto);

            $datosPelicula['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        
        $datosDetallePelicula = array('pelicula_id' => $id, 'sinopsis' => $request['sinopsis'], 'genero' => $request['genero'], 'director' => $request['director']);

        Pelicula::where('id','=',$id)->update($datosPelicula);
        
        DetallePelicula::where('pelicula_id','=',$id)->update($datosDetallePelicula);

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::findOrFail($id);

        if(DetallePelicula::where('pelicula_id','=',$id)->delete()){
            if(Storage::delete('/public/'.$pelicula->foto)){
               Pelicula::destroy($id);
            }
        }

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula eliminada correctamente');
    }
}
