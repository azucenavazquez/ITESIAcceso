@extends('adminlte::page')
<!-- page title -->
@section('title', 'Settings | ' . Config::get('adminlte.title'))

@section('content_header')
    <h1>Ajustes</h1>
@stop

@section('content')
    {{--Show message if any--}}
    @include('layouts.flash-message')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Actualizar</h3>
        </div>

        {{ Form::open(array('url' => route($data->form_action), 'method' => 'POST','autocomplete' => 'off', 'files' => true)) }}
        {{ Form::hidden('id', $data->id, array('id' => 'user_id')) }}

        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label">
                            <strong class="field-title">Hora de entrada</strong>
                        </div>
                        <div class="col-sm-10 col-content">
                            {{ Form::text('start_time', $data->start_time, array('class' => 'form-control', 'required', 'id' => 'start_time')) }}
                            <p class="form-text text-muted">Rellene con la hora de inicio para entrar al plantel</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label">
                            <strong class="field-title">Tiempo de salida </strong>
                        </div>
                        <div class="col-sm-10 col-content">
                            {{ Form::text('out_time', $data->out_time, array('class' => 'form-control', 'required', 'id' => 'out_time')) }}
                            <p class="form-text text-muted">Llenarse con horas de acceso al plantel</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label">
                            <strong class="field-title">Url</strong>
                        </div>
                        <div class="col-sm-10 col-content">
                            {{ Form::text('url', url('/'), array('class' => 'form-control', 'disabled', 'id' => 'url')) }}
                            <p class="form-text text-muted">Tu URL actual. No puede cambiar esta URL</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label">
                            <strong class="field-title">Clave de App</strong>
                        </div>
                        <div class="col-sm-10 col-content">
                            {{ Form::text('key_app', $data->key_app, array('class' => 'form-control', 'required', 'id' => 'key', 'readonly')) }}
                            <p class="form-text text-muted">La clave de aplicación se utiliza para la comunicación con la aplicación. Puede cambiar la clave haciendo clic en el botón Generar nueva clave no olvide guardar</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2 col-form-label">
                            <strong class="field-title">Tiempo  de zona</strong>
                        </div>
                        <div class="col-sm-10 col-content">
                            {{ Form::select('timezone', $timezone, $data->timezone, array('id' => 'timezone', 'class' => 'form-control select2')) }}
                            <p class="form-text text-muted">Rellena la zona horaria en la que te encuentras</p>
                        </div>
                    </div>


        <div class="card-footer">
            <div id="form-button">
                <div class="col-sm-12 text-center top20">
                    <button type="submit" name="submit" id="btn-admin-member-submit"
                            class="btn btn-primary">{{ $data->button_text }}</button>

                    <button type="button" id="generate-key" class="btn btn-primary">Generar nueva clave</button>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>

    <!-- /.card -->
    </div>
    <!-- /.row -->
    <!-- /.content -->
@stop

@section('css')
@stop

@section('js')
    <script src="{{ asset('js/backend/settings/form.js'). '?v=' . rand(99999,999999) }}"></script>
@stop
