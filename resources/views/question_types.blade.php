@extends('layouts.dashboard')
@section('title')
    @include('layouts.site_title', ['title' => 'Preguntas - [BD1]_P1'])
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
				@include('widgets.question_type-panel', array('class'=>'info', 'header'=> true, 'as'=>'question_' . $question_type->id, 'id'=>$question_type->id))
			</div>
		@endforeach
	@else
		@include('widgets.alert', array('class'=>'danger', 'message'=> 'No se encontraron valores', 'icon'=> 'remove'))
	@endif
</div>
@stop
