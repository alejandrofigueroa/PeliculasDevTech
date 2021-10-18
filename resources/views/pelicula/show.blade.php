@extends('layouts.app')

@section('template_title')
    {{ $pelicula->name ?? 'Show Pelicula' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pelicula</span>
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
                            {{ $pelicula->foto }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Estreno:</strong>
                            {{ $pelicula->fecha_estreno }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $pelicula->categoria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Disponible:</strong>
                            {{ $pelicula->disponible }}
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
