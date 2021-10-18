@extends('layouts.app')

@section('template_title')
    {{ $detalleUsuario->name ?? 'Show Detalle Usuario' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Detalle Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detalle-usuarios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $detalleUsuario->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Usuario:</strong>
                            {{ $detalleUsuario->nombre_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Usuario:</strong>
                            {{ $detalleUsuario->apellido_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Dui:</strong>
                            {{ $detalleUsuario->dui }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $detalleUsuario->departamento }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad:</strong>
                            {{ $detalleUsuario->ciudad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
