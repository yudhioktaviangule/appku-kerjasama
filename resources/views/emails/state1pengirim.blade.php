@php
    $doc = $data['dokumen'];
    $user = $data['_user'];
@endphp
@component("mail::message")
<h3>Hi, {{$doc->getPenanggungJawab()
            ->getPerusahaan()
            ->getUser()
            ->name
        }}</h3>

<p> 
    Dokumen dengan nomor <strong>{{$doc->nomor}}</strong>, Tentang <strong>{{$doc->tentang}}</strong> Telah dikirimkan dan dinotifikasikan ke Kepala Bagian dan Kepala Sub Bagian.
</p>
    @component('mail::button', ['url' => url('/home'), 'color' => 'success'])
    Ke Aplikasi
    @endcomponent
@endcomponent

