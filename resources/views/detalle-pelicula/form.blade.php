<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('pelicula_id') }}
            {{ Form::text('pelicula_id', $detallePelicula->pelicula_id, ['class' => 'form-control' . ($errors->has('pelicula_id') ? ' is-invalid' : ''), 'placeholder' => 'Pelicula Id']) }}
            {!! $errors->first('pelicula_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sinopsis') }}
            {{ Form::text('sinopsis', $detallePelicula->sinopsis, ['class' => 'form-control' . ($errors->has('sinopsis') ? ' is-invalid' : ''), 'placeholder' => 'Sinopsis']) }}
            {!! $errors->first('sinopsis', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('genero') }}
            {{ Form::text('genero', $detallePelicula->genero, ['class' => 'form-control' . ($errors->has('genero') ? ' is-invalid' : ''), 'placeholder' => 'Genero']) }}
            {!! $errors->first('genero', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('director') }}
            {{ Form::text('director', $detallePelicula->director, ['class' => 'form-control' . ($errors->has('director') ? ' is-invalid' : ''), 'placeholder' => 'Director']) }}
            {!! $errors->first('director', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>