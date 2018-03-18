@extends('layouts.dashboard')
@section('title')
    @include('layouts.site_title', ['title' => 'Preguntas - [BD1]_P1'])
@stop

@section('add_btn')
  @include('widgets.button-icon', array('class'=>'success btn-circle','size'=>'lg','icon'=>'plus','link'=>'/question_types/create'))
@stop

@section('nav-brand','[BD1]_P1 - Tipos de pregunta')
@section('page_heading','Tipos de pregunta')
@section('section')
<div class="col-sm-12">
	@if(count($question_types) > 0 )
		@foreach($question_types as $question_type)
			<div class="row">
				@section ('question_' . $question_type->id . '_panel_title', $question_type->name)
				@section ('question_' . $question_type->id . '_panel_body')
				{{{$question_type->description}}}
				@endsection
				@include('widgets.linked-panel', array('class'=>'info', 'header'=> true, 'as'=>'question_' . $question_type->id, 'id'=>$question_type->id, 'link'=>'question_types'))
			</div>
		@endforeach
	@else
		@include('widgets.alert', array('class'=>'danger', 'message'=> 'No se encontraron valores', 'icon'=> 'remove'))
	@endif
</div>
@stop
