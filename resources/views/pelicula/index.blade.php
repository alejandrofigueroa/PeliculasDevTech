@extends('layouts.app')

@section('template_title')
    Pelicula
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Peliculas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pelicula.pdf') }}" class="btn btn-dark btn-sm float-right"  data-placement="left">
                                    {{ __('PDF de Peliculas') }}
                                </a>
                                <a href="{{ route('peliculas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Nueva Pelicula') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabla-pelicula" class="table table-striped table-bordered table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Titulo</th>
										<th>Foto</th>
										<th>Fecha Estreno</th>
										<th>Categoria</th>
										<th>Disponible</th>
										<th>Stock</th>
										<th>Precio Renta</th>
										<th>Precio Compra</th>

                                        <th>Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peliculas as $pelicula)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pelicula->titulo }}</td>
											<td>
                                                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$pelicula->foto }}" width="100" alt="" />
                                            </td>
                                            <td>{{ $pelicula->fecha_estreno }}</td>
											<td>{{ $pelicula->nombre_categoria }}</td>
                                            @if ($pelicula->disponible == 0)
                                                <td>Disponible</td>
                                            @else
                                                <td>No disponible</td>
                                            @endif
											
											<td>{{ $pelicula->stock }}</td>
											<td>{{ $pelicula->precio_renta }}</td>
											<td>{{ $pelicula->precio_compra }}</td>

                                            <td>
                                                <form action="{{ route('peliculas.destroy',$pelicula->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('peliculas.show',$pelicula->id) }}"><i class="fa fa-fw fa-eye"></i> Detalles</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('peliculas.edit',$pelicula->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $peliculas->links() !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#tabla-pelicula').DataTable();
        });
    </script>
@endsection
