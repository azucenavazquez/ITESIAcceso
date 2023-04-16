@extends('adminlte::page')
<!-- page title -->
@section('title', 'Editar Perfil | ' . Config::get('adminlte.title'))

@section('content_header')
    <h1>Perfil</h1>
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
        <div class="form-group row">
        <div class="col-sm-2 col-form-label">
         <strong class="field-title">Nombre</strong>
        </div>

         <div class="col-sm-10 col-content">
             {{ Form::text('name', $data->name, array('class' => 'form-control', 'required')) }}
            <small class="form-text text-muted">
                <i class="fa fa-question-circle" aria-hidden="true"></i> Escribir su nombre.
              </small>
            </div>
            </div>
        </div>
         <div class="card-body">
        <div class="form-group row">
        <div class="col-sm-2 col-form-label">
         <strong class="field-title">N° Control</strong>
        </div>

         <div class="col-sm-10 col-content">
             {{ Form::text('name', $data->name, array('class' => 'form-control', 'required')) }}
            <small class="form-text text-muted">
                <i class="fa fa-question-circle" aria-hidden="true"></i> Establecer el número de control.
              </small>
            </div>
            </div>
           
            <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">
                    <strong class="field-title">Carrera</strong>
                </div>
                <ul>
     <li><a href="#">Mostrar carreras </a>
         <!-- start menu desplegable -->
         <ul>
                <li><a href="#">Industrial</a></li>
                <li><a href="#">Gestion Empresarial</a></li>
                <li><a href="#">Sistemas Computacionales</a></li>
                <li><a href="#">Sistemas Automotriz</a></li>
          </ul>
                <div class="col-sm-10 col-content">
                    {{ Form::text('name', $data->name, array('class' => 'form-control', 'required')) }}
                    <small class="form-text text-muted">
                        <i class="fa fa-question-circle" aria-hidden="true"></i> Establecer la carrera.
                    </small>
                </div>
            </div>
            <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">
                    <strong class="field-title">Semestre</strong>
                </div>

                <div class="col-sm-10 col-content">
                    {{ Form::text('name', $data->name, array('class' => 'form-control', 'required')) }}
                    <small class="form-text text-muted">
                        <i class="fa fa-question-circle" aria-hidden="true"></i> Actualizar el semestre actual.
                    </small>
                </div>
            </div>
            

            <div class="form-group row">
                <div class="col-sm-2 col-form-label">
                    <strong class="field-title">Correo</strong>
                </div>
                <div class="col-sm-10 col-content">
                    {{ Form::email('email',$data->email, array('class' => 'form-control', 'required')) }}
                    <small class="form-text text-muted">
                        <i class="fa fa-question-circle" aria-hidden="true"></i> Su correo electrónico este correo electrónico para iniciar sesión.
                    </small>
                </div>
            </div>

            <div id="form-password" class="form-group row">
                <div class="col-sm-2 col-form-label">
                    <strong class="field-title">Contraseña</strong>
                </div>
                <div class="col-sm-10 col-content">
                    {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'autocomplete' => 'new-password')) }}
                      <small id="passwordHelpBlock" class="form-text text-muted">
                      Su contraseña, esta contraseña para iniciar sesión. Déjalo en blanco si no quieres cambiar.    
                      </small>
                    <label class="reset-field-password" for="show-password"><input id="show-password" type="checkbox" name="show-password" value="1"> Mostrar Contraseña</label>
                </div>
            </div>

            {{--  image  --}}
            <div id="form-image" class="form-group row">
                <div class="col-sm-2 col-form-label">
                    <strong class="field-title">Imagen</strong>
                </div>
                <div class="col-sm-10 col-content">
                    <input class="custom-file-input" name="image" type="file"
                           accept="image/gif, image/jpeg,image/jpg,image/png" data-max-width="800"
                           data-max-height="400">
                    <label class="custom-file-label" for="customFile">Actualizar Imagen</label>
                    <span
                        class="image-upload-label"><i class="fa fa-question-circle" aria-hidden="true"></i> Por favor, sube la imagen (tamaño recomendado: 160px × 160px, max 5MB)</span>
                    <div class="image-preview-area">
                        <div id="image_preview" class="image-preview">
                                <img src="{{ asset('uploads/'.$data->image) }}" width="160" title="image"
                                     class="img-circle elevation-2">
                        </div>
                        {{-- only image has main image, add css class "show" --}}
                        <p class="delete-image-preview @if ($data->image != null && $data->image != 'default-user.png') show @endif"
                           onclick="deleteImagePreview(this);"><i class="fa fa-window-close"></i></p>
                        {{-- delete flag for already uploaded image in the server --}}
                        <input name="image_delete" type="hidden">
                    </div>
                </div>
            </div>
        </div>

        @if($data->role == 2 || $data->role == 3)
            {{ Form::hidden('qr_id',$data->qr_id, array()) }}
        @endif

        <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">
                    <strong class="field-title">Código QR</strong>
                </div>


        <div class="card-footer">
            <div id="form-button">
                <div class="col-sm-12 text-center top20">
                    <button type="submit" name="submit" id="btn-admin-member-submit"
                            class="btn btn-primary">{{ $data->button_text }}</button>
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
    <script src="{{ asset('js/backend/profile/form.js') }}"></script>
@stop
