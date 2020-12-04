@php
    $xjson=json_decode($json);
@endphp

<div class="text-right">
    @if($xjson->aktif!=='0')
        <a href="#" class="btn btn-sm btn-warning">Set Nonaktif</a>
    @endif
    <a href="#" class="btn btn-sm btn-primary">Lihat</a>
    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
</div>