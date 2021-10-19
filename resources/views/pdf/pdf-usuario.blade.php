<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Usuarios</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Correo Electronico</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($usuarios as $usuario)
               <tr>
                   <td>{{ $usuario->usuario }}</td>
                   <td>{{ $usuario->email }}</td>
                   <td>{{ $usuario->telefono }}</td>
               </tr>
           @endforeach
        </tbody>
    </table>
</body>
</html>