<?php

namespace App\Http\Controllers;

use App\Models\DetallePelicula;
use Illuminate\Http\Request;

/**
 * Class DetallePeliculaController
 * @package App\Http\Controllers
 */
class DetallePeliculaController extends Controller
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
        $detallePeliculas = DetallePelicula::paginate();

        return view('detalle-pelicula.index', compact('detallePeliculas'))
            ->with('i', (request()->input('page', 1) - 1) * $detallePeliculas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detallePelicula = new DetallePelicula();
        return view('detalle-pelicula.create', compact('detallePelicula'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetallePelicula::$rules);

        $detallePelicula = DetallePelicula::create($request->all());

        return redirect()->route('detalle-peliculas.index')
            ->with('success', 'DetallePelicula created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detallePelicula = DetallePelicula::find($id);

        return view('detalle-pelicula.show', compact('detallePelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detallePelicula = DetallePelicula::find($id);

        return view('detalle-pelicula.edit', compact('detallePelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetallePelicula $detallePelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetallePelicula $detallePelicula)
    {
        request()->validate(DetallePelicula::$rules);

        $detallePelicula->update($request->all());

        return redirect()->route('detalle-peliculas.index')
            ->with('success', 'DetallePelicula updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detallePelicula = DetallePelicula::find($id)->delete();

        return redirect()->route('detalle-peliculas.index')
            ->with('success', 'DetallePelicula deleted successfully');
    }
}
