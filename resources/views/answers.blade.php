@extends('layouts.dashboard')
@section('title')
    @include('layouts.site_title', ['title' => 'Preguntas - [BD1]_P1'])
@stop

@section('add_btn')
  @include('widgets.button-icon', array('class'=>'success btn-circle','size'=>'lg','icon'=>'plus','link'=>'/answers/create'))
@stop

@section('nav-brand','[BD1]_P1 - Respuestas')
@section('page_heading','Respuestas')
@section('section')
<div class="col-sm-12">
	@if(count($answers) > 0 )
		@foreach($answers as $answer)
			<div class="row">
				@section ('answer_' . $answer->id . '_panel_title', $answer->name)
				@section ('answer_' . $answer->id . '_panel_body')
				{{{$answer->description}}}
				@endsection
				@include('widgets.linked-panel', array('class'=>'info', 'header'=> true, 'as'=>'answer_' . $answer->id, 'id'=>$answer->id, 'link'=>'answers'))
			</div>
		@endforeach
	@else
		@include('widgets.alert', array('class'=>'danger', 'message'=> 'No se encontraron valores', 'icon'=> 'exclamation-triangle'))
	@endif
</div>
@stop
