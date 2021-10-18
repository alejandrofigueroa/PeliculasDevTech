@extends('layouts.app')

@section('template_title')
    {{ $accione->name ?? 'Show Accione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Accione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('acciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $accione->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Pelicula Id:</strong>
                            {{ $accione->pelicula_id }}
                        </div>
                        <div class="form-group">
                            <strong>Accion:</strong>
                            {{ $accione->accion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Transaccion:</strong>
                            {{ $accione->fecha_transaccion }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Renta Final:</strong>
                            {{ $accione->fecha_renta_final }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Entrega:</strong>
                            {{ $accione->fecha_entrega }}
                        </div>
                        <div class="form-group">
                            <strong>Monto Pago:</strong>
                            {{ $accione->monto_pago }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
