@extends('layouts.dashboard')
@section('title')
    @include('layouts.site_title', ['title' => 'Preguntas - [BD1]_P1'])
@stop

@section('nav-brand','[BD1]_P1 - Pregunta')
@section('page_heading','Pregunta')
@section('section')
<div class="col-sm-12">
	@if(count($questions) > 1 )
		@foreach($questions as $question)
			<div class="row">
				@section ('question_' . $question->id . '_panel_title', $question->name)
				@section ('question_' . $question->id . '_panel_body')
				{{{$question->description}}}
				@endsection
				@include('widgets.question-panel', array('class'=>'info', 'header'=> true, 'as'=>'question_' . $question->id, 'id'=>$question->id))
			</div>
		@endforeach
	@else
		@include('widgets.alert', array('class'=>'danger', 'message'=> 'No se encontraron valores', 'icon'=> 'remove'))
	@endif
</div>
@stop
