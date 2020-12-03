@php
    $jackson = json_decode($json);
@endphp

<div class="text-right">

    @if($jackson->file_akta_notaris=='akta_notaris/default.png' && strtolower($jackson->jenis)=='swasta')
        <a href="#" onclick="window.dashboardClient.uploadAktaIjin('{{$json}}')" json='{{$json}}' title='Upload Akta Notaris' class="btn btn-sm bg-purple">
            <i class="fas fa-upload"></i> Akta Notaris
        </a>
    @endif
    @if($jackson->file_ijin_usaha=='ijin_usaha/default.png' && strtolower($jackson->jenis)=='swasta')
        <a href="#" onclick="window.dashboardClient.uploadAktaIjin('{{$json}}','ijin')" title='Upload Izin Usaha' class="btn btn-sm bg-dark">
            <i class="fas fa-upload"></i> Ijin Usaha
        </a>
    @endif
    <a href="#" json='{{$json}}' onclick="window.dashboardClient.edit('{{$json}}')" title='Ubah Data' class="btn btn-sm btn-primary">
        <i class="fas fa-cog"></i>
    </a>
    <a href="#" onclick="window.penanggungJawab.modalOpen('{{$json}}')" title='Kelola Penanggung Jawab' class="btn btn-sm btn-success">
        <i class="fas fa-users"></i>
    </a>
    <a href="#" title='Hapus Jabatan' onclick="window.dashboardClient.delete('{{$json}}')" class="btn btn-sm btn-danger">
        <i class="fas fa-minus"></i>
    </a>
</div>