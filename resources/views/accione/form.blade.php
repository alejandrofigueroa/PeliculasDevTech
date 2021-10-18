<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $accione->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pelicula_id') }}
            {{ Form::text('pelicula_id', $accione->pelicula_id, ['class' => 'form-control' . ($errors->has('pelicula_id') ? ' is-invalid' : ''), 'placeholder' => 'Pelicula Id']) }}
            {!! $errors->first('pelicula_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('accion') }}
            {{ Form::text('accion', $accione->accion, ['class' => 'form-control' . ($errors->has('accion') ? ' is-invalid' : ''), 'placeholder' => 'Accion']) }}
            {!! $errors->first('accion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_transaccion') }}
            {{ Form::text('fecha_transaccion', $accione->fecha_transaccion, ['class' => 'form-control' . ($errors->has('fecha_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Transaccion']) }}
            {!! $errors->first('fecha_transaccion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_renta_final') }}
            {{ Form::text('fecha_renta_final', $accione->fecha_renta_final, ['class' => 'form-control' . ($errors->has('fecha_renta_final') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Renta Final']) }}
            {!! $errors->first('fecha_renta_final', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_entrega') }}
            {{ Form::text('fecha_entrega', $accione->fecha_entrega, ['class' => 'form-control' . ($errors->has('fecha_entrega') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Entrega']) }}
            {!! $errors->first('fecha_entrega', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('monto_pago') }}
            {{ Form::text('monto_pago', $accione->monto_pago, ['class' => 'form-control' . ($errors->has('monto_pago') ? ' is-invalid' : ''), 'placeholder' => 'Monto Pago']) }}
            {!! $errors->first('monto_pago', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>