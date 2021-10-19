<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Acciones</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Lista de Movimientos</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Pelicula</th>
                <th>Accion</th>
                <th>Fecha Transaccion</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($acciones as $accione)
               <tr>
                   <td>{{ $accione->email }}</td>
                   <td>{{ $accione->titulo }}</td>
                   <td>{{ $accione->accion }}</td>
                   <td>{{ $accione->fecha_transaccion }}</td>
               </tr>
           @endforeach
        </tbody>
    </table>
</body>
</html>