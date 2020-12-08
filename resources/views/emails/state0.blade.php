@php
    $doc = $data['dokumen'];
    $user = $data['_user'];
@endphp
@component("mail::message")
<h3>Hi, {{$data['_user']->name}}</h3>

<p> 
    {{$doc->getPenanggungJawab()
            ->getPerusahaan()
            ->getUser()
            ->name
        }} mengirimkan dokumen baru
</p>
<table cellspacing=0 cellpadding=0>
    <thead>
        <tr>
            <th style='padding:15pxwidth:100px;text-align:left'>Tentang</th>
            <td style='padding:15px'>: {{$doc->tentang}}</td>
        </tr>
        <tr>
            <th style='padding:15pxtext-align:left' colspan="2" >Pejabat Tujuan Kerjasama</th>
        </tr>
        <tr>
            <th style='padding:15pxtext-align:left'>Nama</th>
            <td style='padding:15px'>: {{$doc->getPejabat()->name}}</td>
        </tr>
        <tr>
            <th style='padding:15pxtext-align:left'>Jabatan</th>
            <td style='padding:15px'>: {{$doc->getPejabat()->jabatan}}</td>
        </tr>
    </thead>
</table>
    @component('mail::button', ['url' => url('/home'), 'color' => 'success'])
    Ke Aplikasi
    @endcomponent
@endcomponent

