<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $detalleUsuario->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_usuario') }}
            {{ Form::text('nombre_usuario', $detalleUsuario->nombre_usuario, ['class' => 'form-control' . ($errors->has('nombre_usuario') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Usuario']) }}
            {!! $errors->first('nombre_usuario', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellido_usuario') }}
            {{ Form::text('apellido_usuario', $detalleUsuario->apellido_usuario, ['class' => 'form-control' . ($errors->has('apellido_usuario') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Usuario']) }}
            {!! $errors->first('apellido_usuario', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dui') }}
            {{ Form::text('dui', $detalleUsuario->dui, ['class' => 'form-control' . ($errors->has('dui') ? ' is-invalid' : ''), 'placeholder' => 'Dui']) }}
            {!! $errors->first('dui', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('departamento') }}
            {{ Form::text('departamento', $detalleUsuario->departamento, ['class' => 'form-control' . ($errors->has('departamento') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
            {!! $errors->first('departamento', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ciudad') }}
            {{ Form::text('ciudad', $detalleUsuario->ciudad, ['class' => 'form-control' . ($errors->has('ciudad') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad']) }}
            {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>