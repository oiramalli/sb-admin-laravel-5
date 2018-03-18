@extends('layouts.dashboard')
@section('title')
    @include('layouts.site_title', ['title' => 'Preguntas - [BD1]_P1'])
@stop

@section('add_btn')
  @include('widgets.button-icon', array('class'=>'success btn-circle','size'=>'lg','icon'=>'plus','link'=>'/questions/create'))
@stop

@section('nav-brand','[BD1]_P1 - Pregunta')
@section('page_heading','Pregunta')
@section('section')
<div class="col-sm-12">
	@if(count($questions) > 0 )
		@foreach($questions as $question)
			<div class="row">
				@section ('question_' . $question->id . '_panel_title', $question->name . ' -> ' . $question->questionType->name  )
				@section ('question_' . $question->id . '_panel_body')
				{{{$question->description}}}
				@endsection
				@include('widgets.linked-panel', array('class'=>'info', 'header'=> true, 'as'=>'question_' . $question->id, 'id'=>$question->id, 'link'=>'questions'))
			</div>
		@endforeach
	@else
		@include('widgets.alert', array('class'=>'danger', 'message'=> 'No se encontraron valores', 'icon'=> 'remove'))
	@endif
</div>
@stop
