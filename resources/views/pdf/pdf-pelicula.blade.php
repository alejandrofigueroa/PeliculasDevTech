<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Peliculas</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Lista de Peliculas</h1>
    <br><br>

    @foreach ($categorias as $categoria)

        <h2>Categoria: {{ $categoria->nombre_categoria }}</h2>

        @foreach ($peliculas as $pelicula)
            @if ($categoria->id == $pelicula->categoria_id)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Sinopsis</th>
                            <th>Genero</th>
                            <th>Fecha Estreno</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $pelicula->titulo }}</td>
                            <td>{{ $pelicula->sinopsis }}</td>
                            <td>{{ $pelicula->genero }}</td>
                            <td>{{ $pelicula->fecha_estreno }}</td>
                        </tr>      
                    </tbody>
                </table>
            @endif
            
        @endforeach <!--FIN FOREACH DE PELICULAS -->
    @endforeach <!--FIN FOREACH DE CATEGORIAS -->
</body>
</html>