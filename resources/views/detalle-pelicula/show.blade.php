@extends('layouts.app')

@section('template_title')
    {{ $detallePelicula->name ?? 'Show Detalle Pelicula' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detalle Pelicula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalle-peliculas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Pelicula Id:</strong>
                            {{ $detallePelicula->pelicula_id }}
                        </div>
                        <div class="form-group">
                            <strong>Sinopsis:</strong>
                            {{ $detallePelicula->sinopsis }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $detallePelicula->genero }}
                        </div>
                        <div class="form-group">
                            <strong>Director:</strong>
                            {{ $detallePelicula->director }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
