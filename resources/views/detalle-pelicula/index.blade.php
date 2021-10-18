@extends('layouts.app')

@section('template_title')
    Detalle Pelicula
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalle Pelicula') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detalle-peliculas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Pelicula Id</th>
										<th>Sinopsis</th>
										<th>Genero</th>
										<th>Director</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detallePeliculas as $detallePelicula)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $detallePelicula->pelicula_id }}</td>
											<td>{{ $detallePelicula->sinopsis }}</td>
											<td>{{ $detallePelicula->genero }}</td>
											<td>{{ $detallePelicula->director }}</td>

                                            <td>
                                                <form action="{{ route('detalle-peliculas.destroy',$detallePelicula->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detalle-peliculas.show',$detallePelicula->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detalle-peliculas.edit',$detallePelicula->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $detallePeliculas->links() !!}
            </div>
        </div>
    </div>
@endsection
