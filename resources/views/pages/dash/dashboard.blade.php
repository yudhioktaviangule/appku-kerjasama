
@php 
    $level = Auth::user()->level;
@endphp
@if($level==='client')
    @include('pages.dash.client')
@else
    @include('pages.dash.inline')
@endif
