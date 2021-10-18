<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_categoria') }}
            {{ Form::text('nombre_categoria', $categoria->nombre_categoria, ['class' => 'form-control' . ($errors->has('nombre_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Categoria']) }}
            {!! $errors->first('nombre_categoria', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_categoria') }}
            {{ Form::text('descripcion_categoria', $categoria->descripcion_categoria, ['class' => 'form-control' . ($errors->has('descripcion_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Categoria']) }}
            {!! $errors->first('descripcion_categoria', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>