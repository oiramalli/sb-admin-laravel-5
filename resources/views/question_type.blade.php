@extends('layouts.dashboard')
@section('title')
    @include('layouts.site_title', ['title' => 'Preguntas - [BD1]_P1'])
@stop

@section('nav-brand','[BD1]_P1 - Tipo de pregunta')
@section('page_heading','Tipos de pregunta')
@section('section')
<div class="col-sm-12">
    <form role="form" action="/question_types{{{ isset($question_type->id) ? '/' . $question_type->id : '' }}}" method="POST">
      <div class="form-group">
        <label>Nombre</label>
        <input class="form-control" required name="name" placeholder="Nombre" value="{{{ isset($question_type->name) ? $question_type->name : '' }}}">
        <p class="help-block">Nombre del tipo de pregunta. Ej: Abierta.</p>
      </div>

      <div class="form-group">
        <label>Descripción</label>
        <input class="form-control" name="description" placeholder="Descripción" value="{{{ isset($question_type->description) ? $question_type->description : '' }}}">
        <p class="help-block">Descripción del tipo de pregunta. Ej: Preguntas donde el usuario puede ingresar cualquier valor.</p>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-success">Guardar</button>
      <button type="reset" class="btn btn-warning">Deshacer Cambios</button>
      <button type="button" onclick="location.href='/question_types';" class="btn btn-info">Ir a "Tipos de Pregunta"</button>
      @if(isset($question_type->id))
        <input name="_method" type="hidden" value="PUT">
      @endif
    </form>
    @if(isset($question_type->id))    
      <form role="form" action="/question_types/{{{ $question_type->id }}}" method="POST">
        <input name="_method" type="hidden" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-danger">ELIMINAR</button>
      </form>
    @endif    
</div>
@stop
