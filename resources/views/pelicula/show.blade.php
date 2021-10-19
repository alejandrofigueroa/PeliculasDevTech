@extends('layouts.app')

@section('template_title')
    {{ $pelicula->titulo }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles pelicula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('peliculas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $pelicula->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$pelicula->foto }}" width="100" alt="" />
                        </div>
                        <div class="form-group">
                            <strong>Fecha Estreno:</strong>
                            {{ $pelicula->fecha_estreno }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $pelicula->nombre_categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Disponible:</strong>
                            @if ($pelicula->disponible == 0)
                                <td>Disponible</td>
                            @else
                                <td>No disponible</td>
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $pelicula->stock }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Renta:</strong>
                            {{ $pelicula->precio_renta }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Compra:</strong>
                            {{ $pelicula->precio_compra }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
