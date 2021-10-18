<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $pelicula->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('foto') }}
            {{ Form::text('foto', $pelicula->foto, ['class' => 'form-control' . ($errors->has('foto') ? ' is-invalid' : ''), 'placeholder' => 'Foto']) }}
            {!! $errors->first('foto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_estreno') }}
            {{ Form::text('fecha_estreno', $pelicula->fecha_estreno, ['class' => 'form-control' . ($errors->has('fecha_estreno') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Estreno']) }}
            {!! $errors->first('fecha_estreno', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria_id') }}
            {{ Form::text('categoria_id', $pelicula->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('disponible') }}
            {{ Form::text('disponible', $pelicula->disponible, ['class' => 'form-control' . ($errors->has('disponible') ? ' is-invalid' : ''), 'placeholder' => 'Disponible']) }}
            {!! $errors->first('disponible', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stock') }}
            {{ Form::text('stock', $pelicula->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_renta') }}
            {{ Form::text('precio_renta', $pelicula->precio_renta, ['class' => 'form-control' . ($errors->has('precio_renta') ? ' is-invalid' : ''), 'placeholder' => 'Precio Renta']) }}
            {!! $errors->first('precio_renta', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_compra') }}
            {{ Form::text('precio_compra', $pelicula->precio_compra, ['class' => 'form-control' . ($errors->has('precio_compra') ? ' is-invalid' : ''), 'placeholder' => 'Precio Compra']) }}
            {!! $errors->first('precio_compra', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>