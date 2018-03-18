@extends('layouts.dashboard')
@section('title')
    @include('layouts.site_title', ['title' => 'Preguntas - [BD1]_P1'])
@stop

@section('nav-brand','[BD1]_P1 - Tipo de pregunta')
@section('page_heading','Tipos de pregunta')
@section('section')
<div class="col-sm-12">
    <form role="form" action="/questions{{{ isset($question->id) ? '/' . $question->id : '' }}}" method="POST">
      <div class="form-group">
        <label>Nombre</label>
        <input class="form-control" required name="name" placeholder="Nombre" value="{{{ isset($question->name) ? $question->name : '' }}}">
        <p class="help-block">Nombre del tipo de pregunta. Ej: Abierta.</p>
      </div>

      <div class="form-group">
        <label>Descripción</label>
        <input class="form-control" name="description" placeholder="Descripción" value="{{{ isset($question->description) ? $question->description : '' }}}">
        <p class="help-block">Descripción del tipo de pregunta. Ej: Preguntas donde el usuario puede ingresar cualquier valor.</p>
      </div>
      
      <div class="form-group">
        <label>Tipo de pregunta</label>
        <select class="form-control" name="question_type">
          @foreach($question_types as $question_type)
        <option {{{isset($question) && $question_type->id==$question->question_type ? 'selected' : ''}}} value="{{{$question_type->id}}}">{{{$question_type->name}}}</option>
          @endforeach
        </select>
        <p class="help-block">Descripción del tipo de pregunta. Ej: Preguntas donde el usuario puede ingresar cualquier valor.</p>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-success">Guardar</button>
      <button type="reset" class="btn btn-warning">Deshacer Cambios</button>
      <button type="button" onclick="location.href='/questions';" class="btn btn-info">Ir a "Preguntas"</button>
      @if(isset($question->id))
        <input name="_method" type="hidden" value="PUT">
      @endif
    </form>
    @if(isset($question->id))    
      <form role="form" action="/questions/{{{ $question->id }}}" method="POST">
        <input name="_method" type="hidden" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-danger">ELIMINAR</button>
      </form>
    @endif    
</div>
@stop
{{--  
  name
  description
  question
--}}