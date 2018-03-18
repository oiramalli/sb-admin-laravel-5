<a href="{{ (isset($link)) ? $link : '#' }}">  
  <button type="button" class="btn btn-{{{ isset($class) ? $class : 'default' }}} {{{ isset($rounded) ? 'btn-rounded' : ''}}} {{{ isset($bordered) ? 'btn-bordered' : ''}}} @if (isset($size)) btn-{{$size}} @endif  {{{ isset($disabled) ? 'disabled' : '' }}}">{{ isset($value) ? $value : '' }}
    <i class="fa fa-{{ (isset($icon)) ? $icon : 'times' }}"></i>
  </button> 
</a>
