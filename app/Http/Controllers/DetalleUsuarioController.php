<?php

namespace App\Http\Controllers;

use App\Models\DetalleUsuario;
use Illuminate\Http\Request;

/**
 * Class DetalleUsuarioController
 * @package App\Http\Controllers
 */
class DetalleUsuarioController extends Controller
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
        $detalleUsuarios = DetalleUsuario::paginate();

        return view('detalle-usuario.index', compact('detalleUsuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $detalleUsuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalleUsuario = new DetalleUsuario();
        return view('detalle-usuario.create', compact('detalleUsuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetalleUsuario::$rules);

        $detalleUsuario = DetalleUsuario::create($request->all());

        return redirect()->route('detalle-usuarios.index')
            ->with('success', 'DetalleUsuario created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleUsuario = DetalleUsuario::find($id);

        return view('detalle-usuario.show', compact('detalleUsuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleUsuario = DetalleUsuario::find($id);

        return view('detalle-usuario.edit', compact('detalleUsuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetalleUsuario $detalleUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleUsuario $detalleUsuario)
    {
        request()->validate(DetalleUsuario::$rules);

        $detalleUsuario->update($request->all());

        return redirect()->route('detalle-usuarios.index')
            ->with('success', 'DetalleUsuario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalleUsuario = DetalleUsuario::find($id)->delete();

        return redirect()->route('detalle-usuarios.index')
            ->with('success', 'DetalleUsuario deleted successfully');
    }
}
