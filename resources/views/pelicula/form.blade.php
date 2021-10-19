<div class="box box-info padding-1">
    <div class="box-body">
        <!-- UTILIZACION DEL FORM BLADE PARA MAYOR RAPIDEZ Y QUE ME PERMITE DE MANERA FACIL INTEGRARLOS PARA EL EDITAR Y CREAR -->
        <!-- FORMATO EJ FORM::TEXT(NAME, VALUE, [OTRAS COSAS])-->
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $pelicula->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('fecha_estreno') }}
            {{ Form::date('fecha_estreno', $pelicula->fecha_estreno, ['class' => 'form-control' . ($errors->has('fecha_estreno') ? ' is-invalid' : '')]) }}
            {!! $errors->first('fecha_estreno', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('categoria_id', 'Categoria: ') }}
            {{ Form::select('categoria_id', $categorias, $pelicula->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('stock') }}
            {{ Form::number('stock', $pelicula->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''),'min' => 0, 'placeholder' => 'Stock']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('precio_renta') }}
            {{ Form::number('precio_renta', $pelicula->precio_renta, ['class' => 'form-control' . ($errors->has('precio_renta') ? ' is-invalid' : ''), 'step' => .01, 'placeholder' => 'Precio Renta']) }}
            {!! $errors->first('precio_renta', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('precio_compra') }}
            {{ Form::number('precio_compra', $pelicula->precio_compra, ['class' => 'form-control' . ($errors->has('precio_compra') ? ' is-invalid' : ''), 'step' => .01, 'placeholder' => 'Precio Compra']) }}
            {!! $errors->first('precio_compra', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('disponible', 'Estado: ') }}
            {{ Form::select('disponible', [0 => 'Disponible', 1 => 'No disponible'], $pelicula->disponible, ['class' => 'form-control' . ($errors->has('disponible') ? ' is-invalid' : '')]) }}
            {!! $errors->first('disponible', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        @if(@isset($pelicula->foto))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$pelicula->foto }}" width="100" alt="" />
        @endif

        <div class="form-group">
            {{ Form::label('foto', 'Foto: ') }}
            {{ Form::file('foto', ['class' => 'form-control' . ($errors->has('foto') ? ' is-invalid' : '')]) }}
            {!! $errors->first('foto', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('sinopsis') }}
            {{ Form::textarea('sinopsis', $detallePelicula->sinopsis, ['class' => 'form-control' . ($errors->has('sinopsis') ? ' is-invalid' : '')]) }}
            {!! $errors->first('sinopsis', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('genero') }}
            {{ Form::text('genero', $detallePelicula->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : '')]) }}
            {!! $errors->first('genero', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('director') }}
            {{ Form::text('director', $detallePelicula->director, ['class' => 'form-control' . ($errors->has('director') ? ' is-invalid' : '')]) }}
            {!! $errors->first('director', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>