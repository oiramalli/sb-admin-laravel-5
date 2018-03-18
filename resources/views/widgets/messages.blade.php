@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    @include('widgets.alert', array('class'=>'danger', 'dismissable'=>true, 'message'=> $error, 'icon'=> 'remove'))
  @endforeach
@endif

@if(session('success'))
  @include('widgets.alert', array('class'=>'success', 'dismissable'=>true, 'message'=> session('success'), 'icon'=> 'check'))
@endif

@if(session('error'))
  @include('widgets.alert', array('class'=>'danger', 'dismissable'=>true, 'message'=> session('error'), 'icon'=> 'remove'))
@endif

@if(session('info'))
  @include('widgets.alert', array('class'=>'info', 'dismissable'=>true, 'message'=> session('info')))
@endif

@if(session('warning'))
  @include('widgets.alert', array('class'=>'warning', 'dismissable'=>true, 'message'=> session('warning')))
@endif
		