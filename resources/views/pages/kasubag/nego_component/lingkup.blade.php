@php 
    $lingkup = $data->getLingkup();
    $i=1;
@endphp

<table class='table'>
    <tr>
        <th colspan=2 class='bg-info'>RUANG LINGKUP</th>
    </tr>
    @foreach($lingkup as $key => $value)
        <tr>
            <th style="width:1.5em">{{$i}}.</th>
            <th>{{$value->lingkup}}</th>
        </tr>
        @php
            $i++;
        @endphp
    @endforeach
</table>
