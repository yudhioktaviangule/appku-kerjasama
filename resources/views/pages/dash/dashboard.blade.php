
@php 
    $level = Auth::user()->level;
    $level = preg_replace('/(. )/','',$level);
@endphp
@include('pages.dash.'.$level)


