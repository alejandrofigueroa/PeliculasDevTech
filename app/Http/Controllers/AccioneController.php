<?php

namespace App\Http\Controllers;

use App\Models\Accione;
use Illuminate\Http\Request;

/**
 * Class AccioneController
 * @package App\Http\Controllers
 */
class AccioneController extends Controller
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
        $acciones = Accione::paginate();

        return view('accione.index', compact('acciones'))
            ->with('i', (request()->input('page', 1) - 1) * $acciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accione = new Accione();
        return view('accione.create', compact('accione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Accione::$rules);

        $accione = Accione::create($request->all());

        return redirect()->route('acciones.index')
            ->with('success', 'Accione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accione = Accione::find($id);

        return view('accione.show', compact('accione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accione = Accione::find($id);

        return view('accione.edit', compact('accione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Accione $accione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accione $accione)
    {
        request()->validate(Accione::$rules);

        $accione->update($request->all());

        return redirect()->route('acciones.index')
            ->with('success', 'Accione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $accione = Accione::find($id)->delete();

        return redirect()->route('acciones.index')
            ->with('success', 'Accione deleted successfully');
    }
}
