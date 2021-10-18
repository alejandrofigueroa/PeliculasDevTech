@extends('layouts.app')

@section('template_title')
    Detalle Usuario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalle Usuario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalle-usuarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>User Id</th>
										<th>Nombre Usuario</th>
										<th>Apellido Usuario</th>
										<th>Dui</th>
										<th>Departamento</th>
										<th>Ciudad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detalleUsuarios as $detalleUsuario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $detalleUsuario->user_id }}</td>
											<td>{{ $detalleUsuario->nombre_usuario }}</td>
											<td>{{ $detalleUsuario->apellido_usuario }}</td>
											<td>{{ $detalleUsuario->dui }}</td>
											<td>{{ $detalleUsuario->departamento }}</td>
											<td>{{ $detalleUsuario->ciudad }}</td>

                                            <td>
                                                <form action="{{ route('detalle-usuarios.destroy',$detalleUsuario->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalle-usuarios.show',$detalleUsuario->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalle-usuarios.edit',$detalleUsuario->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $detalleUsuarios->links() !!}
            </div>
        </div>
    </div>
@endsection
