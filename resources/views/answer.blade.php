@extends('layouts.dashboard')
@section('title')
    @include('layouts.site_title', ['title' => 'Preguntas - [BD1]_P1'])
@stop

@section('nav-brand','[BD1]_P1 - respuesta')
@section('page_heading','Respuesta')
@section('section')
<div class="col-sm-12">
    <form role="form" action="/answers{{{ isset($answer->id) ? '/' . $answer->id : '' }}}" method="POST">
      <div class="form-group">
        <label>Nombre</label>
        <input class="form-control" required name="name" placeholder="Nombre" value="{{{ isset($answer->name) ? $answer->name : '' }}}">
        <p class="help-block">Nombre del respuesta. Ej: Todas las anteriores.</p>
      </div>

      <div class="form-group">
        <label>Descripción</label>
        <input class="form-control" name="description" placeholder="Descripción" value="{{{ isset($answer->description) ? $answer->description : '' }}}">
        <p class="help-block">Descripción del respuesta. Ej: Respuesta que identifica todas las respuestas anteriores como correctas.</p>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-success">Guardar</button>
      <button type="reset" class="btn btn-warning">Deshacer Cambios</button>
      <button type="button" onclick="location.href='/answers';" class="btn btn-info">Ir a "Respuestas"</button>
      @if(isset($answer->id))
        <input name="_method" type="hidden" value="PUT">
      @endif
    </form>
    @if(isset($answer->id))    
      <form role="form" action="/answers/{{{ $answer->id }}}" method="POST">
        <input name="_method" type="hidden" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-danger">ELIMINAR</button>
      </form>
    @endif    
</div>
@stop
