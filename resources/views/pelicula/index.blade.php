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
                                {{ __('Pelicula') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('peliculas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Titulo</th>
										<th>Foto</th>
										<th>Fecha Estreno</th>
										<th>Categoria Id</th>
										<th>Disponible</th>
										<th>Stock</th>
										<th>Precio Renta</th>
										<th>Precio Compra</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peliculas as $pelicula)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pelicula->titulo }}</td>
											<td>{{ $pelicula->foto }}</td>
											<td>{{ $pelicula->fecha_estreno }}</td>
											<td>{{ $pelicula->categoria_id }}</td>
											<td>{{ $pelicula->disponible }}</td>
											<td>{{ $pelicula->stock }}</td>
											<td>{{ $pelicula->precio_renta }}</td>
											<td>{{ $pelicula->precio_compra }}</td>

                                            <td>
                                                <form action="{{ route('peliculas.destroy',$pelicula->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('peliculas.show',$pelicula->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('peliculas.edit',$pelicula->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $peliculas->links() !!}
            </div>
        </div>
    </div>
@endsection
