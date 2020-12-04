@php
    $xjson=json_decode($json);
@endphp

<div class="text-right">
    @if($xjson->aktif!=='0')
        <a href="#"  onclick="window.walikota.set(`{{$json}}`,`0`)" class="btn btn-sm btn-warning">Set Nonaktif</a>
    @else
        <a href="#"  onclick="window.walikota.setAktif(`{{$json}}`,`0`)" class="btn btn-sm btn-warning">Set Aktif</a>
    @endif
    <a href="#" onclick="window.walikota.edit(`{{$json}}`)" class="btn btn-sm btn-primary">Lihat</a>
    <a href="#" onclick="window.walikota.delete(`{{$json}}`)" class="btn btn-sm btn-danger">Hapus</a>
</div>